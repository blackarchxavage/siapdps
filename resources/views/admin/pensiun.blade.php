@extends('template.main')
@section('title','Data Pensiun')
{{-- @section('breadcrumb','Pensiun') --}}
@section('breadcrumb_parent','Apps')
@section('breadcrumb_child','Data Pensiun')

@section('pagecss')
<link href="{{ asset('materialpro/libs/datatables_net_bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"> --}}

@endsection

@section('content')

<!-- Success Alert Modal -->
<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-checkmark h1"></i>
                    <h4 class="mt-2">Goodjob!</h4>
                    <p class="mt-3">Data berhasil dihapus!</p>
                    <button type="button" class="btn btn-light my-2"
                        data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="col-sm-12 col-lg-4">
        <div class="card mb-2 bg-transparent">
            <form action="{{ url('pensiun') }}" method="GET">@csrf
                <div class="card-body">
                    {{-- <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <span class="badge badge-info"><i class="fas fa-info"></i></span>
                        <strong> Form Action at begining of the form.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div> --}}
                    {{-- <h6 class="card-title">Employee Profile</h6> --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    @foreach(App\Models\Kategori::all() as $op)
                                    @php
                                        $checked = [];
                                        if(isset($_GET['filter_kategori'])){
                                            $checked = $_GET['filter_kategori'];
                                        }
                                    @endphp
                                    <fieldset>
                                        <input type="checkbox" class="chk-col-cyan material-inputs"
                                        id="customCheck{{$op->id}}" name="filter_kategori[]" value="{{$op->id}}" @if(in_array($op->id, $checked)) checked @endif>
                                        <label class="font-weight-light text-dark" for="customCheck{{$op->id}}">{{$op->nama}}</label>
                                    </fieldset>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action-form">
                        <div class="form-group mb-0 text-left">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Filter Apply</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-12 col-lg-8">
        <div class="card mb-2 bg-transparent">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <!-- Carousel items -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">    
                            <div class="carousel-inner">
                                <div class="carousel-item flex-column active">
                                    <div class="d-flex no-block al mr-3ign-items-center">
                                        <i class="cc GEMZ-alt text-dark display-6 mr-3" title="GEMZ"></i>
                                        <div class="mt-2">
                                            <h5 class="text-dark font-weight-medium">Rekapitulasi</h5>
                                            <h6 class="text-dark">Data Pensiun</h6>
                                        </div>
                                        <div class="ml-auto mt-3">
                                            <div class="crypto1"></div>
                                        </div>
                                    </div>
                                    <div class="row text-center text-dark mt-4">
                                        @php
                                        $percentage = 50;
                                        $PA = 12;
                                        $BA = 10;
                                        $TA = 21;
                                        $CPNS = 8;
                                        $countPA = ($percentage / 100) * $PA;
                                        $countBA = ($percentage / 100) * $BA;
                                        $countTA = ($percentage / 100) * $TA;
                                        $countCPNS = ($percentage / 100) * $CPNS;
                                        @endphp
                                        <div class="col-3">
                                            <span class="font-14">{{$countPA}}%</span>
                                            <p class="mdi mdi-arrow-up font-weight-medium"> PA</p>
                                        </div>
                                        <div class="col-3">
                                            <span class="font-14">{{$countBA}}%</span>
                                            <p class="mdi mdi-arrow-up font-weight-medium"> BA</p>
                                        </div>
                                        <div class="col-3">
                                            <span class="font-14">{{$countTA}}%</span>
                                            <p class="mdi mdi-arrow-up font-weight-medium"> TA</p>
                                        </div>
                                        <div class="col-3">
                                            <span class="font-14">{{$countCPNS}}%</span>
                                            <p class="mdi mdi-arrow-up font-weight-medium"> PNS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- carosuel --}}
                    </div>
                    {{-- carosuel 2 --}}
                    <div class="col-sm-12 col-md-6 carousel slide" id="myCarousel" data-ride="carousel">
                        <div class="form-group carousel-inner pt-1 px-2 m-2">
                            <div class="carousel-item active">
                                <div class="d-flex no-block align-items-center">
                                    <div class="px-2">
                                    <a href="JavaScript: void(0);" class="mdi mdi-arrow-right text-dark"></a></div>
                                    <div class="px-2">
                                    <h6 class="mb-0">Pensiun Alami</h6></div>
                                    <div class="ml-auto px-2">
                                    <span class="font-weight-light">{{App\Models\Biodata::where('kategori_id',1)->get()->count()}} <small>orang</small></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group carousel-inner px-2 m-2">
                            <div class="carousel-item active">
                                <div class="d-flex no-block align-items-center">
                                    <div class="px-2">
                                    <a href="JavaScript: void(0);" class="mdi mdi-arrow-right text-dark"></a></div>
                                    <div class="px-2">
                                    <h6 class="mb-0">Pensiun Dini</h6></div>
                                    <div class="ml-auto px-2">
                                    <span class="font-weight-light">{{App\Models\Biodata::where('kategori_id',2)->get()->count()}} <small>orang</small></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group carousel-inner px-2 m-2">
                            <div class="carousel-item active">
                                <div class="d-flex no-block align-items-center">
                                    <div class="px-2">
                                    <a href="JavaScript: void(0);" class="mdi mdi-arrow-right text-dark"></a></div>
                                    <div class="px-2">
                                    <h6 class="mb-0">Pensiun Duda / Janda</h6></div>
                                    <div class="ml-auto px-2">
                                    <span class="font-weight-light">{{App\Models\Biodata::where('kategori_id',3)->get()->count()}} <small>orang</small></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group carousel-inner px-2 m-2">
                            <div class="carousel-item active">
                                <div class="d-flex no-block align-items-center">
                                    <div class="px-2">
                                    <a href="JavaScript: void(0);" class="mdi mdi-arrow-right text-dark"></a></div>
                                    <div class="px-2">
                                    <h6 class="mb-0">Pensiun Meninggal</h6></div>
                                    <div class="ml-auto px-2">
                                    <span class="font-weight-light">{{App\Models\Biodata::where('kategori_id',4)->get()->count()}} <small>orang</small></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- carosuel 2 --}}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-12">
<!-- TABLE -->
<div class="card">
<div class="card-body pt-2">
<div class="table-responsive text-nowrap">
    <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <table id="file_export" class="table table-striped table-bordered display dataTable text-capitalize" role="grid" aria-describedby="file_export_info">
        <thead>
            <tr role="row" class="text-center">
                <th class="sorting_asc" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" aria-sort="ascending" 
                aria-label="NO: activate to sort column descending">NO</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="NAMA: activate to sort column ascending">NAMA</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="NTP NIP: activate to sort column ascending">NRP NIP</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="PKT GOL: activate to sort column ascending">PKT <br>GOL</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="TTL: activate to sort column ascending">TTL</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="JK: activate to sort column ascending">JK</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="USIA: activate to sort column ascending">USIA</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="STATUS: activate to sort column ascending">STATUS</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="SUMBER: activate to sort column ascending">SUMBER</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="Start date: activate to sort column ascending">KATEGORI</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="TMT KATEGORI: activate to sort column ascending">TMT </th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="MK: activate to sort column ascending">MK</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;" 
                aria-label="GP: activate to sort column ascending">GP</th>
                <th class="sorting hidden-export" style="width:1%;">agama</th>
                <th class="sorting hidden-export" style="width:1%;">istri/suami</th>
                <th class="sorting hidden-export" style="width:1%;">phone</th>
                <th class="sorting hidden-export" style="width:1%;">email</th>
                <th class="sorting hidden-export" style="width:1%;">alamat skrg</th>
                <th class="sorting hidden-export" style="width:1%;">alamt pensi</th>
                <th class="sorting hidden-export" style="width:1%;">nik</th>
                <th class="sorting hidden-export" style="width:1%;">npwp</th>
                <th class="sorting hidden-export" style="width:1%;">bpjs</th>
                <th class="sorting hidden-export" style="width:1%;">kta</th>
                <th class="sorting hidden-export" style="width:1%;">tmt pangkat</th>
                <th class="sorting hidden-export" style="width:1%;">tmt sumber</th>
                <th class="sorting hidden-export" style="width:1%;">gaji terakhir</th>
                <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1" colspan="1" style="width: 0px;"><i class="mdi mdi-dots-horizontal"></i></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($biodata as $key=>$value)
        <tr role="row" @if($value->kategori_id) id="{{$value->kategori_id}}" @endif>
            <td class="sorting_1 text-center" style="width:4%;">{{++$key}}</td>
            <td>{{$value->nama}}</td>
            <td style="width:10%;">{{$value->nrp_nip}}</td>
            <td style="width:1%;">@if($value->pangkat_id){{$value->getPangkat->alt}}@endif @if($value->korps_id) {{$value->getKorps->nama}} @endif</td>
            <td style="width:1%;">{{$value->getVal($value->tmp_lahir)}},<br> @if($value->tgl_lahir){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tgl_lahir)->format(format:'d-m-Y')}}@endif</td>
            <td style="width:1%;">{{$value->getJK($value->kelamin_id)}}</td>
            <td style="width:1%;">{{$value->getVal($value->usia)}} <sup>Thn</sup></td>
            <td style="width:1%;">{{$value->getVal($value->getStatus->nama)}}</td>
            <td style="width:1%;">@if($value->sumber_id){{$value->getSumber->nama}}@endif</td>
            <td style="width:1%;">@if($value->kategori_id){{$value->getKategori->nama}}@endif</td>
            <td style="width:1%;">@if($value->tmt_kategori){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tmt_kategori)->format(format:'d-m-Y')}}@endif</td>
            <td style="width:1%;">{{$value->getMasa($value->tahun_masa_kerja)}} <sup>Thn</sup> <br>{{$value->getMasa($value->bulan_masa_kerja)}} <sup>Bln</sup></td>
            <td style="width:1%;">{{$value->getVal(number_format($value->gaji_pensiun, 0, ',','.'))}}</td>

            <td class="hidden-export">@if($value->agama_id){{$value->getAgama->nama}}@endif</td>
            <td class="hidden-export">{{$value->getVal($value->nama_pasangan)}} </td>
            <td class="hidden-export">{{$value->getVal($value->phone1)}} </td>
            <td class="hidden-export">{{$value->getVal($value->email)}} </td>
            <td class="hidden-export">{{$value->getVal($value->alamat_sekarang)}} </td>
            <td class="hidden-export">{{$value->getVal($value->alamat_pensiun)}} </td>
            <td class="hidden-export">{{$value->getVal($value->nik)}} </td>
            <td class="hidden-export">{{$value->getVal($value->npwp)}} </td>
            <td class="hidden-export">{{$value->getVal($value->bpjs)}} </td>
            <td class="hidden-export">{{$value->getVal($value->kta)}} </td>
            <td class="hidden-export">@if($value->tmt_pangkat){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tmt_pangkat)->format(format:'d-m-Y')}}@endif</td>
            <td class="hidden-export">@if($value->tmt_sumber){{Carbon\Carbon::createFromFormat('Y-m-d', $value->tmt_sumber)->format(format:'d-m-Y')}}@endif</td>
            <td class="hidden-export">{{$value->getMasa($value->gaji_terakhir)}} </td>

            <td style="width:1%;"><div class="btn-group">
                
                <a href="{{ url('detail/'.$value->id) }}" class="btn btn-sm btn-success mdi mdi-account-box"> Detail</a>
                {{-- <form action="{{ url('detail/'.$value->id) }}" method="post"> @method('get') @csrf
                    <button type="submit" class="btn btn-sm btn-success mdi mdi-account-box"> Detail</button>
                </form> --}}
                <a href="{{ url('edit/'.$value->id) }}" class="btn btn-sm btn-warning mdi mdi-crop"></a>
                {{-- <form action="{{ url('edit/'.$value->id) }}" method="post"> @method('get') @csrf
                    <button type="submit" class="btn btn-sm btn-warning mdi mdi-crop"></button>
                </form> --}}
                {{-- <form action="{{ url('delete/'.$value->id) }}" method="post"> @method('delete') @csrf
                    <button type="submit" class="btn btn-sm btn-danger mdi mdi-eraser"></button>
                </form> --}}
                
        </td>
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





@endsection


@section('pagejs')

{{-- page plugin --}}
<script src="{{ asset('materialpro/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/datatable/custom-datatable.js') }}"></script>
{{-- <script src="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js') }}"></script> --}}
<script src="{{ asset('materialpro/libs/moment/moment.js') }}"></script>
<script src="{{ asset('materialpro/libs/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/jasny-bootstrap.js') }}"></script>

<script src="{{ asset('materialpro/libs/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/jszip.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/jasny-bootstrap.js') }}"></script>
{{-- <script src="{{ asset('materialpro/js/pages/datatable/datatable-advanced.init.js') }}"></script> --}}



@endsection

@section('customjs')
@if( Session::has('success'))
<script type="text/javascript">
//feedback modal alert
$(document).ready(function() {
    $('#success-alert-modal').modal();
});
</script>
@endif


<script>
//fungsi untuk filtering data berdasarkan tanggal 
 var start_date;
 var end_date;
 var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //nama depan = 0
    //nama belakang = 1
    //tanggal terdaftar =10
    var evalDate= parseDateValue(aData[10]);
      if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
           ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
           ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
           ( dateStart <= evalDate && evalDate <= dateEnd ) )
      {
          return true;
      }
      return false;
});

// fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
function parseDateValue(rawDate) {
    var dateArray= rawDate.split("-");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
    return parsedDate;
}    

$( document ).ready(function() {
//konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
var $dTable = $('#file_export').DataTable({
    dom: "<'d-flex'<'mr-auto p-2' B > <'p-2'<'check-all'>>  <'p-2'<'datesearchbox'>> <'p-2' f ><'p-2' l >> r t + i p",
    // paging: true,
    // ordering: true,
    // info: true
    orientation: 'landscape',
    buttons: [
         'copy', 'csv', 'excel'
    ],
    language: {
        "search": "Search"
    }
 });
//  $('#file_export').DataTable({
//     dom: "<'d-flex'<'mr-auto p-2' B ><'p-2' f ><'p-2' l >> r t + i p",
//     buttons: [
//         'copy', 'csv', 'excel'
//     ]
// });
$('.buttons-copy, .buttons-csv, .buttons-excel').addClass('btn btn-success mr-1');

//menambahkan check all di dalam datatables
$("div.check-all").html('<div class="input-group mt-1"><label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-all"><span class="custom-control-label"></span></label></div>');

 //menambahkan daterangepicker di dalam datatables
$("div.datesearchbox").html('<div class="input-group"><input type="text" class="form-control showdropdowns text-center" id="datesearch" placeholder="cari tanggal pensiun"><div class="input-group-append"><span class="input-group-text border-0"><span class="mdi mdi-calendar"></span></span></div></div>');

//  document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

 //konfigurasi daterangepicker pada input dengan id datesearch
 $('#datesearch').daterangepicker({
    autoUpdateInput: false,
    showDropdowns: true
  });

 //menangani proses saat apply date range
  $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
     $(this).val(picker.startDate.format('DD-MM-YYYY') + ' >> ' + picker.endDate.format('DD-MM-YYYY'));
     start_date=picker.startDate.format('DD-MM-YYYY');
     end_date=picker.endDate.format('DD-MM-YYYY');
     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
     $dTable.draw();
  });

  $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    start_date='';
    end_date='';
    $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    $dTable.draw();
  });
});
    /*******************************************/
    // Show Dropdowns
    /*******************************************/
    // $('.showdropdowns').daterangepicker({
    //     showDropdowns: true,
    // });
    $('.hidden-export').hide();



</script>

@endsection