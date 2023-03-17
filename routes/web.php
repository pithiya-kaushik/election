<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Website\ElectionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Website\VoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('layout.main');
});*/

Route::get('login',[LoginController::class,'index'])->name('admin.login');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('register',[RegisterController::class,'index'])->name('admin.register');
Route::post('register',[RegisterController::class,'register'])->name('register');


Route::middleware('auth')->group(function () {
	Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
	Route::get('admin',[UserController::class,'index'])->name('admin.list');

	Route::group([
	  'prefix' => 'admin/party',
	  'as' => 'party.',
	], function () {
		Route::get('/',[PartyController::class,'index'])->name('list');
		Route::get('create',[PartyController::class,'create'])->name('create');
		Route::post('save',[PartyController::class,'save'])->name('save');
		Route::get('{party}/edit',[PartyController::class,'edit'])->name('edit');
		Route::post('{party}/store',[PartyController::class,'store'])->name('store');
		Route::delete('{party}/delete',[PartyController::class,'delete'])->name('delete');
	  
	});

	Route::group([
	  'prefix' => 'admin/location',
	  'as' => 'location.',
	], function () {
		
		Route::get('/',[LocationController::class,'index'])->name('list');
		Route::get('create',[LocationController::class,'create'])->name('create');
		Route::post('save',[LocationController::class,'save'])->name('save');
		Route::get('{location}/edit',[LocationController::class,'edit'])->name('edit');
		Route::post('{location}/store',[LocationController::class,'store'])->name('store');
		Route::delete('{location}/delete',[LocationController::class,'delete'])->name('delete');
	});

	Route::group([
		'prefix' => 'admin/user',
		'as' => 'user.',
	], function() {
		Route::get('/',[UserController::class,'index'])->name('list');
		Route::get('create',[UserController::class,'create'])->name('create');
		Route::post('save',[UserController::class,'save'])->name('save');
		Route::get('{user}/edit',[UserController::class,'edit'])->name('edit');
		Route::post('{user}/store',[UserController::class,'store'])->name('store');
		Route::delete('{user}/delete',[UserController::class,'delete'])->name('delete');
	});

	Route::group([
		'prefix' => 'admin/candidate',
		'as' => 'candidate.',
	], function() {
		Route::get('/',[CandidateController::class,'index'])->name('list');
		Route::get('create',[CandidateController::class,'create'])->name('create');
		Route::post('save',[CandidateController::class,'save'])->name('save');
		Route::get('{candidate}/edit',[CandidateController::class,'edit'])->name('edit');
		Route::post('{candidate}/store',[CandidateController::class,'store'])->name('store');
		Route::delete('{candidate}/delete',[CandidateController::class,'delete'])->name('delete');
	});

});
Route::get('/',[ElectionController::class,'index'])->name('website.election');
Route::post('location',[ElectionController::class,'location'])->name('location');
Route::post('vote',[VoteController::class,'index'])->name('vote');
Route::get('result',[VoteController::class,'result'])->name('result');
Route::post('result',[VoteController::class,'voteResult'])->name('vote.result');


