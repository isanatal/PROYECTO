@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Cliente</h1>

        @if(session('success'))
            <script>
                Swal.fire({
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST" id="form-cliente-funcion">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Guardar Cliente</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('form-cliente-funcion').on('submit', function(event) {
                event.preventDefault(); // Evitar el envío tradicional del formulario

                // Validar el campo de nombre
                if ($('#nombre').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); // Uso de SweetAlert2
                    return; // Detener la ejecución si el nombre está vacío
                }

                // Recopilar datos del formulario
                var formData = $(this).serialize();

                // Enviar datos usando AJAX
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // Usar la acción del formulario
                    data: formData,
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        Swal.fire("¡Éxito!", "Usuario creado exitosamente.", "success").then(() => {
                            // Opcional: Reiniciar el formulario o redirigir a otra página
                            $('form-cliente-funcion')[0].reset();
                            // Redirigir si es necesario
                            // window.location.href = '/ruta/deseada'; 
                        });
                    },
                    error: function(xhr) {
                        // Manejar errores
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            Swal.fire("¡Error!", value[0], "error"); // Mostrar el primer error
                        });
                    }
                });
            });
        });
    </script>
@endsection

