<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;

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



require __DIR__.'/auth.php';
