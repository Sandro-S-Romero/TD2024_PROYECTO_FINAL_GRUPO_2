@extends('layouts.app')

@section('title', 'Comprar - ' . $producto->name)

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">Comprar: {{ $producto->name }}</h1>

        <div class="row">
            <!-- Columna de imagen -->
            <div class="col-12 col-md-6 mb-3 mb-md-0 px-0">
                <img src="{{ asset('storage/' . $producto->image) }}" class="img-fluid" alt="{{ $producto->name }}">
            </div>

            <!-- Columna del formulario -->
            <div class="col-12 col-md-6 px-0">
                <h3>{{ $producto->name }}</h3>
                <p class="fw-bold">{{ $producto->description }}</p>

                <!-- Formulario de compra con métodos de pago -->
                <form action="{{ route('productos.compra', $producto->id) }}" method="POST" class="p-3 border rounded shadow-sm" style="background-color: #ff6003;">
                    @csrf

                    <!-- Elegir tipo de tarjeta -->
                    <div class="mb-3">
                        <label for="tipo_tarjeta" class="form-label">Selecciona el tipo de tarjeta:</label>
                        <select class="form-select" id="tipo_tarjeta" name="tipo_tarjeta" required>
                            <option value="credito">Tarjeta de Crédito</option>
                            <option value="debito">Tarjeta de Débito</option>
                        </select>
                    </div>

                    <!-- Ingresar datos de la tarjeta -->
                    <div class="mb-3">
                        <label for="numero_tarjeta" class="form-label">Número de tarjeta:</label>
                        <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required placeholder="XXXX-XXXX-XXXX-XXXX">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_expiracion" class="form-label">Fecha de expiración:</label>
                        <input type="month" class="form-control" id="fecha_expiracion" name="fecha_expiracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">Código de seguridad (CVV):</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" required placeholder="XXX">
                    </div>

                    <!-- Precio y leyenda "Envío gratis" -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <span class="text-muted">Envío gratis</span>
                        <span class="h4 text-success">${{ number_format($producto->price, 2) }}</span>
                    </div>

                    <!-- Total a Pagar en negrita -->
                    <div class="mt-3 text-center">
                        <strong>Total a Pagar: ${{ number_format($producto->price, 2) }}</strong>
                    </div>

                    <!-- Botón para finalizar compra alineado a la derecha -->
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">Comprar Ahora</button>
                    </div>
                </form>

                <!-- Botón para añadir al carrito con tamaño más pequeño -->
                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <input type="hidden" name="cantidad" value="1"> <!-- Puedes permitir modificar cantidad si lo deseas -->
                    <button type="submit" class="btn btn-primary btn-sm w-auto">Añadir al Carrito 🛒</button>
                </form>
            </div>
        </div>
    </div>
@endsection
