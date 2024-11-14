@extends('layouts.app')

@section('content')

    <h1>Lista de Facturas</h1>
    <a href="{{ route('facturas.create') }}" class="btn btn-primary">Crear Factura</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Número de Factura</th>
                <th>Cliente</th>
                <th>Fecha de Emisión</th>
                <th>Monto Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->numero_factura }}</td>
                    <td>{{ $factura->cliente->nombre }}</td>
                    <td>{{ $factura->fecha_emision }}</td>
                    <td>{{ $factura->monto_total }}</td>
                    <td>{{ $factura->estado }}</td>
                    <td>
                        <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
