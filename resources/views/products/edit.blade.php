@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div class="container">
        <h1 class="page-title">Editar producto</h1>
        <form action="{{ route('products.update', $product) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descripccion:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
