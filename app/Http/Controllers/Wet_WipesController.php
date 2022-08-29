<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wet_Wipes;
use App\Models\File;
use App\Models\Product;

class Wet_WipesController extends Controller
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
         $Wet_Wipes=new Wet_Wipes;
         
         // phase 1 Product Saving
         $product->product_class=$request->product_class;
         $product->product_name=$request->product_name;
         $product->product_type=$request->product_type;
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
 
         // phase 3 Wet_Wipes Saving
         $Wet_Wipes->product_id=$product->id;
   
         $Wet_Wipes->width=$request->width;
         $Wet_Wipes->length=$request->length;
         $Wet_Wipes->material=$request->material;

   
 
         $Wet_Wipes->save();
         return redirect()->route('product.index');
         // dd($plasticBag);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->product_class=$request->product_class;
        $product->product_name=$request->product_name;
        $product->product_type=$request->product_type;
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

        // phase 3 plasticBag Saving
        $Wet_Wipes=Wet_Wipes::where('product_id','=',$product->id)->first();        
        $Wet_Wipes->product_id=$product->id;
   
        $Wet_Wipes->width=$request->width;
        $Wet_Wipes->length=$request->length;
        $Wet_Wipes->material=$request->material;
        $Wet_Wipes->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
