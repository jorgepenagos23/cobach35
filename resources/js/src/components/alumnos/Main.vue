<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
  
    <appbar></appbar>
      
    <v-card-item class="bg-white">
        <v-theme-provider theme="light" with-background class="pa-5">
            <v-card title=" Base de Datos de alumnos " 
            prepend-icon="mdi-microsoft-excel"
            subtitle="Alumnos"></v-card>
          </v-theme-provider>
          <template v-slot:append>
          <div>
            <p class="inline-block mr-2"></p>
            <router-link to="/subir-excel-alumno">
              <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                <v-icon>
                  mdi-microsoft-excel
                </v-icon>
              </button>
            </router-link>
          </div>
        </template>
      </v-card-item>
        <v-card>
                <tablaAlumnos></tablaAlumnos>

         </v-card>

  
  </v-app>


      
</template>


<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

.custom-list-item {
  border-radius: 8px; 
  margin: 10px; 
}

.custom-list-content {
  padding: 10px; /* Espaciado interno */
}

.custom-btn {
  background-color: teal; /* Color de fondo personalizado */
  color: white; /* Color del texto personalizado */
text-align: left; 
justify-content: left;
 border: 1px solid teal; /* Borde personalizado */
}

.custom-btn:hover {
  background-color: #00796b; /* Cambiar color al pasar el ratón sobre el botón */
}



</style>


  
<script>

import navegacion from "../barra_navegacion.vue";
import tablaAlumnos from "../alumnos/TablaAlumnos.vue";import subiralumno from "../Excel/SubirAlumno.vue";
import appbar from "../app_bar.vue";


  export default {
   
    components: {
      navegacion,
      tablaAlumnos,
      appbar,
    },

    methods:{
 
 
   }
  }

  </script>