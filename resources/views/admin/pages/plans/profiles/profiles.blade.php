@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}" class="active">Perfis</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>Perfis do plano <strong>{{ $plan->name }}</strong></h1>
        </div>
        <div class="col-md-6">
            <div class="row float-right pr-2">
                <form action="{{ route('profiles.available.search', $plan->id) }}" method="POST" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" class="form-control mr-2" value="{{ $filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
                </form>
                <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark ml-2">
                    <i class="fas fa-plus-square"></i>
                    Vincular
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
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-eye-slash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
