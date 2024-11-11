@extends('layouts.app')

@section('content')
    <h1>Crear producto nuevo</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>
        <div>
            <label for="description">Descripccion:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Crear</button>
    </form>
@endsection
