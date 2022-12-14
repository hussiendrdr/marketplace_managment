@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    @if (Session::get('locale')== "ar")
	        	<style>
					.prod{
						direction:rtl;
					}
			
				</style>  
		@else
	        	<style>
                    	.prod{
						direction:ltr;
                        text-align:left;
					}
                   
				
					
				</style>
		@endif

@endsection
@section('title')
    اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between prod">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Project')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lang.Full informations')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @php
        $customers = App\Models\Customers::all();
        $suppliers = App\Models\Supplier::all();
        $products = App\Models\Product::all();
    @endphp


    <!-- row -->
    <div class="row prod">

        <!-- product details -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="content-title mb-0 my-auto">@lang('lang.Details')</h4> <br>
                    
                    

                    
                    <form action="{{ route('process.update',$pro->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- 1 --}}

                        <br>

                        @php
                            $now = $pro->customer_id;
                            $select1 = App\Models\Customers::find($pro->customer_id);
                            $select2 = App\Models\Supplier::find($pro->supplier_id);
                            $select3 = App\Models\Product::find($pro->product_id);
                        @endphp
                        {{-- 2 --}}
                        <div class="row">                            

                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.product') </label>
                                <select id="product" name="product_id" class="form-control">
									<option value="#" selected disabled> {{ $select3->product_name }} </option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>



                        {{-- 3 --}} <br>

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.Description') </label>
                                <input type="text" class="form-control" id="inputName" name="description"
                                    title=" " value="{{ $pro->description }}">
                            </div>


                        </div>

                        {{-- 4 --}} <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> Qty </label>
                                <input type="text" class="form-control" id="inputName" name="qty"
                                    title=" " value="{{ $pro->qty }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> SP </label>
                                <input type="text" class="form-control" id="inputName" name="sp"
                                    title=" " value="{{ $pro->sp }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> PP </label>
                                <input type="text" class="form-control" id="inputName" name="pp"
                                    title=" " value="{{ $pro->pp }}">
                            </div>
                            
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.supplier name')</label>
                                <select id="product" name="suppliers_id" class="form-control">
									<option value="#" selected disabled> {{ $select2->supplier_organization_name }} </option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_organization_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.Lead time') </label>
                                <input type="text" class="form-control" id="inputName" name="LeadTime"
                                    title=" " value="{{ $pro->LeadTime }}">
                            </div>

                        </div> <br>

                        
                        {{-- 7 --}} <br>
                        <div class="row">                        
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.Supplier Contract Status') </label>
                                <select name="supplier_contract_status" class="form-control">
                                    <!--placeholder-->
                                    <option value="{{ $pro->supplier_contract_status }}" style="color: red"> {{ $pro->supplier_contract_status }} </option>
                                    
                                    <option value="Proposal"> Proposal </option>
                                    <option value="RFQ"> RFQ </option>
                                    <option value="Approved Quotation (PR)"> Approved Quotation (PR) </option>
                                    <option value="Rejected Quotation"> Rejected Quotation </option>
                                    <option value="PO"> PO </option>
                                    <option value="Invoice"> Invoice </option>
                                    <option value="Delivery Note"> Delivery Note </option>
                                </select>
                            </div>                                                        
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label> @lang('lang.supplier contract date') </label>
                                <input class="form-control fc-datepicker" name="supplier_contract_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $pro->supplier_contract_date }}" >
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label> @lang('lang.supplier PO date') </label>
                                <input class="form-control fc-datepicker" name="supplier_PO_rate" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $pro->supplier_PO_rate }}" >
                            </div>
                        </div>

                        


                        {{-- 8 --}} <br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">@lang('lang.customer comments')</label>
                                <textarea class="form-control" id="exampleTextarea" name="customer_comments" rows="3">{{ $pro->customer_comments }}</textarea>
                            </div>
                        </div><br>


                        {{-- 9 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">@lang('lang.supplier comments')</label>
                                <textarea class="form-control" id="exampleTextarea" name="supplier_comments" rows="3">{{ $pro->supplier_comments }}</textarea>
                            </div>
                        </div><br>


                        {{-- 5 --}} <br>
                        <div class="row">                        
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                                <input type="text" class="form-control" id="inputName" name="tolerance"
                                    title=" " value="{{ $pro->tolerance }}">
                            </div>                            
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.supplier quotation validity') </label>
                                <input type="text" class="form-control" id="inputName" name="supplier_quotation_validity"
                                    title=" " value="{{ $pro->supplier_quotation_validity }}">
                            </div>
                        </div> <br>
                        
                        <div class="row">  
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.product design') </label>
                                <input type="text" class="form-control" id="inputName" name="product_design"
                                    title=" " value="{{ $pro->product_design }}">
                            </div>                              
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.cliche die cut') </label>
                                <input type="text" class="form-control" id="inputName" name="cliche_die_cut"
                                    title=" " value="{{ $pro->cliche_die_cut }}">
                            </div>
                        </div>

                        {{-- 6 --}} <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.approved customer quotation') </label>
                                <select name="approved_customer_quotation" class="form-control">
                                    <!--placeholder-->
                                    <option value="{{ $pro->approved_customer_quotation }}" style="color: red"> {{ $pro->approved_customer_quotation }} </option>
                                   
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                    <option value="pending"> Pending </option>
                                </select>
                            </div>                            
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.reason for rejection') </label>
                                 
                                    <select name="reason_for_rejection" class="form-control">
                                        <!--placeholder-->
                                        <option value="{{ $pro->reason_for_rejection }}" selected disabled> {{ $pro->reason_for_rejection }} </option>
                                        <option value="Price Objection"> No Rejection </option>
                                        <option value="Price Objection"> Price Objection </option>
                                        <option value="Quality Objections"> Quality Objections </option>
                                        <option value="LeadTime Objections"> LeadTime Objections </option>
                                        <option value="Product Variety Objections"> Product Variety Objections </option>
                                        <option value="Minimum Quantity Objections"> Minimum Quantity Objections </option>
                                        <option value="Others Objections"> Others Objections</option>
                                    </select>
                            </div>
                        </div> <br>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.supplier quotation') </label>
                                <input type="text" class="form-control" id="inputName" name="supplier_quotation"
                                    title=" " value="{{ $pro->supplier_quotation }}">
                            </div>                              
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.purchase contract reference') </label>
                                <input type="text" class="form-control" id="inputName" name="purchase_contract_reference"
                                    title=" " value="{{ $pro->purchase_contract_reference }}">
                            </div>
                        </div> <br>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.paid amount') </label>
                                <input type="text" class="form-control" id="inputName" name="paid_amount" value="{{ $pro->paid_amount }}"
                                    title=" " >
                            </div> 
                        </div> <br>
                        <br>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="content-title mb-0 my-auto">@lang('lang.Supplier contract')</h4> <br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.validity') </label>
                            <input type="text" class="form-control" id="inputName" name="validity_s"
                                title=" " value="{{ $pro->validity_s }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.Lead time') </label>
                            <input type="text" class="form-control" id="inputName" name="leadtime_s"
                                title=" " value="{{ $pro->leadtime_s }}">
                        </div>
                    </div> <br> <br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.delivery handling') </label>
                            <input type="text" class="form-control" id="inputName" name="delivery_handling_s"
                                title=" " value="{{ $pro->delivery_handling_s }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.advance payment') </label>
                            <input type="text" class="form-control" id="inputName" name="advance_payment_s"
                                title=" " value="{{ $pro->advance_payment_s }}">
                        </div>
                    </div><br><br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                            <input type="text" class="form-control" id="inputName" name="tolerance_s"
                                title=" " value="{{ $pro->tolerance_s }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.printing cost') </label>
                            <input type="text" class="form-control" id="inputName" name="printing_cost_s"
                                title=" " value="{{ $pro->printing_cost_s }}">
                        </div>
                    </div>



                </div>                
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="content-title mb-0 my-auto">@lang('lang.Customer contract')</h4> <br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.validity') </label>
                            <input type="text" class="form-control" id="inputName" name="validity_c"
                                title=" " value="{{ $pro->validity_c }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.Lead time') </label>
                            <input type="text" class="form-control" id="inputName" name="leadtime_c"
                                title=" " value="{{ $pro->leadtime_c }}">
                        </div>
                    </div> <br> <br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.delivery handling') </label>
                            <input type="text" class="form-control" id="inputName" name="delivery_handling_c"
                                title=" " value="{{ $pro->delivery_handling_c }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.advance payment') </label>
                            <input type="text" class="form-control" id="inputName" name="advance_payment_c"
                                title=" " value="{{ $pro->advance_payment_c }}">
                        </div>
                    </div><br><br>
                    <div class="row">  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                            <input type="text" class="form-control" id="inputName" name="tolerance_c"
                                title=" " value="{{ $pro->tolerance_c }}">
                        </div>  
                        <div class="col">
                            <label for="inputName" class="control-label"> @lang('lang.printing cost') </label>
                            <input type="text" class="form-control" id="inputName" name="printing_cost_c"
                                title=" " value="{{ $pro->printing_cost_c }}">
                        </div>
                    </div>
                </div>                
            </div>
        </div>


        


        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="d-flex justify-content-center">
                    <a href="{{ url('/doownload/'. $pro->id)}}" class="btn btn-red" style="color: #2136BA">@lang('lang.Sales Contract')</a>
                    <a href="{{ url('/download/'. $pro->id)}}" class="btn btn-red" style="color: #2136BA">@lang('lang.Purchase Contract')</a>
                </div> <br><br>
                
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
            <a href="{{ route('project.index') }}" class="btn btn-red">@lang('lang.Cancel')</a>
        </div> <br>



    </form>
            </div>
        </div>

        


    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

   


@endsection