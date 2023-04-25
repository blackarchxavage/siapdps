@extends('template.main')
@section('title','Nominatif')
{{-- @section('breadcrumb','NOMINATIF') --}}
@section('pagecss')
<link href="{{ asset('materialpro/libs/datatables_net_bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link href="{{ asset('materialpro/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 table-hover">
<div class="dt-buttons">

@if (session('deleted'))
<div class="alert alert-success"> <i class="ti-user"></i> {{ session('deleted') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>
@endif 

<table id="file_export" class="table table-striped table-bordered display dataTable" role="grid" aria-describedby="file_export_info">
  <thead>
    <tr role="row">
      <th class="sorting_asc text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-sort="ascending" aria-label="Name: activate to sort column descending">
        NO</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-sort="ascending" aria-label="Name: activate to sort column descending">
        NAMA</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Position: activate to sort column ascending">
        NRP / NIP</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Office: activate to sort column ascending">
        PANGKAT<br>GOL</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Age: activate to sort column ascending">
        TEMPAT<br> TGL LAHIR</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Start date: activate to sort column ascending">
        NIK</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Start date: activate to sort column ascending">
        NOMOR<br>TELEPON</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Start date: activate to sort column ascending">
        NAMA <br>ISTRI/SUAMI</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Start date: activate to sort column ascending">
        KATEGORI<br>PENSIUN</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Start date: activate to sort column ascending">
        GAJI<br>TERAKHIR</th>
      <th class="sorting text-center align-middle" 
        tabindex="0" 
        aria-controls="file_export" 
        rowspan="1" colspan="1" style="width: 0px;" 
        aria-label="Salary: activate to sort column ascending">
        ACTION</th></tr>
  </thead>
  <tbody>
    {{-- VALUE --}}
    @foreach ($nominatif as $key=>$value)
    <tr role="row" class="even">
      <td class="sorting_1 text-nowrap text-center">{{ ++$key }}</td>
      <td class="text-nowrap text-capitalize">{{ $value->nama }}</td>
      <td>{{ $value->nrp_nip }}</td>
      <td class="text-center text-capitalize">{{ $value->getPangkat->alt ?? null }}</td>
      <td class="text-nowrap text-capitalize">
        @isset ($value->tmp_lahir){{ $value->tmp_lahir.',' }} @endisset
        @isset ($value->tgl_lahir){{ Carbon\Carbon::createFromFormat('Y-m-d', $value->tgl_lahir)->format(format:'d-m-Y') }} @endisset
      </td>
      <td>{{ $value->nik }}</td>
      <td>{{ $value->phone1 }}</td>
      <td class="text-nowrap text-capitalize">{{ $value->nama_pasangan }}</td>
      <td class="text-nowrap text-capitalize">@isset($value->kategori_id) {{ $value->getKategori->nama }} @endisset</td>
      <td>
        <div class="float-left">Rp.</div>
        <div class="float-right">{{ number_format($value->gaji_terakhir, 0, ',', '.') }}</div></td>
      <td class="text-nowrap text-center">
        <a href="{{ url('detail/'.$value->id) }}" class="btn btn-sm btn-primary py-0 px-2 mdi mdi-eye" role="button"></a>
        <a href="{{ url('edit/'.$value->id) }}" class="btn btn-sm btn-warning py-0 px-1 mx-1 mdi mdi-crop" role="button"></a>
        <a href="{{ url('delete/'.$value->id) }}" class="btn btn-sm btn-danger py-0 px-1 mdi mdi-eraser" role="button" id="destroy-alert"></a>
      </td>
    </tr>
    @endforeach
    {{-- END VALUE --}}
  </tbody>
  {{-- <tfoot>
    <tr>
      <th rowspan="1" colspan="1">Name</th>
      <th rowspan="1" colspan="1">Position</th>
      <th rowspan="1" colspan="1">Office</th>
      <th rowspan="1" colspan="1">Age</th>
      <th rowspan="1" colspan="1">Start date</th>
      <th rowspan="1" colspan="1">Salary</th>
      <th rowspan="1" colspan="1">Office</th>
      <th rowspan="1" colspan="1">Age</th>
      <th rowspan="1" colspan="1">Start date</th>
      <th rowspan="1" colspan="1">Salary</th>
    </tr>
  </tfoot> --}}
</table>
        
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection


@section('pagejs')

<!--Custom JavaScript -->
<script src="{{ asset('materialpro/js/custom.min.js') }}"></script>

<!--This page plugins -->
<script src="{{ asset('materialpro/js/pages/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/datatable/custom-datatable.js') }}"></script>
{{-- <script src="{{ asset('materialpro/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}

<!-- start - This is for export functionality only -->
<script src="{{ asset('materialpro/libs/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/jszip.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('materialpro/extra-libs/toastr/dist/build/toastr.min.js') }}"></script>
<script src="{{ asset('materialpro/extra-libs/toastr/toastr-init.js') }}"></script>
@endsection
@section('customjs')
<script>
  $(document).ready(function() {
      toastr.options.timeOut = 5000;
      @if (Session::has('error'))
          toastr.error('{{ Session::get('error') }}');
      @elseif(Session::has('success'))
          toastr.success('{{ Session::get('success') }}');
      @endif
  });
</script>
@endsection