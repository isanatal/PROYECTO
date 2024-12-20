@extends('layouts.app')

@section('content')
    <h1>Editar Factura</h1>
    <form action="{{ route('facturas.update', $factura->id) }}" method="POST" id="editFacturaForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="numero_factura">Número de Factura</label>
            <input type="text" name="numero_factura" class="form-control" value="{{ $factura->numero_factura }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" class="form-control" value="{{ $factura->fecha_emision }}" required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $factura->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="monto_total">Monto Total</label>
            <input type="number" step="0.01" name="monto_total" class="form-control" value="{{ $factura->monto_total }}" required>
        </div>
        <div class="form-group">
            <label for="impuestos">Impuestos</label>
            <input type="number" step="0.01" name="impuestos" class="form-control" value="{{ $factura->impuestos }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="pendiente" {{ $factura->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagado" {{ $factura->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="anulado" {{ $factura->estado == 'anulado' ? 'selected' : '' }}>Anulado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Añadir un manejador de evento para la confirmación antes de enviar el formulario
            document.getElementById('editFacturaForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Prevenir el envío inmediato del formulario

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¿Quieres actualizar los datos de esta factura?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, enviar el formulario
                        e.target.submit();
                    }
                });
            });
        </script>
    @endpush
@endsection

