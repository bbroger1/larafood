@extends('adminlte::page')

@section('title', 'Perfis da Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Perfis</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Perfis da permissão {{ $permission->name }}
            </h1>
        </div>

        <div class="col-md-6">
            <div class="row float-right pr-2">
                <a href="{{ route('permissions.index') }}" class="btn btn-dark ml-2">
                    <i class="fas fa-arrow-left"></i>
                    Voltar
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
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
