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
                    <form action="{{route('PaperNabkins.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">s
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input required type="text" value="{{$product->product_name}}" name="product_name" placeholder="Product Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="print_colors">@lang('lang.Print Colors')</label>
                                <input value="{{$product->print_colors}}" type="text" name="print_colors" placeholder="colors" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="design_service" class="control-label">@lang('lang.Design Service')</label>
                                <input type="text" value="{{$product->design_service}}" class="form-control" id="inputName" name="design_service">
                            </div>
                            <div class="col">
                                <label for="logistics_service" class="control-label">@lang('lang.Logistics Service')</label>
                                <input type="text" value="{{$product->logistics_service}}" class="form-control" id="inputName" name="logistics_service">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                <select  name="model" class="form-control">
                                    placeholder
                                    <option value="Comes in Pockets" {{$product->model =="Logistic Service" ? 'selected' : ''}}>Comes in Pockets</option>
                                </select>
                            </div>
                        </div> -->
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input value="{{$paperNabkin->width}}" type="double" name="width" placeholder="width" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input value="{{$paperNabkin->height}}" type="double" name="height" placeholder="height" class="form-control">
                            </div> -->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select  name="product_type" class="form-control">
                                    <option value="Customied" {{$product->product_type =="Customied" ? 'selected' : ''}}>@lang('lang.Customied')</option>
                                    <option value="Standard" {{$product->product_type =="Standard" ? 'selected' : ''}}>@lang('lang.Standard')</option>
                                </select>
                            </div>
                            <!-- <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select  name="branding" class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Printing" {{$product->branding =="Printing" ? 'selected' : ''}}>@lang('lang.Printing')</option>
                                    <option value="Not-Printing" {{$product->branding =="Not-Printing" ? 'selected' : ''}}>@lang('lang.Not-Printing')</option>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea class="form-control" id="exampleTextarea" name="additional_text" rows="3">{{$product->additional_text}}</textarea>
                            </div>
                        </div> -->
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
                        <!-- <div class="row">
                            <div class="col">
                                <label for="material_colors" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$paperNabkin->material_colors}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                        </div>
                        <br> -->
                        {{-- 4 --}}
                        <div class="row">
                            <!-- <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input value="{{$paperNabkin->quantity_per_item}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div> -->
                            
                            <div class="col">
                                <label for="layer_number" class="control-label">@lang('lang.Layer Number')</label>
                                <input value="{{$paperNabkin->layer_number}}" type="number" name="layer_number" placeholder="thickness" class="form-control">
                            </div>
                        </div>
                        <br>
                        
                        {{-- 6 --}}
                        {{-- 7 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label>
                                <input value="{{$paperNabkin->paper_thickness}}" type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>

                            <div class="col">
                                <label for="sheets_per_packet" class="control-label">@lang('lang.Sheet Per Packet')</label>
                                <input value="{{$paperNabkin->sheets_per_packet}}" type="number" name="sheets_per_packet" placeholder="thickness" class="form-control">
                            </div>
                            
                        </div> -->
                        <!-- edit -->
                        <div class="col">
                                    <label for="Length">@lang('lang.Length')</label>
                                    <input required value="{{$paperNabkin->Length}}" type="number" name="Length" placeholder="Length" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="Paper_color" class="control-label">@lang('lang.Paper_Color')</label>
                                    <select required name="Paper_color" class="form-control">
                                        <!-- <option value="" selected disabled>...</option> -->
                                    <option value="White" {{$paperNabkin->White =="White" ? 'selected' : ''}}>@lang('lang.White')</option>
                                    <option value="brown" {{$paperNabkin->brown =="brown" ? 'selected' : ''}}>@lang('lang.brown')</option>
                                    </select>
                                </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">@lang('lang.update')</button>
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