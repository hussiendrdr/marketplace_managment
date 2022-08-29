<?php

namespace App\Http\Controllers;

use App\Models\PaperBox;
use App\Models\Product;
use App\Models\File;
use Illuminate\Http\Request;

class PaperBoxController extends Controller
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
        $paperBox=new PaperBox;
        
        // phase 1 Product Saving
        $product->product_class=$request->product_class;
        // $product->model=$request->model;
        $product->product_name=$request->product_name;
        // $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;
        // $product->branding=$request->branding;
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

        // phase 3 paperBox Saving
        $paperBox->product_id=$product->id;
        
        $paperBox->paper_thickness=$request->paper_thickness;//
        $paperBox->width=$request->width;
        $paperBox->height=$request->height;
        $paperBox->length=$request->length;//
  
        $paperBox->effects=json_encode($request->effects);//
        // $paperBox->glue_points_number=$request->glue_points_number;
        // $paperBox->window_shape=$request->window_shape;
        // $paperBox->window_width=$request->window_width;
        // $paperBox->window_height=$request->window_height;

        $paperBox->paper_type=$request->paper_type;
        $paperBox->lamination=$request->lamination;
        $paperBox->stamping=$request->stamping;
        $paperBox->printing=$request->printing;
        $paperBox->printing_type=$request->printing_type;
        $paperBox->embossing=$request->embossing;
        $paperBox->description=$request->description;

        $paperBox->save();
        // dd($paperBox);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperBox  $paperBox
     * @return \Illuminate\Http\Response
     */
    public function show(PaperBox $paperBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperBox  $paperBox
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperBox $paperBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperBox  $paperBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        // $product->product_reference=$request->product_reference;

        $product->product_class=$request->product_class;
        // $product->model=$request->model;
        $product->product_name=$request->product_name;
        // $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;
        // $product->branding=$request->branding;
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

        // phase 3 paperBox Saving
        $paperBox=PaperBox::where('product_id','=',$product->id)->first();
        // $product=Product::findOrFail($product->id)->get();
        // $paperBox=PaperBox::find($product->id);
        // dd($paperBox);




        $paperBox->product_id=$product->id;

        $paperBox->paper_thickness=$request->paper_thickness;//
        $paperBox->width=$request->width;
        $paperBox->height=$request->height;
        $paperBox->length=$request->length;//
  
        $paperBox->effects=json_encode($request->effects);//
        // $paperBox->glue_points_number=$request->glue_points_number;
        // $paperBox->window_shape=$request->window_shape;
        // $paperBox->window_width=$request->window_width;
        // $paperBox->window_height=$request->window_height;

        $paperBox->paper_type=$request->paper_type;
        $paperBox->lamination=$request->lamination;
        $paperBox->stamping=$request->stamping;
        $paperBox->printing=$request->printing;
        $paperBox->printing_type=$request->printing_type;
        $paperBox->embossing=$request->embossing;
        $paperBox->description=$request->description;


        // $paperBox->material_type=$request->material_type ;
        // $paperBox->material_colors=$request->material_colors;
        // $paperBox->paper_thickness=$request->paper_thickness;
        // $paperBox->width=$request->width;
        // $paperBox->height=$request->height;
        // $paperBox->length=$request->length;
        // $paperBox->print_type=$request->print_type;

        // $paperBox->effects=json_encode($request->effects);

        // $paperBox->paper_type=$request->paper_type;
        // $paperBox->lamination=$request->lamination;
        // $paperBox->stamping=$request->stamping;
        // $paperBox->printing=$request->printing;
        // $paperBox->printing_type=$request->printing_type;
        // $paperBox->embossing=$request->embossing;
        // $paperBox->description=$request->description;
        // dd($paperBox);
        $paperBox->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperBox  $paperBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperBox $paperBox)
    {
        //
    }
}
