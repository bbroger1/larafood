@csrf
@include('admin.pages.plans.includes.alerts')
<div class="form-group">
    <label for="name">Nome:</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="Nome do plano"
        value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input class="form-control" type="text" name="price" id="price" placeholder="0,00"
        value="@php
            if (isset($plan->price)) {
                $price = number_format($plan->price, 2, ',', '.');
            }
        @endphp {{ $price ?? old('price') }}">
</div>
<div class=" form-group">
    <label for="description">Descrição:</label>
    <input class="form-control" type="text" name="description" id="description" placeholder="Descrição do plano"
        value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button class="btn btn-success" type="input" name="btn-confirm" id="btn-confirm">Confirmar</button>
</div>
