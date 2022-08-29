@extends('layouts.master')
<title>Home</title>
<style>

	.total-revenue{
		justify-content: center;
        align-items: center;
		width:100%;
		margin-top:.5rem;
	}
	.row_1 .col_1 .bg_1{background-image: linear-gradient(to left, #0db2de 0%, #005bea 100%) !important;}
	.row_1 .col_2 .bg_2{background-image: linear-gradient(to left, #0db2de 0%, #13d4de 100%) !important;}
	.row_1 .col_3 .bg_3{background-image: linear-gradient(to left, #3fe121 0%, #a3ea8a 100%) !important;}
	.row_1 .col_4 .bg_4{ background-image: linear-gradient(to left, #e5df10 0%, #eef776 100%) !important;}

	.row_2 .col_1 .bg_1{background-image: linear-gradient(to left, #e13266 0%, #cf88b3 100%) !important; height: 115px;}
	.row_2 .col_2 .bg_2{background-image: linear-gradient(to left, #de211c 0%, #ea776f 100%) !important;height: 115px;}
	.row_2 .col_3 .bg_3{background-image: linear-gradient(to left, #ab47bc 0%, #ba68c882 100%) !important; height: 115px;}
	.row_2 .col_4 .bg_4{background-image: linear-gradient(to left, #f57c00 0%, #ff980087 100%) !important;height: 115px;}





</style>

@if (Session::get('locale')== "ar")
	        	<style>
					  .header-text{ text-align: right;}
					span.float-right{
						margin-right: 91%;
					}

				</style>
		@else
	        	<style>
                    .header-text{ text-align: left;}
					span.float-right{
						/* margin-left: 89%; */
						display: none;
					}

				</style>
		@endif

@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
							<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">@lang('lang.Hi, welcome back!')</h2> <br>
							<a href="{{ route('add.create') }}">@lang('lang.Register A New Admin')</a>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm row_1">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_1">
						<div class="card overflow-hidden sales-card bg_1">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.Products') @lang('lang.Pending')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"> {{$prouductPending[0]->count}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_2">
						<div class="card overflow-hidden sales-card bg_2">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.Products success')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$prouductSuccess[0]->count}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_3">
						<div class="card overflow-hidden sales-card bg_3">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.Total CoGS') </h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">${{$earn[0]->pp}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_4">
						<div class="card overflow-hidden sales-card bg_4">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.Total Revenues')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">${{$earn[0]->sp}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>


				</div>
				<!-- row closed -->


								<!-- row -->
				<div class="row row-sm row_2">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_1">
						<div class="card overflow-hidden sales-card bg_1">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.Products Failed')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$prouductFailed[0]->count}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_2">
						<div class="card overflow-hidden sales-card bg_2">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.current users')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$currentUsers[0]->count}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_3">
						<div class="card overflow-hidden sales-card bg_3">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.numberOfSuppliers') </h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$numberOfSuppliers[0]->count}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 col_4">
						<div class="card overflow-hidden sales-card bg_4">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="header-text">
									<h6 class="mb-3 tx-12 text-white">@lang('lang.NumberOfProuductSaleing')</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$NumberOfProuductSaleing[0]->qty}}</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>

				<!-- row opened -->
				<!-- <div class="row row-sm">
					<div class="col-md-12 col-lg-12 col-xl-12">
						<div class="card marginUser">
							<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-0">@lang('lang.Orderstatus')</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-0">@lang('lang.Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number')</p>
							</div>
							<div class="card-body1">

								<div class="chart1">
									<canvas id="canvas" height="150" width="600"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- row closed -->

				<!-- row opened edit -->

				<div class="row row-sm">

					<div class="col-md-12 col-lg-8 col-xl-12">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">@lang('lang.Your Most Recent Earnings')</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">@lang('lang.most').</span>
							<div class="table-responsive">
								<table id="example1" class="table text-md-nowrap">
									<thead>
										<tr>
											<th class="border-bottom-0">@lang('lang.Date')</th>
											<th class="border-bottom-0">@lang('lang.Margin')</th>
											<th class="border-bottom-0">@lang('lang.Margin') %</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($marginPer as $mPer )
											<tr>
												<td>{{$mPer->created_at}}</td>
												<td>{{$mPer->margin}}</td>
												<td>{{$mPer->marginPer}}%</td>
											</tr>
										@endforeach


									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- /row -->

				<div class="row row-sm">

					<div class="col-md-12 col-lg-8 col-xl-12">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">@lang('lang.Your Most Recent Earnings')</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">@lang('lang.Your Most Recent ').</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
										    <th class="wd-lg-25p">@lang('lang.User ID')</th>
											<th class="wd-lg-25p">@lang('lang.Margin Share')</th>
											<th class="wd-lg-25p tx-right">@lang('lang.Margin')</th>
											<th class="wd-lg-25p tx-right">@lang('lang.Margin') %</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($marginUserProduct as $mPer )
											<tr>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->customer_id}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->marginshare}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->margin}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->marginPer}}</td>
											</tr>
										@endforeach


									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

						<!-- /row -->


				<div class="row row-sm">

					<div class="col-md-12 col-lg-8 col-xl-12">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">@lang('lang.Products Condition')</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
										    <th class="wd-lg-25p">@lang('lang.User ID')</th>
											<th class="wd-lg-25p">@lang('lang.suppliers_id')</th>
											<th class="wd-lg-25p tx-right">@lang('lang.product Name')</th>
											<th class="wd-lg-25p tx-right">@lang('lang.Status') </th>
											<th class="wd-lg-25p tx-right">@lang('lang.created_at') </th>
											<th class="wd-lg-25p tx-right">@lang('lang.LeadTime') </th>

										</tr>
									</thead>
									<tbody>
										@foreach ($productStatus as $mPer )
											<tr>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->customer_id}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->supplier_id}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->product_name}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->approved_customer_quotation}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->created_at}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$mPer->LeadTime}} @lang('lang.day')</td>

											</tr>
										@endforeach


									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>


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




<script>
	  var url = "{{url('marginUser/chart')}}";
        var Name = new Array();
        var Margin = new Array();
        // var Prices = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Name.push(data.customer_id);
                Margin.push(data.margin);
                // Prices.push(data.stockPrice);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:Name,
                      datasets: [{
                          label: 'Users TotalMargin =>  X:customer_id  and Y:margin ',
                        //   data: [0.29, 0.18, 0.53, 0.55, 0.32, 0.13],
						data:Margin,
						backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
					'rgba(153, 102, 255, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    // 'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
					'rgba(153, 102, 255,1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true,
								//   maxTicksLimit:0.1,
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>
@endsection
