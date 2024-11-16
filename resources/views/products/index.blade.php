@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container">
    <h1 class="page-title">Producto</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary create-button">Crear producto</a>
    <div class="card product-card">
        <div class="card-body">
            <ul class="product-list">
                @foreach($products as $product)
                    <li class="product-item">
                        <div class="product-info">
                            <strong>{{ $product->name }}</strong> - 
                            <span class="product-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="product-actions">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm action-button">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-form delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm action-button">Borrar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Confirmación de eliminación con SweetAlert2
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Previene el envío inmediato del formulario
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el formulario
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
