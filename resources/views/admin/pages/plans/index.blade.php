@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Planos</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Planos
            </h1>
        </div>

        <div class="col-md-6">
            <div class="row float-right pr-2">
                <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" class="form-control mr-2" value="{{ $filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
                </form>
                <a href="{{ route('plans.create') }}" class="btn btn-dark ml-2">
                    <i class="fas fa-plus-square"></i>
                    Cadastrar
                </a>
            </div>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.pages.plans.includes.alerts')
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
                                <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-info"></i></a>
                                    <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i
                                            class="fas fa-trash"></i></button>
                                </form>
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
