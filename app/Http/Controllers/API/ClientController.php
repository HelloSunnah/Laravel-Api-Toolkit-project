<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClientController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $clients = Client::useFilters()->dynamicPaginate();

        return ClientResource::collection($clients);
    }

    public function store(CreateClientRequest $request): JsonResponse
    {
        $client = Client::create($request->validated());

        return $this->responseCreated('Client created successfully', new ClientResource($client));
    }

    public function show(Client $client): JsonResponse
    {
        return $this->responseSuccess(null, new ClientResource($client));
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());

        return $this->responseSuccess('Client updated Successfully', new ClientResource($client));
    }

    public function destroy(Client $client): JsonResponse
    {
        $client->delete();

        return $this->responseDeleted();
    }

   
}
