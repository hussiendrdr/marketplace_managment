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
                    <h4 class="card-title mb-1">@lang('lang.Your ')</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 "></span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                            <th class="wd-lg-25p tx-right">@lang('lang.created_at')</th>
                                <th class="wd-lg-25p">@lang('lang.Margin')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Margin')%</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.LeadTime')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.days')</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.days') %</th>
                                <th class="wd-lg-25p tx-right">@lang('lang.Remaining Days') </th>
                                <th class="wd-lg-25p tx-right">@lang('lang.late days') </th>



                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($marginProccess as $item)
                        
                            <tr>
                            <td  class="tx-right tx-medium tx-inverse">{{$item->created_at}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->margin}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$item->marginPer}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$leadTime}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$days}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$daysPer}} %</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$remainingDays}}</td>
                                <td  class="tx-right tx-medium tx-inverse">{{$latelyDays}}</td>

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