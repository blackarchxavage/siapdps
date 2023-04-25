@extends('template.main')
@section('title','Data Pensiun')
{{-- @section('breadcrumb','Pensiun') --}}
@section('breadcrumb_parent','Rekap Pensiun')
@section('breadcrumb_child','Export')

@section('pagecss')
<link href="{{ asset('materialpro/libs/datatables_net_bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
<style>
.table-hover tbody tr:hover td {
  background-color: gray;
  color: #ffffff;
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header bg-info">
                <h4 class="card-title text-white">Other Sample Horizontal form</h4>
            </div>
            <form action="#" class="form-horizontal">
                <div class="form-body">
                    <div class="card-body">
                        <h6 class="card-subtitle">This is the sample horizontal form with labels on left and form controls on right in one line. To use add class <code>form-horizontal</code> to the form tag and give class <code>row</code> with form-group.</h6>
                        <h4 class="card-title">Person Info</h4>
                    </div>
                    
                    
                    <hr class="mt-0 mb-5">
                    <div class="card-body">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Post Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Country</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select">
                                            <option>Country 1</option>
                                            <option>Country 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="card-body">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-dark">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <label class="mt-3">Events</label>
            <input type="text" class="form-control date-filter" placeholder="Start Date" id="date-start" data-dtp="dtp_e4tZ7">
            <input type="text" class="form-control mt-3 date-filter" placeholder="End Date" id="date-end" data-dtp="dtp_caBn2">
        </div>
        </div>
    </div>
    

<div class="col-12">
<div class="card">
<div class="card-body">
    <div class="table-responsive">
        <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            
            <table id="file_export" class="table table-striped table-bordered display dataTable table-hover" role="grid" aria-describedby="file_export_info">
            <thead class="bg-dark text-white">
                <tr role="row" class="text-center">
                  <th class="sorting_asc align-middle" tabindex="0">NO</th>
                  <th class="sorting align-middle" tabindex="1">NAMA</th>
                  <th class="sorting align-middle" tabindex="2">NRP/NIP</th>
                  <th class="sorting align-middle" tabindex="3">PKT/<br>GOL</th>
                  <th class="sorting align-middle" tabindex="4">TTL</th>
                  <th class="sorting align-middle" tabindex="5">USIA</th>
                  <th class="sorting align-middle" tabindex="6">STATUS</th>
                  <th class="sorting align-middle" tabindex="7">KATEGORI</th>
                  <th class="sorting align-middle" tabindex="8">MASA KERJA</th>
                  <th class="sorting align-middle" tabindex="9">TMT PENSIUN</th>
                  <th class="sorting align-middle" tabindex="10">*</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biodata as $key=>$value)
                <tr role="row" class="odd text-capitalize">
                    <td class="sorting_1 text-center">{{++$key}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->nrp_nip}}</td>
                    <td class="text-center">@if($value->pangkat_id){{$value->getPangkat->alt}}@endif @if($value->korps_id) {{$value->getKorps->nama}} @endif</td>
                    <td>{{$value->tmp_lahir}}, <br>@if($value->tgl_lahir){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tgl_lahir)->format(format:'d-m-Y')}}@endif</td>
                    <td class="text-center">@if($value->tgl_lahir < now()->toDateString()) {{ Carbon\Carbon::parse($value->tgl_lahir)->age }} Tahun @endif</td>
                    <td class="text-center">@if($value->status_id){{$value->getStatus->nama}}@endif</td>
                    <td>@if($value->kategori_id){{$value->getKategori->nama}}@endif</td>
                    <td class="text-center">
                        {{$value->masa_kerja}}
                    </td>
                    {{-- <td>@if($value->tmt_kategori){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tmt_kategori)->format(format:'d-m-Y')}}@endif</td> --}}
                    <td>{{$value->tmt_kategori}}</td>
                    <td class="text-center"><a href="{{ url('detail/'.$value->id) }}" class="btn btn-sm btn-primary py-0 px-2 mdi mdi-eye" role="button"></a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>        
    </div>
  </div>

</div>
</div>
</div>
</div>
@endsection


@section('pagejs')
<script src="{{ asset('materialpro/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/datatable/custom-datatable.js') }}"></script>
{{-- <script src="{{ asset('materialpro/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}

<script src="{{ asset('materialpro/libs/moment/moment.js') }}"></script>
<script src="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js') }}"></script>
{{-- <script src="{{ asset('materialpro/libs/daterangepicker/daterangepicker.js') }}"></script> --}}
<script src="{{ asset('materialpro/js/pages/forms/jasny-bootstrap.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/mask/mask.init.js') }}"></script>


<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset('materialpro/js/pages/datatable/datatable-advanced.init.js') }}"></script>


@endsection

@section('customjs')
<script>
$(document).ready(function () {
    $('#zero_config').DataTable({
        paging: true,
        ordering: true,
        info: true

    });
});
$('#date-start, #date-end').bootstrapMaterialDatePicker({ 
    weekStart: 0, 
    time: false,
    clearButton: true,
    cancelText: 'Batal',
    clearText: 'Clear',
    lang: 'id',
    autoclose: true,
    weekStart: 1,
    // format: 'DD-MM-YYYY',
    maxDate : new Date()
});




$('.date-filter').on('change', function(){
    let dateStart = $('#date-start').val();
    let dateEnd = $('#date-start').val();

    console.log(dateStart);
})














</script>
@endsection