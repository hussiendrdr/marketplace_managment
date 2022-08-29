<?php

namespace App\Http\Controllers;

use App\Models\SosWithoutHandleBag;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;

class SosWithoutHandleBagController extends Controller
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
        $sosWithoutHandleBag=new SosWithoutHandleBag;
        
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

        // dd($request);
        // $url = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
        // $contents = file_get_contents($url);
        // $name = substr($url, strrpos($url, '/') + 1);
        // Storage::put($name, $contents);

        // phase 2 Completed

        // phase 3 sosWithoutHandleBag Saving
        $sosWithoutHandleBag->product_id=$product->id;
        $sosWithoutHandleBag->material_color=$request->material_color;
        $sosWithoutHandleBag->paper_thickness=$request->paper_thickness;
        $sosWithoutHandleBag->print_type=$request->print_type;
        $sosWithoutHandleBag->quantity_per_item=$request->quantity_per_item;
        $sosWithoutHandleBag->quantity_per_tons=$request->quantity_per_tons;
        $sosWithoutHandleBag->bag_width=$request->bag_width;
        $sosWithoutHandleBag->bag_height=$request->bag_height;
        $sosWithoutHandleBag->effects=json_encode($request->effects);
        $sosWithoutHandleBag->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SosWithoutHandleBag  $sosWithoutHandleBag
     * @return \Illuminate\Http\Response
     */
    public function show(SosWithoutHandleBag $sosWithoutHandleBag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SosWithoutHandleBag  $sosWithoutHandleBag
     * @return \Illuminate\Http\Response
     */
    public function edit(SosWithoutHandleBag $sosWithoutHandleBag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SosWithoutHandleBag  $sosWithoutHandleBag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
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

        // phase 3 sosWithoutHandleBag Saving
        $sosWithoutHandleBag=SosWithoutHandleBag::where('product_id','=',$product->id)->first();
        $sosWithoutHandleBag->material_color=$request->material_color;
        $sosWithoutHandleBag->paper_thickness=$request->paper_thickness;
        $sosWithoutHandleBag->print_type=$request->print_type;
        $sosWithoutHandleBag->quantity_per_item=$request->quantity_per_item;
        $sosWithoutHandleBag->quantity_per_tons=$request->quantity_per_tons;
        $sosWithoutHandleBag->bag_width=$request->bag_width;
        $sosWithoutHandleBag->bag_height=$request->bag_height;
        $sosWithoutHandleBag->effects=json_encode($request->effects);
        $sosWithoutHandleBag->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SosWithoutHandleBag  $sosWithoutHandleBag
     * @return \Illuminate\Http\Response
     */
    public function destroy(SosWithoutHandleBag $sosWithoutHandleBag)
    {
        //
    }
}
