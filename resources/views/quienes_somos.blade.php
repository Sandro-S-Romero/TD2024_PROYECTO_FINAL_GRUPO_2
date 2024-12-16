@extends('layouts.app')

@section('title', 'Quiénes Somos - BioControl')

@section('content')
<style>
    /* Estilos generales */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        padding-top: 0px; /* Espacio para el navbar */
    }

    .container {
        max-width: 1200px;
    }

    .general-section {
        text-align: center;
        margin-bottom: 50px;
    }

    .general-section h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 20px;
    }

    .general-section p {
        font-size: 1.2rem;
        color: #555;
        line-height: 1.8;
    }

    .team-section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .team-block {
        background-color: #90ecec;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .team-block:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .team-block h5 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 15px;
        color: #333;
    }

    .team-block p {
        font-size: 1rem;
        color: #666;
    }

    footer {
        background-color: #007bff;
        color: #fff;
        text-align: center;
        padding: 20px 0;
        margin-top: 50px;
    }

    footer p {
        margin: 0;
    }
</style>

<div class="container">
    <!-- Sección de presentación general -->
    <div class="general-section">
        <h1>Quiénes Somos</h1>
        <p>
            Somos un equipo de estudiantes del programa Talentos Digitales, un proyecto de capacitación en programación organizado por el Gobierno de Corrientes, TelCo Corrientes, la Universidad Nacional del Nordeste (UNNE) y el Polo IT Corrientes.

            Nuestro objetivo es adquirir las habilidades necesarias para desarrollarnos en el mundo de la tecnología y contribuir al crecimiento de la industria digital en nuestra región.

            Este E-commerce representa nuestro proyecto final, en el cual aplicamos los conocimientos adquiridos durante el curso. Hemos trabajado con dedicación y compromiso para crear una plataforma funcional, moderna y accesible, que refleja nuestro aprendizaje y nuestra pasión por la tecnología.

            Estamos orgullosos de formar parte de este programa y agradecidos por la oportunidad de contribuir con nuestras ideas al desarrollo de soluciones digitales.
        </p>
    </div>

    <!-- Sección de integrantes -->
    <div class="team-section">
        <!-- Bloque 1 -->
        <div class="team-block">
            <h5>ROMERO</h5>
            <p><h4>Sandro Sebastián</h4></p>
        </div>

        <!-- Bloque 2 -->
        <div class="team-block">
            <h5>LOPEZ MACHADO</h5>
            <p><h4>Víctor Román</h4></p>
        </div>

        <!-- Bloque 3 -->
        <div class="team-block">
            <h5>NAVARRO</h5>
            <p><h4>Juan Alberto</h4></p>
        </div>
    </div>
</div>
@endsection
