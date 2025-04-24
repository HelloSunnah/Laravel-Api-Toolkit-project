<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agenda\UpdateAgendaRequest;
use App\Http\Requests\Agenda\CreateAgendaRequest;
use App\Http\Resources\Agenda\AgendaResource;
use App\Models\Agenda;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AgendaController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $agendas = Agenda::useFilters()->dynamicPaginate();

        return AgendaResource::collection($agendas);
    }

    public function store(CreateAgendaRequest $request): JsonResponse
    {
        $agenda = Agenda::create($request->validated());
        return $this->responseCreated('Agenda created successfully', new AgendaResource($agenda));
    }

    public function show(Agenda $agenda): JsonResponse
    {
        return $this->responseSuccess(null, new AgendaResource($agenda));
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda): JsonResponse
    {
        $agenda->update($request->validated());

        return $this->responseSuccess('Agenda updated Successfully', new AgendaResource($agenda));
    }

    public function destroy(Agenda $agenda): JsonResponse
    {
        $agenda->delete();

        return $this->responseDeleted();
    }

   
}
