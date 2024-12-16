@extends('layouts.app')

@section('title', 'Inicio - BioControl')

@section('content')
<div class="container mt-5">
    <!-- Bloque de bienvenida con imagen -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h1 class="display-4 text-primary">Bienvenido a <strong>BioControl</strong></h1>
            <p class="lead text-muted">
                ¡Descubre cómo nuestra tecnología avanzada de control de asistencia mediante detección dactilar puede transformar tu organización! 

    
                 En BioControl, ofrecemos soluciones modernas, seguras y eficaces para optimizar la gestión de acceso.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('imagenes/control1.jpg') }}" alt="Control de Asistencia" class="img-fluid rounded shadow-lg">
        </div>
    </div>

    <!-- Bloque de "Qué ofrecemos" con imagen -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="p-5 text-white rounded shadow-lg d-flex align-items-center" style="background-color: #007bff; min-height: 300px;">
                <div class="col-md-5 text-left">
                    <img src="{{ asset('imagenes/control2.jpg') }}" alt="Qué ofrecemos" class="img-fluid rounded shadow-lg" style="max-height: 200px;">
                </div>
                <div class="col-md-7 ps-4">
                    <h2 class="text-white text-left mb-3">¿Qué ofrecemos?</h2>
                    <p class="fs-5">
                        En <strong>BioControl</strong>, nos especializamos en brindar soluciones tecnológicas avanzadas en sistemas de control de asistencia. 
                        Nuestros productos están diseñados para garantizar un manejo eficiente del acceso en empresas y organizaciones, minimizando riesgos y maximizando la seguridad.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bloque de "Por qué elegirnos" con imagen -->
    <div class="row">
        <div class="col-12">
            <div class="p-5 text-white rounded shadow-lg d-flex align-items-center" style="background-color: #28a745; min-height: 300px;">
                <div class="col-md-5 text-left">
                    <img src="{{ asset('imagenes/control3.jpg') }}" alt="Por qué elegirnos" class="img-fluid rounded shadow-lg" style="max-height: 250px;">
                </div>
                <div class="col-md-7 ps-4">
                    <h3 class="text-white text-right mb-3">¿Por qué elegir <span class="text-warning">BioControl</span>?</h3>
                    <ul class="list-unstyled fs-5">
                        <li class="mb-3">
                            <i class="bi bi-shield-lock-fill text-warning"></i> Soluciones seguras y confiables
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-plug-fill text-warning"></i> Fácil integración con sistemas existentes
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-headset text-warning"></i> Soporte técnico especializado
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-lightbulb-fill text-warning"></i> Innovación constante en nuestros productos
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
