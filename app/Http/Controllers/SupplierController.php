<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view ('suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('suppliers.create');
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
        $supplier= new Supplier;
        $supplier->supplier_organization_name=$request->supplier_organization_name;
        $supplier->supplier_contact_name=$request->supplier_contact_name;
        $supplier->supplier_contact_position=$request->supplier_contact_position;
        $supplier->supplier_contact_number=$request->supplier_contact_number;
        $supplier->supplier_contact_whatsaap=$request->supplier_contact_whatsaap;
        $supplier->email=$request->email;
        $supplier->supplier_contact_name2=$request->supplier_contact_name2;
        $supplier->supplier_contact2_position=$request->supplier_contact2_position;
        $supplier->supplier_contact2_number=$request->supplier_contact2_number;
        $supplier->supplier_catelouge=$request->supplier_catelouge;
        $supplier->supplier_webSite=$request->supplier_webSite;
        $supplier->supplier_fixed_quotation1=$request->supplier_fixed_quotation1;
        $supplier->supplier_fixed_quotation2=$request->supplier_fixed_quotation2;
        $supplier->social_media_accounts=$request->social_media_accounts;
        $supplier->vat_number=$request->vat_number;
        $supplier->country=$request->country;
        $supplier->city=$request->city;
        $supplier->district=$request->district;
        $supplier->street=$request->street;
        $supplier->building_number=$request->building_number;
        $supplier->secondary_number=$request->secondary_number;
        $supplier->postal_code=$request->postal_code;
        // files section
        $destinationPath = storage_path() . '/app/public/supplierAttatchment';
        if($request->has('supplier_attatchment_CR')){
            $file=$request->supplier_attatchment_CR;
            $fileName = $supplier->supplier_organization_name.'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $supplier->supplier_attatchment_CR=$fileName;
        }
        
        $supplier->supplier_vat_certificate=$request->supplier_vat_certificate;
        $supplier->user_comments=$request->user_comments;
        $supplier->supplier_IBAN1=$request->supplier_IBAN1;
        $supplier->supplier_IBAN2=$request->supplier_IBAN2;
        $supplier->factory_location=$request->factory_location;
        $supplier->office_location=$request->office_location;
        $supplier->supplier_type=$request->supplier_type;
        $supplier->save();
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::findOrFail($id);
        return view ('suppliers.show',compact('supplier'));
    }
    public function showFile($id)
    {
        $customer=Customers::find($id);
        // dd($customer);
        $filepath = storage_path() . '/app/public/supplierAttatchments/'.$customer->supplier_attatchment_CR;
        return Response::download($filepath); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=Supplier::findOrFail($id);
        return view('suppliers.edit',compact('supplier'));
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
        // dd($request);
        $supplier=Supplier::findOrFail($id);
        $supplier->supplier_organization_name=$request->supplier_organization_name;
        $supplier->supplier_contact_name=$request->supplier_contact_name;
        $supplier->supplier_contact_position=$request->supplier_contact_position;
        $supplier->supplier_contact_number=$request->supplier_contact_number;
        $supplier->supplier_contact_whatsaap=$request->supplier_contact_whatsaap;
        $supplier->email=$request->email;
        $supplier->supplier_contact_name2=$request->supplier_contact_name2;
        $supplier->supplier_contact2_position=$request->supplier_contact2_position;
        $supplier->supplier_contact2_number=$request->supplier_contact2_number;
        $supplier->supplier_catelouge=$request->supplier_catelouge;
        $supplier->supplier_webSite=$request->supplier_webSite;
        $supplier->supplier_fixed_quotation1=$request->supplier_fixed_quotation1;
        $supplier->supplier_fixed_quotation2=$request->supplier_fixed_quotation2;
        $supplier->social_media_accounts=$request->social_media_accounts;
        $supplier->vat_number=$request->vat_number;
        $supplier->country=$request->country;
        $supplier->city=$request->city;
        $supplier->district=$request->district;
        $supplier->street=$request->street;
        $supplier->building_number=$request->building_number;
        $supplier->secondary_number=$request->secondary_number;
        $supplier->postal_code=$request->postal_code;
        $supplier->supplier_attatchment_CR=$request->supplier_attatchment_CR;
        $supplier->supplier_VAT_certificate=$request->supplier_VAT_certificate;
        $supplier->user_comments=$request->user_comments;
        $supplier->supplier_IBAN1=$request->supplier_IBAN1;
        $supplier->supplier_IBAN2=$request->supplier_IBAN2;
        $supplier->factory_location=$request->factory_location;
        $supplier->office_location=$request->office_location;
        $supplier->supplier_type=$request->supplier_type;
        $supplier->update();
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
