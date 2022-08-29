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
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.product') / {{ __('lang.' .  $type) }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <form action="{{route('PaperCup.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row">
                            
                            <input type="text" name="product_class" value="{{$type}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input required type="text" class="form-control" id="inputName" name="product_name">
                            </div>
                          
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                <select  name="model" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Single Wall">@lang('lang.Single Wall')</option>
                                    <option value="Double Wall">@lang('lang.Double Wall')</option>
                                </select>
                            </div>
                            
                        </div>
                        {{-- 3 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea class="form-control" id="exampleTextarea" name="additional_text" rows="3"></textarea>
                            </div>
                        </div>
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only') ( pdf, jpeg , png ) @lang('lang.files')</p>
                                <h5 class="card-title">@lang('lang.Files')</h5>
                                <div class="col-sm-12 col-md-12">
                                    <input  type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data" multiple>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- Category Section --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="material_type" class="control-label">@lang('lang.Material Type')</label>
                                <select  name="material_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="White">@lang('lang.White')</option>
                                    <option value="kraft">@lang('lang.Kraft')</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="material_colors" class="control-label">@lang('lang.Material Colors')</label>
                                <select  name="material_colors" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="White">@lang('lang.White')</option>
                                    <option value="Brown">@lang('lang.Brown')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input  type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="effets" class="control-label">@lang('lang.Effects')</label>
                                <select  name="effects[]" multiple class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Foiling Effect">@lang('lang.Foiling Effect')</option>
                                    <option value="Embossing Effect">@lang('lang.Embossing Effect')</option>
                                    <option value="Spot UV Effect">@lang('lang.Spot UV Effect')</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="uom" class="control-label">@lang('lang.UOM')</label>
                                <select  name="uom" class="form-control" >
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Pcs">@lang('lang.Pcs')</option>
                                    <option value="KG">@lang('lang.KG')</option>
                                    <option value="CTN">@lang('lang.CTN')</option>
                                    <option value="Ream">@lang('lang.Ream')</option>
                                    <option value="Pack">@lang('lang.Pack')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="thickness">@lang('lang.Size')</label>
                                <input  type="float" name="thickness" class="form-control">
                            </div>
                            <div class="col">
                                <label for="capacity">@lang('lang.Capacity')</label>
                                <select  name="capacity" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Ml">ml</option>
                                    <option value="Oz">Oz</option>
                                </select>
                            </div>
                        </div> <br><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">@lang('lang.Create')</button>
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