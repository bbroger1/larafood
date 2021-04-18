@extends('adminlte::page')

@section('title', "Visualizar Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhe</a>
        </li>
        <li class="breadcrumb-item active">Visualizar</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Visualizar Detalhe do Plano {{ $plan->name }}
            </h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $detail->name }}</li>
            </ul>
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">
                    <i class="fas fa-trash"></i> Excluir
                </button>
                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i>
                    Editar
                </a>
            </form>
        </div>
    </div>
@stop
