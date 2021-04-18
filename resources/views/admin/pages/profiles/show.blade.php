@extends('adminlte::page')

@section('title', "Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active">{{ $profile->name }}</a></li>
    </ol>
    <h1>Perfil {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="mb-5">
                <li> <strong>Nome:</strong> {{ $profile->name }} </li>
                <li> <strong>Descrição:</strong> {{ $profile->description }} </li>
            </ul>

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i> Excluir</button>
                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit"></i>
                    Editar</a>
            </form>
        </div>
    </div>
@stop
