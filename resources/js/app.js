import './bootstrap';

import { createApp } from "vue";
import app from "./src/app.vue";
import vuetify from "./vuetify";
import CrearPublicaciones from  "./src/components/publicaciones/Crear.vue"
import CrearReportes from  "./src/components/reportes/Crear.vue"

import { createRouter, createWebHistory } from 'vue-router';
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.min.css';
import InfiniteLoading from "v3-infinite-loading";

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
        { path: '/dashboard-estudiante', component: () => import('./src/components/VistaEstudiantes/dashboard.vue') },
        {

            path: '/crear-publicaciones',
            name: 'crear_publicaciones',
            component: CrearPublicaciones,
        },

        { path: '/index-alumnos', component: () => import('./src/components/VistaEstudiantes/index.vue') },
        { path: '/index-main', component: () => import('./src/components/index_main.vue') },
        { path: '/index-descargas', component: () => import('./src/components/VistaEstudiantes/index_descargas.vue') },
        { path: '/index-boletas', component: () => import('./src/components/VistaEstudiantes/index_boletas.vue') },
        {path: '/main-boletas', component:()=>import('./src/components/boletas/Main.vue')},
        {path: '/main-reportes', component:()=>import('./src/components/reportes/Main.vue')},

        {path: '/prueba-post', component:()=>import('./src/PostComponent.vue')},
        {path: '/prueba-scroll', component:()=>import('./src/components/ListComponent.vue')},
        {path: '/subir-excel-alumno', component:()=>import('./src/components/Excel/SubirAlumno.vue')},
        {path: '/subir-excel-usuarios', component:()=>import('./src/components/Excel/subirUsuarios.vue')},

        {path: '/main-usuarios', component:()=>import('./src/components/main_usuarios.vue')},
        {path: '/main-descargas', component:()=>import('./src/components/main_descargas.vue')},
        {

            path: '/crear-reporte',
            name: 'crear-reportes',
            component: CrearReportes,
        },

        {path: '/boletas-primer' , component:()=>import('./src/components/boletas/primer_semestre.vue')},
        {path: '/descargas-tabla',component:()=>('./src/components/descargas/Tabladescargas.vue')}









        
    ],
})


createApp(app)
.use(vuetify)
.use(InfiniteLoading)
.use(router)

.mount("#app");