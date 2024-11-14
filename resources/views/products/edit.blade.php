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
                <label for="description">Descripcción:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>

    <script>
        // Verifica si hay un mensaje de éxito en la sesión
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@endsection
