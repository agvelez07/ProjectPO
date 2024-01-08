<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\order_po;
use App\Models\Po;
use Illuminate\Support\Facades\DB;

class OrderPOController extends Controller
{

    public function Index()
    {
        $data = order_po::get();   
        // return view('PO', compact('data', 'suppliersData'));
        return view('POs/Details/', compact('data', 'suppliersData'));
    }
    public function Create()
    {
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        return view("POs/Create", compact("suppliersData"));
    }

    public function saveOrder(Request $request)

    {

        dd($request->all()); //Reached


        $request->validate([
            'po_id' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'price' => 'required|numeric',
            'units' => 'required|numeric',
        ], [
            'date' => 'Data Invalida!',
            'price' => 'Introduza um custo valido. Ex: 23,50',
            'units' =>  'Introduza números de unidade validos. Ex: 2',
        ]);


        //dd($request->all()); //Reached


        $po_id = $request->po_id;
        $date = $request->date;
        $price = $request->price;
        $units = $request->units;
        
        $order = new order_po([
            'po_id' => $po_id,
            'date' => $date,
            'price' => $price,
            'units' => $units,
        ]);

        if($request->hasFile('invoice_path')){
            $invoice_path = $request->file('invoice_path');
            
        }



        // $order = new order_po();
        // $order->po_id = $po_id;
        // $order->date = $date;
        // $order->price = $price;
        // $order->units = $units;
        


        $order->save();

        //dd($request->all());



        return redirect()->back()->with('success', 'Ordem de Compra Criada com Sucesso!');
    }

    public function Details($id)
    {
        $suppliersData = DB::table('supplier')->select('id', 'name')->get();
        $data = po::Where('id', '=', $id)->First();
        // dd($id);
        return View('POs/Details' , compact('data', 'suppliersData'));
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








    public function deletePO($id)
    {
        $id = Po::Where('id', '=', $id)->Delete();
        return redirect()->back()->with('success', 'Ordem de Compra Eliminada com Sucesso');
    }
}
