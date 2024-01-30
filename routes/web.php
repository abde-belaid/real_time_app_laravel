<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Route;

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

Route::view("/",'login');
Route::post("/loginA",[LoginController::class,'login'])->name('loginA');

Route::get('/getMessage',[UtilisateurController::class,'index'])->name('getmessage');
Route::post('/send',[UtilisateurController::class,'send'])->name('send');
Route::get('/findMessage/{sender}/{receiver}',[UtilisateurController::class,'findMessage'])->name('findMessage');

Route::get('/messages',function(){
    return view('messages');
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
