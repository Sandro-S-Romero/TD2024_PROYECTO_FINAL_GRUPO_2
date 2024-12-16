@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Lista de Productos</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-3 shadow-lg rounded-lg" style="padding: 15px; max-width: 90%; margin: 0 auto; transition: transform 0.3s ease;">
                        <img 
                            src="{{ asset('storage/' . $producto->image) }}" 
                            class="card-img-top img-thumbnail rounded" 
                            alt="{{ $producto->name }}" 
                            style="max-width: 75%; height: auto; max-height: 300px; display: block; margin: 0 auto; border-radius: 10px;"
                        >
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $producto->name }}</h5>
                            <p class="card-text text-muted">{{ $producto->description }}</p>
                            <p class="card-text fw-bold text-center">${{ number_format($producto->price, 2) }}</p>

                            <!-- Verificar si el usuario está autenticado -->
                            @auth
                                <!-- Contenedor para los botones -->
                                <div class="d-flex justify-content-between mt-3">
                                    <!-- Formulario para agregar al carrito -->
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="w-100 me-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100 shadow-sm square-btn">Añadir al carrito</button>
                                    </form>

                                    <a href="{{ route('productos.venta', $producto->id) }}" class="btn btn-success w-100 ms-2 shadow-sm square-btn">Comprar</a>
                                </div>
                            @else
                                <!-- Si no está autenticado, muestra el botón para ir al login -->
                                <a href="{{ route('login') }}" class="btn btn-success mt-3 w-100 shadow-sm square-btn">Comprar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Estilo para los botones cuadrados */
        .square-btn {
            font-size: 1.5rem; /* Aumenta el tamaño del texto */
            font-weight: bold; /* Resalta el texto */
            padding: 15px 0; /* Ajusta el tamaño del botón */
            text-align: center; /* Centra el texto */
            border-radius: 0; /* Quita el redondeo de los bordes */
            transition: all 0.3s ease; /* Agrega transición para efectos */
        }

        /* Botón de añadir al carrito */
        .btn-primary {
            background-color: #007bff;
            border: 2px solid #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.05);
        }

        /* Botón de comprar */
        .btn-success {
            background-color: #28a745;
            border: 2px solid #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
            transform: scale(1.05);
        }

        /* Efecto de hover para las tarjetas */
        .card:hover {
            transform: translateY(-10px);
        }

        /* Sombra suave para los botones */
        .shadow-sm {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Sombra en hover para los botones */
        .hover-shadow:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Ajuste de la tipografía */
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2451a3;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }
    </style>
@endsection
