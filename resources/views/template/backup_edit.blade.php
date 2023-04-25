@extends('template.main')
@section('title','Edit Biodata')
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/jquery-steps/steps.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('materialpro/extra-libs/prism/prism.css') }}">
<link href="{{ asset('materialpro/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet">
<style>
    span.input-group-text { background-color: white;!important }
</style>
@endsection

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-header bg-inverse">
                <h4 class="mb-0 text-white">Preview</h4>
            </div>
            <div class="card-body pb-0">
              <div class="d-flex">
                <div class="p-2">
                    <img src="{{ asset('storage/'.$biodata->foto_file) }}" class="rounded" width="150">
                </div>
                <div class="p-2 text-nowrap">
                    <dl>
                        <dt class="mt-3 text-capitalize" style="font-size: 1.1rem;">{{ $biodata->nama }}</dt>
                        <dd class="text-capitalize">@if($biodata->pangkat_id) {{ $biodata->getPangkat->nama }} @endif<br>{{ $biodata->nrp_nip }}</dd>
                    </dl>
                </div>
              </div>
            </div>
            <div class="card-header bg-inverse mt-4">
                <h4 class="mb-0 text-white">Archive</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dt>Pas Foto <sup>4x6</sup></dt>
                        <dd class="pl-2">@if($biodata->foto_file) <a href="{{ asset('storage/'.$biodata->foto_file) }}" target="_blank">{{ $biodata->foto_file }} @else - @endif</a></dd>
                        <dt>Pangkat Terakhir</dt>
                        <dd class="pl-2">@if($biodata->pangkat_file) <a href="{{ asset('storage/'.$biodata->pangkat_file) }}" target="_blank">{{ $biodata->pangkat_file }} @else - @endif</a></dd>
                        <dt>Sumber Pengangkatan</dt>
                        <dd class="pl-2">@if($biodata->sumber_file) <a href="{{ asset('storage/'.$biodata->sumber_file) }}" target="_blank">{{ $biodata->sumber_file }} @else - @endif</a></dd>
                        <dt>Kartu Tanda Anggota</dt>
                        <dd class="pl-2">@if($biodata->kta_file) <a href="{{ asset('storage/'.$biodata->kta_file) }}" target="_blank">{{ $biodata->kta_file }} @else - @endif</a></dd>
                    </dl>
                </div>
              </div>
              <hr>
              <div class="row"> 
                <div class="col d-flex">
                    <div class="ml-auto p-2">
                        <a class="btn btn-danger waves-effect waves-light" type="button" href="{{ url('delete/'.$biodata->id) }}">
                            <span class="btn-label"><i class="mdi mdi-eraser"></i></span>
                        </a>
                    </div>
                  </div>
                
              </div>
            </div>
            
        </div>
    </div>
    <!-- Column -->
    
    <!-- Column -->
    <div class="col-8">
        <div class="card">
            <div class="card-header bg-inverse">
                <h4 class="mb-0 text-white">Edit Biodata</h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">Profil</h4>
                <form class="needs-validation" novalidate
                    action="{{ url('update/'.$biodata->id) }}" method="POST" enctype="multipart/form-data"> 
                    @method('patch')
                    @csrf
                    <div class="form-body px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationTooltip01" class="text-capitalize">nama lengkap</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account"></span>
                                        </div>
                                        <input name="nama" id="validationTooltip01" type="text" class="form-control text-capitalize" 
                                        value="{{ $biodata->nama }}" @required(true)>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label for="nrp_nip" class="text-uppercase">nrp / nip</label>
                                    <input type="text" name="nrp_nip" class="form-control nip-inputmask" id="nip-mask" im-insert="true" 
                                    value="{{ $biodata->nrp_nip }}" @required(true)>
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
                                    <input name="tmp_lahir" id="tmp_lahir" type="text" class="form-control text-capitalize" 
                                    value="{{ $biodata->tmp_lahir }}" @required(true)>
                                    {{-- <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control datepicker" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" @required(true)> --}}
                                    <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" 
                                    value="@isset ($biodata->tgl_lahir){{ Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tgl_lahir)->format(format:'d-m-Y') }} @endisset" @required(true)>
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-uppercase">nik</label>
                                    <input type="text" name="nik" class="form-control nik-inputmask" id="nik-mask" im-insert="true" value="{{ $biodata->nik }}">
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
                                        <input name="kelamin_id" value="{{ $radio->id }}" id="{{ $radio->id }}" type="radio" class="with-gap material-inputs material-inputs radio-col-light-blue" @required(true)
                                        @if($biodata->kelamin_id==$radio->id) @checked(true) @else @checked(false) @endif>
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
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">nomor KTA</label>
                                    <input type="text" name="kta" class="form-control kta-inputmask" id="kta-mask" im-insert="true"
                                    value="{{ $biodata->kta }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">agama</label>
                                    <select name="agama_id" id="agama_id" class="form-control custom-select" @required(true)>
                                        <option value="">-</option>
                                        @foreach (App\Models\Agama::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->agama_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">nomor KK</label>
                                    <input type="text" name="kk" class="form-control nik-inputmask" id="nik-mask" im-insert="true"
                                    value="{{ $biodata->kk }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">status</label>
                                    <select name="status_id" id="status_id" class="form-control custom-select" @required(true)>
                                        <option value="">-</option>
                                        @foreach (App\Models\Status::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->status_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucfirst($opt->nama) }}</option>
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
                                        <input name="nama_pasangan" id="nama_pasangan" type="text" class="form-control text-capitalize"
                                        value="{{ $biodata->nama_pasangan }}">
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
                                        <input type="text" name="phone1" class="form-control hp-inputmask" id="phone1" placeholder="" im-insert="true"
                                        value="{{ $biodata->phone1 }}" @required(true)>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone-classic"></span>
                                        </div>
                                        <input type="text" name="phone2" class="form-control hp-inputmask" id="phone2" placeholder="" im-insert="true"
                                        value="{{ $biodata->phone2 }}">
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
                                        <input name="email" id="email" type="email" class="form-control text-lowercase"
                                        value="{{ $biodata->email }}" @required(true)>
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
                                        <textarea name="alamat_sekarang" id="alamat_sekarang" class="form-control text-capitalize" rows="1" @required(true)>{{ $biodata->alamat_sekarang }}</textarea>
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
                                        <textarea name="alamat_pensiun" id="alamat_pensiun" class="form-control text-capitalize" rows="1">{{ $biodata->alamat_pensiun }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-capitalize">pangkat / korps / TMT pangkat</label>
                                <div class="form-group input-group">
                                    <select name="pangkat_id" id="pangkat" class="form-control custom-select col-4" @required(true)>
                                        <option value="">-</option>
                                        @foreach (App\Models\Pangkat::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->pangkat_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <select name="korps_id" id="korps" class="form-control custom-select col-3">
                                        <option value="">-</option>
                                        @foreach (App\Models\Korps::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->korps_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="tmt_pangkat" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" 
                                    value="@isset ($biodata->tmt_pangkat){{ Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_pangkat)->format(format:'d-m-Y') }} @endisset" @required(true)>
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
                                    <select name="sumber_id" id="sumber_id"class="form-control custom-select text-capitalize" @required(true)>
                                        <option value="">-</option>
                                        @foreach (App\Models\Sumber::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->sumber_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="tmt_sumber" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" 
                                    value="@isset ($biodata->tmt_sumber){{ Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_sumber)->format(format:'d-m-Y') }} @endisset" @required(true)>
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div>
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
                                    <select name="kategori_id" id="kategori_id" class="form-control custom-select" @required(true)>
                                        <option value="">-</option>
                                        @foreach (App\Models\Kategori::all() as $opt)
                                        <option value="{{ $opt->id }}" @if($biodata->kategori_id==$opt->id) @selected(true) @else @selected(false) @endif>{{ ucwords($opt->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="tmt_kategori" type="text" class="form-control tanggal-inputmask" placeholder="DD-MM-YYYY" 
                                    value="@isset ($biodata->tmt_kategori){{ Carbon\Carbon::createFromFormat('Y-m-d', $biodata->tmt_kategori)->format(format:'d-m-Y') }} @endisset" @required(true)>
                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-calender"></i></span></div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">file KTA</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-pdf"><sub>pdf</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="kta_file" id="kta_file" type="file" class="custom-file-input">
                                            <label class="custom-file-label" for="kta_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">jabatan terakhir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-flag-variant"></span>
                                        </div>
                                        <input name="jabatan" id="jabatan" type="text" class="form-control text-capitalize" placeholder="" maxlength="100" 
                                        value="{{ $biodata->jabatan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="form-group">
                                    <label class="text-capitalize">Pas Foto </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-file-image"><sub>jpg</sub></span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="foto_file" id="foto_file" type="file" class="custom-file-input @error('foto_file') is-invalid @enderror" onchange="previewImage()">
                                            <label class="custom-file-label" for="foto_file">Choose file</label>
                                        </div>
                                    </div>
                                    @error('foto_file')<code class="text-info">{{ $message }}</code>@enderror
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
                                        <input type="text" name="gaji_terakhir" class="form-control rupiah-inputmask" id="currency-mask" placeholder="" im-insert="true" 
                                        value="{{ $biodata->gaji_terakhir }}" @required(true)>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-capitalize">pensiun</span>
                                            <span class="input-group-text text-capitalize">rp.</span>
                                        </div>
                                        <input type="text" name="gaji_pensiun" class="form-control rupiah-inputmask" id="currency-mask" placeholder="" im-insert="true" 
                                        value="{{ $biodata->gaji_pensiun }}" @required(true)>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border-left float-right pt-4">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                            </div>
                        </div>

                    </div>

                    
                </form>
            </div>
        </div>
    </div>       
    <!-- Column -->

</div>
@endsection
<!--Active Page JavaScript -->
@section('pagejs')
<script src="{{ asset('materialpro/libs/moment/moment.js') }}"></script>
<script src="{{ asset('materialpro/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script> 
{{-- <script src="{{ asset('materialpro/extra-libs/jqbootstrapvalidation/validation.js') }}"></script> --}}
<script src="{{ asset('materialpro/extra-libs/prism/prism.js') }}"></script>

<script src="{{ asset('materialpro/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('materialpro/libs/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>
<script src="{{ asset('materialpro/js/pages/forms/mask/mask.init.js') }}"></script>

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
    
    // jQuery('#tgl_lahir').datepicker({ autoclose: true, todayHighlight: true });    
    // jQuery('#date-range').datepicker({ toggleActive: true });
    // jQuery('#datepicker-inline').datepicker({ todayHighlight: true });

    // jqbootstrapvalidation validation
    // !function(window, document, $) {
    //     "use strict";
    //     $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    //     }(window, document, jQuery);


    
    //JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    //form.classList.add('was-validated');
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
@endsection