@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="mb-5">
                <li> <strong>Nome:</strong> {{ $plan->name }} </li>
                <li> <strong>Preço:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }} </li>
                <li> <strong>URL:</strong> {{ $plan->url }} </li>
                <li> <strong>Descrição:</strong> {{ $plan->description }} </li>
            </ul>

            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i> Excluir</button>
                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                    Editar</a>
            </form>
        </div>
    </div>
@stop
