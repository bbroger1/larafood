@extends('adminlte::page')

@section('title', "Editar Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Planos</a></li>
        <li class="breadcrumb-item active">{{ $plan->name }}</a></li>
    </ol>
    <h1>Editar Plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" method="POST" class="form">
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop
