<?php

use Illuminate\Support\Facades\Route;
use Notification\PushNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-notification', function(PushNotification $pushNotification){
    $message = request('message');

    return response()->json($pushNotification->send($message));

});
