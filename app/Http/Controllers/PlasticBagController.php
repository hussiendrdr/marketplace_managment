<?php

namespace App\Http\Controllers;

use App\Models\PlasticBag;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;

class PlasticBagController extends Controller
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
        $plasticBag=new PlasticBag;
        
        // phase 1 Product Saving
        $product->product_class=$request->product_class;//
        $product->model="";//
        $product->product_name=$request->product_name;//
        // $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;//
        // $product->branding=$request->branding;
        $product->print_colors=$request->print_colors;//
        $product->design_service=$request->design_service;//
        $product->logistics_service=$request->logistics_service;//
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

        // phase 3 plasticBag Saving
        $plasticBag->product_id=$product->id;
        $plasticBag->width=$request->width;//
        // $plasticBag->height=$request->height;
        $plasticBag->length=$request->length;//
        // $plasticBag->weight=$request->weight;
        // $plasticBag->base_type=$request->base_type;
        // $plasticBag->quantity_per_tons=$request->quantity_per_tons;
        // $plasticBag->quantity_per_tons=$request->quantity_per_tons;
         
        $plasticBag->Gusset_Width=$request->Gusset_Width;
        $plasticBag->Plastic_Type=$request->Plastic_Type;
        $plasticBag->Plastic_Thickness=$request->Plastic_Thickness;
        $plasticBag->Bag_Weight=$request->Bag_Weight;
        $plasticBag->Qty_per_Kg=$request->Qty_per_Kg;        

        $plasticBag->save();
        return redirect()->route('product.index');
        // dd($plasticBag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlasticBag  $plasticBag
     * @return \Illuminate\Http\Response
     */
    public function show(PlasticBag $plasticBag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlasticBag  $plasticBag
     * @return \Illuminate\Http\Response
     */
    public function edit(PlasticBag $plasticBag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlasticBag  $plasticBag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->product_class=$request->product_class;//
        $product->model="";//
        $product->product_name=$request->product_name;//
        // $product->additional_text=$request->additional_text;
        $product->product_type=$request->product_type;//
        // $product->branding=$request->branding;
        $product->print_colors=$request->print_colors;//
        $product->design_service=$request->design_service;//
        $product->logistics_service=$request->logistics_service;//
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

        // phase 3 plasticBag Saving
        $plasticBag=PlasticBag::where('product_id','=',$product->id)->first();        
        // $plasticBag->material_type=$request->material_type;
        // $plasticBag->material_color=$request->material_color;
        // $plasticBag->bag_thickness=$request->bag_thickness;
        $plasticBag->width=$request->width;//
        // $plasticBag->height=$request->height;
        $plasticBag->length=$request->length;//
        // $plasticBag->weight=$request->weight;
        // $plasticBag->base_type=$request->base_type;
        // $plasticBag->quantity_per_tons=$request->quantity_per_tons;
        // $plasticBag->quantity_per_tons=$request->quantity_per_tons;
         
        $plasticBag->Gusset_Width=$request->Gusset_Width;
        $plasticBag->Plastic_Type=$request->Plastic_Type;
        $plasticBag->Plastic_Thickness=$request->Plastic_Thickness;
        $plasticBag->Bag_Weight=$request->Bag_Weight;
        $plasticBag->Qty_per_Kg=$request->Qty_per_Kg;
        $plasticBag->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlasticBag  $plasticBag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlasticBag $plasticBag)
    {
        //
    }
}
