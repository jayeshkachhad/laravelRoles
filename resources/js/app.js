import './bootstrap';

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import users from './components/users.vue';

const app = createApp({});
app.component('example-component', ExampleComponent);

app.mount('#app');
