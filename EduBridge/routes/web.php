<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\MentorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function (){

    Route::get('/index',Index::class)->name('index');
    Route::get('/chat',Index::class)->name('chat.index');
    Route::get('/chat/{query}',Chat::class)->name('chat');
    Route::get('/users',Users::class)->name('users');
    
});

Route::middleware('auth')->group(function (){

    Route::get('/friend', [UserController::class, 'index'])->name('users.friend');
    Route::post('/users/{id}/add', [UserController::class, 'addFriend'])->name('users.add-friend');
    Route::post('/users/{id}/accept', [UserController::class, 'acceptFriend'])->name('users.accept-friend');
    Route::post('/users/{id}/reject', [UserController::class, 'rejectFriend'])->name('users.reject-friend');
    Route::post('/users/{id}/not-interested', [UserController::class, 'notInterested'])->name('users.not-interested');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum-read', [ForumController::class, 'read'])->name('forum.read');
    Route::get('/forum-update/{id}/update', [ForumController::class, 'edit'])->name('forum.update');
    Route::put('/forum/{id}/update', [ForumController::class, 'update'])->name('forum.update.save');
    Route::get('/forum-create', [ForumController::class, 'create'])->name('forum.create');
    // Route::get('/forum/create', [ThreadController::class, 'create'])->name('thread.create');
    // Route::post('/forum/store', [ThreadController::class, 'store'])->name('thread.store');
    Route::get('/forum-create', function () {return view('forum.forum-create');});
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');


    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

    Route::post('/forum/{id}/comment', [ForumController::class, 'addComment'])->name('forum.addComment');
    
});

Route::middleware('auth')->group(function () {

    Route::get('/find-mentor', [MentorController::class, 'index'])->name('find-mentor');
    Route::post('/mentor/store', [MentorController::class, 'store'])->name('mentor.store');
    Route::delete('/mentor/{id}', [MentorController::class, 'destroy'])->name('mentor.destroy');

    Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');
    Route::post('/mentors/{id}', [MentorController::class, 'update'])->name('mentors.update');
    Route::delete('/mentors/{id}', [MentorController::class, 'destroy'])->name('mentors.destroy');

    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
});