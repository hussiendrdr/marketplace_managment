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
                    <form action="{{route('PlasticBag.update',$product->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$product->product_class}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.Product Name')</label>
                                <input value="{{$product->print_colors}}" type="text" class="form-control" id="inputName" name="product_name">
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
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Model')</label>
                                <select  name="model" class="form-control">
                                    <!--placeholder-->
                                    <option value="T-Shirt" {{$product->model =="T-Shirt" ? 'selected' : ''}}>T-Shirt</option>
                                    <option value="Punched-Out" {{$product->model =="Punched-Out" ? 'selected' : ''}}>Punched-Out</option>
                                    <option value="With Handle" {{$product->model =="With Handle" ? 'selected' : ''}}>With Handle</option>
                                    <option value="Without Handle" {{$product->model =="Without Handle" ? 'selected' : ''}}>Without Handle</option>
                                    
                                </select>
                            </div>
                            <!-- <div class="col">
                                <label for="bag_thickness">@lang('lang.Bag Thickness')</label>
                                <input value="{{$plasticBag->bag_thickness}}" type="float" name="bag_thickness" placeholder="thickness" class="form-control">
                            </div> -->
                            
                        </div>
                        {{-- 3 --}}
                        
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="product_type" class="control-label">@lang('lang.Product Type')</label>
                                <select  name="product_type" class="form-control">
                                    <option value="Customied" {{$product->product_type =="Customied" ? 'selected' : ''}}>Customied</option>
                                    <option value="Standard" {{$product->product_type =="Standard" ? 'selected' : ''}}>Standard</option>
                                </select>
                            </div>
                            <!-- <div class="col">
                                <label for="branding" class="control-label">@lang('lang.Branding')</label>
                                <select  name="branding" class="form-control">
                                    <option value="Printing" {{$product->branding =="Printing" ? 'selected' : ''}}>Printing</option>
                                    <option value="Not-Printing" {{$product->branding =="Not-Printing" ? 'selected' : ''}}>Not-Printing</option>
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
                                <input type="text" value="{{$plasticBag->material_type}}" name="material_type" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>
                                <input type="text" value="{{$plasticBag->material_color}}" name="material_color" placeholder="quantity" class="form-control">
                            </div>
                            
                            <div class="col">
                                <label for="base_type" class="control-label">Base Type</label>
                                <select  name="base_type" class="form-control">
                                    placeholder
                                    <option value="Base" {{$plasticBag->base_type =="Base" ? 'selected' : ''}}>Base</option>
                                    <option value="No Base" {{$plasticBag->base_type =="No Base" ? 'selected' : ''}}>No Base</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <br> -->
                        {{-- 4 --}}
                        <!-- <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity Per Item')</label>
                                <input value="{{$plasticBag->quantity_per_item}}" type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="quantity_per_tons">@lang('lang.Quantity Per Tons')</label>
                                <input value="{{$plasticBag->quantity_per_tons}}" type="number" name="quantity_per_tons" placeholder="quantity" class="form-control">
                            </div>
                            
                        </div> -->
                        
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="width">@lang('lang.Width')</label>
                                <input value="{{$plasticBag->width}}" type="float" name="width" placeholder="number" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="height">@lang('lang.Height')</label>
                                <input value="{{$plasticBag->height}}" type="float" name="height" placeholder="number" class="form-control">
                            </div> -->
                            <div class="col">
                                <label for="length">@lang('lang.Length')</label>
                                <input value="{{$plasticBag->length}}" type="float" name="length" placeholder="number" class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="weight">@lang('lang.ًWeight')</label>
                                <input value="{{$plasticBag->weight}}" type="float" name="weight" placeholder="number" class="form-control">
                            </div> -->
                            
                        </div>
                        {{-- 7 --}}
                        <br>
                        <!-- edit -->
                        
                        <div class="row">
                           <div class="col">
                                <label for="Gusset_Width">@lang('lang.Gusset Width')</label>
                                <input required value="{{$plasticBag->Gusset_Width}}" type="float" name="Gusset_Width" placeholder="number" class="form-control">
                            </div>

                            <div class="col">
                                <label for="Plastic_Type">@lang('lang.Plastic_Type')</label>
                                <select  required name="Plastic_Type" class="form-control">
                                    <!--placeholder-->
                                    <!-- <option value="" selected disabled>...</option> -->
                                    <option value="HDPE_out" {{$product->HDPE_out =="HDPE_out" ? 'selected' : ''}}>@lang('lang.HDPE_out')</option>
                                    <option value="LDPE" {{$product->LDPE =="LDPE" ? 'selected' : ''}}>@lang('lang.LDPE')</option>
                                </select> 
                        </div>
 
                         <div class="col">
                                <label for="Plastic_Thickness">@lang('lang.Plastic Thickness')</label>
                                <input  required  value="{{$plasticBag->Plastic_Thickness}}" type="float" name="Plastic_Thickness" placeholder="number" class="form-control">
                            </div>

                            <div class="col">
                                <label for="Bag_Weight">@lang('lang.Bag Weight')</label>
                                <input required  value="{{$plasticBag->Bag_Weight}}"  type="number" name="Bag_Weight" placeholder="number" class="form-control">
                            </div>

                            <div class="col">
                                <label for="Qty_per_Kg">@lang('lang.Qty_per_Kg')</label>
                                <input required  value="{{$plasticBag->Qty_per_Kg}}"  type="number" name="Qty_per_Kg" placeholder="number" class="form-control">
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