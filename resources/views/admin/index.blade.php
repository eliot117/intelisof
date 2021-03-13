@extends('admin.layouts.app')

@section('title')
    Panel Administrativo
@endsection

@section('subtitle')
{{ __('Dashboard') }}
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
            {{ session('status') }}
    </div>
@endif

{{ __('¡Has iniciado Sesión!') }}
@endsection


