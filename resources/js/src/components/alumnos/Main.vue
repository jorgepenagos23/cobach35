<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
  
    <appbar></appbar>
      
    <v-card-item class="bg-white">
        <v-theme-provider theme="light" with-background class="pa-5">
            <v-card title=" Subir alumnos " 
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