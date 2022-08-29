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
                    <form action="{{route('PaperBox.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            
                            <input type="text" name="product_class" value="{{$type}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input required type="text" class="form-control" id="inputName" name="product_name">
                            </div>
                        </div>
                        <br>
                        {{-- 2 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="material_type" class="control-label">@lang('lang.Material Type')</label>
                                <input type="text" class="form-control" id="inputName" name="material_type">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" class="form-control" id="inputName" name="material_color">
                            </div>
                        </div>
                        <br> -->
                        {{-- 2 --}}
                        <div class="row">
                       
                            <div class="col">
                                <label for="length">@lang('lang.Length')</label>
                                <input required type="double" name="length" placeholder="Length" class="form-control">
                            </div>
                        </div>
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input required type="double" name="width" placeholder="width" class="form-control">
                            </div>
                            <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input  type="double" name="height" placeholder="height" class="form-control">
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select required name="product_type" class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Customied">@lang('lang.Customied')</option>
                                    <option value="Standard">@lang('lang.Standard')</option>
                                </select>
                            </div>
                            <!-- <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select  name="branding" class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Printing">@lang('lang.Printing')</option>
                                    <option value="Not-Printing">@lang('lang.Not-Printing')</option>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea required class="form-control" id="exampleTextarea" name="additional_text" rows="3"></textarea>
                            </div>
                        </div> -->
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only')  ( pdf, jpeg , png ) @lang('lang.files')</p>
                                <h5 class="card-title">@lang('lang.Files')</h5>
                                <div class="col-sm-12 col-md-12">
                                    <input required type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data" multiple>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- Category Section --}}
                        
                        <br>
                        {{-- 4 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input required type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="print_type">@lang('lang.Print Type')</label>
                                <select required name="print_type" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="Single Face">@lang('lang.Single Face')</option>
                                    <option value="Double Face">@lang('lang.Double Face')</option>
                                </select>
                            </div>
                        </div>
                        <br> -->
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="effets" class="control-label">@lang('lang.Effects')</label>
                                <select name="effects[]" multiple class="form-control">
                                    <option value="" selected disabled >...</option>
                                    <!-- <option value="Copper Foil">@lang('lang.Copper Foil')</option>
                                    <option value="Green Foil">@lang('lang.Green Foil')</option>
                                    <option value="Bronze Foil">@lang('lang.Bronze Foil')</option>
                                    <option value="Red Foil">@lang('lang.Red Foil')</option>
                                    <option value="Black Foil">@lang('lang.Black Foil')</option> -->
                                    <option value="SPOT_UV">@lang('lang.SPOT UV')</option>

                                </select>
                            </div>
                            
                            <!-- <div class="col">
                                <label for="uom" class="control-label">@lang('lang.UOM')</label>
                                <select required name="uom" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="KG">KG</option>
                                    <option value="Ream">Ream</option>
                                </select>
                            </div> -->
                            
                        </div>
                        <br>

                        <!-- <div class="row">
                            <div class="col">
                                <label for="capacity">@lang('lang.Capacity')</label></label>
                                <select required name="capacity" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="gm">gm</option>
                                </select>
                            </div>
                        </div> <br> -->
                        {{-- 6 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="single_board_height">@lang('lang.Single Board Width')</label>
                                <input required type="float" name="single_board_height" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="single_board_width">@lang('lang.Single Board Width')</label>
                                <input required type="float" name="single_board_width" placeholder="number" class="form-control">
                            </div>
                            
                        </div> -->
                        {{-- 7 --}}
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="solovan_layer">@lang('lang.Solovan Layer')</label>
                                <select required name="solovan_layer" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="Clear">@lang('lang.Clear')</option>
                                    <option value="Shining">@lang('lang.Shining')</option>
                                </select> 
                            </div>                            -->
                            <!-- <div class="col">
                                <label for="uv_layer">UV @lang('lang.Layer')</label>
                                <select  name="uv_layer" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="Yes">@lang('lang.Yes')</option>
                                    <option value="No">@lang('lang.No')</option>
                                </select> 
                            </div> -->
                            <!-- <div class="col">
                                <label for="coverage">@lang('lang.Coverage')</label>
                                <select required name="coverage" class="form-control">
                                    placeholder
                                    <option value="" selected disabled>...</option>
                                    <option value="Yes">@lang('lang.Yes')</option>
                                    <option value="No">@lang('lang.No')</option>
                                </select> 
                            </div> -->
                        <!-- </div> -->
                        {{-- 7 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label> <!--edit-->
                                <input required type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="glue_points_number">@lang('lang.Glue Points Count')</label>
                                <input required type="number" name="glue_points_number" placeholder="count" class="form-control">
                            </div> -->
                            
                        </div> <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="window_shape">@lang('lang.Window Shape')</label>
                                <input required type="text" name="window_shape" placeholder="shape" class="form-control">
                            </div>
                            <div class="col">
                                <label for="window_width">@lang('lang.Window Width')</label>
                                <input required type="float" name="window_width" placeholder="width" class="form-control">
                            </div>
                            
                        </div><br> -->
                        <!-- <div class="row">
                            <div class="col">
                                <label for="window_height">@lang('lang.Window Heigh')</label>
                                <input required type="float" name="window_height" placeholder="heighht" class="form-control">
                            </div>
                        </div> <br> -->
                        <!-- edit -->
                        <div class="row">
                            <div class="col">
                                <label for="model">@lang('lang.Model')</label>
                                <input required type="text" name="model" placeholder="model" class="form-control">
                            </div>
                        </div> <br>
                        <div class="col">
                                <label for="coverage">@lang('lang.Paper_Type')</label>
                                <select  name="paper_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="infercode">@lang('lang.infercode')</option>
                                    <option value="duplex">@lang('lang.duplex')</option>
                                    <option value="brown_kraft">@lang('lang.brown_kraft')</option>
                                    <option value="special_paper">@lang('lang.special_paper')</option>
                                    <option value="hard_cover">@lang('lang.hard_cover')</option>
                                </select> 
                        </div>
                        <div class="col">
                                <label for="lamination">@lang('lang.lamination')</label>
                                <select  name="lamination" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="matt_laminate_outer_layer">@lang('lang.matt_laminate_outer_layer')</option>
                                    <option value="glossy_laminate_outer_layer">@lang('lang.glossy_laminate_outer_layer')</option>
                                    <option value="matt_laminate_inner_layer">@lang('lang.matt_laminate_inner_layer')</option>
                                    <option value="glossy_laminate_inner_layer">@lang('lang.glossy_laminate_inner_layer')</option>
                                    <option value="matt_laminate_inner_&_outer_layer">@lang('lang.matt_laminate_inner_&_outer_layer')</option>
                                    <option value="glossy_laminate_inner_&_outer_layer">@lang('lang.glossy_laminate_inner_&_outer_layer')</option>
                                    <option value="inner_matt_&_outer_glossy_laminate">@lang('lang.inner_matt_&_outer_glossy_laminate')</option>
                                    <option value="inner_glossy_&_outer_matt_laminate">@lang('lang.inner_glossy_&_outer_matt_laminate')</option>

                                </select> 
                        </div>
                        <div class="col">
                                <label for="stamping">@lang('lang.stamping')</label>
                                <select  name="stamping" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="gold">@lang('lang.gold')</option>
                                    <option value="silver">@lang('lang.silver')</option>
                                    <option value="copper">@lang('lang.copper')</option>
                                    <option value="bronze">@lang('lang.bronze')</option>
                                </select> 
                        </div>
                        <div class="col">
                                <label for="printing">@lang('lang.Printing')</label>
                                <select  name="printing" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Single_Face">@lang('lang.Single_Face')</option>
                                    <option value="Double_Face">@lang('lang.Double_Face')</option>
                                </select> 
                        </div>
                        <div class="col">
                                <label for="printing_type">@lang('lang.printing_type')</label>
                                <select  name="printing_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Divider">@lang('lang.Divider')</option>
                                    <option value="No_divider">@lang('lang.No_divider')</option>
                                </select> 

                        </div>
                        <div class="col">
                                <label for="embossing">@lang('lang.embossing')</label>
                                <select  name="embossing" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Emboss">@lang('lang.Emboss')</option>
                                    <option value="Deboss">@lang('lang.Deboss')</option>
                                </select> 
                        </div>
                        <div class="col">
							<label for="description">@lang('lang.Description')</label>
							<textarea type="text" class="form-control" name="description" value=""></textarea>
						</div>
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