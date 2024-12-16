@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Carrito de Compras</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($carrito as $item)
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <img src="{{ asset('storage/' . $item['image']) }}" class="card-img-top" alt="{{ $item['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <p class="card-text">${{ number_format($item['price'], 2) }}</p>
                            <p class="card-text">Cantidad: {{ $item['cantidad'] }}</p>

                            <!-- Formulario para eliminar el producto del carrito -->
                            <form action="{{ route('carrito.destroy', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE') <!-- Método DELETE -->
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('productos.index') }}" class="btn btn-primary">Seguir comprando</a>
    </div>
@endsection
