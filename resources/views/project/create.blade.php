@extends('layouts.master')
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
@endsection
@section('title')
    اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Projects')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lang.Add a new one')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

    @php
        $customers = App\Models\Customers::all();
        $suppliers = App\Models\Supplier::all();
        $products = App\Models\Product::all();
    @endphp

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('process.store') }}" method="POST">
                        @csrf
                        {{-- 1 --}}

                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">@lang('lang.customer name')</label>
                                <select name="customer_id" class="form-control">
                                    <!--placeholder-->
                                    <option value="#" selected disabled> @lang('lang.select') </option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_organization_name }}</option>
                                    @endforeach
									
                                </select>
                            </div>
                        </div> <br> 
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">@lang('lang.customer comments')</label>
                                <textarea class="form-control" id="exampleTextarea" name="customer_comments" rows="3"></textarea>
                            </div>
                        </div><br>

                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                                
                                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-md-t-0">
                                    <a class="btn btn-outline-primary btn-block" href="{{ route('process.create') }}">@lang('lang.Add a new process')</a>
                                </div>

                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div> <br> <br>

                        
                        
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">@lang('lang.ID')</th>
                                            <th class="wd-15p border-bottom-0">@lang('lang.supplier name')</th>
                                            <th class="wd-15p border-bottom-0">@lang('lang.Products')</th>
                                            <th class="wd-15p border-bottom-0">@lang('lang.functions')</th>
                                            <th class="wd-15p border-bottom-0">@lang('lang.functions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $process = App\Models\Project::all();
                                        @endphp

                                        @foreach ($process as $proces)

                                            @php
                                                $cust = App\Models\Customers::find($proces->customer_id);
                                                $sup = App\Models\Supplier::find($proces->supplier_id);
                                                $prod = App\Models\Product::find($proces->product_id);

                                            @endphp
                                                
                                            <tr>
                                                <td>{{ $proces->id}}</td>
                                                <td> # </td>
                                                <td> # </td>
                                                                                                
                                                <td>
                                                <div class="row">
                                                    <!-- the edit function -->
                                                    <a href="process/{{$proces->id}}/edit" class="btn btn-sm btn-info" title="Edit" style="margin-left: 2px;"> <i class="las la-pen"></i></a>
                                                    
                                                    <!-- the delete function -->
                                                    <form action="project/{{$proces->id}}" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="btn btn-sm btn-danger" title="Delete"><i class="las la-trash"></i></button>
                                                    </form>
                                                

                                                </td>
                                                    <td><a  href="{{route('proccessStatistics',$proces->id)}}"><button class="btn btn-sm btn-info">@lang('lang.view')</button></a></td>
                                                </div>
                                            </tr>	
                                        
                                        @endforeach						
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">@lang('lang.Create')</button>
                        </div>
        </form>             
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

   



@endsection