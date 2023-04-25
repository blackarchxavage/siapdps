@extends('template.main')
@section('title','Dashboard')
{{-- @section('breadcrumb','Pensiun') --}}
@section('breadcrumb_parent','Dashboard')
{{-- @section('breadcrumb_child','Edit Biodata') --}}

@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <h3 class="text-white p-2 mb-0"><i class="ti-server"></i></h3>
                </div>
                <div class="text-white align-self-center p-2">
                    <h3 class="mb-0 text-white">{{App\Models\Biodata::where('kategori_id',1)->get()->count()}} records  </h3>
                    <span class="text-white">Pensiun Alami</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card bg-info">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <h3 class="text-white p-2 mb-0"><i class="ti-server"></i></h3></div>
                <div class="text-white align-self-center p-2">
                    <h3 class="mb-0 text-white">{{App\Models\Biodata::where('kategori_id',2)->get()->count()}} records </h3>
                    <span class="text-white">Pensiun Dini</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <h3 class="text-white p-2 mb-0"><i class="ti-server"></i></h3></div>
                <div class="text-white align-self-center p-2">
                    <h3 class="mb-0 text-white">{{App\Models\Biodata::where('kategori_id',3)->get()->count()}} records </h3>
                    <span class="text-white">Pensiun Duda/Janda</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card bg-inverse">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <h3 class="text-white p-2 mb-0"><i class="ti-server"></i></h3></div>
                <div class="text-white align-self-center p-2">
                    <h3 class="mb-0 text-white">{{App\Models\Biodata::where('kategori_id',4)->get()->count()}} records </h3>
                    <span class="text-white">Pensiun Meninggal</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<div class="row d-flex">
    <div class="col-sm-12 col-md-6">
        <div class="jumbotron jumbotron-fluid p-5">
            <div class="container">
                
                <h1 class="display-3">SIAPDPS</h1>
                <h4>Selamat datang di Sistem Aplikasi Data Pensiun.</h4>
            </div>
        </div>
    </div>
    
</div>


@endsection

<!--Active page JavaScript -->
@section('pagejs')

@endsection