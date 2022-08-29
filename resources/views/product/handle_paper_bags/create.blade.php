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
                < <h4 class="content-title mb-0 my-auto">@lang('lang.product') /{{ __('lang.' . $type) }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <form action="{{route('HandlePaperBag.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <input type="text" name="product_class" value="{{$type}}" class="form-control" hidden>
                            <div class="col">
                                <label for="product_name" class="control-label">@lang('lang.product') @lang('lang.Name')</label>
                                <input  type="text" class="form-control" id="inputName" name="product_name" placeholder="Product Name">
                            </div>
                            
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="print_colors">@lang('lang.Paper Color')</label>
                                <select required name="print_colors" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="White">@lang('lang.White')</option>
                                    <option value="Brown">@lang('lang.Brown')</option>
                                </select>
                            </div>
                        </div> <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="model" class="control-label">@lang('lang.Handle Model')</label>
                                <select  name="model" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Twisted Handle">@lang('lang.Twisted Handle')</option>
                                    <option value="Flat Handle">@lang('lang.Flat Handle')</option>
                                    <option value="Punched-Out Handle">@lang('lang.Punched-Out Handle')</option>
                                </select>
                            </div>
                            
                        </div>
                        {{-- 3 --}}
                        
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="additional_text">@lang('lang.Additional Text')</label>
                                <textarea class="form-control" id="exampleTextarea" name="additional_text" rows="3"></textarea>
                            </div>
                        </div>
                        {{-- 8 --}}
                        <div class="row">
                            <div class="col">
                                <p class="text-danger">@lang('lang.Upload Only') ( pdf, jpeg , png ) @lang('lang.files')</p>
                                <h5 class="card-title">@lang('lang.Files')</h5>
                                <div class="col-sm-12 col-md-12">
                                    <input  type="file" name="files[]" class="form-control" accept="file/*" enctype="multipart/form-data" multiple>
                                    {{-- <input  type="text" name="files" class="form-control"> --}}
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
                                <input type="text" class="form-control" id="inputName" name="material_color">
                            </div>
                        </div>
                        <br>
                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label for="quantity_per_item">@lang('lang.Quantity Per Item')</label>
                                <input  type="number" name="quantity_per_item" placeholder="quantity" class="form-control">
                            </div>
                            <div class="col">
                                <label for="quantity_per_tons">@lang('lang.Quantity Per Tons')</label>
                                <input  type="number" name="quantity_per_tons" placeholder="quantity" class="form-control">
                            </div>
                        </div>
                        <br>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col" id="effects">
                                
                                <label for="effects" class="control-label">@lang('lang.Effects')</label>
                                    
                                
                                <input type="text" name="effects[]" class="form-control" placeholder="effect">
                                
                            </div>
                            <div class="col">
                                <label for="print_type">@lang('lang.Print Type')</label>
                                <select  name="print_type" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Full">@lang('lang.Full')</option>
                                    <option value="Partial">@lang('lang.Partial')</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        {{-- 6 --}}
                        <div class="row">
                            <div class="col">
                                <label for="bag_width">@lang('lang.Bag Width')</label>
                                <input  type="float" name="bag_width" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="bag_height">@lang('lang.Bag Height')</label>
                                <input  type="float" name="bag_height" placeholder="number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="gusset_width">@lang('lang.Gusset Width')</label>
                                <input  type="float" name="gusset_width" placeholder="number" class="form-control">
                            </div>
                        </div>
                        {{-- 7 --}}
                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label for="paper_thickness">@lang('lang.Paper Thickness')</label>
                                <input  type="float" name="paper_thickness" placeholder="thickness" class="form-control">
                            </div>
                        
                        </div> <br>

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
    <style>
        .multiselect {
            width: 200px;
            /* position: relative; */
            }
            select {
            position: relative;
            }
    
            /* select::after {
            content: "example ";
            position: absolute;
            width: 10px;
            height: 5px;
            font-size: 10px;
            background-color: #fff;
            top: 5px;
            left: 6px;
            } */
            .selectBox {
            position: relative;
            }
            .selectBox::after {
            content: "example ";
            position: absolute;
            width: 35px;
            height: 10px;
            font-size: 10px;
            background-color: #fff;
            top: -6px;
            left: 6px;
            z-index: 1;
            }
            .selectBox select {
            width: 100%;
            font-weight: bold;
            border: 1px solid red;
            }
    
            .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            }
    
            #checkboxes {
            display: none;
            border: 1px #dadada solid;
            position: relative;
            }
    
            #checkboxes label {
            display: inline-block;
            }
    
            #checkboxes label:hover {
            background-color: #1e90ff;
            }
            input[type="checkbox"]:checked + label {
            color: #f00;
            font-style: normal;
            }
            /* #checkboxes input:checked  label {
            background-color: red;
            } */
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
        {{-- <script>
            const showCheckboxes = () => {
            const checkboxes = document.getElementById("checkboxes");
            checkboxes.style.display === "block"
                ? (checkboxes.style.display = "none")
                : (checkboxes.style.display = "block");
            };
            const showSelected = document.getElementById("showSelected");
            const selected = [];
        
            const writeInOption = (e) => {
            if (e.target.checked === true) {
                selected.push(e.target.value);
                console.log("trueeee", selected);
            } else {
                selected.pop(e.target.value);
                console.log("false", selected);
            }
            selected.length === 0
                ? (showSelected.innerHTML = "select an option")
                : (showSelected.innerHTML = selected.join(" "));
            };
        </script> --}}
@endsection