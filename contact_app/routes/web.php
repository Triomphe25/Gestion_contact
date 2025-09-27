<?php

use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home')->name('home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function(){
        $user = Auth::user();
        return Inertia::render('dashboard',[
            'contacts'=> User::find($user->id)->contacts()->orderBy('first_name')->get()
        ]);
        
    });
})->name('dashboard');
Route::resource('contacts', ContactController::class);

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
