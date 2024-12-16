@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Carrito de Compras</h1>

        @if ($carrito->detalles->isEmpty())
            <p>Tu carrito está vacío.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ number_format($detalle->precio, 2) }}</td>
                            <td>${{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                            <td>
                                <!-- Eliminar producto del carrito -->
                                <form action="{{ route('carrito.eliminar', [$carrito->id, $detalle->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Total: ${{ number_format($total, 2) }}</h3>
            <a href="{{ route('checkout') }}" class="btn btn-success">Finalizar Compra</a>
        @endif
    </div>
@endsection
