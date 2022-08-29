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
@endsection
@section('content')
<div class="row row-sm">
    <!--Products Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Project Table')</h4>

                    <i class="mdi mdi-dots-horizontal text-gray"></i>

                    <div class="row">
                        <form action="{{route('projectCreate')}}" method="post">
                            @csrf
                            <select name="customer_id" class="form-control SlectBox">
                                @foreach ($customers as $item)
                                    <option value="{{$item->id}}">{{$item->customer_organization_name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="modal-effect btn btn-primary btn-block" data-effect="effect-flip-vertical" data-toggle="modal" href="#modaldemo8">@lang('lang.Add New Project')</button>
                        </form>
                    </div>

                </div>
            </div>

            <a class="card-header" href="{{ route('search') }}"> <button class="btn btn-primary">@lang('lang.Total Margin')</button></a>

            <a href="{{route('projectStatistics')}}">
		        <button class="btn btn-primary btn-sm" style="margin: 5px">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                    </svg>
                </button>
			</a>
            
            {{-- paper cup --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">@lang('lang.Project Reference')</th>
                                <th class="wd-15p border-bottom-0">@lang('lang.Customer Organization Name')</th>
                                <th class="wd-15p border-bottom-0">@lang('lang.Email')</th>
                                <th class="wd-15p border-bottom-0">@lang('lang.action')</th>
                            </tr>
                        </thead>
                            
                                <tbody>

                                    @foreach ($projects as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->customer_organization_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>                 
                                        <div class="row">
                                            <!-- the delete function -->
                                            <form action="project/{{$item->id}}" method="POST">
                                                @csrf
                                                @method("delete")
                                            <button class="btn btn-sm btn-danger" title="Delete" style="margin: 5px"><i class="las la-trash"></i></button>
                                            </form>
    
                                            <a href="{{route('processIndex',$item->id)}}">
                                                <button class="btn btn-primary btn-sm" style="margin: 5px"><i class="las la-eye"></i></button>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

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