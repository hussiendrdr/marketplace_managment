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
 
    <!--Suppliers Section-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">@lang('lang.Supplier Reference')<span class="btn btn-primary btn-rounded">{{$supplier->id}} </span></h4>
                </div>
                <br>
                <div>
                    <a href="{{url()->previous()}}">
                        <button class="btn btn-primary">
                            @lang('lang.Return To Suppliers Page')
                        </button>
                    </a> <br><br>

                    <div class="col">
                        <a href="{{route('supplier.edit',$supplier->id)}}">
                            <button class="btn btn-warning"><i class="las la-pen"></i></button>
                        </a>
                    </div>
                    
                    <form class="col" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <button class="btn btn-danger"><i class="las la-trash"></i></button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                {{-- <td class="col-md-12">@lang('lang.Supplier Organization Name')</td> --}}
                                <td>
                                    <div class="row">
                                        @lang('lang.Supplier Organization Name')
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <td>{{$supplier->supplier_organization_name}}</td>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Name')</td>
                                <td>{{$supplier->supplier_contact_name}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Position')</td>
                                <td>{{$supplier->supplier_contact_position}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Number')</td>
                                <td>{{$supplier->supplier_contact_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Whatsapp')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->supplier_contact_whatsaap}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->supplier_contact_whatsaap}}" onclick="copyToClipBoard('{{$supplier->supplier_contact_whatsaap}}')">
                                            <i class="las la-copy"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Email')</td>
                                <td>{{$supplier->email}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Name') 2</td>
                                <td>{{$supplier->supplier_contact_name2}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Position') 2</td>
                                <td>{{$supplier->supplier_contact2_position}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Contact Number') 2</td>
                                <td>{{$supplier->supplier_contact2_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Catelouge')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->supplier_catelouge}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->supplier_catelouge}}" onclick="copyToClipBoard('{{$supplier->supplier_catelouge}}')"><i class="las la-copy"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier WebSite')</td>
                                <td>{{$supplier->supplier_webSite}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Fixed Quotation') 1</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->supplier_fixed_quotation1}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->supplier_fixed_quotation1}}" onclick="copyToClipBoard('{{$supplier->supplier_fixed_quotation1}}')"><i class="las la-copy"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Fixed Quotation') 2</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->supplier_fixed_quotation2}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->supplier_fixed_quotation2}}" onclick="copyToClipBoard('{{$supplier->supplier_fixed_quotation2}}')"><i class="las la-copy"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Social Media Accounts')</td>
                                <td>{{$supplier->social_media_accounts}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.VAT Number')</td>
                                <td>{{$supplier->vat_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Country')</td>
                                <td>{{$supplier->country}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.City')</td>
                                <td>{{$supplier->city}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.District')</td>
                                <td>{{$supplier->district}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Street')</td>
                                <td>{{$supplier->street}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Building Number')</td>
                                <td>{{$supplier->building_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Secondary Number')</td>
                                <td>{{$supplier->secondary_number}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Postal Code')</td>
                                <td>{{$supplier->postal_code}}</td>
                            </tr>
                            {{-- <tr>
                                
                            </tr> --}}
                            <tr>
                                <td width="390">@lang('lang.Supplier VAT Certificate')</td>
                                <td>{{$supplier->supplier_vat_certificate}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.User Comments')</td>
                                <td>{{$supplier->user_comments}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier') IBAN1</td>
                                <td>{{$supplier->supplier_IBAN1}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier') IBAN2</td>
                                <td>{{$supplier->supplier_IBAN2}}</td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Factory Location')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->factory_location}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->factory_location}}" onclick="copyToClipBoard('{{$supplier->factory_location}}')"><i class="las la-copy"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Office Location')</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary" target="_blank" href={{$supplier->office_location}}>
                                            <i class="las la-link"></i>
                                        </a>
                                        <button id="fileName" class="btn btn-success" value="{{$supplier->office_location}}" onclick="copyToClipBoard('{{$supplier->office_location}}')"><i class="las la-copy"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="390">@lang('lang.Supplier Type')</td>
                                <td>{{$supplier->supplier_type}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>@lang('lang.Attatchment Section')</thead>
                        <tbody>
                            <td width="390">@lang('lang.Supplier Attatchment C.R')</td>
                                <td>{{$supplier->supplier_attatchment_CR}}</td>
                        </tbody>
                    </table>
                    <table class="table table-striped table-product">
                        <thead>@lang('lang.Attatchment Section')</thead>
                        <tbody>
                            <tr>
                                <td width="390">@lang('lang.Supplier Attatchment C.R')</td>
                                
                                <td>{{$supplier->supplier_attatchment_CR}}</td>
                                
                            </tr>
                                <tr>
                                    
                                    <td>
                                        <div class="col">
                                            <a href="{{url('supplier/file',$supplier->id)}}" target="_blank">
                                                <button class="btn btn-primary"><i class="las la-download"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            
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