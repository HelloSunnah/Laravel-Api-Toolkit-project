<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $projects = Project::useFilters()->dynamicPaginate();

        return ProjectResource::collection($projects);
    }

    public function store(CreateProjectRequest $request): JsonResponse
    {
        $project = Project::create($request->validated());

        return $this->responseCreated('Project created successfully', new ProjectResource($project));
    }

    public function show(Project $project): JsonResponse
    {
        return $this->responseSuccess(null, new ProjectResource($project));
    }

    public function update(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        $project->update($request->validated());

        return $this->responseSuccess('Project updated Successfully', new ProjectResource($project));
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return $this->responseDeleted();
    }

   
}
