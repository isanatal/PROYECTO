@extends('layouts.app')

@section('content')
    <h1>Crear Factura</h1>
    <form action="{{ route('facturas.store') }}" method="POST" id="createInvoiceForm">
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

    <!-- Agregar SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script>
        // Capturamos el evento de submit del formulario
        document.getElementById('createInvoiceForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenimos el envío del formulario

            // Mostramos la alerta de confirmación de SweetAlert
            Swal.fire({
                title: '¿Estás seguro de crear esta factura?',
                text: 'Los datos de la factura se guardarán permanentemente.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, guardar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    confirmButton: 'btn btn-primary', // Personalizar el botón de confirmación
                    cancelButton: 'btn btn-danger' // Personalizar el botón de cancelación
                },
                allowOutsideClick: false,
                reverseButtons: true,
                padding: '2em',
                backdrop: true,
                heightAuto: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviamos el formulario
                    this.submit();
                }
            });
        });

        // Mostrar mensaje de éxito o error si la creación es exitosa o falla
        @if(session('status') == 'success')
            Swal.fire({
                icon: 'success',
                title: 'Factura creada',
                text: 'La factura ha sido creada correctamente.',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        @elseif(session('status') == 'error')
            Swal.fire({
                icon: 'error',
                title: 'Error al crear',
                text: 'Hubo un problema al crear la factura.',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-danger'
                }
            });
        @endif
    </script>
@endsection
