@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control" required>{{ $cliente->direccion }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Actualizar Cliente</button>
        </form>
    </div>
@endsection

