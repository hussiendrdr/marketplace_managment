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
                    <form action="{{route('PaperWrap.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        {{dd($product->product_name)}}
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <p> ali saleh </p> <br>
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
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
                                <select name="model" class="form-control">
                                    placeholder
                                    <option value="Comes in Sheets" {{$product->product_department =="Comes in Sheets" ? 'selected' : ''}}>Comes in Sheets</option>
                                </select>
                            </div>
                            
                            
                        </div> -->
                        {{-- 3 --}}
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input value="{{$paperWrap->width}}" type="double" name="width" placeholder="width" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input value="{{$paperWrap->height}}" type="double" name="height" placeholder="height" class="form-control">
                            </div> -->
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
                                    <option value="Not-Printing" {{$product->product_type =="Not-Printing" ? 'selected' : ''}}>@lang('lang.Not-Printing')</option>
                                </select>
                            </div> -->
                        </div>
                        <br>
                        <!-- <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea class="form-control" id="exampleTextarea" name="additional_text" rows="3">{{$paperWrap->additional_text}}</textarea>
                            </div>
                        </div> -->
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
                        <!-- <div class="row">
                            <div class="col">
                                <label for="material_type" class="control-label">@lang('lang.Material Type')</label>
                                <input type="text" value="{{$paperWrap->material_type}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$paperWrap->material_color}}" name="material_color" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div>
                        <br> -->
                        {{-- 4 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity')</label>
                                <input value="{{$paperWrap->quantity_per_item}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="item_weight">@lang('lang.Item Weight')</label>
                                <input value="{{$paperWrap->item_weight}}" type="number" name="item_weight" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div>
                        <br>
                         -->
                        {{-- 6 --}}
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label>
                                <input value="{{$paperWrap->paper_thickness}}" type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="pe_layer" class="control-label">PE @lang('lang.Layer')</label>
                                <select name="pe_layer" class="form-control">
                                    placeholder
                                    <option value="Yes" {{$paperWrap->material_color =="Yes" ? 'selected' : ''}}>@lang('lang.yes')</option>
                                    <option value="No" {{$paperWrap->material_color =="No" ? 'selected' : ''}}>@lang('lang.No')</option>
                                </select>
                            </div> -->
                            <!-- <div class="col">
                                <label for="merged_layer_thickness" class="control-label">@lang('lang.Merged Layer Thickness')</label>
                                <input value="{{$paperWrap->merged_layer_thickness}}" type="float" name="merged_layer_thickness" placeholder="thickness" class="form-control">
                            </div> -->
                            
                        </div>

                        <!-- edit -->
                        <div class="row">
                            <div class="col">
                                <label for="Length" class="control-label">@lang('lang.Length')</label>
                                <input required value="{{$paperWrap->Length}}"  type="number" name="Length" placeholder="Length" class="form-control">
                            </div>
                        </div> <br>

                        <div class="col">
                                <label for="Paper_Type" class="control-label">PE @lang('lang.Paper_Type')</label>
                                <select required name="Paper_Type" class="form-control">
                                    <!--placeholder-->
                                    <!-- <option value="" selected disabled>...</option> -->
                                    <option value="White" {{$paperWrap->White =="White" ? 'selected' : ''}}>@lang('lang.White')</option>
                                    <option value="brown" {{$paperWrap->brown =="brown" ? 'selected' : ''}}>@lang('lang.brown')</option>
                                    <option value="MG" {{$paperWrap->MG =="MG" ? 'selected' : ''}}>@lang('lang.MG')</option>
                                    <option value="Glassine" {{$paperWrap->Glassine =="Glassine" ? 'selected' : ''}}>@lang('lang.Glassine')</option>
                                    <option value="Wax" {{$paperWrap->Wax =="Wax" ? 'selected' : ''}}>@lang('lang.Wax')</option>
                                    <option value="PE_Coated" {{$paperWrap->PE_Coated =="PE_Coated" ? 'selected' : ''}}>@lang('lang.PE_Coated')</option>

                                </select>
                            </div>    

                            <div class="row">
                            <div class="col">
                                <label for="Coating_Thickness" class="control-label">@lang('lang.Coating_Thickness')</label>
                                <input required value="{{$paperWrap->Coating_Thickness}}"  type="number" name="Coating_Thickness" placeholder="Coating Thickness Mic" class="form-control">
                            </div>
                        </div> <br>


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