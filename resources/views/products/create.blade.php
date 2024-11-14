@extends('layouts.app')

@section('content')
    <h1>Crear producto nuevo</h1>
    <form action="{{ route('products.store') }}" method="POST" id="createProductForm">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>
        <div>
            <label for="description">Descripción:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Crear</button>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Añadir un manejador de evento para la confirmación antes de enviar el formulario
        document.getElementById('createProductForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir el envío inmediato del formulario

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres crear este producto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, crear',
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
