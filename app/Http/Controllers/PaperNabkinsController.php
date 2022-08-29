<?php

namespace App\Http\Controllers;

use App\Models\PaperNabkins;
use App\Models\Product;
use App\Models\File;
use Illuminate\Http\Request;

class PaperNabkinsController extends Controller
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
        $paperNabkins = new PaperNabkins;

        // phase 1 Product Saving

        $product->product_class = $request->product_class;
        $product->product_name = $request->product_name;
        // $product->model = $request->model;
        // $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;
        // $product->branding = $request->branding;
        $product->print_colors = $request->print_colors;
        $product->design_service = $request->design_service;
        $product->logistics_service = $request->logistics_service;
        $product->save();
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

        // dd($request);
        // $url = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
        // $contents = file_get_contents($url);
        // $name = substr($url, strrpos($url, '/') + 1);
        // Storage::put($name, $contents);

        // phase 2 Completed

        // phase 3 paperNabkins Saving

        $paperNabkins->product_id = $product->id;
        $paperNabkins->width = $request->width;//
        // $paperNabkins->height = $request->height;
        // $paperNabkins->material_color = $request->material_color;
        // $paperNabkins->quantity_per_item = $request->quantity_per_item;
        $paperNabkins->layer_number = $request->layer_number;//
        // $paperNabkins->paper_thickness = $request->paper_thickness;
        // $paperNabkins->sheets_per_packet = $request->sheets_per_packet;

        //edit
        $paperNabkins->Length = $request->Length;//
        $paperNabkins->Paper_color = $request->Paper_color;//

        $paperNabkins->save();
        return redirect()->route('product.index');
        // phase 3 Completed
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperNabkins  $paperNabkins
     * @return \Illuminate\Http\Response
     */
    public function show(PaperNabkins $paperNabkins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperNabkins  $paperNabkins
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperNabkins $paperNabkins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperNabkins  $paperNabkins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_class = $request->product_class;
        $product->product_name = $request->product_name;
        // $product->model = $request->model;
        // $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;
        // $product->branding = $request->branding;
        $product->print_colors = $request->print_colors;
        $product->design_service = $request->design_service;
        $product->logistics_service = $request->logistics_service;
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

        // phase 3 paperNabkins Saving
        $paperNabkins = PaperNabkins::where('product_id', '=', $product->id)->first();
        $paperNabkins->product_id = $product->id;
        $paperNabkins->width = $request->width;//
        // $paperNabkins->height = $request->height;
        // $paperNabkins->material_color = $request->material_color;
        // $paperNabkins->quantity_per_item = $request->quantity_per_item;
        $paperNabkins->layer_number = $request->layer_number;//
        // $paperNabkins->paper_thickness = $request->paper_thickness;
        // $paperNabkins->sheets_per_packet = $request->sheets_per_packet;
        $paperNabkins->Length = $request->Length;//
        $paperNabkins->Paper_color = $request->Paper_color;//
        $paperNabkins->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperNabkins  $paperNabkins
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperNabkins $paperNabkins)
    {
        //
    }
}
