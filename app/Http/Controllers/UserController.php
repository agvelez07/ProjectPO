<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Devolve dados de Utilizadores para a listagem
    //Get
    public function Index()
    {
        $data = User::get(); //Armazena dados dos Utilizadores
        return view('Users', compact('data')); //Retorna os dados para a view 'Users'.
    }


    //Criar Utilizador-----------------------------------------------------------------
    public function Create()
    {
        return view("Users/Create");
    }

    //Post request ao criar um novo utilizador
    public function saveUsers(Request $request)
    {
        //Validação
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);


        //Valores do request passados para as respectivas variáveis
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        //Criação de novo utilizador
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->role = $role;
        $user->status = 0;

        //Guardar Utilizador na Base de dados
        $user->save();

        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Utilizador Adicionado com Sucesso');
    }


    //Editar--------------------------------------------------------------------------------
    //GET - Retorna o valor do ID selecionado para a view
    public function Edit($ID)
    {
    $data = User::where('ID', '=', $ID)->first();
    return view('Users/Edit', compact('data'));
    }


    //Post - Edita as informações do Utilizador
    public function updateUser(Request $request)
    {

        //Validação 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Valores do request passados para as respectivas variáveis
        $ID = $request->ID;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        //Atualiza os dados
        User::Where('ID', '=', $ID)->update([
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
        //dd($request->all());
        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Utilizador Atualizado com Sucesso');
    }

    //Post - Eliminar Utilizador
    public function DeleteUser($ID)
    {
        //Elimina o Utilizador selecionado
        $ID = User::Where('ID', '=', $ID)->Delete();

        //Se a ação for realizada com sucesso, retorna a view com mensagem de sucesso
        return redirect()->back()->with('success', 'Utilizador Eliminado com Sucesso');
    }
}
