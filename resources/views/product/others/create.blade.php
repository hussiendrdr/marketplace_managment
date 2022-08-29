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
    .prod {

        direction: rtl;

    }
</style>

@else

<style>
    .prod {

        direction: ltr;

        text-align: left;

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

            <h4 class="content-title mb-0 my-auto">@lang('lang.product') / {{ __('lang.' .  $type) }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

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

                <form action="{{route('Other.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    {{-- 1 --}}

                    <div class="row">

                        <input type="text" name="product_class" value="{{$type}}" class="form-control" hidden>

                        <div class="col">

                            <label for="product_name" class="control-label">@lang('lang.Product Name')</label>

                            <input type="text" class="form-control" id="inputName" name="product_name">

                        </div>

                        <div class="col">

                            <label for="print_colors">@lang('lang.Print Colors')</label>

                            <input type="text" name="print_colors" placeholder="colors" class="form-control">

                        </div>

                    </div>

                    <br>

                    {{-- 2 --}}

                    <div class="row">

                        <div class="col"><label for="design_service" class="control-label">@lang('lang.Design Service')</label>

                            <input type="text" class="form-control" id="inputName" name="design_service">

                        </div>

                        <div class="col">

                            <label for="logistics_service" class="control-label">@lang('lang.Logistics Service')</label>

                            <input type="text" class="form-control" id="inputName" name="logistics_service">

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

                                <option value="" selected disabled>...</option>

                                <option value="Flat Sheet">Flat Sheet</option>

                                <option value="With Handle & Base">With Handle & Base</option>

                            </select>

                            @break

                            @case('paper_sleeve')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Folded for Container">Folded for Container</option>

                            </select>

                            @break

                            @case('cartoon_sleeve')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="ٌRounded for Cup">Rounded for Cup</option>

                            </select>

                            @break

                            @case('plastic_container')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="ٌRounded">Rounded</option>

                            </select>

                            @break

                            @case('plastic_culteries')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="ٌ(Spoon+Fork+Knife) Set">(Spoon+Fork+Knife) Set</option>

                            </select>

                            @break

                            @case('wooden_culterries')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="(Spoon+Fork) Set">(Spoon+Fork) Set</option>

                            </select>

                            @break

                            @case('plastic_lid')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="FLat for Paper Bowls">FLat for Paper Bowls</option>

                                <option value="FLat for Plastic Cups">FLat for Plastic Cups</option>

                                <option value="Dome for Plastic Cups">Dome for Plastic Cups</option>

                                <option value="Sip for Paper Cups">Sip for Paper Cups</option>

                            </select>

                            @break

                            @case('paper_lid')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="FLat for Paper Bowls">FLat for Paper Bowls</option>

                            </select>

                            @break

                            @case('paper_plate')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Boat Tray">Boat Tray</option>

                            </select>

                            @break

                            @case('plastic_plate')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Rounded Tray">Rounded Tray</option>

                            </select>

                            @break

                            @case('plastic_sticker')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="FLat for Paper Bowls">FLat for Paper Bowls</option>

                            </select>

                            @break

                            @case('paper_sticker')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Comes in Sheets">Comes in Sheets</option>

                            </select>

                            @break

                            @case('printing_cliché')

                            <select name="model" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Paper Cup Printing Cliché">Paper Cup Printing Cliché</option>

                                <option value="Paper Bag Printing Cliché">Paper Bag Printing Cliché"</option>

                                <option value="Plastic Cup Printing Cliché">Plastic Cup Printing Cliché</option>

                                <option value="Plastic Bag Printing Cliché">Plastic Bag Printing Cliché</option>

                                <option value="Paper Napkin Printing Cliché">Paper Napkin Printing Cliché</option>

                                <option value="Wet Wipes Printing Cliché">Wet Wipes Printing Cliché</option>

                            </select>

                            @break

                            <!-- @case('wet_wipes')

                                        <select name="model" class="form-control">

                                            <option value="" selected disabled>...</option>

                                            <option value="Comes in Saches">Comes in Saches</option>

                                        </select>

                                    @break -->

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

                            <input type="float" name="width" placeholder="width" class="form-control">

                        </div>

                        <div class="col">

                            <label for="height">@lang('lang.Height')</label>

                            <input type="float" name="height" placeholder="height" class="form-control">

                        </div>

                        <div class="col">

                            <label for="length">@lang('lang.Length')</label>

                            <input type="float" name="length" placeholder="length" class="form-control">

                        </div>

                    </div>

                    <br>

                    <div class="row">

                        <div class="col">

                            <label for="product_type" class="control-label">@lang('lang.Product Type')</label>

                            <select name="product_type" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Customied">@lang('lang.Customied')</option>

                                <option value="Standard">@lang('lang.Standard')</option>

                            </select>

                        </div>

                        <div class="col">

                            <label for="branding" class="control-label">@lang('lang.Branding')</label>

                            <select name="branding" class="form-control">

                                <option value="" selected disabled>...</option>

                                <option value="Printing">@lang('lang.Printing')</option>

                                <option value="Not-Printing">@lang('lang.Not-Printing')</option>

                            </select>

                        </div>

                    </div>

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

                            <input type="text" class="form-control" id="inputName" name="material_type">

                        </div>

                        <div class="col">

                            <label for="material_color" class="control-label">@lang('lang.Material Colors')</label>

                            <input type="text" class="form-control" id="inputName" name="material_color">

                        </div>

                    </div>

                    <br>

                    {{-- 4 --}}

                    <div class="row">

                        <div class="col">

                            <label for="quantity">@lang('lang.Quantity')</label>

                            <input type="float" name="quantity" placeholder="quantity" class="form-control">

                        </div>

                    </div>

                    <br>

                    {{-- 7 --}}

                    <div class="row">

                        <div class="col">

                            <label for="thickness">@lang('lang.Thickness')</label>

                            <input type="float" name="thickness" placeholder="thickness" class="form-control">

                        </div>

                        <div class="col">

                            <label for="diameter">@lang('lang.Diameter')</label>

                            <input type="float" name="diameter" placeholder="thickness" class="form-control">

                        </div>



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
