@extends('template.main')
@section('title','Detail Biodata')
@section('breadcrumb_parent','Biodata')
@section('breadcrumb_child','Detail')
@section('pagecss')
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

<!-- Success Alert Modal -->
<div id="updated-alert-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-success">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-checkmark h1"></i>
                    <h4 class="mt-2">Goodjob!</h4>
                    <p class="mt-3">Data berhasil di update!</p>
                    <button type="button" class="btn btn-light my-2"
                        data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container-lg">
<div class="row">
    
    <div class="col-md-6">
        <div class="card-footer bg-dark">
            <div class="d-flex no-block align-items-center">
                <h5 class="mb-0 text-white"><i class="mdi mdi-account"></i> Biodata</h5>
            </div>
        </div>
        <div class="card-group mb-2">

            <div class="card col-4">
                <div class="card-body text-center text-white">
                    <div class="p-1">
                        <img src="{{ asset('storage/'.$biodata->foto_file) }}" class="rounded" style="max-width: 100px; height:auto;">
                    </div>
                </div>
            </div>
            <div class="card col">
                <div class="card-body">
                    <div class="mt-0">
                        <dl>
                            <dt>Nama</dt>
                            <dd>{{ $biodata->getVal($biodata->nama)}}</dd>
                            <dt>Tempat, Tgl Lahir</dt>
                            <dd>{{ $biodata->getVal($biodata->tmp_lahir)}}, {{ $biodata->getVal(Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tgl_lahir)->format(format:'d M Y'))}} <sup>{{ '('.$biodata->getVal($biodata->usia).' Tahun)' }}</sup></dd>
                            <dt>Phone</dt>
                            <dd>{{$biodata->getVal($biodata->phone1)}}</dd>
                            <dt>Email</dt>
                            <dd>{{$biodata->getVal($biodata->email)}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="card-footer text-info bg-dark">
            <div class="d-flex no-block align-items-center">
                <h5 class="mb-0 text-white"><i class="mdi mdi-information"></i> Detail</h5>
            </div>
        </div>
        <div class="card-group mb-2">
            <!-- Column -->
            <div class="card col-6">
                <div class="card-body">
                    <div class="mt-0">
                        <dl>
                            <dt>Agama</dt>
                            <dd>@if($biodata->agama_id){{$biodata->getAgama->nama}}@endif</dd>
                            <dt>Jenis Kelamin</dt>
                            <dd>@if($biodata->kelamin_id){{$biodata->getKelamin->nama}}@endif</dd>
                            <dt>Status</dt>
                            <dd>@if($biodata->status_id){{$biodata->getStatus->nama}}@endif</dd>
                            <dt>Nama Suami/Istri</dt>
                            <dd>{{ $biodata->getVal($biodata->nama_pasangan)}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="card col-6">
                <div class="card-body">
                    <div class="mt-0">
                        <dl>
                            <dt>NIK</dt>
                            <dd>{{ $biodata->getVal($biodata->nik)}}</dd>
                            <dt>NO BPJS</dt>
                            <dd>{{ $biodata->getVal($biodata->bpjs)}}</dd>
                            <dt>NPWP</dt>
                            <dd>{{ $biodata->getVal($biodata->npwp)}}</dd>
                            <dt>NO KTA</dt>
                            <dd>{{$biodata->getVal($biodata->kta)}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            
            <!-- Column -->
        </div>
        <div class="card-footer text-info bg-dark">
            <div class="d-flex no-block align-items-center">
                <h5 class="mb-0 text-white"><i class="mdi mdi-map-marker"></i> Alamat</h5>
            </div>
        </div>
        <div class="card-group mb-2">
            <!-- Column -->
            <div class="card col">
                <div class="card-body">
                    <div class="mt-0">
                        <dl>
                            <dt>Alamat Sekarang</dt>
                            <dd>{{$biodata->getVal($biodata->alamat_sekarang)}}</dd>
                            <dt>Alamat Pensiun</dt>
                            <dd>{{$biodata->getVal($biodata->alamat_pensiun)}}</dd>
                            
                        </dl>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

    </div>

    
    <div class="col-md-6">
        <div class="card mb-2">
            <div class="card-footer text-info bg-white">
                <div class="d-flex no-block align-items-center">
                    <h5 class="mb-0"><i class="mdi mdi-home-modern"></i> Kedinasan</h5>
                </div>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="d-inline-block col-6 float-left">
                    <dl>
                        <dt>Pangkat Golongan</dt>
                        <dd>@if($biodata->pangkat_id) {{ $biodata->getPangkat->nama }}@endif @if($biodata->korps_id) {{ $biodata->getKorps->nama }}@endif</dd>
                    </dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl>
                        <dt>TMT</dt>
                        <dd>{{ $biodata->getVal(Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_pangkat)->format(format:'d-m-Y'))}}</dd>
                    </dl>
                </div>
                <div class="d-inline-block col-12">
                    <dl>
                        <dt>Jabatan Terakhir</dt>
                        <dd>{{ $biodata->getVal($biodata->jabatan)}}</dd>
                    </dl>
                </div>
                <div class="d-inline-block col-6 float-left">
                        <dl>
                            <dt>Sumber Pangkat</dt>
                            <dd>@if($biodata->sumber_id) {{ $biodata->getSumber->nama }}@endif</dd>
                            <dt>Kategori Pensiun</dt>
                            <dd>@if($biodata->kategori_id) {{ $biodata->getKategori->nama }}@endif</dd>
                        </dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl>
                        <dt>TMT</dt>
                        <dd>{{ $biodata->getVal(Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_sumber)->format(format:'d-m-Y'))}}</dd>
                        <dt>TMT</dt>
                        <dd>{{ $biodata->getVal(Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_kategori)->format(format:'d-m-Y'))}}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-footer text-info bg-white">
                <div class="d-flex no-block align-items-center">
                    <h5 class="mb-0"><i class="mdi mdi-currency-usd"></i> Gaji</h5>
                </div>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="d-inline-block col-6 float-left">
                    <dl><dt>Gaji Pokok</dt></dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl><dd class="rupiah-inputmask">{{$biodata->getVal($biodata->gaji_terakhir)}}</dd></dl>
                </div>
                <div class="d-inline-block col-6 float-left">
                    <dl><dt>Tunjangan Istri/Suami</dt></dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl><dd class="rupiah-inputmask">0</dd></dl>
                </div>
                <div class="d-inline-block col-6 float-left">
                    <dl><dt>Masa Kerja</dt></dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl><dd>@if($biodata->tahun_masa_kerja) {{$biodata->getVal($biodata->tahun_masa_kerja)}} @else 0 @endif Tahun @if($biodata->bulan_masa_kerja) {{$biodata->bulan_masa_kerja}} @else 0 @endif Bulan</dd></dl>
                </div>
                <div class="d-inline-block col-6 float-left">
                    <dl><dt>Gaji Pensiun</dt></dl>
                </div>
                <div class="d-inline-block col-6">
                    <dl><dd class="rupiah-inputmask">{{$biodata->getVal($biodata->gaji_pensiun)}}</dd></dl>
                </div>
                
            </div>
        </div>


        <div class="card">
            <div class="card-footer text-info bg-white">
                <div class="d-flex no-block align-items-center">
                    <h5 class="mb-0"><i class="mdi mdi-file-pdf-box"></i> Dokumen</h5>
                </div>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="d-inline-block col-12 float-left">
                    <dl>
                        <dt>Arsip Pangkat Terakhir</dt>
                        <dd>@if($biodata->pangkat_file) <a href="{{ asset('storage/'.$biodata->pangkat_file) }}" target="_blank">{{ $biodata->pangkat_file }} @else - @endif</a></dd>
                        <dt>Arsip Sumber Pangkat</dt>
                        <dd>@if($biodata->sumber_file) <a href="{{ asset('storage/'.$biodata->sumber_file) }}" target="_blank">{{ $biodata->sumber_file }} @else - @endif</a></dd>
                        <dt>Arsip KTA</dt>
                        <dd>@if($biodata->kta_file) <a href="{{ asset('storage/'.$biodata->kta_file) }}" target="_blank">{{ $biodata->kta_file }} @else - @endif</a></dd>
                    </dl>
                </div>

                
            </div>
        </div>


    </div>
    <div class="col-md-12 mb-4">
        <div class="action-form">
            <div class="form-group mb-0 text-center d-flex justify-content-center">
                <form action="{{ url('edit/'.$biodata->id) }}" method="POST" enctype="multipart/form-data"> @method('get') @csrf
                    <button type="submit" class="btn btn-success waves-effect waves-light mdi mdi-crop px-4 mx-2"> E D I T</button>
                </form>
                <form action="#">
                    <button type="button" class="btn btn-success waves-effect waves-light mdi mdi-printer px-4 mx-2"> P R I N T</button>
                </form>
                <form action="{{ url('delete/'.$biodata->id) }}" method="post"> @method('delete') @csrf
                    <button type="submit" class="btn btn-dark waves-effect waves-light mdi mdi-eraser px-3 mx-2"> D E L E T E</button>
                </form>
                
            </div>
        </div>
    </div>

</div>
</div>
@endsection
<!--Active Page JavaScript -->
@section('pagejs')
<script src="{{ asset('materialpro/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/mask/mask.init.js') }}"></script>
@endsection


@section('customjs')

@if( Session::has('updated'))
<script type="text/javascript">
//feedback modal alert
$(document).ready(function() {
    $('#updated-alert-modal').modal();
});
</script>
@endif

@endsection