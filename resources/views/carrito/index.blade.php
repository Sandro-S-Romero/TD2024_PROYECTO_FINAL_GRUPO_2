@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🛒 Tu Carrito de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($carrito->isEmpty())
        <div class="alert alert-info text-center">
            Tu carrito está vacío. <a href="{{ route('productos.index') }}">¡Explora nuestros productos!</a>
        </div>
    @else
        <div class="card mb-4 mx-auto" style="max-width: 800px; border: 2px solid #333; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header-highlight"> <!-- Clase personalizada -->
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrito as $item)
                            <tr>
                                <td><strong>{{ $item->producto->name }}</strong></td> <!-- Producto en negrita -->
                                <td>{{ $item->cantidad }}</td>
                                <td>${{ number_format($item->producto->price, 2) }}</td>
                                <td>${{ number_format($item->cantidad * $item->producto->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('carrito.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total centrado -->
                <div class="text-center mt-3">
                    <h4><strong>Total: ${{ number_format($carrito->sum(fn($item) => $item->cantidad * $item->producto->price), 2) }}</strong></h4>
                </div>
            </div>
        </div>

        <!-- Botones debajo del cuadro y más juntos -->
        <div class="text-center mt-3">
            <a href="{{ route('productos.index') }}" class="btn" style="background-color: #5909ec; color: rgb(250, 247, 247); margin-right: 10px;">⬅️ Volver a la Lista de Productos</a>
            @if(!$carrito->isEmpty())
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceder al Pago 💳</a>
            @endif
        </div>
    @endif
</div>
@endsection
