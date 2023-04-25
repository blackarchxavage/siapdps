@extends('template.main')
@section('title','Tambah Personel')
{{-- @section('breadcrumb','Pensiun') --}}
@section('breadcrumb_parent','Admin')
@section('breadcrumb_child','Tambah Personel')
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/daterangepicker/daterangepicker.css') }}"> --}}
<style>
    span.input-group-text { 
        background-color:transparent;
        border: none;
    }
    input[readonly].readonly {
        background-color:transparent;
        border: none;
    }
</style>
@endsection
@section('content')

<div class="container-lg">
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header bg-info">
        <h4 class="card-title text-white">Tambah Personel</h4>
    </div>
    
<div class="card-body pt-0">

<!-- Success Alert Modal -->
<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-checkmark h1"></i>
                    <h4 class="mt-2">Goodjob!</h4>
                    <p class="mt-3">Data berhasil disimpan!</p>
                    <button type="button" class="btn btn-light my-2"
                        data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<form class="form-control-line mt-4"
      action="{{ url('store') }}" 
      method="POST"
      enctype="multipart/form-data"> @csrf
    {{-- <h4 class="card-title">Add New Personel</h4> --}}
    {{-- <h6 class="card-subtitle">kolom dengan tanda <code>*</code> wajib diisi!</h6> --}}

<div class="row">
    
    <div class="float-left col-md-6">

            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Nama <code>*</code></label>
                    <input type="text" class="form-control" name="nama" id="nama"> 
                </div>
                <div class="col p-2">
                    <label>NRP/NIP <code>*</code></label>
                    <input type="text" class="form-control" name="nrp_nip" id="nrp_nip"> 
                </div></div>
            
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Tempat,</label>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir"> 
                </div>
                <div class="col p-2">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="tgl_lahir" id="mdate_lahir">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="mdi mdi-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col p-2">
                    <label></label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">usia</span>
                        </div>
                        <input type="text" class="form-control readonly text-right" name="usia" id="usia" @readonly(true)>
                        <div class="input-group-append">
                            <span class="input-group-text"><sup>Th</sup></span>
                        </div>
                    </div>
                </div></div>
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Agama</label>
                    <select class="form-control" name="agama_id" id="agama">
                        <option></option>
                        @foreach (App\Models\Agama::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('agama_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="kelamin_id" id="kelamin">
                        <option></option>
                        @foreach (App\Models\Kelamin::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('kelamin_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div></div>
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Status</label>
                    <select class="form-control" name="status_id" id="status">
                        <option></option>
                        @foreach (App\Models\Status::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('status_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>Nama Istri/Suami</label>
                    <input type="text" class="form-control" name="nama_pasangan" id="nama_pasangan"> 
                </div></div>
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Selular</label>
                    <input type="text" class="form-control" name="phone1" id="phone">
                </div>
                <div class="col p-2">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email"> 
                </div></div>
            <div class="form-group p-2 m-0">
                {{-- <label></label> --}}
                <textarea class="form-control" rows="1" name="alamat_sekarang" placeholder="Alamat Sekarang" id="alamat_sekarang"></textarea></div>
            <div class="form-group p-2 m-0">
                {{-- <label></label> --}}
                <textarea class="form-control" rows="1" name="alamat_pensiun" placeholder="Alamat Pensiun" id="alamat_pensiun"></textarea></div>

            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik">
                </div>
                <div class="col p-2">
                    <label>NO BPJS</label>
                    <input type="text" class="form-control" name="bpjs" id="bpjs">
                </div></div>
            
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>NO KTA</label>
                    <input type="text" class="form-control" name="kta" id="kta"> 
                </div>
                <div class="col p-2">
                    <label>NPWP</label>
                    <input type="text" class="form-control" name="npwp" id="npwp"> 
                </div></div>
            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Jabatan Terakhir</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan"> 
                </div></div>
    </div>
    <div class="float-left col-md-6 border-left">
            

            <div class="form-group d-flex m-0">
                <div class="col p-2">
                    <label>Pangkat <code>*</code></label>
                    <select class="form-control" name="pangkat_id" id="pangkat">
                        <option></option>
                        @foreach (App\Models\Pangkat::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('pangkat_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->alt) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>Korps</label>
                    <select class="form-control" name="korps_id" id="korps">
                        <option></option>
                        @foreach (App\Models\Korps::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('korps_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>TMT Pangkat <code>*</code></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="tmt_pangkat" id="mdate_pangkat">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="mdi mdi-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div></div>

            <div class="form-group d-flex m-0">
                <div class="col-8 p-2">
                    <label>Sumber Pangkat <code>*</code></label>
                    <select class="form-control" name="sumber_id" id="sumber">
                        <option></option>
                        @foreach (App\Models\Sumber::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('sumber_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>TMT Sumber <code>*</code></label>
                    <div class="input-group">
                        <input type="text" class="form-control calculate" name="tmt_sumber" id="mdate_sumber">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="mdi mdi-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div></div>

            <div class="form-group d-flex m-0">
                <div class="col-8 p-2">
                    <label>Kategori Pensiun <code>*</code></label>
                    <select class="form-control" name="kategori_id" id="kategori">
                        <option></option>
                        @foreach (App\Models\Kategori::all() as $opt)
                        <option value="{{ $opt->id }}" @if(old('kategori_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col p-2">
                    <label>TMT Pensiun <code>*</code></label>
                    <div class="input-group">
                        <input type="text" class="form-control calculate" name="tmt_kategori" id="mdate_pensiun">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="mdi mdi-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div></div>

            <div class="form-group d-flex m-0">

                <div class="col-1 pl-2">
                    <label></label>
                    <button type="button" class="btn btn-success shadow-none mt-0 p-2 mdi mdi-calculator" id="calldiff" onclick="calcDiff()" data-toggle="tooltip" data-placement="top" title="hitung masa kerja dan gaji pensiun"></button>
                </div>

                <div class="col p-2">
                    <label>Gaji Pokok</label>
                    <input type="text" class="form-control" name="gaji_terakhir" id="gaji_terakhir">
                </div>
                
                <div class="col-4 p-2">
                    <label>Masa Kerja</label>
                    <div class="input-group no-wrap">
                        <input type="text" class="form-control readonly text-right" name="tahun_masa_kerja" id="tahun_masa_kerja" @readonly(true)>
                        <div class="input-group-append">
                            <span class="input-group-text p-1"><sup>Th</sup></span>
                        </div>
                        <input type="text" class="form-control readonly text-right" name="bulan_masa_kerja" id="bulan_masa_kerja" @readonly(true)>
                        <div class="input-group-append">
                            <span class="input-group-text pl-1"><sup>Bln</sup></span>
                        </div>
                    </div>
                </div>

                <div class="col p-2">
                    <label>Gaji Pensiun</label>
                    <input type="text" class="form-control" name="gaji_pensiun" id="gaji_pensiun">
                </div></div>

            <div class="form-group p-2 m-0">
                <label><i class="mdi mdi-file-pdf"></i><code>.pdf </code> Pangkat Terakhir</label>
                <div class="fileinput fileinput-new input-group bg-dark" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new text-light">Select file</span> <span class="fileinput-exists text-info">Change</span>
                        <input type="file" name="pangkat_file"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists text-danger" data-dismiss="fileinput">Remove</a>
                </div></div>

            <div class="form-group p-2 m-0">
                <label><i class="mdi mdi-file-pdf"></i><code>.pdf </code> Sumber Pangkat</label>
                <div class="fileinput fileinput-new input-group bg-dark" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new text-light">Select file</span> <span class="fileinput-exists text-info">Change</span>
                        <input type="file" name="sumber_file"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists text-danger" data-dismiss="fileinput">Remove</a>
                </div></div>

            <div class="form-group p-2 m-0">
                <label><i class="mdi mdi-file-pdf"></i><code>.pdf </code> KTA</label>
                <div class="fileinput fileinput-new input-group bg-dark" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> 
                        <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                        <span class="fileinput-filename"></span>
                    </div> 
                    <span class="input-group-addon btn btn-default btn-file"> 
                        <span class="fileinput-new text-light">Select file</span> 
                        <span class="fileinput-exists text-info">Change</span>
                        <input type="file" name="kta_file">
                    </span> 
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists text-danger" data-dismiss="fileinput">Remove</a>
                </div></div>
                
                <div class="form-group p-2 m-0 fileinput fileinput-new col-12 d-flex" data-provides="fileinput"> 
                <div class="col-3 m-0 p-0">
                    <div class="fileinput-preview fileinput-exists img-responsive" style="width:100px; max-width:100px; max-height:150px; height:auto;"></div>
                    <div class="fileinput-new img-responsive" style="width:100px; max-width:100px; max-height:150px; height:auto;">
                        <img src="{{ url('storage/image_holder.png') }}" alt="">
                    </div>
                </div>
                <div class="col m-0 p-0">
                    <label><i class="mdi mdi-file-image"></i><code>potrait 4x6</code> Foto Profil </label>
                    <div class="fileinput fileinput-new input-group bg-dark" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"> 
                            <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                            <span class="fileinput-filename"></span>
                        </div> 
                        <span class="input-group-addon btn btn-default btn-file"> 
                            <span class="fileinput-new text-light">Select image</span> 
                            <span class="fileinput-exists text-info">Change</span>
                            <input type="file" name="foto_file">
                        </span> 
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists text-danger" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
                </div>
        

    </div>

</div>
<div class="clearfix py-3"> </div>
<div class="col-md-12 mb-4">
    <div class="action-form">
        <div class="form-group mb-0 text-center">
            <button type="submit" class="btn btn-success waves-effect waves-light mdi mdi-content-save-all px-4 mx-2"> S A V E</button>
            <button type="reset" class="btn btn-dark waves-effect waves-light mdi mdi-eraser px-3 mx-2"> R E S E T</button>
        </div>
    </div>
</div>


</form>
</div>
</div>
</div>
</div>
</div>
@endsection

<!--Active Page JavaScript -->
@section('pagejs')
<script src="{{ asset('materialpro/libs/moment/moment.js') }}"></script>
<script src="{{ asset('materialpro/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js') }}"></script>
{{-- <script src="{{ asset('materialpro/libs/daterangepicker/daterangepicker.js') }}"></script> --}}
<script src="{{ asset('materialpro/js/pages/forms/jasny-bootstrap.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/mask/mask.init.js') }}"></script>

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
    
/*  ==========================================
    DATE PICKER
* ========================================== */
$('#mdate_lahir, #mdate_pangkat, #mdate_sumber, #mdate_pensiun').bootstrapMaterialDatePicker({ 
    weekStart: 0, 
    time: false,
    clearButton: true,
    cancelText: 'Batal',
    clearText: 'Clear',
    lang: 'id',
    autoclose: true,
    weekStart: 1,
    format: 'DD-MM-YYYY',
    maxDate : new Date()
});
// $('#mdate_lahir, #mdate_pangkat, #mdate_sumber, #mdate_pensiun').attr("placeholder", "dd-mm-yyyy");


/*  ==========================================
    HITUNG USIA
* ========================================== */
$('#mdate_lahir').on('change', function () {
    var age = getAge(this);
    // $('#mdate_lahir').val(age);
    console.log(age);
    // alert(age);
    $('#usia').val(age);
});
function getAge(dateVal) {
    var 
        lahir = new Date(dateVal.value),
        today = new Date(),
        ageInMilliseconds = new Date(today - lahir),
        years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
        months = 12 * (years % 1),
        days = Math.floor(30 * (months % 1));
    // return Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days';
    return Math.floor(years);
}


/*  ==========================================
    KALKULASI HITUNG GAJI & MASA KERJA
* ========================================== */
//HITUNG MASA KERJA
function calcDiff(){
    var sumberOld = $('#mdate_sumber').val();
    var pensiunOld = $('#mdate_pensiun').val();

    var sumber = parseDateValue(sumberOld);
    var pensiun = parseDateValue(pensiunOld);

    var timeDifference = new Date(pensiun - sumber);

    var years = timeDifference / (24 * 60 * 60 * 1000 * 365.25 );
    var months = 12 * (years % 1);
    var days = Math.floor(30 * (months % 1));

    var gaji_pokok = $('#gaji_terakhir').val();
    var potongan = 0.08 * gaji_pokok;
    var gaji_pensiun = gaji_pokok - potongan;

    if(years){
        $('#tahun_masa_kerja').val(Math.floor(years));
        $('#gaji_pensiun').val(gaji_pensiun);
    } else {
        $('#tahun_masa_kerja').val(0);
        $('#gaji_pensiun').val(0);
    }

    if(months){
        $('#bulan_masa_kerja').val(Math.floor(months));
    } else {
        $('#bulan_masa_kerja').val(0);
    }
}
// fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
function parseDateValue(rawDate) {
    var dateArray= rawDate.split("-");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
    return parsedDate;
}    

/*  ==========================================
    INPUT MASK
* ========================================== */
$('#nrp_nip').addClass('18-nummask');
$('#nik').addClass('16-nummask');
$('#bpjs').addClass('16-nummask');
$('#npwp').addClass('16-nummask');
$('#phone').addClass('12-nummask');
$('#gaji_terakhir').addClass('7-nummask');
$('#gaji_pensiun').addClass('7-nummask');
$('#usia').addClass('2-nummask');
$('#kta').addClass('kta-inputmask');



/*  ==========================================
    AUTO COMPLETE GAJI
* ========================================== */
$('#pangkat').on('change', function() {
    var id = this.value;
    switch (id){
        case "": $('#gaji_terakhir').val(0); break;
        case "0": $('#gaji_terakhir').val(0); break;
        case "1": $('#gaji_terakhir').val(5079300); break;
        case "2": $('#gaji_terakhir').val(3290500); break;
        case "3": $('#gaji_terakhir').val(3290500); break;
        case "4": $('#gaji_terakhir').val(3190700); break;
        case "5": $('#gaji_terakhir').val(3093900); break;
        case "6": $('#gaji_terakhir').val(3000100); break;
        case "7": $('#gaji_terakhir').val(2909100); break;
        case "8": $('#gaji_terakhir').val(2820800); break;
        case "9": $('#gaji_terakhir').val(2735300); break;
        case "10": $('#gaji_terakhir').val(2454000); break;
        case "11": $('#gaji_terakhir').val(2379500); break;
        case "12": $('#gaji_terakhir').val(2307400); break;
        case "13": $('#gaji_terakhir').val(2237400); break;
        case "14": $('#gaji_terakhir').val(2169500); break;
        case "15": $('#gaji_terakhir').val(2103700); break;
        case "16": $('#gaji_terakhir').val(1917100); break;
        case "17": $('#gaji_terakhir').val(1858900); break;
        case "18": $('#gaji_terakhir').val(1802600); break;
        case "19": $('#gaji_terakhir').val(1747900); break;
        case "20": $('#gaji_terakhir').val(1694900); break;
        case "21": $('#gaji_terakhir').val(1643500); break;
        case "22": $('#gaji_terakhir').val(3593100); break;
        case "23": $('#gaji_terakhir').val(3447200); break;
        case "24": $('#gaji_terakhir').val(3307300); break;
        case "25": $('#gaji_terakhir').val(3173100); break;
        case "26": $('#gaji_terakhir').val(3044300); break;
        case "27": $('#gaji_terakhir').val(2920800); break;
        case "28": $('#gaji_terakhir').val(2802300); break;
        case "29": $('#gaji_terakhir').val(2688500); break;
        case "30": $('#gaji_terakhir').val(2579400); break;
        case "31": $('#gaji_terakhir').val(2399200); break;
        case "32": $('#gaji_terakhir').val(2301800); break;
        case "33": $('#gaji_terakhir').val(2301800); break;
        case "34": $('#gaji_terakhir').val(2022200); break;
        case "35": $('#gaji_terakhir').val(1851800); break;
        case "36": $('#gaji_terakhir').val(1776600); break;
        case "37": $('#gaji_terakhir').val(1704500); break;
        case "38": $('#gaji_terakhir').val(1560800); break;
   default: 
        $('#gaji_terakhir').val(0);
}
    
});











</script>


@endsection