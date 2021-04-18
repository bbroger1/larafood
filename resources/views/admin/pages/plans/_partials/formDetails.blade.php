@csrf
@include('admin.pages.includes.alerts')
<div class="form-group">
    <label for="name">Nome:</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="Nome"
        value="{{ $detail->name ?? old('name') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">Enviar</button>
</div>
