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
<div class="row row-sm prod">
    <!--Products Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Products Table')</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                    <div class="col-4">
                        <form action="{{route('product.create2')}}" method="post">
                            @csrf
                            <div class="row">
                                <select name="type" class="form-control SlectBox">
                                    <option value="">@lang('lang.Choose Product Class')</option>
                                    <option value="paper_boxes">@lang('lang.Paper Box')</option>
                                    
                                    <option value="paper_cups">@lang('lang.Paper cup')</option>
                                    <option value="others.paper_lid">@lang('lang.Paper Cup Lid')</option>
                                    <option value="plastic_cups">@lang('lang.Plastic Cup')</option>
                                    <option value="others.plastic_lid">@lang('lang.Plastic Cup Lid')</option>
                                    <option value="handle_paper_bags">@lang('lang.Handle Paper Bag')</option>
                                    <option value="sos_without_handle_bags">@lang('lang.Handleless Paper Bag')</option>
                                    <option value="paper_wraps">@lang('lang.Paper Wrap')</option>
                                    <option value="paper_nabkins">@lang('lang.Paper Knabkins')</option>
                                    
                                    
                                    
                                    <option value="plastic_bags">@lang('lang.Plastic Bag')</option>
                                    <option value="sachel_bag">@lang('lang.Sachel Bags')</option>
                                    <!-- <option value="corrugated_boxes">@lang('lang.corrugated Box')</option> -->
                                    <option value="Wet_Wipes">@lang('lang.Wet Wipes')</option>
                                    <option value="Carton_box">@lang('lang.Carton_box')</option>


                                    {{-- others section --}}
                                    <option value="others.paper_plate">@lang('lang.Paper Plate')</option>
                                    <option value="others.platic_plate">@lang('lang.Plastic Plate')</option>
                                    <option value="others.cup_holder_plate">@lang('lang.Cup Holder Plate')</option>
                                    <option value="others.paper_sleeve">@lang('lang.Paper Sleeve')</option>
                                    <option value="others.cartoon_sleeve">@lang('lang.Cartoon Sleeve')</option>
                                    <option value="others.plastic_container">@lang('lang.Plastic Container')</option>
                                    <option value="others.paper_sticker">@lang('lang.Paper Sticker')</option>
                                    <option value="others.plastic_sticker">@lang('lang.Plastic Sticker')</option>
                                    <option value="others.paper_bowl">@lang('lang.Paper Bowl')</option>
                                    <!-- <option value="others.wet_pipes">@lang('lang.Wet Pipes')</option> -->
                                    <option value="others.plastic_cutleries">@lang('lang.Plastic Cutleries')</option>
                                    <option value="others.wooden_cutleries">@lang('lang.Wooden Cutleries')</option>
                                    <option value="others.plastic_spoon">@lang('lang.Plastic Spoon')</option>
                                    <option value="others.plastic_knife">@lang('lang.Plastic Knife')</option>
                                    <option value="others.plastic_straw">@lang('lang.Plastic Straw')</option>
                                    
                                    
                                    <option value="others.printing_cliché">@lang('lang.Printing Cliché')</option>
                                    <option value="others.standard">@lang('lang.Standard')</option>
                                </select>
                                <button class="modal-effect btn btn-primary btn-block" data-effect="effect-flip-vertical" data-toggle="modal" href="#modaldemo8">@lang('lang.Add New Product')</button>
                             
                            </div>  
                              
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-header">
                    <a href="{{route('productStatistics')}}">
                            <button class="btn btn-primary btn-sm" style="margin: 5px">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
        </svg></button>
                </a>
                    </div>
            {{-- paper cup --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">@lang('lang.Product Reference')</th>
                                <th class="border-bottom-0">@lang('lang.Product Depertment')</th>
                                <th class="border-bottom-0">@lang('lang.Product Class')</th>
                                <th class="border-bottom-0">@lang('lang.Product Name')</th>
                                <th class="border-bottom-0">@lang('lang.Model')</th>
                                <th class="border-bottom-0">@lang('lang.Product Type')</th>
                                <th class="border-bottom-0">@lang('lang.Branding')</th>
                                <th class="border-bottom-0">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                @php
                                    $class=str_replace('_',' ',$item->product_class)
                                @endphp
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->product_department}}</td>
                                    <td>{{$class}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->product_type}}</td>
                                    <td>{{$item->branding}}</td>
                                    <td>
                                        <a href="{{route('product.show',$item->id)}}">
                                            <button class="modal-effect btn btn-primary btn-block"><i class="las la-eye"></i></button>
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