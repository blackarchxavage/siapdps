@extends('template.main')
@section('title','Data Pensiun')
{{-- @section('breadcrumb','Pensiun') --}}
@section('breadcrumb_parent','Admin')
@section('breadcrumb_child','Add New')
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/extra-libs/prism/prism.css') }}">
<link href="{{ asset('materialpro/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet">
<style>
    span.input-group-text { background-color: white;!important }
</style>
@endsection

@section('content')
<div class="container-md">
<div class="row">
    <div class="col-12">
        <div class="card"> 
            <div class="card-header bg-inverse">
                <h4 class="mb-0 text-white">Tambah Personel</h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">Profil</h4>
                <form class="needs-validation" novalidate
                    action="{{ url('store') }}" 
                    method="POST"
                    enctype="multipart/form-data"> @csrf

                    <div class="form-body px-4">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01" class="text-capitalize">nama lengkap</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account"></span>
                                        </div>
                                        <input name="nama" id="validationTooltip01" type="text" class="form-control text-capitalize @error('nama') is-invalid @enderror" value="{{old('nama')}}" @required(true)>
                                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label for="nrp_nip" class="text-uppercase">nrp / nip</label>
                                    <input type="text" name="nrp_nip" class="form-control nip-inputmask @error('nrp_nip') is-invalid @enderror" id="nip-mask" im-insert="true" value="{{old('nrp_nip')}}" @required(true)>
                                    @error('nrp_nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-capitalize">tempat, tanggal lahir</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text mdi mdi-baby-buggy"></span>
                                    </div>
                                    <input name="tmp_lahir" id="tmp_lahir" type="text" class="form-control text-capitalize" value="{{old('tmp_lahir')}}">
                                    {{-- <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control datepicker" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" @required(true)> --}}
                                    <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" value="{{old('tgl_lahir')}}">
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div>
                                </div>
                            </div>
                            <div class="col-md-3 border-left">
                                <div class="form-group">
                                    <label class="text-uppercase">nik</label>
                                    <input type="text" name="nik" class="form-control nik-inputmask" id="nik-mask" im-insert="true" value="{{old('nik')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-uppercase">NPWP</label>
                                    <input type="text" name="npwp" class="form-control npwp-inputmask" id="npwp-mask" im-insert="true" value="{{old('npwp')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div id="jk" for="jk" class="input-group form-control border-1">
                                        
                                      @foreach (App\Models\Kelamin::all() as $radio)
                                      <div class="col-5">
                                        <input name="kelamin_id" value="{{ $radio->id }}" id="{{ $radio->id }}" type="radio" class="with-gap material-inputs material-inputs radio-col-light-blue"
                                        @if(old('kelamin_id')==$radio->id) @checked(true) @else @checked(false) @endif>
                                        <label for="{{ $radio->id }}" style="font-size:14px;">{{ ucfirst($radio->nama) }}</label>
                                      </div>
                                      @endforeach
                                      {{-- <div class="col-5">
                                        <input name="kelamin_id" value="9" id="2" type="radio" class="with-gap material-inputs material-inputs radio-col-light-blue" @required(true)>
                                        <label for="2" class="text-capitalize">test 2</label>
                                      </div> --}}
                                      
                                      <div class="col-2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">nomor KTA</label>
                                    <input type="text" name="kta" class="form-control kta-inputmask" id="kta-mask" im-insert="true" value="{{old('kta')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-capitalize">BPJS</label>
                                    <input type="text" name="bpjs" class="form-control bpjs-inputmask" id="bpjs-mask" im-insert="true" value="{{old('bpjs')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">agama</label>
                                    <select name="agama_id" id="agama_id" class="form-control custom-select">
                                        <option value="">-</option>
                                        @foreach (App\Models\Agama::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('agama_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">nomor KK</label>
                                    <input type="text" name="kk" class="form-control nik-inputmask" id="nik-mask" im-insert="true" value="{{old('kk')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">status</label>
                                    <select name="status_id" id="status_id" class="form-control custom-select">
                                        <option value="">-</option>
                                        @foreach (App\Models\Status::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('status_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">nama istri / suami</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-human-male-female"></span>
                                        </div>
                                        <input name="nama_pasangan" id="nama_pasangan" type="text" class="form-control text-capitalize" value="{{old('nama_pasangan')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">kontak</label>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-cellphone"></span>
                                        </div>
                                        <input type="text" name="phone1" class="form-control hp-inputmask" id="phone1" placeholder="" im-insert="true" value="{{old('phone1')}}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone-classic"></span>
                                        </div>
                                        <input type="text" name="phone2" class="form-control hp-inputmask" id="phone2" placeholder="" im-insert="true" value="{{old('phone2')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-email"></span>
                                        </div>
                                        <input name="email" id="email" type="email" class="form-control text-lowercase" value="{{old('email')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_sekarang" class="text-capitalize">alamat rumah</label> 
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-map-marker-radius"></span>
                                        </div>
                                        <textarea name="alamat_sekarang" id="alamat_sekarang" class="form-control text-capitalize" rows="1">{{old('alamat_sekarang')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label for="alamat_pensiun" class="text-capitalize">alamat pensiun</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-map-marker-plus"></span>
                                        </div>
                                        <textarea name="alamat_pensiun" id="alamat_pensiun" class="form-control text-capitalize" rows="1">{{old('alamat_pensiun')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-capitalize">pangkat / korps / TMT pangkat</label>
                                <div class="form-group input-group">
                                    <select name="pangkat_id" id="pangkat" class="form-control custom-select col-4">
                                        <option value="">-</option>
                                        @foreach (App\Models\Pangkat::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('pangkat_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <select name="korps_id" id="korps" class="form-control custom-select col-3">
                                        <option value="">-</option>
                                        @foreach (App\Models\Korps::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('korps_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="tmt_pangkat" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" value="{{old('tmt_pangkat')}}">
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group-sm">
                                    <label class="text-capitalize">file pangkat terakhir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-pdf"><sub>pdf</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="pangkat_file" id="pangkat_file" type="file" class="custom-file-input">
                                            <label class="custom-file-label" for="pangkat_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-capitalize">sumber pangkat</label>
                                <div class="form-group input-group">
                                    <select name="sumber_id" id="sumber_id"class="form-control custom-select text-capitalize">
                                        <option value="">-</option>
                                        @foreach (App\Models\Sumber::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('sumber_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control" id="tmt_sumber" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    {{-- <input type="date" name="tmt_sumber" id="tmt_sumber" class="form-control"> --}}
                                    {{-- <input type="text" name="tmt_sumber" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" value="{{old('tmt_sumber')}}"> --}}
                                    {{-- <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div> --}}
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">file sumber pangkat</label> 
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-pdf"><sub>pdf</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="sumber_file" id="sumber_file" type="file" class="custom-file-input">
                                            <label class="custom-file-label" for="sumber_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-capitalize">Kategori Pensiun</label>
                                <div class="form-group input-group">
                                    <select name="kategori_id" id="kategori_id" class="form-control custom-select">
                                        <option value="">-</option>
                                        @foreach (App\Models\Kategori::all() as $opt)
                                        <option value="{{ $opt->id }}" @if(old('kategori_id')==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="date" name="tmt_kategori" id="tmt_kategori" class="form-control"> --}}
                                    <input type="text" class="form-control" id="tmt_kategori" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    {{-- <input type="text" name="tmt_kategori" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" value="{{old('tmt_kategori')}}">
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div> --}}
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">file KTA</label> 
                                    @error('kta_file') <small class="form-control-feedback text-danger"> {{ $message }} </small>@enderror
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-pdf"><sub>pdf</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="kta_file" id="kta_file" type="file" class="custom-file-input @error('kta_file') is-invalid @enderror">
                                            <label class="custom-file-label" for="kta_file">Choose file</label>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-capitalize">masa kerja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-flag-variant"></span>
                                        </div>
                                        <input name="masa_kerja" id="masa_kerja" type="text" class="form-control text-capitalize" @readonly(true)>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-capitalize">jabatan terakhir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-flag-variant"></span>
                                        </div>
                                        <input name="jabatan" id="jabatan" type="text" class="form-control text-capitalize" placeholder="" maxlength="100" value="{{old('jabatan')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">Pas Foto</label>
                                    @error('foto_file') <small class="form-control-feedback text-danger"> {{ $message }} </small>@enderror
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-image"><sub>jpg</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="foto_file" id="foto_file" type="file" class="custom-file-input @error('foto_file') is-invalid @enderror">
                                            <label class="custom-file-label" for="foto_file">Choose file</label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">jumlah gaji</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-capitalize">terakhir</span>
                                            <span class="input-group-text text-capitalize">rp.</span>
                                        </div>
                                        <input type="text" name="gaji_terakhir" class="form-control rupiah-inputmask" id="currency-mask" placeholder="" im-insert="true" value="{{old('gaji_terakhir')}}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-capitalize">pensiun</span>
                                            <span class="input-group-text text-capitalize">rp.</span>
                                        </div>
                                        <input type="text" name="gaji_pensiun" class="form-control rupiah-inputmask" id="currency-mask" placeholder="" im-insert="true" value="{{old('gaji_pensiun')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left float-right pt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
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
<script src="{{ asset('materialpro/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
{{-- <script src="{{ asset('materialpro/libs/jquery-steps/build/jquery.steps.min.js') }}"></script> --}}
{{-- <script src="{{ asset('materialpro/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>  --}}
{{-- <script src="{{ asset('materialpro/extra-libs/jqbootstrapvalidation/validation.js') }}"></script> --}}
<script src="{{ asset('materialpro/extra-libs/prism/prism.js') }}"></script>

<script src="{{ asset('materialpro/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/mask/mask.init.js') }}"></script>
<script src="{{ asset('materialpro/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('materialpro/extra-libs/toastr/dist/build/toastr.min.js') }}"></script>
<script src="{{ asset('materialpro/extra-libs/toastr/toastr-init.js') }}"></script>

@endsection


@section('customjs')

<script>

    // Date Picker
    //jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
jQuery('#tmt_sumber, #tmt_kategori').datepicker({
    autoclose: true,
    todayHighlight: true,
    changeMonth: true,
    changeYear: true
});
 
window.onload = function() {
        $('#tmt_sumber').on('change', function() {
            var dob = new Date(this.value);
            //var today = new Date();
            var today = new Date($("#tmt_kategori").val());
            
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#masa_kerja').val(age);
        });
    }
    
// $(function() {
//     $("#tmt_sumber").datepicker();
//     var date1 = $("#tmt_sumber")
// });
// $(function() {
//     $("#tmt_kategori").datepicker();
//     var date2 = $("#tmt_kategori")
// });
// $("#masa_kerja").load(function() {
//     date1 = new Date(date1.value);
//     date2 = new Date(date2.value);
//     var milli_secs = date1.getTime() - date2.getTime();
        
//     // Convert the milli seconds to Days 
//     var days = milli_secs / (1000 * 3600 * 24);
//     alert( "Load was performed." );
//     document.getElementById("masa_kerja").innerHTML =
//     Math.round(Math.abs(days));
// });











    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });


  

   
    // Date Picker
    jQuery('.datepicker, #datepicker, .input-group.date').datepicker();

    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    
    //JavaScript for disabling form submissions if there are invalid fields
    // (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //         var forms = document.getElementsByClassName('needs-validation');
    //         // Loop over them and prevent submission
    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 //form.classList.add('was-validated');
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();
    
    
</script>
@endsection