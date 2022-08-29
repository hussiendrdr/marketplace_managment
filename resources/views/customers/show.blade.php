@extends('layouts.master3')
<title>Data tables</title>
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

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
@section('content')
<div class="row row-sm prod">
    <!--customers Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Customer Reference')<span class="btn btn-primary btn-rounded">{{$customer->id}} </span></h4>
                </div>
                <br>
                <div>
                    <a href="{{url()->previous()}}">
                        <button class="btn btn-primary">
                            @lang('lang.Return To Customer Page')
                        </button>
                    </a> <br> <br>
                    <div class="col">
                        <a href="{{route('customer.edit',$customer->id)}}">
                            <button class="btn btn-warning"><i class="las la-pen"></i></button>
                        </a>
                    </div>
                    
                    <form class="col" action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <button class="btn btn-danger"><i class="las la-trash"></i></button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-product">
                        <tbody>
                            <tr>
                                <div class="col">
                                    <td width="390">
                                        <h3>@lang('lang.Customer Organizatin Name')</h3>
                                    </td>
                                    <td class="btn btn-primary">
                                        <h3>{{$customer->customer_organization_name}}</h3>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Contact Name')</td>
                                <td>{{$customer->customer_contact_name}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Contact Number')</td>
                                <td>{{$customer->customer_contact_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Contact Whatsapp')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$customer->customer_contact_whatsaap}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$customer->customer_contact_whatsaap}}" onclick="copyToClipBoard('{{$customer->customer_contact_whatsaap}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Email')</td>
                                <td>{{$customer->email}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Contact Number 2')</td>
                                <td>{{$customer->customer_contact_number2}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Website')</td>
                                <td>{{$customer->website}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Social Media Accounts')</td>
                                <td>{{$customer->social_media_accounts}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.VAT Number')</td>
                                <td>{{$customer->vat_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Country')</td>
                                <td>{{$customer->country}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.City')</td>
                                <td>{{$customer->city}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.District')</td>
                                <td>{{$customer->district}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Street')</td>
                                <td>{{$customer->street}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Building Number')</td>
                                <td>{{$customer->building_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Secondary Number')</td>
                                <td>{{$customer->secondary_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Postal Code')</td>
                                <td>{{$customer->postal_code}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Attatchment C.R')</td>
                                <td>{{$customer->customer_attachement_CR}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer VAT Certificate Link')</td>
                                <td>{{$customer->customer_VAT_certificate}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Brand Book')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$customer->customer_brand_book}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$customer->customer_brand_book}}" onclick="copyToClipBoard('{{$customer->customer_brand_book}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Current Designs')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$customer->customer_product_designs}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$customer->customer_product_designs}}" onclick="copyToClipBoard('{{$customer->customer_product_designs}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer Current Products')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$customer->customer_current_products}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$customer->customer_current_products}}" onclick="copyToClipBoard('{{$customer->customer_current_products}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Color Codes Pantone')</td>
                                <td>{{$customer->color_codes_pantone}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.User Comments')</td>
                                <td>{{$customer->user_Comments}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Status')</td>
                                <td>{{$customer->status}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Customer IBAN')</td>
                                <td>{{$customer->customer_IBAN}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Delivery Location')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$customer->delivery_location}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$customer->delivery_location}}" onclick="copyToClipBoard('{{$customer->delivery_location}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-striped table-product">
                        <thead>Atattchments Section</thead>
                        <tbody>
                            <tr>
                                <td width="390">@lang('lang.Customer Attatchment C.R')</td>
                                <tr>
                                    <td>
                                        <p>{{$customer->customer_attachement_CR}}</p>
                                    </td>
                                    <td>
                                        <div class="col">
                                            <a href="{{url('customer/file',$customer->id)}}" target="_blank">
                                                <button class="btn btn-primary"><i class="las la-download"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

</div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}">//pdfff her</script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection