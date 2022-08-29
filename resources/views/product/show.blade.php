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
    <!--Suppliers Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Product Reference')<span class="btn btn-primary btn-rounded"></span></h4>
                </div>
                <br>
                <div class="row"> 
                    <div class="col">
                        <a href="{{url()->previous()}}">
                            <button class="btn btn-primary">
                                @lang('lang.Return To Products Page')
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{route('product.edit',$product->id)}}">
                            <button class="btn btn-warning"><i class="las la-pen"></i></button>
                        </a>
                    </div>
                    <div class="col">
                        <form class="col" action="{{route('product.destroy',$product->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                            <button class="btn btn-danger"><i class="las la-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-product">
                        <tbody>
                            @for ($i = 1; $i <= $pcount; $i++)
                                    <tr>
                                        @php
                                            $columns[$i]=str_replace('_',' ',$product_columns[$i]);
                                            $col_name=ucwords(strtolower($columns[$i].''));;
                                            $col_value=$product_columns[$i];
                                        @endphp
                                        <td width="390">{{ __('lang.' .  $col_name) }}</td>
                                        <td>{{$product->$col_value}}</td>
                                        @php
                                            $str='';
                                        @endphp
                                    </tr>
                            @endfor
                            @for ($i = 2; $i <= $ccount+1; $i++)
                                    <tr>
                                        @php
                                            $columns[$i]=str_replace('_',' ',$category_columns[$i]);
                                            $col_name=ucwords(strtolower($columns[$i].''));
                                            $col_value=$category_columns[$i];
                                            // $string = ucwords(strtolower()); 
                                            // dd($string);
                                        @endphp
                                        <td width="390">{{ __('lang.' .  $col_name) }}</td>
                                        <td>{{$cat->$col_value}}</td>
                                        @php
                                            $str='';
                                        @endphp
                                    </tr>
                            @endfor
                        </tbody>
                    </table>
                    <table class="table table-striped table-product">
                        <thead>Atattchments Section</thead>
                        <tbody>
                            @foreach ($files as $item)
                                <tr>
                                    <td>{{$item->file}}</td>
                                    <td>@lang('lang.File Extenstion') :{{$item->extenstion}}</td>
                                    <td>
                                        <div class="col">
                                            <a href="{{route('file.show',Crypt::encrypt($item->id))}}" target="_blank">
                                                <button class="btn btn-primary"><i class="las la-download"></i></button>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('file.destroy', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <br>
                                                <button class="btn btn-danger"><i class="las la-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            @php
                                                $filepath = 'http://'.$name.'/file/'.Crypt::encrypt($item->id);
                                            @endphp
                                            <button id="fileName" class="btn btn-success" value="{{$filepath}}" onclick="copyToClipBoard('{{$filepath}}')"><i class="las la-copy">
                                                </i></button>
                                        </div>
                                    </td>
                                    <td>
                                        
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