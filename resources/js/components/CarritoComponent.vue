<template>
  <div>
    <h2>Carrito</h2>
    <ul>
      <li v-for="producto in productos" :key="producto.id">
        {{ producto.nombre }} - ${{ producto.precio }}
        <button @click="eliminarProducto(producto.id)">Eliminar</button>
      </li>
    </ul>
    <p><strong>Total: ${{ total }}</strong></p>
  </div>
</template>

<script>
export default {
    data() {
        return {
            productos: [],
            total: 0,
        };
    },
    mounted() {
        this.obtenerProductos();
    },
    methods: {
        obtenerProductos() {
            // Aquí puedes hacer una petición para obtener los productos del carrito
            axios.get('/api/carrito')
                .then(response => {
                    this.productos = response.data.productos;
                    this.total = response.data.total;
                });
        },
        eliminarProducto(id) {
            axios.delete(`/api/carrito/${id}`)
                .then(response => {
                    this.obtenerProductos();
                });
        }
    }
}
</script>

<style scoped>
button {
    margin-left: 10px;
}
</style>
