import './bootstrap';
import { createApp } from "vue";
import app from "./src/app.vue";
import vuetify from "./vuetify";
import CrearPublicaciones from  "./src/components/publicaciones/Crear.vue"
import { createRouter, createWebHistory } from 'vue-router';
import 'vuetify/styles';

import '@mdi/font/css/materialdesignicons.min.css';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: () => import('./src/components/inicio.vue') },
        { path: '/dashboard', component: () => import('./src/components/dashboard.vue') },
        { path: '/login', component: () => import('./src/components/login.vue') },
        { path: '/navegacion', component: () => import('./src/components/barra_navegacion.vue') },
        { path: '/publicaciones', component: () => import('./src/components/publicaciones.vue') },
        { path: '/main_alumnos', component: () => import('./src/components/alumnos/Main.vue') },
        { path: '/tabla_alumnos', component: () => import('./src/components/alumnos/TablaAlumnos.vue') },
        { path: '/index_publicaciones', component: () => import('./src/components/publicaciones/Main.vue') },
        { path: '/app-bar', component: () => import('./src/components/app_bar.vue') },
        { path: '/menus', component: () => import('./src/components/menus.vue') },
        { path: '/editar-publicaciones', component: () => import('./src/components/publicaciones/Editar.vue') },
        {
            path: '/crear-publicaciones',
            name: 'crear_publicaciones',
            component: CrearPublicaciones,
        }




    ],
})

createApp(app)
.use(vuetify)
.use(router)
.mount("#app");