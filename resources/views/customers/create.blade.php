@extends('layouts.master3')
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
    
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between prod">
        <a href="{{url()->previous()}}">
            <button class="btn btn-primary btn-sm">
                @lang('lang.Return To Customer Page')
            </button>
        </a>
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Customer')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lang.Add a new one')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    {{-- <!-- row --> --}}
    <div class="row prod">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            {{-- <div class="col">
                                <label for="customer_id" class="control-label">@lang('lang.customer id')</label>
                                <input type="text" class="form-control" id="inputName" name="product_name">
                                <input type="text" name="customer_id" class="form-control" placeholder="id">
                            </div> --}}
                            <div class="col">
                                <label for="customer_organization_name" class="control-label">@lang('lang.Customer Organization Name')</label>
                                {{-- <input type="text" class="form-control" id="inputName" name="product_name"> --}}
                                <input required type="text" name="customer_organization_name" class="form-control" placeholder="ORG Name">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="customer_brand_name" class="control-label">@lang('lang.Customer Brand Name')</label>
                                <input  type="text" name="customer_brand_name" class="form-control" placeholder="Brand Name">                                
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="customer_contact_name" class="control-label">@lang('lang.Customer Contact Name')</label>
                                <input  type="text" name="customer_contact_name" class="form-control" placeholder="Contact Name">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                
                                <label for="customer_contact_whatsaap" class="control-label">@lang('lang.Customer Contact Whatsapp')</label>
                                <input  type="text" id="customer_contact_whatsaap" name="customer_contact_whatsaap" class="form-control" placeholder="Contact Name">
                                <label for="cwhatsapp" class="control-label">@lang('lang.Customer Contact Whatsapp Link')</label>
                                
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="cwhatsaap" class="form-control" placeholder="Whatsapp Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="cwhatsaapLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="customer_contact_name" class="control-label">@lang('lang.Number')</label>
                                <input  type="text" name="customer_contact_number" class="form-control" placeholder="Contact Name">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="customer_contact_name" class="control-label">@lang('lang.Customer Contact number2')</label>
                                <input  type="text" name="customer_contact_number2" class="form-control" placeholder="Contact Name">
                            </div>
                        </div>
                        <br>
                        {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="social_media_accouts" class="control-label">@lang('lang.Email')</label>
                                <input  type="email" name="email" class="form-control" placeholder="Account">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="social_media_accouts" class="control-label">@lang('lang.website')</label>
                                <input  type="text" name="website" class="form-control" placeholder="Account">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="social_media_accouts" class="control-label">@lang('lang.social media accounts')</label>
                                <input  type="text" name="social_media_accounts" class="form-control" placeholder="Account">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="vat_number" class="control-label">@lang('lang.vat number')</label>
                                <input  type="text" name="vat_number" class="form-control" placeholder=VAT">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="coutnry" class="control-label">@lang('lang.Country')</label>
                                <input  type="text" name="country" class="form-control" placeholder=Country">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="coutnry" class="control-label">@lang('lang.City')</label>
                                <input  type="text" name="city" class="form-control" placeholder=Country">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="district" class="control-label">@lang('lang.District')</label>
                                <input  type="text" name="district" class="form-control" placeholder="District">
                            </div>
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="street" class="control-label">@lang('lang.Street')</label>
                                <input  type="text" name="street" class="form-control" placeholder="street">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="building_number" class="control-label">@lang('lang.Building Number')</label>
                                <input  type="text" name="building_number" class="form-control" placeholder="Building Number">
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="secondary_number" class="control-label">@lang('lang.Secondary Number')</label>
                                <input  type="text" name="secondary_number" class="form-control" placeholder="Secondary Number">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="postal_code" class="control-label">@lang('lang.Postal Code')</label>
                                <input  type="text" name="postal_code" class="form-control" placeholder="Postal Code">
                            </div>
                        </div>
                        <br>
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="customer_attachement_CR" class="control-label">@lang('lang.Customer Attatchment C.R') </label>
                                <div class="col-sm-12 col-md-12">
                                    <input  type="file" name="customer_attachement_CR" class="form-control" placeholder="Attatchment C.R">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="customer_VAT_certificate" class="control-label">@lang('lang.Customer VAT Certificate Link')</label>
                                <input  type="text" name="customer_VAT_certificate" class="form-control" placeholder="Link">
                            </div>
                        </div>
                        <br>
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                
                                <label for="customer_brand_book" class="control-label">@lang('lang.Customer Brand Book Link')</label>
                                <input  type="text" id="customer_brand_book" name="customer_brand_book" class="form-control" placeholder="Brand Book Link">
                                <label for="brand" class="control-label">@lang('lang.Customer Brand Book Link')</label>
                                
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="brand" class="form-control" placeholder="Brand Book Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="brandLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                
                                <label for="customer_product_designs" class="control-label">@lang('lang.Customer Product Designs')</label>
                                <input  type="text" id="customer_product_designs" name="customer_product_designs" class="form-control" placeholder="Link">
                                <label for="design" class="control-label">@lang('lang.Customer Product Designs')</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="design" class="form-control" placeholder="Brand Book Link">
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
                        </div>
                        <br>
                        {{-- 9 --}}
                        <div class="row">
                            <div class="col">
                                
                                <label for="customer_current_products" class="control-label">@lang('lang.Customer current Product')</label>
                                <input  type="text" id="customer_current_products" name="customer_current_products" class="form-control" placeholder="Link">
                                <label for="current" class="control-label">@lang('lang.Customer current Product')</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="current" class="form-control" placeholder="Customer Current Produt Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="currentLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="color_codes_pantone/CMYK" class="control-label">@lang('lang.Customer Codes antone / CMYK')</label>
                                <input  type="text" name="color_codes_pantone" class="form-control" placeholder="Link">
                            </div>
                        </div>
                        <br>
                        {{-- 10 --}}
                        <div class="row">
                            <div class="col">
                                <label for="user_Comments" class="control-label">@lang('lang.customer comments')</label>
                                <textarea  class="form-control" id="exampleTextarea" name="user_Comments" rows="3"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="status" class="control-label">@lang('lang.Status')</label>
                                <select  name="status" class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Suspect">@lang('lang.Suspect')</option>
                                    <option value="Prospect">@lang('lang.Prospect')</option>
                                    <option value="Customer">@lang('lang.Customer')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 11 --}}
                        <div class="row">
                            <div class="col">
                                <label for="customer_IBAN" class="control-label">@lang('lang.Customer IBAN')</label>
                                <input  type="text" name="customer_IBAN" class="form-control" placeholder="IBAN">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label for="delivery_location" class="control-label">@lang('lang.Delivery Location')</label>
                                <input  type="text" id="delivery_location" name="delivery_location" class="form-control" placeholder="Link">
                                <label for="delivery" class="control-label">@lang('lang.Delivery Location')</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="delivery" class="form-control" placeholder="Delivery Location Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="currentLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <br>

                        <div class="d-flex justify-content-center">
                            <button type="text" class="btn btn-primary">@lang('lang.Create')</button>
                        </div>


                    </form>
                </div>
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