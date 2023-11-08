<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
  
    <appbar></appbar>
      
    <v-card-item class="bg-green-darken-4">
              <v-card title="  BUSCAR ALUMNOS" 
              prepend-icon="mdi-account-school"
              subtitle="Alumnos"
              class="bg-indigo-darken-4"
              >
              
            </v-card>
              
        <template v-slot:append>
       
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