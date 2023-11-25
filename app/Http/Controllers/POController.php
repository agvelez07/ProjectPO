<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function Index()
    {
        $data = supplier::get();
        return view('Users', compact('data'));
    }
    public function Create()
    {
        return view("Create");
    }
    public function saveSpplier(Request $request)
    {
        $request ->validate([
            'id' => 'required|id|unique:users,email',
            'name' =>  'required|name|unique:supplier,name',
        ]);
    
        $id = $request->id;
        $name = $request->name;

        $supplier = new supplier();
        $supplier->id = $id;
        $supplier->name = $name;
        $supplier->status = 1;
        $supplier->save();

        dd($request->all());

        return redirect()->back()->with('success', 'Fornecedor Adicionado com Sucesso');
    }

    public function Edit($ID){
        $data = supplier::Where('ID', '=', $ID)->First();
        return View('Edit', compact('data'));
    }

    public function updateUser(Request $request){
        $request ->validate([
            'id' => 'required|id|unique:users,email',
            'name' =>  'required|name|unique:supplier,name',
        ]);
    
        $id = $request->id;
        $name = $request->name;


        supplier::Where('id', '=', $id)->update([
            'id'=> $id,
            'name'=> $name
        ]);


        return redirect()->back()->with('success', 'Utilizador Atualizado com Sucesso');
    }

    public function DeleteUser($ID)
    {
        $ID =supplier::Where('ID', '=', $ID)->Delete();
        return redirect()->back()->with('success', 'Utilizador Eliminado com Sucesso');
        
    }
}
