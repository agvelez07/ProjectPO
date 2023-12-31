<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //Devolve dados de Utilizadores para a listagem
    //Get
    public function Index()
    {
        $data = Supplier::get(); //Armazena dados dos Utilizadores
        return view('Suppliers', compact('data')); //Retorna os dados para a view 'Users'.
    }

    //Criar Fornecedore-----------------------------------------------------------------
    public function Create()
    {
        return view("Suppliers/Create");
    }

    //Post request ao criar um novo utilizador
    public function saveSupplier(Request $request)
    {
        // Validação
        $request->validate([
            'id' => 'unique:supplier,id',
            'name' => 'required|min:2',
        ]);

        // Valores do request passados para as respectivas variáveis
        $id = $request->id;
        $name = $request->name;
        $status = $request->status;

        //dd($request->all());
        // Criação do novo fornecedor com os dados das variáveis anteriores 
        $supplier = new Supplier();
        $supplier->id = $id;
        $supplier->name = $name;
        $supplier->status = $status;

        // Guardar Fornecedore na Base de dados
        $supplier->save();

        // Debug

        // Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Fornecedor Adicionado com Sucesso');
    }



    //Editar--------------------------------------------------------------------------------
    //GET - Retorna o valor do id selecionado para a view
    public function Edit($id)
    {
        $data = Supplier::where('id', '=', $id)->first();
        return view('Suppliers/Edit', compact('data'));
    }


    //Post - Edita as informações do Fornecedore
    public function updateSupplier(Request $request)
    {

        //Validação 
        $request->validate([
            'name' => 'required|min:3',
        ]);
    
        //Valores do request passados para as respectivas variáveis
        $id = $request->id;
        $name = $request->name;
        $status = $request->status;

        //Atualiza os dados
        Supplier::Where('id', '=', $id)->update([
            'id' => $id,
            'name' => $name,
            'status' => $status
        ]);
        //dd($request->all());
        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Fornecedor Atualizado com Sucesso');
    }

    //Post - Eliminar Fornecedore
    public function DeleteSupplier($id)
    {
        //Elimina o Fornecedore selecionado
        $id = Supplier::Where('id', '=', $id)->Delete();

        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Fornecedore Eliminado com Sucesso');
    }
}
