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
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between prod">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('lang.Tables')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('lang.Data Tables')</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm prod">
			
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between row">
									<h4 class="card-title mg-b-0"> @lang('lang.This Project Belongs To')[ {{$project->customer_organization_name}} ]</h4>
									
									<form action="{{route('createProcess')}}" method="post">
										@csrf
										<input hidden type="text" name="project_id" value="{{$project->id}}">
										<button type="submit" class="btn btn-primary">@lang('lang.Add a new procces')</button>
									</form>


									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">@lang('lang.ID')</th>
												<th class="wd-15p border-bottom-0">@lang('lang.Supplier Organization Name')</th>
												<th class="wd-15p border-bottom-0">@lang('lang.product Name')</th>
												<th class="wd-15p border-bottom-0">@lang('lang.Margin')%</th>
												<th class="wd-15p border-bottom-0">@lang('lang.Margin')</th>
												<th class="wd-15p border-bottom-0">@lang('lang.action')</th>
											</tr>
										</thead>
											
												<tbody>

													@foreach ($processes as $process)
													@php
														$supplier=\App\Models\Supplier::find($process->supplier_id);
														$product=\App\Models\Product::find($process->product_id);
                                                        $mar = $process->sp-$process->pp;
                                                        $marg = $mar/$process->pp*100;
													@endphp
													<tr>
														<td>{{$process->id}}</td>
														<td>{{$supplier->supplier_organization_name}}</td>
														<td>{{$product->product_name}}</td>
														<td>{{round($marg,2)}}%</td>
														<td>{{round(($process->qty*$process->sp)-($process->qty*$process->pp),4)}}</td>
														<td class="row">
															<form action="{{route('process.destroy',$process->id)}}" method="POST">
																@csrf
																@method("delete")
															<button class="btn btn-sm btn-danger" title="Delete" style="margin: 5px"><i class="las la-trash"></i></button>
															</form>
															<a href="{{route('process.edit',$process->id)}}">
															<button class="btn btn-primary btn-sm" style="margin: 5px"><i class="las la-eye"></i></button>
															</a>

															<a href="{{route('proccessStatistics',$process->id)}}">
															<button class="btn btn-primary btn-sm" style="margin: 5px">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
</svg></button>
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
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection