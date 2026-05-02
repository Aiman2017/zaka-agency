<?php

use App\Http\Controllers\Back\AboutController;
use App\Http\Controllers\Back\ContactController;
use App\Http\Controllers\Back\CountryController;
use App\Http\Controllers\Back\GalleryController;
use App\Http\Controllers\Back\HomeController as MainController;
use App\Http\Controllers\Back\HomeSettingController;
use App\Http\Controllers\Back\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::get('home', [HomeSettingController::class, 'edit'])->name('settings.edit');
    Route::put('home', [HomeSettingController::class, 'update'])->name('settings.update');

    Route::get('services', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services', [ServiceController::class, 'update'])->name('services.update');

    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    Route::get('gallery', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('gallery/{galleryItem}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{galleryItem}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    Route::get('contact', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');
    Route::patch('contact/messages/{message}/read', [ContactController::class, 'markRead'])->name('contact.messages.read');
    Route::delete('contact/messages/{message}', [ContactController::class, 'destroyMessage'])->name('contact.messages.destroy');
    Route::get('countries', [CountryController::class, 'edit'])->name('countries.edit');
    Route::get('countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
    Route::get('countries/{country}', [CountryController::class, 'show'])->name('countries.show');
    Route::put('countries/{country}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
});
