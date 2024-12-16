import { createApp } from 'vue';
import App from './components/App.vue';

const app = createApp(App);

// Si tienes más componentes globales
import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app'); // Esto debe coincidir con el div en tu archivo Blade

