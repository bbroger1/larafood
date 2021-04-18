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
                Permissões
            </h1>
        </div>

        <div class="col-md-6">
            <div class="row float-right pr-2">
                <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" class="form-control mr-2" value="{{ $filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
                </form>
                <a href="{{ route('permissions.create') }}" class="btn btn-dark ml-2">
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
                        <th>Descrição</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td class="text-center" width='20%'>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('permissions.show', $permission->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
