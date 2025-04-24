<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notes\UpdateNotesRequest;
use App\Http\Requests\Notes\CreateNotesRequest;
use App\Http\Resources\Notes\NotesResource;
use App\Models\Notes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NotesController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $notes = Notes::useFilters()->dynamicPaginate();

        return NotesResource::collection($notes);
    }

    public function store(CreateNotesRequest $request): JsonResponse
    {
        $notes = Notes::create($request->validated());

        return $this->responseCreated('Notes created successfully', new NotesResource($notes));
    }

    public function show(Notes $notes): JsonResponse
    {
        return $this->responseSuccess(null, new NotesResource($notes));
    }

    public function update(UpdateNotesRequest $request, Notes $notes): JsonResponse
    {
        $notes->update($request->validated());

        return $this->responseSuccess('Notes updated Successfully', new NotesResource($notes));
    }

    public function destroy(Notes $notes): JsonResponse
    {
        $notes->delete();

        return $this->responseDeleted();
    }

   
}
