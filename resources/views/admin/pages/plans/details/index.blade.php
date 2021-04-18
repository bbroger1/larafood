@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item active">Detalhe</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Detalhe do Plano {{ $plan->name }}
            </h1>
        </div>

        <div class="col-md-6">
            <div class="row float-right pr-2">
                <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark ml-2">
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
            @include('admin.pages.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td class="text-center" width='20%'>
                                <span class="d-none d-md-block">
                                    <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop
