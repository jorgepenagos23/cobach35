import './bootstrap';

import { createApp } from "vue";
import app from "./src/app.vue";
import vuetify from "./vuetify";
import CrearPublicaciones from  "./src/components/publicaciones/Crear.vue"
import CrearReportes from  "./src/components/reportes/Crear.vue"
import conocenos from "./src/components/secciones/conocenos.vue"
import mision from "./src/components/secciones/subsecciones/mision.vue"
import vinculacion from "./src/components/secciones/vinculacion.vue"



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

                ////////// BOLETAS  1 PRIMER  SEMESTRE 

        {path: '/main-parciales-primer-semestre',component:()=>import('./src/components/boletas/PRIMER/main.vue')}, ///  MAIN BOLETAS PRIMER SEMESTRE
        {path: '/boletas-primer' , component:()=>import('./src/components/boletas/primer_semestre.vue')},   // PRIMER SEMESTRE  PARCIAL 1 
        {path: '/boletas-primer-parcial2', component:()=>import('./src/components/boletas/PRIMER/parcial2.vue')}, //  PRIMER SEMESTRE PARCIAL 2
        {path: '/boletas-primer-parcial3', component:()=>import('./src/components/boletas/PRIMER/parcial3.vue')}, //  PRIMER SEMESTRE PARCIAL 3



        
        ////////// BOLETAS  2  SEGUNDO SEMESTRE 

        {path: '/main-parciales-segundo-semestre',component:()=>import('./src/components/boletas/SEGUNDO SEMESTRE/main.vue')}, //MAIN BOLETAS SEGUNDO SEMESTRE
        {path:'/boletas-segundo-parcial1',component:()=>import('./src/components/boletas/SEGUNDO SEMESTRE/parcial1.vue')},
        {path:'/boletas-segundo-parcial2',component:()=>import('./src/components/boletas/SEGUNDO SEMESTRE/parcial2.vue')},
        {path:'/boletas-segundo-parcial3',component:()=>import('./src/components/boletas/SEGUNDO SEMESTRE/parcial3.vue')},
    
        ////////// BOLETAS  3  TERCER  SEMESTRE 

        {path: '/main-parciales-tercer-semestre', component:()=>import('./src/components/boletas/TERCER SEMESTRE/main.vue')},
        {path: '/boletas-tercero-parcial1', component:()=>import('./src/components/boletas/TERCER SEMESTRE/parcial1.vue')},
        {path: '/boletas-tercero-parcial2', component:()=>import('./src/components/boletas/TERCER SEMESTRE/parcial2.vue')},
        {path: '/boletas-tercero-parcial3', component:()=>import('./src/components/boletas/TERCER SEMESTRE/parcial3.vue')},



             ////////// BOLETAS  4  CUARTO  SEMESTRE 

             {path: '/main-parciales-cuarto-semestre', component:()=>import('./src/components/boletas/CUARTO SEMESTRE/main.vue')},
             {path: '/boletas-cuarto-parcial1', component:()=>import('./src/components/boletas/CUARTO SEMESTRE/parcial1.vue')},
             {path: '/boletas-cuarto-parcial2', component:()=>import('./src/components/boletas/CUARTO SEMESTRE/parcial2.vue')},
             {path: '/boletas-cuarto-parcial3', component:()=>import('./src/components/boletas/CUARTO SEMESTRE/parcial3.vue')},


            ////////// BOLETAS  5  CUARTO  SEMESTRE 



            

////

{

    path: '/conocenos',
    name: 'conocenos',
    component: conocenos,
},


{

    path: '/mision',
    name: 'mision',
    component: mision,
},
{

    path: '/vinculacion',
    name: 'vinculacion',
    component: vinculacion,
},





{ path: '/oferta', component: () => import('./src/components/secciones/oferta.vue') },
{ path: '/alumnos', component: () => import('./src/components/secciones/alumnos.vue') },

{ path: '/estructura_fronted', component: () => import('./src/components/estructura.vue') },
{ path: '/footer', component: () => import('./src/components/footer.vue') },
{ path: '/todos', component: () => import('./src/components/todos.vue') }, /// para descargas 
{path: '/descargas-tabla',component:()=>import('./src/components/descargas/Tabladescargas.vue')},





{ path: '/mision', component: () => import('./src/components/secciones/subsecciones/mision.vue') },

{ path: '/historia', component: () => import('./src/components/secciones/subsecciones/historia.vue') },
{ path: '/instalaciones', component: () => import('./src/components/secciones/subsecciones/instalaciones.vue') },
{ path: '/estructura', component: () => import('./src/components/secciones/subsecciones/estructura.vue') },

{ path: '/visitanos', component: () => import('./src/components/secciones/subsecciones/visitanos.vue') },
{ path: '/academias', component: () => import('./src/components/secciones/subsecciones/academias.vue') },

{ path: '/plan', component: () => import('./src/components/secciones/subsecciones/plan.vue') },

{ path: '/horarios', component: () => import('./src/components/secciones/subsecciones/horarios.vue') },
{ path: '/calendarios', component: () => import('./src/components/secciones/subsecciones/calendarios.vue') },
{ path: '/becas', component: () => import('./src/components/secciones/subsecciones/becas.vue') },
{ path: '/danza', component: () => import('./src/components/secciones/subsecciones/danza.vue') },


    ],
})


createApp(app)
.use(vuetify)
.use(InfiniteLoading)
.use(router)

.mount("#app");