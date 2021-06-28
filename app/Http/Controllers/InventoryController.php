<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
Use Alert;
use PDF;




class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $product = new Inventory($request->all());
        $product->save();
        Alert::success('', 'el producto ha sido registrado con exito!')->persistent('Close');
        return view ('supplier');   

    }
    public function show(Request $request)
    {        
        echo json_encode(Inventory::Where('type_product',$request->type_product)->where('amount','>=' , $request->amount)->first('price'));

    }
    public function edit (Request $request)
    {
        $product =Inventory::Where('type_product',$request->type_spplier_buy)->where('amount','>=' , $request->quantity_buy)->first();
        $product->status =2;
        $product->save();
        Alert::success('', 'la compra ha sido registrada con exito!')->persistent('Close');
        return view ('client');   

    }
    public function getinventory()
    {
         $product =Inventory::where('status',1)->get();
        return view ('inventory')->with(compact('product'));   

    }
    public function ReturnInventory()
    {
       $product =Inventory::where('status',2)->get();

       if (count($product) >0) {
           foreach ($product as $key => $value) {
            $data = Inventory::findOrFail($value->id);
            $data->status = 1;
            $data->save();
          }
       }
       return back()->withInput(); 
    }
    public function invoice()
    {
        $product =Inventory::where('status',1)->get();
        $totals =[];
        foreach ($product as $key => $value) {
            $product[$key]->total +=  $value->amount*$value->price;
            $totals []= $value->total;
        }
        $total= array_sum($totals);
        $date = date('d-m-Y');
        $date_sum = date("d-m-Y",strtotime($date."+ 1 days"));


        return PDF::loadView('invoice', compact('date','date_sum','product','total'))
            ->stream('archivo.pdf');
    }
}
