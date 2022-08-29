<?php

namespace App\Http\Controllers;

use App\Models\HandlePaperBag;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use response;
use Illuminate\Support\Facades\Storage;

class HandlePaperBagController extends Controller
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
        // dd($request);
        $file=new File;
        $product=new Product;
        $handlePaperBag=new HandlePaperBag;
        
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
        
        //////////////////////////////////////////
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

        // phase 3 handlePaperBag Saving
        $handlePaperBag->product_id=$product->id;
        $handlePaperBag->material_color=$request->material_color;
        $handlePaperBag->paper_thickness=$request->paper_thickness;
        $handlePaperBag->print_type=$request->print_type;
        $handlePaperBag->quantity_per_item=$request->quantity_per_item;
        $handlePaperBag->quantity_per_tons=$request->quantity_per_tons;
        $handlePaperBag->gusset_width=$request->gusset_width;
        $handlePaperBag->bag_height=$request->bag_height;
        $handlePaperBag->bag_width=$request->bag_width;
		$handlePaperBag->effects=json_encode($request->effects);
        $handlePaperBag->save();
        return redirect()->route('product.index');
        // dd($handlePaperBag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HandlePaperBag  $handlePaperBag
     * @return \Illuminate\Http\Response
     */
    public function show(HandlePaperBag $handlePaperBag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HandlePaperBag  $handlePaperBag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HandlePaperBag  $handlePaperBag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        // dd($product);
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

        // phase 3 handlePaperBag Saving
        $handlePaperBag=HandlePaperBag::where('product_id','=',$product->id)->first();
        $handlePaperBag->material_color=$request->material_color;
        $handlePaperBag->paper_thickness=$request->paper_thickness;
        
        $handlePaperBag->print_type=$request->print_type;
        $handlePaperBag->quantity_per_item=$request->quantity_per_item;
        $handlePaperBag->quantity_per_tons=$request->quantity_per_tons;
        $handlePaperBag->gusset_width=$request->gusset_width;
        $handlePaperBag->bag_height=$request->bag_height;
        $handlePaperBag->bag_width=$request->bag_width;
		$handlePaperBag->effects=json_encode($request->effects);
        $handlePaperBag->update();
        return redirect()->route('product.index');
    }
    
    public function fileUpload($id){
        //
    }
    public function fileUpdate($id){
        //
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HandlePaperBag  $handlePaperBag
     * @return \Illuminate\Http\Response
     */
    public function destroy(HandlePaperBag $handlePaperBag)
    {
        //
    }
}
