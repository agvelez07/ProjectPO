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

    public function Details($id)
    {
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        $orderData = DB::table('order_po')->where('po_id', $id)->get();
        $data = po::Where('id', '=', $id)->First();
        return View('POs/Details' , compact('data', 'suppliersData', 'orderData'));
    }






    public function updatePO(Request $request)
    {
        
        $request->validate([
            'num' => 'required|unique:po,num,',
            'dateInit' => 'required',
            'dateEnd' => 'required|date|after_or_equal:dateEnd',
            'totalCost' => 'required',
            'supplierID' => 'required',
            'costType' => 'required',
            'status' => 'required',
        ], [
            'num' => 'Número de Ordem Indisponível!',
            'dateInit' => 'Data Inicial Invalida!' ,
            'dateEnd' => 'Data Final Invalida!',
            'dateEnd.after_or_equal:dateEnd' => 'Data Final não pode ser inferior a Data Inicial!',
            'totalCost' => 'Custo Total Invalido!' ,
            'supplierID' => 'Fornecedor não disponivel!' ,
            'costType' => 'Tipo de Custo Invalido!' ,
            'status' => 'Estado de Compra Invalido!' ,
        ]);

        //dd($data);

        $id = $request['id'];
        $num = $request['num'];
        $dateInit = $request['dateInit'];
        $dateEnd = $request['dateEnd'];
        $costType = $request['costType'];
        $supplierID = $request['supplierID'];
        $totalCost = $request['totalCost'];
        $status = $request['status'];




        PO::Where('id', '=', $id)->update([
            $id
$num
$dateInit
$dateEnd
$costType
$supplierID
$totalCost
$status
        ]);
        return redirect()->back()->with('success', 'Ordem de Compra Guardada com Sucesso!');
    }








    public function deletePO($id)
    {
        $id = Po::Where('id', '=', $id)->Delete();
        return redirect()->back()->with('success', 'Ordem de Compra Eliminada com Sucesso');
    }
}
