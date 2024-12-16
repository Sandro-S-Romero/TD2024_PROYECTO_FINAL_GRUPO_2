<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BioControl')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para la barra de navegación */
        .navbar {
            background: linear-gradient(to right, #007bff, #00c6ff);
        }

        .navbar-brand img {
            width: 150px; /* Ajusta el tamaño de la imagen del logo */
            height: auto;
        }

        .navbar-nav .nav-link {
            font-weight: bold;
            color: white !important;
            padding: 10px 20px;
            border: 2px solid transparent; /* Recuadro transparente por defecto */
            border-radius: 5px;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f1f1f1 !important;
            border-color: #ffffff; /* Color del recuadro cuando se pasa el ratón */
            background-color: rgba(255, 255, 255, 0.2); /* Fondo sutil al pasar el ratón */
        }

        .navbar-nav .nav-link:focus {
            outline: none;
            border-color: #ffffff; /* Asegura que el borde se vea cuando el enlace tiene el foco */
        }

        /* Imagen de portada */
        .hero-section {
            background-image: url('https://via.placeholder.com/1500x600'); /* Cambia esta URL por la imagen que desees */
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
        }

        /* Estilos generales */
        .container {
            padding-top: 20px;
        }

        /* Estilos de botones */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem;
            font-size: 1.1rem;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Estilos del pie de página */
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #00c6ff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .social-icons {
            margin-top: 10px;
        }

        .footer .social-icons a {
            margin: 0 10px;
            font-size: 1.5rem;
            color: #00c6ff;
        }

        .footer .social-icons a:hover {
            color: white;
        }

        /* Añadimos margen inferior entre el contenido y el pie de página */
        .content-wrapper {
            margin-bottom: 30px; /* Ajusta el valor según el espacio que desees */
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('imagenes/logobiocontrol.png') }}" alt="Logo BioControl">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quienes_somos') }}">Quiénes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.create') }}">Cargar Producto</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contactos</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrito.index') }}">Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                    </li>
                    <!-- Nombre del usuario -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Imagen de portada -->
@if (Route::currentRouteName() === 'home')
<div class="hero-section" style="background-image: url('{{ asset('imagenes/portadaBioControl.png') }}');">
    <h1>Bienvenidos a BioControl</h1>
</div>
@endif


        <!-- Contenido principal -->
        <div class="container mt-4 content-wrapper">
            @yield('content')  <!-- Aquí se inyecta el contenido de las vistas -->
        </div>
        
        <!-- Pie de página -->
        <footer class="footer">
            <p>&copy; {{ date('Y') }} BioControl. Todos los derechos reservados.</p>
            <div class="social-icons">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <div>
                <a href="#">Política de privacidad</a> | <a href="#">Términos de servicio</a>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Para los íconos sociales -->
</body>
</html>
