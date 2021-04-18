@extends('adminlte::page')

@section('title', "Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active">{{ $permission->name }}</a></li>
    </ol>
    <h1>Permissão {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="mb-5">
                <li> <strong>Nome:</strong> {{ $permission->name }} </li>
                <li> <strong>Descrição:</strong> {{ $permission->description }} </li>
            </ul>

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i> Excluir</button>
                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit"></i>
                    Editar</a>
            </form>
        </div>
    </div>
@stop
