<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MentorController;

// Grouping routes under the same controller
Route::controller(NavigationController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/find-mentor', 'findMentor')->name('find-mentor');
    Route::get('/chat', 'chat')->name('chat');
    Route::get('/forum', 'forum')->name('forum');
    Route::get('/find-friend', 'findFriend')->name('find-friend');
    Route::get('/history', 'history')->name('history');
    Route::get('/cart', 'cart')->name('cart');
    
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'checkout')->name('payment.checkout');
    Route::post('/payment', 'store')->name('payment.store');
    Route::get('/receipt', 'receipt')->name('payment.receipt');
    
    Route::get('/payment', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/receipt/{id}', [PaymentController::class, 'receipt'])->name('payment.receipt');
    Route::get('/find-mentor', [NavigationController::class, 'findMentor'])->name('find-mentor');
});

// Optional: Define a default route for the homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::controller(MentorController::class)->group(function () {
    Route::get('/find-mentor', 'index')->name('find-mentor');
    Route::post('/mentor/store', 'store')->name('mentor.store');
    Route::delete('/mentor/{id}', 'destroy')->name('mentor.destroy');

    Route::get('/mentors/{id}', [MentorController::class, 'show']);
    Route::post('/mentors/{id}', [MentorController::class, 'update']);
    Route::delete('/mentors/{id}', [MentorController::class, 'destroy']);

    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
    


});
