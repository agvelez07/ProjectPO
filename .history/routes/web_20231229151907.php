<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\POController;


Route::get('/', function(){
    return view('Welcome');
});


// Route for displaying the PO list
Route::get('/po', [POController::class, 'Index'])->name('po.index');

// Route for displaying the create PO form
Route::get('/po/create', [POController::class, 'Create'])->name('po.create');

// Route for handling the form submission to create a new PO
Route::post('/po/save', [POController::class, 'savePO'])->name('po.save');

// Route for displaying the edit PO form
Route::get('/po/edit/{id}', [POController::class, 'Edit'])->name('po.edit');

// Route for handling the form submission to update an existing PO
Route::post('/po/update/{id}', [POController::class, 'updatePO'])->name('po.update');

// Route for displaying the details of a specific PO
Route::get('/po/details/{id}', [POController::class, 'Details'])->name('po.details');

// Route for deleting a specific PO
Route::get('/po/delete/{id}', [POController::class, 'DeletePO'])->name('po.delete');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
