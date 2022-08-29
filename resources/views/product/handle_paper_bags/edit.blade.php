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
                <h4 class="content-title mb-0 my-auto">@lang('lang.product') /{{ __($type) }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <form action="{{route('HandlePaperBag.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input value="{{$product->product_name}}" type="text" class="form-control" id="inputName" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="col">
                                <label for="print_colors">@lang('lang.Paper Color')</label>
                                <input value="{{$product->print_colors}}" type="text" name="print_colors" placeholder="colors" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Handle Model')</label>
                                <select  name="model" class="form-control">
                                    <!--placeholder-->
                                    <option value="Twisted Handle" {{$product->model =="Twisted Handle" ? 'selected' : ''}} >@lang('lang.Twisted Handle')</option>
                                    <option value="Flat Handle" {{$product->model =="Flat Handle" ? 'selected' : ''}} >@lang('lang.Flat Handle')</option>
                                    <option value="Punched-Out Handle" {{$product->model =="Punched-Out Handle" ? 'selected' : ''}} >@lang('lang.Punched-Out Handle')</option>
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
                                    <input type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data">
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- Category Section --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value=" {{$handlePaperBag->material_color}}" class="form-control" id="inputName" name="material_color">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity Per Item')</label>
                                <input value="{{$handlePaperBag->quantity_per_item}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="quantity_per_tons">@lang('lang.Quantity Per Tons')</label>
                                <input value="{{$handlePaperBag->quantity_per_tons}}" type="number" name="quantity_per_tons" placeholder="quantity" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                @php
                                    $effects=json_decode($handlePaperBag->effects);
                                @endphp
                                <label for="effects" class="control-label">@lang('lang.Effects')</label>
                                <select name="effects[]" class="form-control" multiple id="effects">
                                    {{-- 1 --}}
                                    
                                        
                                    
                                        <option value="Embossed">Embossed</option>
                                    
                                    {{-- 2 --}}
                                    
                                        
                                    
                                        <option value="Debossed" >Debossed</option>
                                    
                                    {{-- 3 --}}
                                    
                                        
                                    
                                        <option value="Matt Laminated" >Matt Laminated</option>
                                    
                                    {{-- 4 --}}
                                    
                                        
                                    
                                        <option value="Glossy Laminated" >Glossy Laminated</option>
                                    
                                </select>
                            </div>
                            <div class="col">
                                <label for="print_type">@lang('lang.Print Type')</label>
                                <select  name="print_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="Full" {{$handlePaperBag->print_type =="Full" ? 'selected' : ''}} >@lang('lang.Full')</option>
                                    <option value="Partial" {{$handlePaperBag->print_type =="Partial" ? 'selected' : ''}} >@lang('lang.Partial')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="bag_width">@lang('lang.Bag Width')</label>
                                <input value="{{$handlePaperBag->bag_width}}" type="float" name="bag_width" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="bag_height">@lang('lang.Bag Height')</label>
                                <input value="{{$handlePaperBag->bag_height}}" type="float" name="bag_height" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="gusset_width">@lang('lang.Gusset Width')</label>
                                <input value="{{$handlePaperBag->gusset_width}}" type="float" name="gusset_width" placeholder="number" class="form-control">
                            </div>
                        </div>
                        {{-- 7 --}}
                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label>
                                <input type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                        
                        </div>
                        <br><br>
                         
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
<script>
    
</script>