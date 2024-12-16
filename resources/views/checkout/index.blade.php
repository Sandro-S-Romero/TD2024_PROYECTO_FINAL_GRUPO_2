@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🛒 Finaliza tu Compra</h1>

    <p class="text-center mb-4">En esta sección podrás completar tu compra. Revisa tu pedido y procede con el pago.</p>

    <!-- Resumen del pedido -->
    <div class="card mb-4 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            Resumen de tu pedido
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $item)
                        <tr>
                            <td>{{ $item->producto->name }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->producto->price, 2) }}</td>
                            <td>${{ number_format($item->cantidad * $item->producto->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                <h4>Total: ${{ number_format($carrito->sum(fn($item) => $item->cantidad * $item->producto->price), 2) }}</h4>
            </div>
        </div>
    </div>

    <!-- Formulario de pago -->
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            Información de tu Tarjeta
        </div>
        <div class="card-body">
            <form action="{{ route('pago.procesar') }}" method="POST">
                @csrf
                <!-- Selección de tipo de tarjeta -->
                <div class="form-group">
                    <label for="cardType">Tipo de tarjeta</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_type" id="creditCard" value="credit" checked>
                        <label class="form-check-label" for="creditCard">Crédito</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_type" id="debitCard" value="debit">
                        <label class="form-check-label" for="debitCard">Débito</label>
                    </div>
                </div>

                <!-- Número de tarjeta -->
                <div class="form-group">
                    <label for="cardNumber">Número de tarjeta</label>
                    <input type="text" id="cardNumber" class="form-control" name="card_number" required>
                </div>

                <!-- Fecha de expiración -->
                <div class="form-group">
                    <label for="expiryDate">Fecha de expiración (MM/AA)</label>
                    <input type="text" id="expiryDate" class="form-control" name="expiry_date" required>
                </div>

                <!-- CVV -->
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" class="form-control" name="cvv" required>
                </div>

                <!-- Botón de proceder al pago -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg btn-block mt-4" style="width: 50%;">Pagar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Botón para volver al carrito -->
    <a href="{{ route('carrito.index') }}" class="btn" style="background-color: #FF9A00; color: white; margin-top: 20px; display: block; width: 200px; margin: 20px auto;">Volver al carrito</a>
</div>
@endsection
