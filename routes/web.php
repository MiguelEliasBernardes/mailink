<?php

use App\Http\Controllers\EmailListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('campanhas');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lists', [EmailListController::class, 'index'])->name('email-list.index');
    Route::get('/lists/create', [EmailListController::class, 'create'])->name('email-list.create');
    Route::post('/lists/create', [EmailListController::class, 'store'])->name('email-list.store');


    Route::resource(name: 'email-templates', controller: MailTemplates::class);

});

require __DIR__.'/auth.php';
