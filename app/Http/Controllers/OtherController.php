<?php

namespace App\Http\Controllers;

use App\Models\Other;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;

class OtherController extends Controller
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
        $other = new Other;

        // phase 1 Product Saving
        $product->product_class = $request->product_class;
        $product->model = $request->model;
        $product->product_name = $request->product_name;
        $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;
        $product->branding = $request->branding;
        $product->print_colors = $request->print_colors;
        $product->design_service = $request->design_service;
        $product->logistics_service = $request->logistics_service;
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
        // phase 2 File completed

        // phase 3 Saved
        $other->product_id = $product->id;
        $other->material_color = $request->material_color;
        $other->material_type = $request->material_type;
        $other->quantity = $request->quantity;
        $other->uom = $request->uom;
        $other->length = $request->length;
        $other->width = $request->width;
        $other->height = $request->height;
        $other->thickness = $request->thickness;
        $other->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show(Other $other)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function edit(Other $other)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_class = $request->product_class;
        $product->model = $request->model;
        $product->product_name = $request->product_name;
        $product->additional_text = $request->additional_text;
        $product->product_type = $request->product_type;
        $product->branding = $request->branding;
        $product->print_colors = $request->print_colors;
        $product->design_service = $request->design_service;
        $product->logistics_service = $request->logistics_service;

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
        // phase 2 File completed

        // phase 3 Saved
        $other = Other::where('product_id', '=', $product->id)->first();
        $other->material_color = $request->material_type;
        $other->material_type = $request->material_type;
        $other->quantity = $request->quantity;
        $other->uom = $request->uom;
        $other->length = $request->length;
        $other->width = $request->width;
        $other->height = $request->height;
        $other->thickness = $request->thickness;
        $other->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Other $other)
    {
        //
    }
}
