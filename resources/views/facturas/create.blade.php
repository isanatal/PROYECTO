@extends('layouts.app')

@section('content')
    <h1>Crear Factura</h1>
    <form action="{{ route('facturas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numero_factura">Número de Factura</label>
            <input type="text" name="numero_factura" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto_total">Monto Total</label>
            <input type="number" step="0.01" name="monto_total" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="impuestos">Impuestos</label>
            <input type="number" step="0.01" name="impuestos" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="pagado">Pagado</option>
                <option value="anulado">Anulado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
@endsection
