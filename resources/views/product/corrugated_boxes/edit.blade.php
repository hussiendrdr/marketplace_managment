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
                <h4 class="content-title mb-0 my-auto">@lang('lang.product') /{{ __('lang.' . $type) }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <form action="{{route('CorrugatedBox.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                          @csrf
                        @method('PUT')
                       
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input value="{{$product->product_name}}" type="text" class="form-control" id="inputName" name="product_name">
                            </div>
                            <div class="col">
                                <label for="print_colors">@lang('lang.Print Colors')</label>
                                <input value="{{$product->print_colors}}" type="text" name="print_colors" placeholder="colors" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col"><label for="design_service" class="control-label">@lang('lang.Design Service')</label>
                                <input type="text" value="{{$product->design_service}}" class="form-control" id="inputName" name="design_service">
                            </div>
                            <div class="col">
                                <label for="logistics_service" class="control-label">@lang('lang.Logistics Service')</label>
                                <input type="text" value="{{$product->logistics_service}}" class="form-control" id="inputName" name="logistics_service">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}                        
                        <div class="row">
                            <div class="col">
                                <label for="length">@lang('lang.Length')</label>
                                <input value="{{$corrugatedBox->length}}"type="float" name="length" placeholder="Length" class="form-control">
                            </div>
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input value="{{$corrugatedBox->width}}"type="float" name="width" placeholder="width" class="form-control">
                            </div>
                            <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input value="{{$corrugatedBox->height}}"type="float" name="height" placeholder="height" class="form-control">
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select name="product_type" class="form-control">
                                    <option value="Customied" {{$product->product_type =="Customied" ? 'selected' : ''}} >@lang('lang.Customied')</option>
                                    <option value="Standard" {{$product->product_type =="Standard" ? 'selected' : ''}} >@lang('lang.Standard')</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select name="branding" class="form-control">
                                    <option value="Printing" {{$product->branding =="Printing" ? 'selected' : ''}} >@lang('lang.Printing')</option>
                                    <option value="Not-Printing" {{$product->branding =="Not-Printing" ? 'selected' : ''}} >@lang('lang.Not-Printing')</option>
                                </select>
                            </div>
                        </div>
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
                                <input type="text" value=" {{$corrugatedBox->material_type}}" class="form-control" id="inputName" name="material_type">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value=" {{$corrugatedBox->material_color}}" class="form-control" id="inputName" name="material_color">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                <select name="model" class="form-control">
                                    <option value="Rectangular" {{$product->model =="Rectangular" ? 'selected' : ''}} >@lang('lang.Rectangular')</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input value="{{$corrugatedBox->quantity_per_item}}"type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div>
                        
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="single_box_height">@lang('lang.Single Box Width')</label>
                                <input value="{{$corrugatedBox->single_box_height}}"type="float" name="single_box_height" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="single_box_width">@lang('lang.Single Box Width')</label>
                                <input value="{{$corrugatedBox->single_box_width}}"type="float" name="single_box_width" placeholder="number" class="form-control">
                            </div>
                            
                        </div>
                        {{-- 7 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="solovan_layer">@lang('lang.Solovan Layer')</label>
                                <select name="solovan_layer" class="form-control">
                                    <!--placeholder-->
                                    <option value="Clear" {{$corrugatedBox->solovan_layer =="Clear" ? 'selected' : ''}} >@lang('lang.Clear')</option>
                                    <option value="Shining" {{$corrugatedBox->solovan_layer =="Shining" ? 'selected' : ''}} >@lang('lang.Shining')</option>
                                </select> 
                            </div>                           
                            <div class="col">
                                <label for="uv_layer">UV @lang('lang.Layer')</label>
                                <select name="uv_layer" class="form-control">
                                    <!--placeholder-->
                                    <option value="Yes" {{$corrugatedBox->uv_layer =="Yes" ? 'selected' : ''}} >@lang('lang.Yes')</option>
                                    <option value="No" {{$corrugatedBox->uv_layer =="No" ? 'selected' : ''}} >@lang('lang.No')</option>
                                </select> 
                            </div>
                            <div class="col">
                                <label for="coverage">@lang('lang.Coverage')</label>
                                <select name="coverage" class="form-control">
                                    <!--placeholder-->
                                    <option value="Yes" {{$corrugatedBox->coverage =="Yes" ? 'selected' : ''}} >@lang('lang.Yes')</option>
                                    <option value="No" {{$corrugatedBox->coverage =="No" ? 'selected' : ''}} >@lang('lang.No')</option>
                                </select> 
                            </div>
                        </div>
                        {{-- 7 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="merged_normal_layer">@lang('lang.Merged Normal Layer')</label>
                                <select name="merged_normal_layer" class="form-control">
                                    <!--placeholder-->
                                    <option value="Yes" {{$corrugatedBox->merged_normal_layer =="" ? 'selected' : ''}} >@lang('lang.Yes')</option>
                                    <option value="No" {{$corrugatedBox->merged_normal_layer =="" ? 'selected' : ''}} >@lang('lang.No')</option>
                                </select> 
                            </div>
                            <div class="col">
                                <label for="finger_print_color">@lang('lang.Finger Print Color')</label>
                                <input value="{{$corrugatedBox->finger_print_color}}" type="float" name="finger_print_color" placeholder="thickness" class="form-control">
                            </div>

                        </div>
                        {{-- 7 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label>
                                <input value="{{$corrugatedBox->paper_thickness}}"type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                            <div class="col">
                                <label for="glue_points_number">@lang('lang.Glue Points Count')</label>
                                <select name="glue_points_number" class="form-control">
                                    <!--placeholder-->
                                    <option value="1" {{$corrugatedBox->glue_points_number =="1" ? 'selected' : ''}} >1</option>
                                    <option value="2" {{$corrugatedBox->glue_points_number =="2" ? 'selected' : ''}} >2</option>
                                    <option value="3" {{$corrugatedBox->glue_points_number =="3" ? 'selected' : ''}} >3</option>
                                    <option value="4" {{$corrugatedBox->glue_points_number =="4" ? 'selected' : ''}} >4</option>
                                </select> 
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