<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\supplier as ModelsSupplier;

class SupplierController extends Controller
{
    //Devolve dados de Utilizadores para a listagem
    //Get
    public function Index()
    {
        $data = Supplier::get(); //Armazena dados dos Utilizadores
        return view('Suppliers', compact('data')); //Retorna os dados para a view 'Users'.
    }


    //Criar Utilizador-----------------------------------------------------------------
    public function Create()
    {
        return view("Suppliers/Create");
    }

    //Post request ao criar um novo utilizador
    public function saveUsers(Request $request)
    {
        //Validação
        $request->validate([
            'id' => 'required|id|unique:supplier,id',
            'name' => 'required|min:6',
        ]);


        //Valores do request passados para as respectivas variáveis
        $id = $request->id;
        $name = $request->name;
        $status = $request->status;

        //Criação de novo utilizador
        $supplier = new Supplier();
        $supplier->id = $id;
        $supplier->name = $name;
        $supplier->status = $status;

        //Guardar Utilizador na Base de dados
        $supplier->save();

        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Fornecedor Adicionado com Sucesso');
    }


    //Editar--------------------------------------------------------------------------------
    //GET - Retorna o valor do ID selecionado para a view
    public function Edit($ID)
    {
    $data = Supplier::where('ID', '=', $ID)->first();
    return view('Suppliers/Edit', compact('data'));
    }


    //Post - Edita as informações do Utilizador
    public function updateUser(Request $request)
    {

        //Validação 
        $request->validate([
            'id' => 'required|id|unique:supplier,id',
            'name' => 'required|min:6',
        ]);


        //Valores do request passados para as respectivas variáveis
        $id = $request->id;
        $name = $request->name;
        $status = $request->status;

        //Atualiza os dados
        User::Where('ID', '=', $ID)->update([
            'id' => $id,
            'name' => $name,
            'status' => $status
        ]);
        //dd($request->all());
        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Fornecedor Atualizado com Sucesso');
    }

    //Post - Eliminar Utilizador
    public function DeleteUser($ID)
    {
        //Elimina o Utilizador selecionado
        $ID = Supplier::Where('ID', '=', $ID)->Delete();

        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Utilizador Eliminado com Sucesso');
    }
}
