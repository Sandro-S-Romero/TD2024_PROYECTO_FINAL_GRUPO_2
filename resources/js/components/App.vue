

<template>
    <div id="app">
        <nav class="navbar">
            <h1>Mi Tienda</h1>
            <ul>
                <li><a href="/login">Inicio de Sesión</a></li>
                <li><a href="/register">Registrarse</a></li>
            </ul>
        </nav>
        <main>
            <h2>Bienvenido a nuestra tienda</h2>
            <p>Explora los mejores productos en un solo lugar.</p>
        </main>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style>
/* Agrega algunos estilos básicos */
#app {
    font-family: Arial, sans-serif;
    text-align: center;
    color: #333;
}

.navbar {
    background-color: #007bff;
    color: white;
    padding: 10px;
}

.navbar ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

main {
    margin-top: 20px;
}
</style>
