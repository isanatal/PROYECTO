@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cliente</h1>
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver a la lista</a>
    </div>
@endsection