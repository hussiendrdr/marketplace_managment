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
                @lang('lang.Return To Suppliers Page')
            </button>
        </a>
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Supplier')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lang.Add a new one')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row prod">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('supplier.update',$supplier->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_organization_name" class="control-label">@lang('lang.Supplier Organization Name')</label>
                                {{-- <input  type="text" class="form-control" id="inputName" name="product_name"> --}}
                                <input  value="{{$supplier->supplier_organization_name}}" type="text" name="supplier_organization_name" class="form-control" placeholder="ORG Name">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_type" class="control-label">@lang('lang.Supplier Type')</label>
                                <select value="{{$supplier->supplier_type}}" name="supplier_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Manufacturer">Manufacturer</option>
                                    <option value="Service Provider">Service Provider</option>
                                    <option value="Distibuter">Distibuter</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact_name" class="control-label">@lang('lang.Supplier Contact Name')</label>
                                <input  type="text" value="{{$supplier->supplier_contact_name}}" name="supplier_contact_name" class="form-control" placeholder="contact Name">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact_name2" class="control-label">@lang('lang.Supplier Contact Name') 2</label>
                                <input  type="text" value="{{$supplier->supplier_contact_name2}}" name="supplier_contact_name2" class="form-control" placeholder="contact Name 2">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact_position" class="control-label">@lang('lang.Supplier Contact Position')</label>
                                {{-- <input  type="text" class="form-control" id="inputName" name="product_name"> --}}
                                <input  type="text" value="{{$supplier->supplier_contact_position}}" name="supplier_contact_position" class="form-control" placeholder="contact position">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact2_position" class="control-label">@lang('lang.Supplier Contact Position 2')</label>
                                {{-- <input  type="text" class="form-control" id="inputName" name="product_name"> --}}
                                <input  type="text" value="{{$supplier->supplier_contact2_position}}" name="supplier_contact2_position" class="form-control" placeholder="ORG Name">
                            </div>
                        </div>
                        <br>
                        {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact_number" class="control-label">@lang('lang.Supplier Contact Number')</label>
                                <input  type="text"  value="{{$supplier->supplier_contact_number}}" name="supplier_contact_number" class="form-control" placeholder="contact Number">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact2_number" class="control-label">@lang('lang.Supplier Contact Number 2')</label>
                                <input  type="text"  value="{{$supplier->supplier_contact2_number}}" name="supplier_contact2_number" class="form-control" placeholder="contact Number 2">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="email" class="control-label">@lang('lang.Email')</label>
                                <input  type="email" value="{{$supplier->supplier_contact_name2}}" name="email" class="form-control" placeholder="contact Name 2">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_contact_whatsaap" class="control-label">@lang('lang.Supplier Contact Whatsapp')</label>
                                <input  type="text" id="supplier_contact_whatsaap" value="{{$supplier->supplier_contact_whatsaap}}" name="supplier_contact_whatsaap" class="form-control" placeholder="Whatsapp">
                                <label for="whatsapp" class="control-label">@lang('lang.Supplier Contact Whatsapp Link')</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="whatsaap" class="form-control" placeholder="Whatsapp Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="whatsappLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_catelouge" class="control-label">@lang('lang.Supplier Cateloge')</label>
                                <input  type="text" id="supplier_catelouge" value="{{$supplier->supplier_catelouge}}" name="supplier_catelouge" class="form-control" placeholder="Cateloge">
                                <label for="cateloge" class="control-label">@lang('lang.Supplier Cateloge Link')</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" readonly id="cateloge" class="form-control" placeholder="Cateloge Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="catelogelink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_webSite" class="control-label">@lang('lang.Supplier Website')</label>
                                <input  type="text"  value="{{$supplier->supplier_webSite}}" name="supplier_webSite" class="form-control" placeholder="WebSite">
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_fixed_quotation1" class="control-label">@lang('lang.Supplier Fixed Quotation') 1</label>
                                <input  type="text" id="supplier_fixed_quotation1" value="{{$supplier->supplier_fixed_quotation1}}" name="supplier_fixed_quotation1" class="form-control" placeholder="quotation 1">
                                <label for="quotation1" class="control-label">@lang('lang.Supplier Fixed Quotation 1 link')</label>
                                
                                <div class="row">
                                    <div class="col">
                                        <input  type="text" readonly id="quotation1" name="quotation1" class="form-control" placeholder="Quotation 1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="quotation1Link" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_fixed_quotation2" class="control-label">@lang('lang.Supplier Fixed Quotation') 2</label>
                                <input  type="text" id="supplier_fixed_quotation2" value="{{$supplier->supplier_fixed_quotation2}}" name="supplier_fixed_quotation2" class="form-control" placeholder="quotation 2">
                                <label for="quotation2" class="control-label">@lang('lang.Supplier Fixed Quotation 2 link')</label>
                                <div class="row">
                                    <div class="col">
                                        <input  type="text" readonly id="quotation2" name="quotation2" class="form-control" placeholder="Quotation 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="quotation2Link" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="bi bi-box-arrow-up-right">view</i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="social_media_accounts" class="control-label">@lang('lang.Social Media Accounts')</label>
                                <input  type="text"  value="{{$supplier->social_media_accounts}}" name="social_media_accounts" class="form-control" placeholder="Accounts">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="vat_number" class="control-label">@lang('lang.VAT Number')</label>
                                <input  type="text"  value="{{$supplier->vat_number}}" name="vat_number" class="form-control" placeholder="VAT Number">
                            </div>
                        </div>
                        <br>
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <label for="country" class="control-label">@lang('lang.Country')</label>
                                <input  type="text"  value="{{$supplier->country}}" name="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="city" class="control-label">@lang('lang.City')</label>
                                <input  type="text"  value="{{$supplier->city}}" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <br>
                        {{-- 9 --}}
                        <div class="row">
                            <div class="col">
                                <label for="district" class="control-label">@lang('lang.District')</label>
                                <input  type="text"  value="{{$supplier->district}}" name="district" class="form-control" placeholder="District">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="street" class="control-label">@lang('lang.Street')</label>
                                <input  type="text"  value="{{$supplier->street}}" name="street" class="form-control" placeholder="Street">
                            </div>
                            <div class="col">
                                <label for="postal_code" class="control-label">@lang('lang.Postal Code')</label>
                                <input  type="text"  value="{{$supplier->postal_code}}" name="postal_code" class="form-control" placeholder="Code">
                            </div>
                        </div>
                        <br>
                        {{-- 10 --}}
                        <div class="row">
                            <div class="col">
                                <label for="building_number" class="control-label">@lang('lang.Building Number')</label>
                                <input  type="text"  value="{{$supplier->building_number}}" name="building_number" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="secondary_number" class="control-label">@lang('lang.Secondary Number')</label>
                                <input  type="text"  value="{{$supplier->secondary_number}}" name="secondary_number" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <br>
                        {{-- 10 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_attatchment_CR" class="control-label">@lang('lang.Supplier Attatchment C.R')</label>
                                <input  type="text"  value="{{$supplier->supplier_attatchment_CR}}" name="supplier_attatchment_CR" class="form-control" placeholder="Attatchment C.R">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_VAT_certificate" class="control-label">@lang('lang.Supplier VAT Certificate')</label>
                                <input  type="text"  value="{{$supplier->supplier_VAT_certificate}}" name="supplier_VAT_certificate" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <br>
                        {{-- 11 --}}
                        <div class="row">
                            <div class="col">
                                <label for="supplier_IBAN1" class="control-label">@lang('lang.Supplier') IBAN1</label>
                                <input  type="text"  value="{{$supplier->supplier_IBAN1}}" name="supplier_IBAN1" class="form-control" placeholder="IBAN1">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="supplier_IBAN2" class="control-label">@lang('lang.Supplier') IBAN2</label>
                                <input  type="text"  value="{{$supplier->supplier_IBAN2}}" name="supplier_IBAN2" class="form-control" placeholder="IBAN2">
                            </div>
                        </div>
                        <br>
                        {{-- 12 --}}
                        <div class="row">
                            <div class="col">
                                <label for="factory_location" class="control-label">@lang('lang.Factory Location')</label>
                                <input  type="text" id="factory_location" value="{{$supplier->factory_location}}" name="factory_location" class="form-control" placeholder="Location">
                                <label for="factory" class="control-label">@lang('lang.Factory Location Link')</label>
                                
                                <div class="row">
                                    <div class="col">
                                        <input  type="text" readonly id="factory" name="factory" class="form-control" placeholder="Factory Location Link">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="factoryLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="office_location" class="control-label">@lang('lang.Office Location')</label>
                                <input  type="text" id="office_location" value="{{$supplier->office_location}}" name="office_location" class="form-control" placeholder="Location">
                                <label for="office" class="control-label">@lang('lang.Office Location')</label>
                                
                                <div class="row">
                                    <div class="col">
                                        <input  type="text" readonly id="office" name="office_location" class="form-control" placeholder="Office Location">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a id="officeLink" href="" target="_blank">
                                            <i class="btn btn-primary"><i class="las la-link"></i></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- 13 --}}
                        <div class="row">
                            <div class="col">
                                <label for="user_comments" class="control-label">@lang('lang.User Comments')</label>
                                <textarea class="form-control" value="{{$supplier->user_comments}}" name="user_comments" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">@lang('lang.Update')</button>
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
