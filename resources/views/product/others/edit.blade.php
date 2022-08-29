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
                <h4 class="content-title mb-0 my-auto">@lang('lang.product') / {{$type}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <form action="{{route('Other.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" value="{{$product->product_class}}" name="product_class" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input type="text" value="{{$product->product_name}}" class="form-control" id="inputName" name="product_name">
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
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                @switch($type)
                                    @case('standard')
                                        <input type="text" name="model" placeholder="quantity" class="form-control">
                                    @break
                                    @case('cup_holder_plate')
                                        <select name="model" class="form-control">
                                            <option value="Flat Sheet" {{$product->model =="Flat Sheet" ? 'selected' : ''}}>Flat Sheet</option>
                                            <option value="With Handle & Base" {{$product->model =="With Handle & Base" ? 'selected' : ''}}>With Handle & Base</option>
                                        </select>
                                    @break
                                    @case('paper_sleeve')
                                        <select name="model" class="form-control">
                                            <option value="Folded for Container" {{$product->model =="Folded for Container" ? 'selected' : ''}}>Folded for Container</option>
                                        </select>
                                    @break
                                    @case('cartoon_sleeve')
                                        <select name="model" class="form-control">
                                            <option value="ٌRounded for Cup" {{$product->model =="Rounded for Cup" ? 'selected' : ''}}>Rounded for Cup</option>
                                        </select>
                                    @break
                                    @case('plastic_container')
                                        <select name="model" class="form-control">
                                            <option value="ٌRounded" {{$product->model =="Rounded" ? 'selected' : ''}}>Rounded</option>
                                        </select>
                                    @break
                                    @case('plastic_culteries')
                                        <select name="model" class="form-control">
                                            <option value="ٌ(Spoon+Fork+Knife) Set" {{$product->model =="(Spoon+Fork+Knife) Set" ? 'selected' : ''}}>(Spoon+Fork+Knife) Set</option>
                                        </select>
                                    @break
                                    @case('wooden_culterries')
                                        <select name="model" class="form-control">
                                            <option value="(Spoon+Fork) Set" {{$product->model =="(Spoon+Fork) Set" ? 'selected' : ''}}>(Spoon+Fork) Set</option>
                                        </select>
                                    @break
                                    @case('plastic_lid')
                                        <select name="model" class="form-control">
                                            <option value="FLat for Paper Bowls" {{$product->model =="FLat for Paper Bowls" ? 'selected' : ''}}>FLat for Paper Bowls</option>
                                            <option value="FLat for Plastic Cups" {{$product->model =="PaFLat for Plastic Cupsckaging" ? 'selected' : ''}}>FLat for Plastic Cups</option>
                                            <option value="Dome for Plastic Cups" {{$product->model =="Dome for Plastic Cups" ? 'selected' : ''}}>Dome for Plastic Cups</option>
                                            <option value="Sip for Paper Cups" {{$product->model =="Sip for Paper Cups" ? 'selected' : ''}}>Sip for Paper Cups</option>
                                        </select>
                                    @break
                                    @case('paper_lid')
                                        <select name="model" class="form-control">
                                            <option value="FLat for Paper Bowls" {{$product->model =="FLat for Paper Bowls" ? 'selected' : ''}}>FLat for Paper Bowls</option>
                                        </select>
                                    @break
                                    @case('paper_plate')
                                        <select name="model" class="form-control">
                                            <option value="Boat Tray" {{$product->model =="Boat Tray" ? 'selected' : ''}}>Boat Tray</option>
                                        </select>
                                    @break
                                    @case('platic_plate')<!--plastic_plate-->
                                        <select name="model" class="form-control">
                                            <option value="Rounded Tray" {{$product->model =="Rounded Tray" ? 'selected' : ''}}></option>
                                        </select>
                                    @break
                                    @case('plastic_sticker')
                                        <select name="model" class="form-control">
                                            <option value="FLat for Paper Bowls" {{$product->model =="FLat for Paper Bowls" ? 'selected' : ''}}>FLat for Paper Bowls</option>
                                        </select>
                                    @break
                                    @case('paper_sticker')
                                        <select name="model" class="form-control">
                                            <option value="Comes in Sheets" {{$product->model =="Comes in Sheets" ? 'selected' : ''}}>Comes in Sheets</option>
                                        </select>
                                    @break
                                    @case('printing_cliché')
                                        <select name="model" class="form-control">
                                            <option value="Paper Cup Printing Cliché" {{$product->model =="Paper Cup Printing Cliché" ? 'selected' : ''}}>Paper Cup Printing Cliché</option>
                                            <option value="Paper Bag Printing Cliché" {{$product->model =="Paper Bag Printing Cliché" ? 'selected' : ''}}>Paper Bag Printing Cliché"</option>
                                            <option value="Plastic Cup Printing Cliché" {{$product->model =="Plastic Cup Printing Cliché" ? 'selected' : ''}}>Plastic Cup Printing Cliché</option>
                                            <option value="Plastic Bag Printing Cliché" {{$product->model =="Plastic Bag Printing Cliché" ? 'selected' : ''}}>Plastic Bag Printing Cliché</option>
                                            <option value="Paper Napkin Printing Cliché" {{$product->model =="Paper Napkin Printing Cliché" ? 'selected' : ''}}>Paper Napkin Printing Cliché</option>
                                            <option value="Wet Wipes Printing Cliché" {{$product->model =="Wet Wipes Printing Cliché" ? 'selected' : ''}}>Wet Wipes Printing Cliché</option>
                                        </select>
                                    @break
                                    @case('wet_wipes')
                                        <select name="model" class="form-control">
                                            <option value="Comes in Saches" {{$product->model =="Comes in Saches" ? 'selected' : ''}}>Comes in Saches</option>
                                        </select>
                                    @break
                                    @default
                                        
                                @endswitch
                            </div>
                            
                            
                        </div>
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input type="number" value="{{$other->width}}" name="width" placeholder="width" class="form-control">
                            </div>
                            <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input type="number" value="{{$other->height}} name="height" placeholder="height" class="form-control">
                            </div>
                            <div class="col">
                                <label for="length">@lang('lang.Length')</label>
                                <input type="number" value="{{$other->length}} name="height" placeholder="height" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select name="product_type" class="form-control">
                                    <option value="Customied" {{$product->product_type =="Customied" ? 'selected' : ''}}>@lang('lang.Customied')</option>
                                    <option value="Standard" {{$product->product_type =="Standard" ? 'selected' : ''}}>@lang('lang.Standard')</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select name="branding" class="form-control">
                                    <option value="Printing" {{$product->branding =="Printing" ? 'selected' : ''}}>@lang('lang.Printing')</option>
                                    <option value="Not-Printing" {{$product->branding =="Not-Printing" ? 'selected' : ''}}>@lang('ang.Not-Printing')</option>
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
                                <p class="text-danger">@lang('lang.Upload Only ')( pdf, jpeg , png ) @lang('lang.files')</p>
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
                                <input type="text" value="{{$other->material_type}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$other->material_color}}" name="material_color" placeholder="quantity" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="quantity">@lang('lang.Quantity')</label>
                                <input type="number" value="{{$other->quantity}}" name="quantity" placeholder="quantity" class="form-control">
                            </div>
                        </div>
                        <br>
                        
                        {{-- 6 --}}
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="thickness">@lang('lang.Thickness')</label>
                                <input type="number" value="{{$other->thickness}}" name="thickness" placeholder="thickness" class="form-control">
                            </div>
                            <div class="col">
                                <label for="diameter">@lang('lang.Diameter')</label>
                                <input type="number" value="{{$other->diameter}}" name="diameter" placeholder="thickness" class="form-control">
                            </div>
                            
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