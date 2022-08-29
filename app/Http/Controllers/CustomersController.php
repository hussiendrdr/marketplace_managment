<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Response;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customers::all();
        return view ('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer= new Customers;
        $customer->customer_organization_name=$request->customer_organization_name;
        $customer->customer_brand_name=$request->customer_brand_name;
        $customer->customer_contact_name=$request->customer_contact_name;
        $customer->customer_contact_whatsaap=$request->customer_contact_whatsaap;
        $customer->customer_contact_number=$request->customer_contact_number;
        $customer->customer_contact_number2=$request->customer_contact_number2;
        $customer->email=$request->email;
        $customer->website=$request->website;
        $customer->social_media_accounts=$request->social_media_accounts;
        $customer->vat_number=$request->vat_number;
        $customer->country=$request->country;
        $customer->city=$request->city;
        $customer->district=$request->district;
        $customer->street=$request->street;
        $customer->building_number=$request->building_number;
        $customer->secondary_number=$request->secondary_number;
        $customer->postal_code=$request->postal_code;
        if($request->has('customer_attatchment_CR')){
            $file=$request->customer_attatchment_CR;
            $fileName = $customer->customer_organization_name.'.'.$file->getClientOriginalExtension();
            $customer->customer_attatchment_CR  = $request->customer_organization_name.'_'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
            $path = $request->file('customer_attatchment_CR')->storeAs('public/customerAttatchments',$fileName);
            $customer->customer_attatchment_CR=$fileName;
        }
        $customer->customer_VAT_certificate=$request->customer_VAT_certificate;
        $customer->customer_brand_book=$request->customer_brand_book;
        $customer->customer_product_designs=$request->customer_product_designs;
        $customer->customer_current_products=$request->customer_current_products;
        $customer->color_codes_pantone=$request->color_codes_pantone;
        $customer->user_Comments=$request->user_Comments;
        $customer->status=$request->status;
        $customer->customer_IBAN=$request->customer_IBAN;
        $customer->delivery_location=$request->delivery_location;
        $customer->save();
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('customers.show');
        // dd($customer);
        $customer=Customers::find($id);
        return view('customers.show',compact('customer'));
    }
    public function showFile($id)
    {
        $customer=Customers::find($id);
        // dd($customer);
        $filepath = storage_path() . '/app/public/customerAttatchments/'.$customer->customer_attatchment_CR;
        // $filepath = public_path('productAttatchments/'.);
        return Response::download($filepath); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($customer);
        $customer=Customers::find($id);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd('update');
        $customer=Customers::find($id);
        $customer->customer_organization_name=$request->customer_organization_name;
        $customer->customer_brand_name=$request->customer_brand_name;
        $customer->customer_contact_name=$request->customer_contact_name;
        $customer->customer_contact_whatsaap=$request->customer_contact_whatsaap;
        $customer->customer_contact_number=$request->customer_contact_number;
        $customer->customer_contact_number2=$request->customer_contact_number2;
        $customer->email=$request->email;
        $customer->website=$request->website;
        $customer->social_media_accounts=$request->social_media_accounts;
        $customer->vat_number=$request->vat_number;
        $customer->country=$request->country;
        $customer->city=$request->city;
        $customer->district=$request->district;
        $customer->street=$request->street;
        $customer->building_number=$request->building_number;
        $customer->secondary_number=$request->secondary_number;
        $customer->postal_code=$request->postal_code;
        $customer->customer_attatchment_CR=$request->customer_attatchment_CR;
        if($request->has('customer_attatchment_CR')){
            $file=$request->customer_attatchment_CR;
            $fileName = $customer->customer_organization_name.'.'.$file->getClientOriginalExtension();
            $path = $request->file('customer_attatchment_CR')->storeAs('public/customerAttatchments',$fileName);
            dd($path);
            $customer->customer_attatchment_CR=$fileName;
        }
        $customer->customer_VAT_certificate=$request->customer_VAT_certificate;
        $customer->customer_brand_book=$request->customer_brand_book;
        $customer->customer_product_designs=$request->customer_product_designs;
        $customer->customer_current_products=$request->customer_current_products;
        $customer->color_codes_pantone=$request->color_codes_pantone;
        $customer->user_Comments=$request->user_Comments;
        $customer->status=$request->status;
        $customer->customer_IBAN=$request->customer_IBAN;
        $customer->delivery_location=$request->delivery_location;
        $customer->update();
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('4t');
        // dd($customers);
        $customer=Customers::find($id)->first();
        $customer->delete();
        return redirect()->route('customer.index');

    }
}
