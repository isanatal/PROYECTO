@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente) }}" method="POST" id="updateForm">
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
            <button type="submit" class="btn btn-success w-100">Actualizar Cliente</button>
        </form>
    </div>

    <!-- Agregar SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script>
        // Capturamos el evento de submit del formulario
        document.getElementById('updateForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenimos el envío del formulario

            // Mostramos la alerta de confirmación de SweetAlert
            Swal.fire({
                title: '¿Estás seguro de actualizar este cliente?',
                text: 'Los cambios serán guardados permanentemente.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    confirmButton: 'btn btn-success', // Personalizar el botón de confirmación
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

        // Mostrar mensaje de éxito o error si la actualización es exitosa o falla
        @if(session('status') == 'success')
            Swal.fire({
                icon: 'success',
                title: 'Cliente actualizado',
                text: 'Los datos del cliente se han actualizado correctamente.',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        @elseif(session('status') == 'error')
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar',
                text: 'Hubo un problema al actualizar los datos del cliente.',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-danger'
                }
            });
        @endif
    </script>

@endsection
