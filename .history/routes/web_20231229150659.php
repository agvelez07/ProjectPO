<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\POController;


Route::get('/', function(){
    return view('Welcome');
});


//Utilizadores---------------------------------------------------------------------
Route::get('Users', [UserController::class,'Index']);

Route::get('Users/Create', [UserController::class,'Create']);
Route::post('Save-User', [UserController::class,'saveUsers']);

Route::get('Users/Edit/{ID}', [UserController::class,'Edit']);
Route::post('Update-User', [UserController::class,'updateUser']);

Route::get('Delete/{ID}', [UserController::class,'DeleteUser']);

Route::get('Details', [UserController::class,'Details']);

//Fornecedores---------------------------------------------------------------------

Route::get('Suppliers', [SupplierController::class,'Index']);

Route::get('Suppliers/Create', [SupplierController::class,'Create']);
Route::post('Save-Supplier', [SupplierController::class,'saveSupplier']);

Route::get('Suppliers/Edit/{ID}', [SupplierController::class,'Edit']);
Route::post('Update-Supplier', [SupplierController::class,'updateSupplier']);

Route::get('Delete/{ID}', [SupplierController::class,'deleteSupplier']);

//Ordem de Compra-------------------------------------------------------------------

Route::get('POs', [POController::class,'Index']);

Route::get('POs/Create', [POController::class,'Create']);
Route::post('Save-PO', [POController::class,'savePO']);

Route::get('POs/Edit/{id}', [POController::class,'Edit']);
Route::post('Update-PO', [POController::class,'updatePO']);

Route::get('Delete/{}', [POController::class,'deletePO']);

Route::get('POs/Details/{id}', [POController::class,'Details']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

