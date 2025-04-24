<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingLocation\UpdateMeetingLocationRequest;
use App\Http\Requests\MeetingLocation\CreateMeetingLocationRequest;
use App\Http\Resources\MeetingLocation\MeetingLocationResource;
use App\Models\MeetingLocation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MeetingLocationController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $meetingLocations = MeetingLocation::useFilters()->dynamicPaginate();

        return MeetingLocationResource::collection($meetingLocations);
    }

    public function store(CreateMeetingLocationRequest $request): JsonResponse
    {
        $meetingLocation = MeetingLocation::create($request->validated());

        return $this->responseCreated('MeetingLocation created successfully', new MeetingLocationResource($meetingLocation));
    }

    public function show(MeetingLocation $meetingLocation): JsonResponse
    {
        return $this->responseSuccess(null, new MeetingLocationResource($meetingLocation));
    }

    public function update(UpdateMeetingLocationRequest $request, MeetingLocation $meetingLocation): JsonResponse
    {
        $meetingLocation->update($request->validated());

        return $this->responseSuccess('MeetingLocation updated Successfully', new MeetingLocationResource($meetingLocation));
    }

    public function destroy(MeetingLocation $meetingLocation): JsonResponse
    {
        $meetingLocation->delete();

        return $this->responseDeleted();
    }

   
}
