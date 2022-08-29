<?php

namespace App\Http\Controllers;

use App\Models\PaperWrap;
use App\Models\Product;
use App\Models\File;
use Illuminate\Http\Request;

class PaperWrapController extends Controller
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
        $paperWrap = new PaperWrap;

        // phase 1 Product Saving
        $product->product_class = $request->product_class;//
        // $product->model = $request->model;
        $product->product_name = $request->product_name;//
        // $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;//
        // $product->branding = $request->branding;
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
        // $paperWrap->height = $request->height;
        // $paperWrap->material_type = $request->material_type;
        // $paperWrap->material_color = $request->material_color;
        // $paperWrap->quantity_per_item = $request->quantity_per_item;
        $paperWrap->paper_thickness = $request->paper_thickness;//
        // $paperWrap->item_weight = $request->item_weight;
        // $paperWrap->pe_layer = $request->pe_layer;
        // $paperWrap->merged_layer_thickness = $request->merged_layer_thickness;
        // edit
        
        $paperWrap->Length = $request->Length;
        $paperWrap->Paper_Type = $request->Paper_Type;
        $paperWrap->Coating_Thickness = $request->Coating_Thickness;


        $paperWrap->save();

        return redirect()->route('product.index');
        // phase 3 Completed
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperWrap  $paperWrap
     * @return \Illuminate\Http\Response
     */
    public function show(PaperWrap $paperWrap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperWrap  $paperWrap
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperWrap $paperWrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperWrap  $paperWrap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_class = $request->product_class;//
        // $product->model = $request->model;
        $product->product_name = $request->product_name;//
        // $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;//
        // $product->branding = $request->branding;
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
        $paperWrap = PaperWrap::where('product_id', '=', $product->id)->first();
        // dd($paperWrap);

        $paperWrap->product_id = $product->id;
        $paperWrap->width = $request->width;//
        // $paperWrap->height = $request->height;
        // $paperWrap->material_type = $request->material_type;
        // $paperWrap->material_color = $request->material_color;
        // $paperWrap->quantity_per_item = $request->quantity_per_item;
        $paperWrap->paper_thickness = $request->paper_thickness;//
        // $paperWrap->item_weight = $request->item_weight;
        // $paperWrap->pe_layer = $request->pe_layer;
        // $paperWrap->merged_layer_thickness = $request->merged_layer_thickness;
        // edit
        
        $paperWrap->Length = $request->Length;
        $paperWrap->Paper_Type = $request->Paper_Type;
        $paperWrap->Coating_Thickness = $request->Coating_Thickness;

    
        $paperWrap->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperWrap  $paperWrap
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperWrap $paperWrap)
    {
        //
    }
}
