@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Contacto</h1>

        <div class="row justify-content-center">
            <!-- Bloque de contacto -->
            <div class="col-md-6">
                <div class="card shadow-lg border-light">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Detalles de Contacto</h3>
                        
                        <!-- Información de contacto -->
                        <div class="mb-3">
                            <h5><strong>Nombre:</strong></h5>
                            <p class="lead">Sandro Sebastián Romero</p>
                        </div>

                        <div class="mb-3">
                            <h5><strong>Teléfono:</strong></h5>
                            <p class="lead">+54 3794671403</p>
                        </div>

                        <div class="mb-3">
                            <h5><strong>Correo Electrónico:</strong></h5>
                            <p class="lead">romerosanseb@gmail.com</p>
                        </div>
                        
                        <!-- Botón de contacto -->
                        <div class="text-center">
                            <a href="https://wa.me/3794671403" class="btn btn-primary btn-lg">Enviar WhathsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection
