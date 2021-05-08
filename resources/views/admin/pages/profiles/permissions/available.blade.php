@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Permissões</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <h1>
                Cadastrar permissões do perfil {{ $profile->name }}
            </h1>
        </div>

        <div class="col-md-6">
            <div class="row float-right pr-2">
                <form action="{{ route('profiles.permissions.available.search', $profile->id) }}" method="POST"
                    class="form form-inline">
                    @csrf
                    <input type="text" name="filter" class="form-control mr-2" value="{{ $filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
                </form>
                <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark ml-2">
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
                        <th width="50px">#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="post">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan='3' class="text-right">
                                <button class="btn btn-success btn-sm" type="submit">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
