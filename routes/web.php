<?php

use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\EmailUserListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Mail\EmailCampaign;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lists', [EmailListController::class, 'index'])->name('email-list.index');
    Route::get('/lists/create', [EmailListController::class, 'create'])->name('email-list.create');
    Route::post('/lists/create', [EmailListController::class, 'store'])->name('email-list.store');
    Route::delete('/lists/{id}', [EmailListController::class, 'destroy'])->name('email-list.destroy');

    Route::get('/customer', [EmailUserListController::class, 'index'])->name('customer-email.index');
    Route::post('/customer/create', [EmailUserListController::class, 'store'])->name('customer-email.store');
    Route::get('/customer/{id}', [EmailUserListController::class, 'show'])->name('customer-email.show');
    Route::post('/customer', [EmailUserListController::class, 'update'])->name('customer-email.update');
    Route::delete('/customer/{id}', [EmailUserListController::class, 'destroy'])->name('customer-email.destroy');

    Route::resource('templates',  TemplateController::class);

    Route::resource('campaigns', CampaignsController::class);
    Route::get('/campaigns/delivery/{id}', [CampaignsController::class, 'campaignDelivery'])->name('campaignDelivery');

    Route::get('/campaigns/{campaign}/emails', function (Campaigns $campaign){

        foreach ($campaign->EmailList->subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new EmailCampaign(($campaign)));
        }

        return (new EmailCampaign($campaign))->render();
    });

});

require __DIR__.'/auth.php';
