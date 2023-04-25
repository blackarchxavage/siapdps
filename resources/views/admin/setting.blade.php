@extends('template.main')
@section('title','Setting')
@section('breadcrumb','SETTING')

@section('content')


    <div class="error-body text-center">
        <h1 class="error-title text-info">503</h1>
        <h3 class="text-uppercase error-subtitle">SETTING PAGE IS GETTING UP SOON</h3>
        <p class="text-muted mt-4 mb-4">PLEASE TRY AFTER SOME TIME</p>
        <a href="{{ url('/') }}" class="btn btn-danger btn-rounded waves-effect waves-light mb-5">Back to home</a> </div>

@endsection

<!--Active Page JavaScript -->
@section('pagejs')

@endsection