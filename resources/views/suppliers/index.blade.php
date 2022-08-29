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
					}
                    div.dataTables_wrapper div.dataTables_filter input
                    {
                        margin-left: 21.5em;
                    }
                    div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:last-child{
                        display: flex;
                        justify-content: flex-end;
                        
                    }
                    div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:first-child
                    {
                        display: flex;
                        justify-content: flex-start;
                    }
				
					
				</style>
		@endif

@endsection
@section('content')
<div class="row row-sm prod">
 
    <!--Suppliers Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Suppliers Table')</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                    <a href="{{route('supplier.create')}}">
                        <button class="modal-effect btn btn-primary btn-block" data-effect="effect-flip-vertical" data-toggle="modal" href="#modaldemo8">@lang('lang.Add New Supplier ')</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">@lang('lang.Supplier Reference')</th>
                                <th class="border-bottom-0">@lang('lang.Supplier Organization Name')</th>
                                <th class="border-bottom-0">@lang('lang.Supplier Contact Name')</th>
                                <th class="border-bottom-0">@lang('lang.Supplier Email')</th>
                                <th class="border-bottom-0">@lang('lang.Supplier Contact Number')</th>
                                <th class="border-bottom-0">@lang('lang.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->supplier_organization_name}}</td>
                                    <td>{{$item->supplier_contact_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->supplier_contact_number}}</td>
                                    <td>
                                        <a href="{{route('supplier.show',$item->id)}}">
                                            <button class="btn btn-primary"><i class="las la-eye"></i></button>
                                        </a>
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
<script>
    $(document).ready(function(){        
        $('.dynamic').change(function(){
            if($(this).val() != ''){
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('project.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result){
                        $('#'+dependent).html(result);
                    }
                })
            }
        });

        $('#country').change(function(){
            $('#state').val('');
            $('#city').val('');
        });

        $('#state').change(function(){
            $('#city').val('');
        });
    });
    </script>
@endsection