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
                    <form action="{{route('PaperBox.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input value="{{$product->product_name}}" type="text" name="product_name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <!-- <div class="col">
                                <label for="model" class="control-label">Model</label>
                                <select name="model" class="form-control">
                                    placeholder
                                    <option value="Single Wall" {{$product->model =="Single Wall" ? 'selected' : ''}}>@lang('lang.Single Wall')</option>
                                    <option value="Double Wall" {{$product->model =="Double Wall" ? 'selected' : ''}}>@lang('lang.Double Wall')</option>
                                </select>
                            </div> -->
                            <div class="col">
                                <label for="length">@lang('lang.Length')</label>
                                <input value="{{$paperBox->length}}" type="double" name="length" placeholder="Length" class="form-control">
                            </div>
                        </div>
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input value="{{$paperBox->width}}" type="double" name="width" placeholder="width" class="form-control">
                            </div>
                            <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input value="{{$paperBox->width}}" type="double" name="height" placeholder="height" class="form-control">
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
                            <!-- <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select name="branding" class="form-control">
                                    <option value="Printing" {{$product->branding =="Printing" ? 'selected' : ''}}>@lang('lang.Printing')</option>
                                    <option value="Not-Printing" {{$product->branding =="Not-Printing" ? 'selected' : ''}}>@lang('lang.Not-Printing')</option>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea value="{{$product->additional_text}}" class="form-control" id="exampleTextarea" name="additional_text" rows="3"></textarea>
                            </div>
                        </div> -->
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only')  ( pdf, jpeg , png ) @lang('lang.files')</p>
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
                        <!-- <div class="row">
                            <div class="col">
                                <label for="material_type" class="control-label">@lang('lang.Material Type')</label>
                                <input type="text" value="{{$paperBox->material_type}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$paperBox->material_color}}" name="materil_color" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div> -->
                        <br>
                        {{-- 4 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input value="{{$paperBox->width}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="print_type">@lang('lang.Print Type')</label>
                                <select name="print_type" class="form-control">
                                    placeholder
                                    <option value="Single Face" {{$paperBox->material_type =="Single Face" ? 'selected' : ''}}>@lang('lang.Single Face')</option>
                                    <option value="Double Face" {{$paperBox->material_type =="Double Face" ? 'selected' : ''}}>@lang('lang.Double Face')</option>
                                </select>
                            </div>
                        </div> -->
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="effets" class="control-label">@lang('lang.Effects')</label>
                                <select name="effects[]" multiple class="form-control">
                                    {{-- 1 --}}
                                        <option value="SPOT_UV" selected >@lang('lang.SPOT UV')</option>
                                </select>
                            </div>
                            
                            <!-- <div class="col">
                                <label for="uom" class="control-label">@lang('lang.UOM')</label>
                                <select name="uom" class="form-control">
                                    placeholder
                                    <option value="KG" {{$paperBox->uom =="KG" ? 'selected' : ''}}>KG</option>
                                    <option value="Ream" {{$paperBox->uom =="Ream" ? 'selected' : ''}}>Ream</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="capacity">@lang('lang.Capacity')</label></label>
                                <select name="capacity" class="form-control">
                                    placeholder
                                    <option value="gm" {{$paperBox->capacity =="gm" ? 'selected' : ''}}>gm</option>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        {{-- 6 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="single_board_height">@lang('lang.Single Board Width')</label>
                                <input value="{{$paperBox->single_board_height}}" type="float" name="single_board_height" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="single_board_width">@lang('lang.Single Board Width')</label>
                                <input value="{{$paperBox->single_board_width}}" type="float" name="single_board_width" placeholder="number" class="form-control">
                            </div>
                            
                        </div> -->
                        {{-- 7 --}}
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="solovan_layer">@lang('lang.Solovan Layer')</label>
                                <select name="solovan_layer" class="form-control">
                                    placeholder
                                    <option value="Clear" {{$paperBox->solovan_layer =="Clear" ? 'selected' : ''}}>@lang('lang.Clear')</option>
                                    <option value="Shining" {{$paperBox->solovan_layer =="Shining" ? 'selected' : ''}}>@lang('lang.Shining')</option>
                                </select> 
                            </div>                           
                            <div class="col">
                                <label for="uv_layer">UV @lang('lang.Layer')</label>
                                <select name="uv_layer" class="form-control">
                                    placeholder
                                    <option value="Yes" {{$paperBox->uv_layer =="Yes" ? 'selected' : ''}}>@lang('lang.Yes')</option>
                                    <option value="No" {{$paperBox->uv_layer =="No" ? 'selected' : ''}}>@lang('lang.No')</option>
                                </select> 
                            </div>
                            <div class="col">
                                <label for="coverage">@lang('lang.Coverage')</label>
                                <select name="coverage" class="form-control">
                                    placeholder
                                    <option value="Yes" {{$paperBox->coverage =="Yes" ? 'selected' : ''}}>@lang('lang.Yes')</option>
                                    <option value="No" {{$paperBox->ucoverageom =="No" ? 'selected' : ''}}>@lang('lang.No')</option>
                                </select> 
                            </div>
                        </div> -->
                        {{-- 7 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness') @lang('lang.GSM')</label>
                                <input value="{{$paperBox->paper_thickness}}" type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="glue_points_number">@lang('lang.Glue Points Count')</label>
                                <input value="{{$paperBox->glue_points_number}}" type="number" name="glue_points_number" placeholder="count" class="form-control">
                            </div> -->
                            
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="window_shape">@lang('lang.Window Shape')</label>
                                <input value="{{$paperBox->window_shape}}" type="text" name="window_shape" placeholder="shape" class="form-control">
                            </div>
                            <div class="col">
                                <label for="window_width">@lang('lang.Window Width')</label>
                                <input value="{{$paperBox->window_width}}" type="float" name="window_width" placeholder="width" class="form-control">
                            </div>
                            <div class="col">
                                <label for="window_height">@lang('lang.Window Height')</label>
                                <input value="{{$paperBox->window_height}}" type="float" name="window_height" placeholder="heighht" class="form-control">
                            </div>
                        </div> -->
                        <!-- edit -->
                        <div class="row">
                            <div class="col">
                                <label for="model">@lang('lang.Model')</label>
                                <input required value="{{$paperBox->model}}" type="text" name="model" placeholder="model" class="form-control">
                            </div>
                        </div> <br>
                        <div class="col">
                                <label for="coverage">@lang('lang.Paper_Type')</label>
                                <select  name="paper_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="infercode" {{$paperBox->coverage =="infercode" ? 'selected' : ''}}>@lang('lang.infercode')</option>
                                    <option value="duplex" {{$paperBox->coverage =="duplex" ? 'selected' : ''}}>@lang('lang.duplex')</option>
                                    <option value="brown_kraft" {{$paperBox->coverage =="brown_kraft" ? 'selected' : ''}}>@lang('lang.brown_kraft')</option>
                                    <option value="special_paper" {{$paperBox->coverage =="special_paper" ? 'selected' : ''}}>@lang('lang.special_paper')</option>
                                    <option value="hard_cover" {{$paperBox->coverage =="hard_cover" ? 'selected' : ''}}>@lang('lang.hard_cover')</option>
                                </select> 
                        </div>
                        <div class="col">
                                <label for="coverage">@lang('lang.lamination')</label>
                                <select  name="lamination" class="form-control">
                                    <!--placeholder-->
                                    <option value="matt_laminate_outer_layer" {{$paperBox->coverage =="matt_laminate_outer_layer" ? 'selected' : ''}}>@lang('lang.matt_laminate_outer_layer')</option>
                                    <option value="glossy_laminate_outer_layer" {{$paperBox->coverage =="glossy_laminate_outer_layer" ? 'selected' : ''}}>@lang('lang.glossy_laminate_outer_layer')</option>
                                    <option value="matt_laminate_inner_layer" {{$paperBox->coverage =="matt_laminate_inner_layer" ? 'selected' : ''}}>@lang('lang.matt_laminate_inner_layer')</option>
                                    <option value="glossy_laminate_inner_layer" {{$paperBox->coverage =="glossy_laminate_inner_layer" ? 'selected' : ''}}>@lang('lang.glossy_laminate_inner_layer')</option>
                                    <option value="matt_laminate_inner_&_outer_layer" {{$paperBox->coverage =="matt_laminate_inner_&_outer_layer" ? 'selected' : ''}}>@lang('lang.matt_laminate_inner_&_outer_layer')</option>
                                    <option value="glossy_laminate_inner_&_outer_layer" {{$paperBox->coverage =="glossy_laminate_inner_&_outer_layer" ? 'selected' : ''}}>@lang('lang.glossy_laminate_inner_&_outer_layer')</option>
                                    <option value="inner_matt_&_outer_glossy_laminate" {{$paperBox->coverage =="inner_matt_&_outer_glossy_laminate" ? 'selected' : ''}}>@lang('lang.inner_matt_&_outer_glossy_laminate')</option>
                                    <option value="inner_glossy_&_outer_matt_laminate" {{$paperBox->coverage =="inner_glossy_&_outer_matt_laminate" ? 'selected' : ''}}>@lang('lang.inner_glossy_&_outer_matt_laminate')</option>

                                </select> 
                        </div>
                        <div class="col">
                                <label for="coverage">@lang('lang.stamping')</label>
                                <select  name="stamping" class="form-control">
                                    <!--placeholder-->
                                    <option value="gold" {{$paperBox->coverage =="gold" ? 'selected' : ''}}>@lang('lang.gold')</option>
                                    <option value="silver" {{$paperBox->coverage =="silver" ? 'selected' : ''}}>@lang('lang.silver')</option>
                                    <option value="copper" {{$paperBox->coverage =="copper" ? 'selected' : ''}}>@lang('lang.copper')</option>
                                    <option value="bronze" {{$paperBox->coverage =="bronze" ? 'selected' : ''}}>@lang('lang.bronze')</option>

                                </select> 
                        </div>
                        <div class="col">
                                <label for="coverage">@lang('lang.Printing')</label>
                                <select  name="printing" class="form-control">
                                    <!--placeholder-->
                                    <option value="Single_Face" {{$paperBox->coverage =="Single_Face" ? 'selected' : ''}}>@lang('lang.Single_Face')</option>
                                    <option value="Double_Face" {{$paperBox->coverage =="Double_Face" ? 'selected' : ''}}>@lang('lang.Double_Face')</option>
                                </select> 
                        </div>
                        <div class="col">
                                <label for="coverage">@lang('lang.printing_type')</label>
                                <select  name="printing_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="Divider" {{$paperBox->coverage =="Divider" ? 'selected' : ''}}>@lang('lang.Divider')</option>
                                    <option value="No_divider" {{$paperBox->coverage =="No_divider" ? 'selected' : ''}}>@lang('lang.No_divider')</option>
                                </select> 

                        </div>
                        <div class="col">
                                <label for="coverage">@lang('lang.embossing')</label>
                                <select  name="embossing" class="form-control">
                                    <!--placeholder-->
                                    <option value="Emboss" {{$paperBox->coverage =="Emboss" ? 'selected' : ''}}>@lang('lang.Emboss')</option>
                                    <option value="Deboss" {{$paperBox->coverage =="Deboss" ? 'selected' : ''}}>@lang('lang.Deboss')</option>
                                </select> 
                        </div>
                        <div class="col">
							<label for="description">@lang('lang.Description')</label>
							<textarea value="{{$paperBox->description}}" type="text" class="form-control" name="description" value=""></textarea>
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