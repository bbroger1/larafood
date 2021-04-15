@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Cadastrar</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-right">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control mr-2" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td class="text-center">R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td class="text-center" width='20%'>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('plans.destroy', $plan->url) }}" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
