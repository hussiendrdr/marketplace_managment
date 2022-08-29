<?php

namespace App\Http\Controllers;

use App\Models\PaperCup;
use App\Models\Product;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;


class PaperCupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=new File;
        $product=new Product;
        $paperCup=new PaperCup;
        
        // phase 1 Product Saving
        $product->product_class=$request->product_class;
        $product->model=$request->model;
        $product->product_name=$request->product_name;
        $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;
        $product->branding=$request->branding;
        $product->print_colors=$request->print_colors;
        $product->design_service=$request->design_service;
        $product->logistics_service=$request->logistics_service;
        $product->save();
        // $pid=$product->id;
        // phase 1 Completed
        

        // phase 2 File saveing
        if($request->has('files')){
            $destinationPath = storage_path() . '/app/public/productAttatchments';
            foreach($request->file('files') as $file){
                // dd('here');
                
                // $file->move('product_files',$fileName);
                // $path = $file('supplier_attatchment_CR')->storeAs('public/productAttatchments',$fileName);
                $attatchment=new File;
                $attatchment->product_id=$product->id;
                $attatchment->file="";
                $attatchment->extenstion=$file->getClientOriginalExtension();
                $attatchment->save();
                $attatchment->file=$fileName = 'file_'.$attatchment->id.'_'.$product->product_name.'.'.$file->getClientOriginalExtension();
                $attatchment->update();
                $file->move($destinationPath, $fileName);
            }
        }
        // phase 2 Completed
        // dd($product);
        // phase 3 PaperCup Saving
        $paperCup->product_id=$product->id;
        $paperCup->width=$request->width;
        $paperCup->height=$request->height;
        $paperCup->length=$request->length;
        $paperCup->quantity_per_item=$request->quantity_per_item;
        $paperCup->material_type=$request->material_type ;
        $paperCup->material_color=$request->material_color;
        $paperCup->finger_print_color=$request->finger_print_color;
        $paperCup->uom=$request->uom;
        $paperCup->capacity=$request->capacity;
        $paperCup->thickness=$request->thickness;
        $paperCup->effects=json_encode($request->effects);
        $paperCup->save();
        // dd($paperCup);
        // phase 3 Completed
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperCup  $paperCup
     * @return \Illuminate\Http\Response
     */
    public function show(PaperCup $paperCup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperCup  $paperCup
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperCup $paperCup)
    {
        $paperCup=PaperCup::findOrfail($id);
        $product=Product::where([
            'product_id','',$paperCup->product_id
        ]);
        return view('product.paper_cup.edit',compact('paperCup','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperCup  $paperCup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_class=$request->product_class;
        $product->model=$request->model;
        $product->product_name=$request->product_name;
        $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;
        $product->branding=$request->branding;
        $product->print_colors=$request->print_colors;
        $product->design_service=$request->design_service;
        $product->logistics_service=$request->logistics_service;
        $product->update();
        // $pid=$product->id;
        // phase 1 Completed
        

        // phase 2 File saveing
        if($request->has('files')){
            $destinationPath = storage_path() . '/app/public/productAttatchments';
            foreach($request->file('files') as $file){
                // dd('here');
                
                // $file->move('product_files',$fileName);
                // $path = $file('supplier_attatchment_CR')->storeAs('public/productAttatchments',$fileName);
                $attatchment=new File;
                $attatchment->product_id=$product->id;
                $attatchment->file="";
                $attatchment->extenstion=$file->getClientOriginalExtension();
                $attatchment->save();
                $attatchment->file=$fileName = 'file_'.$attatchment->id.'_'.$product->product_name.'.'.$file->getClientOriginalExtension();
                $attatchment->update();
                $file->move($destinationPath, $fileName);
            }
        }
        // phase 2 Completed

        // phase 3 PaperCup Saving
        $paperCup=PaperCup::where('product_id','=',$product->id)->first();
        $paperCup->product_id=$product->id;
        $paperCup->width=$request->width;
        $paperCup->height=$request->height;
        $paperCup->length=$request->length;
        $paperCup->quantity_per_item=$request->quantity_per_item;
        $paperCup->material_type=$request->material_type ;
        $paperCup->material_color=$request->material_color;
        $paperCup->finger_print_color=$request->finger_print_color;
        $paperCup->uom=$request->uom;
        $paperCup->capacity=$request->capacity;
        $paperCup->thickness=$request->thickness;
        $paperCup->effects=json_encode($request->effects);
        $paperCup->update();
        // dd($paperCup);
        // phase 3 Completed
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperCup  $paperCup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperCup $paperCup)
    {
        //
    }
}
