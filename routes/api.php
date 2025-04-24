<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\RolePermission\PermissionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', [TestController::class, 'returnAllUsers']);



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/meetings/accept/{meeting}/{user}', [\App\Http\Controllers\API\MeetingController::class, 'accept']);

// admin routes
Route::middleware(['auth:api', 'permission:all_permission'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::post('users/{user}/assign-role', [UserController::class, 'assignRole']);
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'assignPermission']);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
});

// Regular user routes
Route::middleware(['auth:api', 'permission:user_permission'])->group(function () {
    // meetings
    Route::apiResource('/meetings', \App\Http\Controllers\API\MeetingController::class);


    // agendas
    Route::apiResource('/agendas', \App\Http\Controllers\API\AgendaController::class);

    // notes
    Route::apiResource('/notes', \App\Http\Controllers\API\NotesController::class);

    // subscriptions

    Route::apiResource('/subscriptions', \App\Http\Controllers\API\SubscriptionController::class);

    // chatMessages

    Route::apiResource('/chatMessages', \App\Http\Controllers\API\ChatMessageController::class);
    Route::get('/message-convo/{userId}', [ \App\Http\Controllers\API\ChatMessageController::class, 'getConversation']);
    Route::post('/message-send', [ \App\Http\Controllers\API\ChatMessageController::class, 'sendMessage']);

    Route::get('/all-users', [AuthController::class,'getUsers']);
    Route::post('/broadcasting/auth', function (Request $request) {
        return Broadcast::auth($request);
    });


    //companies

    Route::apiResource('/companies', \App\Http\Controllers\API\CompanyController::class);

    //clients

    Route::apiResource('/clients', \App\Http\Controllers\API\ClientController::class);

    //projects

    Route::apiResource('/projects', \App\Http\Controllers\API\ProjectController::class);

    // meetingLocations

    Route::apiResource('/meetingLocations', \App\Http\Controllers\API\MeetingLocationController::class);



});



/*===========================
=           customers           =
=============================*/
// Note: This is a test api route
Route::apiResource('/customers', \App\Http\Controllers\API\CustomerController::class);

/*=====  End of customers   ======*/









