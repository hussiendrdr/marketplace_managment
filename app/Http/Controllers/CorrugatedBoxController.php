<?php

namespace App\Http\Controllers;

use App\Models\CorrugatedBox;
use App\Models\Product;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class CorrugatedBoxController extends Controller
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
        $corrugatedBox=new CorrugatedBox;

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

        // phase 3 corrugatedBox Saving
        $corrugatedBox->product_id=$product->id;
        $corrugatedBox->material_type=$request->material_type ;
        $corrugatedBox->material_color=$request->material_color;
        $corrugatedBox->width=$request->width;
        $corrugatedBox->height=$request->height;
        $corrugatedBox->length=$request->length;
        $corrugatedBox->quantity_per_item=$request->quantity_per_item;
        $corrugatedBox->flat_box_width=$request->flat_box_width;
        $corrugatedBox->flat_box_height=$request->flat_box_height;
        $corrugatedBox->solovan_layer=$request->solovan_layer;
        $corrugatedBox->uv_layer=$request->uv_layer;
        $corrugatedBox->coverage=$request->coverage;
        $corrugatedBox->glue_points_number=$request->glue_points_number;
        $corrugatedBox->merged_normal_layer=$request->merged_normal_layer;
        $corrugatedBox->finger_print_color=$request->finger_print_color;
        $corrugatedBox->save();
        // dd($corrugatedBox);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CorrugatedBox  $corrugatedBox
     * @return \Illuminate\Http\Response
     */
    public function show(CorrugatedBox $corrugatedBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CorrugatedBox  $corrugatedBox
     * @return \Illuminate\Http\Response
     */
    public function edit(CorrugatedBox $corrugatedBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CorrugatedBox  $corrugatedBox
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

        // phase 3 corrugatedBox Saving
        $corrugatedBox=CorrugatedBox::where('product_id','=',$product->id)->get();
        $corrugatedBox->material_type=$request->material_type ;
        $corrugatedBox->material_color=$request->material_color;
        $corrugatedBox->width=$request->width;
        $corrugatedBox->height=$request->height;
        $corrugatedBox->length=$request->length;
        $corrugatedBox->quantity_per_item=$request->quantity_per_item;
        $corrugatedBox->flat_box_width=$request->flat_box_width;
        $corrugatedBox->flat_box_height=$request->flat_box_height;
        $corrugatedBox->solovan_layer=$request->solovan_layer;
        $corrugatedBox->uv_layer=$request->uv_layer;
        $corrugatedBox->coverage=$request->coverage;
        $corrugatedBox->glue_points_number=$request->glue_points_number;
        $corrugatedBox->merged_normal_layer=$request->merged_normal_layer;
        $corrugatedBox->finger_print_colors=$request->finger_print_colors;
        $corrugatedBox->update();
        // dd($corrugatedBox);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CorrugatedBox  $corrugatedBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorrugatedBox $corrugatedBox)
    {
        //
    }
}
