<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\Po;
use Illuminate\Support\Facades\DB;

class POController extends Controller
{

    public function Index()
    {
        $data = po::get();   
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        // return view('PO', compact('data', 'suppliersData'));
        return view('POs', compact('data', 'suppliersData'));
    }
    public function Create()
    {
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        return view("POs/Create", compact("suppliersData"));
    }

    public function savePO(Request $request)

    {

        // dd($request->all()); //Reached

        $num = $request->num;

        $request->validate([
            'num' => 'required|unique:po',
            'dateInit' => 'required|date|after_or_equal:today',
            'dateEnd' => 'required|date|after_or_equal:dateEnd',
            'totalCost' => 'required',
            'supplierID' => 'required',
            'costType' => 'required',
            'status' => 'required',
        ], [
            'num' => 'Número de Ordem Indisponível! Número de Ordem:' . $num,
            'dateInit' => 'Data Inicial Invalida! Número de Ordem:' . $num,
            'dateEnd' => 'Data Final Invalida!  Número de Ordem:' . $num,
            'dateEnd.after_or_equal:dateEnd' => 'Data Final não pode ser inferior a Data Inicial!' . $num,
            'totalCost' => 'Custo Total Invalido! Número de Ordem:' . $num,
            'supplierID' => 'Fornecedor não disponivel! Número de Ordem:' . $num,
            'costType' => 'Tipo de Custo Invalido! Número de Ordem:' . $num,
            'status' => 'Estado de Compra Invalido! Número de Ordem:' . $num,
        ]);


        //dd($request->all()); //Reached


        $dateInit = $request->dateInit;
        $dateEnd = $request->dateEnd;
        $totalCost = $request->totalCost;
        $supplierID = $request->supplierID;
        $costType  = $request->costType;
        $status = $request->status;



        $po = new po();
        $po->num = $num;
        $po->dateInit = $dateInit;
        $po->dateEnd = $dateEnd;
        $po->totalCost = $totalCost;
        $po->supplierID = $supplierID;
        $po->costType = $costType;
        $po->status = $status;

        $po->save();

        //dd($request->all());



        return redirect()->back()->with('success', 'Ordem de Compra Criada com Sucesso!');
    }

    public function Edit($id)
    {
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        $data = po::Where('id', '=', $id)->First();
        dd($);
        return View('POs/Edit' , compact('data', 'suppliersData'));
    }






    public function updatePO(Request $request, $id)
    {
        //dd($request->all());
        $data = po::Where('id', '=', $id)->First();
        //dd($data);
        $num = $data['num'];
        //dd($request->all());
        $request->validate([
            'num' => 'required|unique:po,num,' . $id,
            'dateInit' => 'required',
            'dateEnd' => 'required|date|after_or_equal:dateEnd',
            'totalCost' => 'required',
            'supplierID' => 'required',
            'costType' => 'required',
            'status' => 'required',
        ], [
            'num' => 'Número de Ordem Indisponível! Número de Ordem:' . $num,
            'dateInit' => 'Data Inicial Invalida! Número de Ordem:' . $num,
            'dateEnd' => 'Data Final Invalida!  Número de Ordem:' . $num,
            'dateEnd.after_or_equal:dateEnd' => 'Data Final não pode ser inferior a Data Inicial!' . $num,
            'totalCost' => 'Custo Total Invalido! Número de Ordem:' . $num,
            'supplierID' => 'Fornecedor não disponivel! Número de Ordem:' . $num,
            'costType' => 'Tipo de Custo Invalido! Número de Ordem:' . $num,
            'status' => 'Estado de Compra Invalido! Número de Ordem:' . $num,
        ]);

        //dd($data);


        $num = $request['num'];
        $dateInit = $request['dateInit'];
        $dateEnd = $request['dateEnd'];
        $costType = $request['costType'];
        $supplierID = $request['supplierID'];
        $totalCost = $request['totalCost'];
        $status = $request['status'];




        $data->update([
            'num' => $num,
            'dateInit' => $dateInit,
            'dateEnd' => $dateEnd,
            'totalCost' => $totalCost,
            'supplierID' => $supplierID,
            'costType' => $costType,
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Ordem de Compra Guardada com Sucesso!');
    }
















    public function Details($id)
    {
        $data = po::Where('id', '=', $id)->First();
        return View('POs/Details', compact('data'));
    }


    public function deletePO($id)
    {
        $id = Po::Where('id', '=', $id)->Delete();
        return redirect()->back()->with('success', 'Ordem de Compra Eliminada com Sucesso');
    }
}
