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
                <h4 class="content-title mb-0 my-auto">product / {{$type}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    edit this product</span>
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
                    <form action="{{route('PaperCup.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input value="{{$product->product_name}}" type="text" name="product_name" placeholder="Product Name" class="form-control">
                            
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                <select  name="model" class="form-control">
                                    <!--placeholder-->
                                    
                                    <option value="Single Wall" {{$product->model =="Single Wall" ? 'selected' : ''}}>@lang('lang.Single Wall')</option>
                                    <option value="Double Wall" {{$product->model =="Double Wall" ? 'selected' : ''}}>@lang('lang.Double Wall')</option>
                                </select>
                            </div>
                            
                        </div>
                        {{-- 3 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea class="form-control" id="exampleTextarea" name="additional_text" rows="3">{{$product->additional_text}}</textarea>
                            </div>
                        </div>
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only') ( pdf, jpeg , png ) @lang('lang.files')</p>
                                <h5 class="card-title">@lang('lang.Files')</h5>
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data" multiple>
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
                                <input type="text" value="{{$paperCup->material_type}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$paperCup->material_color}}" name="material_color" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input value="{{$paperCup->quantity_per_item}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="finger_print_color">@lang('lang.Finger Print Color')</label>
                                <input value="{{$paperCup->finger_print_color}}" type="text" name="finger_print_color" placeholder="color" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="effets" class="control-label">@lang('lang.Effects')</label>
                                <select  name="effects[]" multiple class="form-control">
                                    {{-- 1 --}}
                                    
                                    <option value="Foiling Effect" {{$paperCup->effects =="Foiling Effect" ? 'selected' : ''}}>@lang('lang.Foiling Effect')</option>
                                    <option value="Embossing Effect" {{$paperCup->effects =="Embossing Effect" ? 'selected' : ''}}>@lang('lang.Embossing Effect')</option>
                                    <option value="Spot UV Effect" {{$paperCup->effects =="Spot UV Effect" ? 'selected' : ''}}>@lang('lang.Spot UV Effect')</option>
                                 
                                </select>
                            </div>
                            <div class="col">
                                <label for="uom" class="control-label">@lang('lang.UOM')</label>
                                <select  name="uom" class="form-control">
                                    <!--placeholder-->
                                    <option value="Pcs" {{$paperCup->uom =="Pcs" ? 'selected' : ''}}>@lang('lang.Pcs')</option>
                                    <option value="KG" {{$paperCup->uom =="KG" ? 'selected' : ''}}>@lang('lang.KG')</option>
                                    <option value="Ctn" {{$paperCup->uom =="Ctn" ? 'selected' : ''}}>@lang('lang.CTN')</option>
                                    <option value="Ream" {{$paperCup->uom =="Ream" ? 'selected' : ''}}>@lang('lang.Ream')</option>
                                    <option value="Pack" {{$paperCup->uom =="Pack" ? 'selected' : ''}}>@lang('lang.Pack')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="thickness">@lang('lang.Size')</label>
                                <input value="{{$paperCup->thickness}}" type="float" name="thickness" class="form-control">
                            </div>
                            <div class="col">
                                <label for="capacity">@lang('lang.Capacity')</label>
                                <select  name="capacity" class="form-control">
                                    <!--placeholder-->
                                    <option value="Ml" {{$paperCup->capacity =="Ml" ? 'selected' : ''}}>ml</option>
                                    <option value="Oz" {{$paperCup->capacity =="Oz" ? 'selected' : ''}}>Oz</option>
                                </select>
                            </div>
                        </div> <br> <br>
                        
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