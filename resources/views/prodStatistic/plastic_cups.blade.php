@extends('layouts.master3')

<title>Data tables</title>
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
@section('content')

    <div class="row row-sm mg-t-25 prod">
					
        <div class="col-md-12 col-lg-8 col-xl-12">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 "></span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                            <th class="wd-lg-25p tx-right">@lang('lang.ID')</th>
                                <th class="wd-lg-25p">@lang('lang.Width')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Length')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Height')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Quantity Per Item')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Material Type') </th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Material Colors') </th>



                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($PlasticCup as $item)
                        
                        <tr>
                            <td  class="tx-right tx-medium tx-inverse">{{$item->id}}</td>
                            <td  class="tx-right tx-medium tx-inverse">{{$item->width}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->length}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->height}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->quantity_per_item}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->material_type}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->material_color}} </td>
                            </tr>
                        @endforeach
                               

                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}">//pdfff her</script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection