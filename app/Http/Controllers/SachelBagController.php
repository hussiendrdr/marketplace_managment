<?php

namespace App\Http\Controllers;

use App\Models\SachelBag;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;

class SachelBagController extends Controller
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
        $sachelBag=new SachelBag;
        
        // phase 1 Product Saving
        $product->product_class=$request->product_class;
        $product->model="";
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

        // phase 3 sachelBag Saving
        $sachelBag->product_id=$product->id;
        $sachelBag->material_type=$request->material_type;
        $sachelBag->material_color=$request->material_color;
        $sachelBag->paper_thickness=$request->paper_thickness;
        $sachelBag->width=$request->width;
        $sachelBag->height=$request->height;
        $sachelBag->gusset=$request->gusset;
        $sachelBag->print_type=$request->print_type;
        $sachelBag->pe_layer=$request->pe_layer;
        $sachelBag->pe_layer_thickness=$request->pe_layer_thickness;
        $sachelBag->quantity_per_tons=$request->quantity_per_tons;
        $sachelBag->quantity_per_tons=$request->quantity_per_tons;
        $sachelBag->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SachelBag  $sachelBag
     * @return \Illuminate\Http\Response
     */
    public function show(SachelBag $sachelBag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SachelBag  $sachelBag
     * @return \Illuminate\Http\Response
     */
    public function edit(SachelBag $sachelBag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SachelBag  $sachelBag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->product_class=$request->product_class;
        $product->model="";
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

        // phase 3 sachelBag Saving
        $sachelBag=SachelBag::where('product_id','=',$product->id)->first();
        $sachelBag->material_type=$request->material_type;
        $sachelBag->material_color=$request->material_color;
        $sachelBag->paper_thickness=$request->paper_thickness;
        $sachelBag->width=$request->width;
        $sachelBag->height=$request->height;
        $sachelBag->gusset=$request->gusset;
        $sachelBag->print_type=$request->print_type;
        $sachelBag->pe_layer=$request->pe_layer;
        $sachelBag->pe_layer_thickness=$request->pe_layer_thickness;
        $sachelBag->quantity_per_tons=$request->quantity_per_tons;
        $sachelBag->quantity_per_tons=$request->quantity_per_tons;
        $sachelBag->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SachelBag  $sachelBag
     * @return \Illuminate\Http\Response
     */
    public function destroy(SachelBag $sachelBag)
    {
        //
    }
}
