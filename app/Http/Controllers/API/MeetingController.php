<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\CreateMeetingRequest;
use App\Http\Requests\Meeting\UpdateMeetingRequest;
use App\Http\Resources\Meeting\MeetingResource;
use App\Mail\MeetingInvitationMail;
use App\Models\Meeting;
use App\Models\MeetingAttachment;
use App\Models\MeetingParticipant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function __construct() {}

    public function index(): AnonymousResourceCollection
    {
        $meetings = Meeting::useFilters()->dynamicPaginate();
        return MeetingResource::collection($meetings);
    }

    public function store(CreateMeetingRequest $request)
    {
        $meeting = Meeting::create($request->validated());

        if ($request->hasFile('attachments')) {
            MeetingAttachment::saveAttachments(
                $meeting->id,
                $request->file('attachments'),
                $request->attachment_title
            );
        }
        if ($request->has('participants') && is_array($request->participants)) {
            MeetingParticipant::saveParticipants($meeting->id, $request->participants);

            // Send email to each participant
            foreach ($request->participants as $userId) {
                $user = User::find($userId);
                if ($user && $user->email) {
                    Mail::to($user->email)->send(new MeetingInvitationMail($meeting, $user));
                }
            }
        }
        return $this->responseCreated('Meeting created successfully', new MeetingResource($meeting));
    }

    public function show(Meeting $meeting): JsonResponse
    {
        return $this->responseSuccess(null, new MeetingResource($meeting));
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting): JsonResponse
    {
        $meeting->update($request->validated());

         // Handle updated attachments
        if ($request->hasFile('attachments')) {

            MeetingAttachment::where('meeting_id', $meeting->id)->delete();
            
            MeetingAttachment::saveAttachments(
                $meeting->id,
                $request->file('attachments'),
                $request->attachment_title
            );
        }

        return $this->responseSuccess('Meeting updated Successfully', new MeetingResource($meeting));
    }

    public function destroy(Meeting $meeting): JsonResponse
    {
        $meeting->delete();

        return $this->responseDeleted();
    }

    public function accept($meetingId, $userId)
    {
        $participant = \App\Models\MeetingParticipant::where('meeting_id', $meetingId)
            ->where('user_id', $userId)
            ->first();

        if ($participant) {
            $participant->update(['status' => 'accepted']);
            return response()->json(['message' => 'You have accepted the meeting.']);
        }

        return response()->json(['message' => 'Invalid or expired link.'], 404);
    }
}
