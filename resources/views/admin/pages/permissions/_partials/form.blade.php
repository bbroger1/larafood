@csrf
@include('admin.pages.includes.alerts')
<div class="form-group">
    <label for="name">*Nome:</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="Nome da permissão"
        value="{{ $permission->name ?? old('name') }}">
</div>
<div class=" form-group">
    <label for="description">Descrição:</label>
    <input class="form-control" type="text" name="description" id="description" placeholder="Descrição da permissão"
        value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="input" name="btn-confirm" id="btn-confirm">Confirmar</button>
</div>
