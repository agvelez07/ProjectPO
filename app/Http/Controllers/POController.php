<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\Po;

class POController extends Controller
{
    public function Index()
    {
        $data = po::get();
        return view('PO', compact('data'));
    }
    public function Create()
    {
        return view("POs/Create");
    }
    public function savePO(Request $request)
    {
        //dd($request->all());//Reached

        $request->validate([
            'num' => 'required|unique:po',
            'dateInit' => 'required|date|after_or_equal:today',
            'dateEnd' => 'required|date|after_or_equal:dateEnd',
            'totalCost' => 'required',
            'supplierID' => 'required',
            'costType' => 'required',
            'status' => 'required',
        ]);
        

        //dd($request->all()); //Reached


        $num = $request->num;
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
        $data = po::Where('id', '=', $id)->First();
        return View('POs/Edit', compact('data'));
    }

    public function updatePO(Request $request)
    {
        //dd($request->all()); Reached


        $request->validate([
            'num' => 'required|unique:po',
            'dateInit' => 'required|date|after_or_equal:today',
            'dateEnd' => 'required|date|after_or_equal:dateEnd',
            'totalCost' => 'required',
            'supplierID' => 'required',
            'costType' => 'required',
            'status' => 'required',
        ]);
        
        //dd($request->all()); Reached


        $id = $request->id;
        $num = $request->num;
        $dateInit = $request->dateInit;
        $dateEnd = $request->dateEnd;
        $totalCost = $request->totalCost;
        $supplierID = $request->supplierID;
        $costType  = $request->costType;
        $status = $request->status;

        //dd($request->all()); Reached


        Po::Where('id', '=', $id)->update([
            'num' => $num,
            'dateInit' => $dateInit,
            'dateEnd' => $dateEnd,
            'totalCost' => $totalCost,
            'supplierID' => $supplierID,
            'costType' => $costType,
            'status' => $status

        ]);

        //dd($request->all());


        return redirect()->back()->with('success', 'Ordem de Compra Atualizada com Sucesso');
    }

    public function Details($id)
    {
        $data = po::Where('id', '=', $id)->First();
        return View('POs/Details', compact('data'));
    }


    public function DeletePO($id)
    {
        $id = Po::Where('id', '=', $id)->Delete();
        return redirect()->back()->with('success', 'Ordem de Compra Eliminada com Sucesso');
    }
}
