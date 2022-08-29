<?php

namespace App\Http\Controllers;

use App\Models\Carton_box;
use Illuminate\Http\Request;

use App\Models\PaperWrap;
use App\Models\Product;
use App\Models\File;

class CartonBoxController extends Controller
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
           $file = new File;
           $product = new Product;
           $paperWrap = new Carton_box;
   
           // phase 1 Product Saving
           $product->product_class = $request->product_class;//
        //    $product->model = $request->model;
           $product->product_name = $request->product_name;//
           $product->product_type = $request->product_type;//
           $product->print_colors = $request->print_colors;//
           $product->design_service = $request->design_service;//
           $product->logistics_service = $request->logistics_service;//
           $product->save();
           // phase 1 Completed
   
   
           // phase 2 File saveing
           if ($request->has('files')) {
               $destinationPath = storage_path() . '/app/public/productAttatchments';
               foreach ($request->file('files') as $file) {
                   // dd('here');
   
                   // $file->move('product_files',$fileName);
                   // $path = $file('supplier_attatchment_CR')->storeAs('public/productAttatchments',$fileName);
                   $attatchment = new File;
                   $attatchment->product_id = $product->id;
                   $attatchment->file = "";
                   $attatchment->extenstion = $file->getClientOriginalExtension();
                   $attatchment->save();
                   $attatchment->file = $fileName = 'file_' . $attatchment->id . '_' . $product->product_name . '.' . $file->getClientOriginalExtension();
                   $attatchment->update();
                   $file->move($destinationPath, $fileName);
               }
           }
           // phase 2 Completed
   
           // phase 3 paperWrap Saving
           $paperWrap->product_id = $product->id;
           $paperWrap->width = $request->width;//

           $paperWrap->material_type = $request->material_type;//
   
           
           $paperWrap->Length = $request->Length;
           $paperWrap->height = $request->height;
           $paperWrap->lamination = $request->lamination;
           $paperWrap->stamping = $request->stamping;
           $paperWrap->printing_type = $request->printing_type;
           $paperWrap->embossing = $request->embossing;
           $paperWrap->description = $request->description;

   
   
           $paperWrap->save();
   
           return redirect()->route('product.index');
           // phase 3 Completed
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carton_box  $carton_box
     * @return \Illuminate\Http\Response
     */
    public function show(Carton_box $carton_box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carton_box  $carton_box
     * @return \Illuminate\Http\Response
     */
    public function edit(Carton_box $carton_box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carton_box  $carton_box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $product = Product::find($id);


        // $file = new File;
        // $product = new Product;
        // $paperWrap = new Carton_box;

        // phase 1 Product Saving
        $product->product_class = $request->product_class;//
        // $product->model = $request->model;
        $product->product_name = $request->product_name;//
        $product->product_type = $request->product_type;//
        $product->print_colors = $request->print_colors;//
        $product->design_service = $request->design_service;//
        $product->logistics_service = $request->logistics_service;//


        $product->update();
        // $pid=$product->id;
        // phase 1 Completed


        // phase 2 File saveing
        if ($request->has('files')) {
            $destinationPath = storage_path() . '/app/public/productAttatchments';
            foreach ($request->file('files') as $file) {
                // dd('here');

                // $file->move('product_files',$fileName);
                // $path = $file('supplier_attatchment_CR')->storeAs('public/productAttatchments',$fileName);
                $attatchment = new File;
                $attatchment->product_id = $product->id;
                $attatchment->file = "";
                $attatchment->extenstion = $file->getClientOriginalExtension();
                $attatchment->save();
                $attatchment->file = $fileName = 'file_' . $attatchment->id . '_' . $product->product_name . '.' . $file->getClientOriginalExtension();
                $attatchment->update();
                $file->move($destinationPath, $fileName);
            }
        }
        // phase 2 Completed

        // phase 3 paperWrap Saving
        $paperWrap = Carton_box::where('product_id', '=', $product->id)->first();
        // dd($paperWrap);


        $paperWrap->product_id = $product->id;
        $paperWrap->width = $request->width;//

        $paperWrap->material_type = $request->material_type;//

        
        $paperWrap->Length = $request->Length;
        $paperWrap->height = $request->height;
        $paperWrap->lamination = $request->lamination;
        $paperWrap->stamping = $request->stamping;
        $paperWrap->printing_type = $request->printing_type;
        $paperWrap->embossing = $request->embossing;
        $paperWrap->description = $request->description;

    
        $paperWrap->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carton_box  $carton_box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carton_box $carton_box)
    {
        //
    }
}
