<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Events\MessageSent;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ChatMessage\ChatMessageResource;
use App\Http\Requests\ChatMessage\CreateChatMessageRequest;
use App\Http\Requests\ChatMessage\UpdateChatMessageRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChatMessageController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $chatMessages = ChatMessage::useFilters()->dynamicPaginate();

        return ChatMessageResource::collection($chatMessages);
    }

    public function store(CreateChatMessageRequest $request): JsonResponse
    {
        $chatMessage = ChatMessage::create($request->validated());

        return $this->responseCreated('ChatMessage created successfully', new ChatMessageResource($chatMessage));
    }

    public function show(ChatMessage $chatMessage): JsonResponse
    {
        return $this->responseSuccess(null, new ChatMessageResource($chatMessage));
    }

    public function update(UpdateChatMessageRequest $request, ChatMessage $chatMessage): JsonResponse
    {
        $chatMessage->update($request->validated());

        return $this->responseSuccess('ChatMessage updated Successfully', new ChatMessageResource($chatMessage));
    }

    public function destroy(ChatMessage $chatMessage): JsonResponse
    {
        $chatMessage->delete();

        return $this->responseDeleted();
    }

    //Broadcasting Chat

    public function getConversation($userId)
    {
        $loggedInUserId = Auth::id();
        $rec_name = User::select('name')->where('id', $userId)->first();

        $messages = ChatMessage::where(function ($query) use ($loggedInUserId, $userId) {
            $query->where('sender_id', $loggedInUserId)->where('receiver_id', $userId);
        })
            ->orWhere(function ($query) use ($loggedInUserId, $userId) {
                $query->where('sender_id', $userId)->where('receiver_id', $loggedInUserId);
            })
            ->orderBy('created_at', 'asc')
            ->get();
        foreach ($messages as $message) {
            if ($message->attachment) {
                $message->attachment_url = Storage::url($message->attachment);
            }
        }


        return response()->json([
            'messages' => $messages,
            'loggedInUserId' => $loggedInUserId,
            'userName' => $rec_name
        ]);
    }

    public function sendMessage(Request $request)
    {
        $loggedInUserId = Auth::id();

        // Validate the request
        $request->validate([
            'content' => 'nullable|string',
            'receiver_id' => 'required|exists:users,id',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:10240',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        $message = new ChatMessage([
            'sender_id' => $loggedInUserId,
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'attachment' => $attachmentPath,
        ]);

        $message->save();

        broadcast(new MessageSent($message, $request->receiver_id));

        return response()->json([
            'message' => 'Message sent successfully',
            'data' => $message
        ]);
    }


}
