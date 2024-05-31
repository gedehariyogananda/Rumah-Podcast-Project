<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecordingPodcastController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
  Route::get('/', 'index')->name('get.login');
  Route::post('/login', 'login')->name('login');
  Route::get('/register', 'getRegister')->name('get.register');
  Route::post('/register', 'register')->name('register');
});

Route::controller(LoginController::class)->middleware('auth')->group(function () {

  Route::get('/logout', 'logout')->name('logout');
  Route::get('/profile', 'profile')->name('profile');
  Route::patch('/edit-profile', 'editProfile')->name('editProfile');
});


Route::controller(HomeController::class)->middleware('auth')->group(function () {
  Route::get('home', 'index')->name('home');
  Route::get('dashboard', 'dashboard')->name('dashboard');
  Route::get('get-all/podcasts', 'getAllPodcasts')->name('getAllPodcasts');
  Route::get('get-spesific/{slug}/podcast', 'getSpesifikPodcast')->name('getSpesifikPodcast');
  Route::get('delete-user', 'deleteUser')->name('deleteUser');
  Route::patch('update-user/{id}', 'updateUser')->name('updateUser');
});


Route::controller(RecordingPodcastController::class)->name('recording.')->group(function () {
  Route::get('add-podcast', 'index')->name('index-podcast');
  Route::get('add-podcast/recording', 'getRecording')->name('index');
  Route::post('/add-podcast', 'addpodcast')->name('add-podcast');
  Route::get('/set-podcast/recording/{slug}', 'setRecording')->name('set-recording');
  Route::post('/set-podcast/recording/{slug}', 'store')->name('store');
  Route::get('/delete-podcast/{slug}', 'destroy')->name('destroy');
  Route::patch('/update-podcast/{slug}', 'update')->name('update');
  Route::get('/all-data-users', 'getAllDataUsers')->name('getAllDataUsers');
  // searching 
  Route::get('/search', 'search')->name('search');
  Route::delete('/delete/{slug}/podcast', 'delete')->name('delete');
  Route::get('/admin-get-all/podcasts', 'getAllDataPodcasts')->name('getAllDataPodcasts');
  Route::get('/delete/podcast-user/{slug}', 'deletePodcastUser')->name('deletePodcastUser');
  Route::post('/add-podcast-user', 'addPodcastUser')->name('addPodcastUser');
});
