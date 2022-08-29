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
                    <form action="{{route('cartonbox.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$type}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input type="text" class="form-control" id="inputName" name="product_name" value="{{$product->product_name}}">
                            </div>
                            <div class="col">
                                <label for="print_colors">@lang('lang.Print Colors')</label>
                                <input  type="text" name="print_colors" placeholder="colors" class="form-control" value="{{$product->print_colors}}">
                            </div>
                        </div>
                        {{-- 2 --}}
            
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input  type="double" name="width" placeholder="width" class="form-control" value="{{$Carton_box->width}}">
                            </div>
                            <div class="col">
                                <label for="height">@lang('lang.height')</label>
                                <input  type="double" name="height" placeholder="height" class="form-control" value="{{$Carton_box->height}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select  name="product_type" class="form-control">
                                    <option value="" selected disabled>...</option>
                                    <option value="Customied">@lang('lang.Customied')</option>
                                    <option value="Standard">@lang('lang.Standard')</option>
                                </select>
                            </div>
                          
                        </div>
                        <br>
                       
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only') ( pdf, jpeg , png ) @lang('lang.files')</p>
                                <h5 class="card-title">@lang('lang.Files')</h5>
                                <div class="col-sm-12 col-md-12">
                                    <input required type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data" multiple>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- Category Section --}}
                        <br>
                       
                        
                        {{-- 6 --}}
                        {{-- 7 --}}
            

                        <div class="row">
                                <div class="col">
                                    <label for="Length" class="control-label">@lang('lang.Length')</label>
                                    <input  type="number" name="Length" placeholder="Length" class="form-control" value="{{$Carton_box->length}}">
                                </div>

                            <div class="col">
                                    <label for="material_type" class="control-label">PE @lang('lang.material_type')</label>
                                    <select required name="material_type" class="form-control">
                                        <!--placeholder-->
                                        <option value="{{$Carton_box->material_type}}" selected disabled>{{$Carton_box->material_type}}</option>
                                        <option value="f_flute">@lang('lang.f_flute')</option>
                                        <option value="e_flute">@lang('lang.e_flute')</option>
                                        <option value="b_flute">@lang('lang.b_flute')</option>
                                        <option value="c_flute">@lang('lang.c_flute')</option>
                                        <option value="f_flute_paper_Coated">@lang('lang.f_flute_paper_Coated')</option>
                                        <option value="e_flute_paper_Coated">@lang('lang.e_flute_paper_Coated')</option>
                                        <option value="b_flute_paper_Coated">@lang('lang.b_flute_paper_Coated')</option>
                                        <option value="c_flute_paper_Coated">@lang('lang.c_flute_paper_Coated')</option>
                                        <option value="f_flute_double_paper_coated">@lang('lang.f_flute_double_paper_coated')</option>
                                        <option value="e_flute_double_paper_coated">@lang('lang.e_flute_double_paper_coated')</option>
                                        <option value="b_flute_double_paper_coated">@lang('lang.b_flute_double_paper_coated')</option>
                                        <option value="c_flute_double_paper_coated">@lang('lang.c_flute_double_paper_coated')</option>


                                    </select>
                                </div>    
                        </div> <br>

                        <div class="row">
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
                                        <option value="{{$Carton_box->stamping}}" selected disabled>{{$Carton_box->stamping}}</option>
                                        <option value="gold">@lang('lang.gold')</option>
                                        <option value="silver">@lang('lang.silver')</option>
                                        <option value="copper">@lang('lang.copper')</option>
                                        <option value="bronze">@lang('lang.bronze')</option>
                                    </select> 
                            </div>
                        </div> <br>

                        <div class="row">
                   
                            <div class="col">
                                    <label for="printing_type">@lang('lang.printing_type')</label>
                                    <select  name="printing_type" class="form-control">
                                        <!--placeholder-->
                                        <option value="{{$Carton_box->printing_type}}" selected disabled>{{$Carton_box->printing_type}}</option>
                                        <option value="Divider">@lang('lang.Divider')</option>
                                        <option value="No_divider">@lang('lang.No_divider')</option>
                                    </select> 

                            </div>
                            <div class="col">
                                    <label for="embossing">@lang('lang.embossing')</label>
                                    <select  name="embossing" class="form-control">
                                        <!--placeholder-->
                                        <option value="{{$Carton_box->embossing}}" selected disabled>{{$Carton_box->embossing}}</option>
                                        <option value="Emboss">@lang('lang.Emboss')</option>
                                        <option value="Deboss">@lang('lang.Deboss')</option>
                                    </select> 
                            </div>
                            <div class="col">
                                <label for="description">@lang('lang.Description')</label>
                                <textarea type="text" class="form-control" name="description" value="{{$Carton_box->description}}">{{$Carton_box->description}}</textarea>
                            </div>
                        </div> <br>


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