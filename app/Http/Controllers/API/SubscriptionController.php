<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\UpdateSubscriptionRequest;
use App\Http\Requests\Subscription\CreateSubscriptionRequest;
use App\Http\Resources\Subscription\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $subscriptions = Subscription::useFilters()->dynamicPaginate();

        return SubscriptionResource::collection($subscriptions);
    }

    public function store(CreateSubscriptionRequest $request): JsonResponse
    {
        $subscription = Subscription::create($request->validated());

        return $this->responseCreated('Subscription created successfully', new SubscriptionResource($subscription));
    }

    public function show(Subscription $subscription): JsonResponse
    {
        return $this->responseSuccess(null, new SubscriptionResource($subscription));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription): JsonResponse
    {
        $subscription->update($request->validated());

        return $this->responseSuccess('Subscription updated Successfully', new SubscriptionResource($subscription));
    }

    public function destroy(Subscription $subscription): JsonResponse
    {
        $subscription->delete();

        return $this->responseDeleted();
    }

   
}
