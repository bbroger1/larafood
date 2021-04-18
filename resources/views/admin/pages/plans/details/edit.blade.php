@extends('adminlte::page')

@section('title', "Editar Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhe</a>
        </li>
        <li class="breadcrumb-item active">Editar</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Editar Detalhe do Plano {{ $plan->name }}
            </h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}" method="POST">
                @method('PUT')
                @include('admin.pages.plans._partials.formDetails')
            </form>
        </div>
    </div>
@stop
