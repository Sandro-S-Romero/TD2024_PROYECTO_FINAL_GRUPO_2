@extends('layouts.app')

@section('title', 'Confirmación de Compra')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">¡Gracias por tu compra!</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>Tu compra ha sido procesada exitosamente. Un correo de confirmación ha sido enviado a tu dirección de correo electrónico.</p>
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver a la lista de productos</a>
    </div>
@endsection
