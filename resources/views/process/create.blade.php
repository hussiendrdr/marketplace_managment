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
                        text-transform:capitalize;
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
                    @lang('lang.Add a new process') @lang('lang.to') {{$project->customer_organization_name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="container prod">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

    <!-- row -->
    <div class="row prod">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('process.store') }}" method="POST">
                        @csrf
                        {{-- 1 --}}

                        <br>
                        {{-- 2 --}}
                        <div class="row">                            
                            <input type="text" name="project_id" value="{{$project->id}}" hidden>
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.product')</label>
                                <select id="product" name="product_id" class="form-control">
									<option value="#" selected disabled> Select </option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- 3 --}} <br>

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.Description')</label>
                                <input type="text" class="form-control" id="inputName" name="description" title="" >
                            </div>


                        </div>

                        {{-- 4 --}} <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Qty</label>
                                <input type="text" class="form-control" id="inputName" name="qty"
                                    title=" " >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">SP</label>
                                <input type="text" class="form-control" id="inputName" name="sp"
                                    title=" " >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">PP</label>
                                <input type="text" class="form-control" id="inputName" name="pp"
                                    title=" " >
                            </div>                            
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.supplier name')</label>
                                <select id="product" name="supplier_id" class="form-control">
									<option value="#" selected disabled> Select </option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_organization_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.Lead time')</label>
                                <input type="text" class="form-control" id="inputName" name="LeadTime"
                                    title=" " >
                            </div>
                        </div><br>

                       


                        {{-- 7 --}} <br>
                        <div class="row">                        
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.Supplier Contract Status')</label>
                                <select name="supplier_contract_status" class="form-control">
                                    <!--placeholder-->
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
                                <input class="form-control fc-datepicker" name="supplier_contract_date" placeholder="YYYY-DD-MM"
                                    type="text" value="{{ date('Y-m-d') }}" >
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label> @lang('lang.supplier PO date') </label>
                                <input class="form-control fc-datepicker" name="supplier_PO_rate" placeholder="YYYY-DD-MM"
                                    type="text" value="{{ date('Y-m-d') }}" >
                            </div>
                        </div> <br>

                        {{-- 8 --}} 
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">@lang('lang.customer comments')</label>
                                <textarea class="form-control" id="exampleTextarea" name="customer_comments" rows="3"></textarea>
                            </div>
                        </div><br>

                        {{-- 9 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">@lang('lang.supplier comments')</label>
                                <textarea class="form-control" id="exampleTextarea" name="supplier_comments" rows="3"></textarea>
                            </div>
                        </div><br>

                          {{-- 5 --}} <br>
                          <div class="row">                        
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                                <input type="text" class="form-control" id="inputName" name="tolerance"
                                    title=" "  value="15"> 
                            </div>                            
                        </div> <br>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.supplier quotation validity') </label>
                                <input type="text" class="form-control" id="inputName" name="supplier_quotation_validity"
                                    title=" " >
                            </div>
                        </div> <br>
                        
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.product design')</label>
                                <input type="text" class="form-control" id="product_design" name="product_design" title=" " >
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="design" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="designLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>  
                        </div> <br>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.cliche die cut') </label>
                                <input type="text" class="form-control" id="cliche_die_cut" name="cliche_die_cut" title=" " >
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="cliche" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="clicheLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> <br>



                        {{-- 6 --}} <br>
                        <div class="row"> 
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.approved customer quotation') </label>
                                <select name="approved_customer_quotation" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled> Select </option>
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
                                        <option value="" selected disabled> Select </option>
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
                                <input type="text" class="form-control" id="supplier_quotation" name="supplier_quotation" title=" " >
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="quotation" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="quotationLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>                           
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.purchase contract reference') </label>
                                <input type="text" class="form-control" id="inputName" name="purchase_contract_reference"
                                    title=" " >
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> @lang('lang.paid amount') </label>
                                <input type="text" class="form-control" id="inputName" name="paid_amount"
                                    title=" " >
                            </div> 
                        </div> <br>
                        <br>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 prod">
        <div class="card">
            <div class="card-body">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Supplier contract')</h4> <br>
                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.validity') </label>
                        <input type="text" class="form-control" id="inputName" name="validity_s"
                            title=" "  >
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.Lead time') </label>
                        <input type="text" class="form-control" id="inputName" name="leadtime_s"
                            title=" "  >
                    </div>
                </div> <br> <br>             

                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.delivery handling') </label>
                        
                        <select name="delivery_handling_s" class="form-control">
                            <!--placeholder-->
                            <option value="" selected disabled> Select </option>
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                            <option value="IN Process"> In process </option>
                        </select>
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.advance payment') </label>
                        <input type="text" class="form-control" id="inputName" name="advance_payment_s"
                            title=" "  >
                    </div>
                </div><br><br>
                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                        <input type="text" class="form-control" id="inputName" name="tolerance_s"
                            title=" ">
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.printing cost') </label>
                        <input type="text" class="form-control" id="inputName" name="printing_cost_s"
                            title=" " >
                    </div>
                </div>
            </div>                
        </div>
    </div>

    <div class="col-lg-12 col-md-12 prod">
        <div class="card">
            <div class="card-body">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Customer contract')</h4> <br>
                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.validity') </label>
                        <input type="text" class="form-control" id="inputName" name="validity_c"
                            title=" ">
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.Lead time') </label>
                        <input type="text" class="form-control" id="inputName" name="leadtime_c"
                            title=" ">
                    </div>
                </div> <br> <br>
                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.delivery handling') </label>
                        
                        <select name="delivery_handling_c" class="form-control">
                            <!--placeholder-->
                            <option value="" selected disabled> Select </option>
                            <option value="Yes"> Yes </option>
                            <option value="No"> No </option>
                            <option value="IN Process"> In process </option>
                        </select>
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.advance payment') </label>
                        <input type="text" class="form-control" id="inputName" name="advance_payment_c"
                            title=" ">
                    </div>
                </div><br><br>
                <div class="row">  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.tolerance') </label>
                        <input type="text" class="form-control" id="inputName" name="tolerance_c"
                            title=" ">
                    </div>  
                    <div class="col">
                        <label for="inputName" class="control-label"> @lang('lang.printing cost') </label>
                        <input type="text" class="form-control" id="inputName" name="printing_cost_c"
                            title=" ">
                    </div>
                </div>
            </div>   
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">@lang('lang.Create')</button>
            </div>



        </form>             
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