<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    
      <appbar></appbar>
        
        <v-card-item class="bg-red-darken-4">
          <v-theme-provider theme="dark" with-background class="pa-5">
              <v-card title="  REPORTES" 
              prepend-icon="mdi-file-chart-outline"
              subtitle="Alumnos"></v-card>
            </v-theme-provider>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2">Descargas </p>
            <router-link to="/crear-reporte">
              <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                <v-icon>
                  mdi-plus
                </v-icon>
              </button>
            </router-link>
          </div>
        </template>
  

        </v-card-item>
  
        <v-row justify="center">
        <v-col cols="7">
        <v-card color="#385F73" theme="light" class="mt-4">
          
    <v-card-title class="text-h5 font-weight-regular bg-blue-grey">
      Subir archivos 
    </v-card-title>

    <v-card-text>
      <div class="text-caption pa-3">Where do you live?</div>


      <v-file-input accept="image/*" label="File input"></v-file-input>

    </v-card-text>
  </v-card>
        </v-col>
        </v-row>
    


         <v-divider></v-divider>
  
         <v-row justify="center">
        <v-col cols="15">
          <v-card color="#385F73" theme="light" class="mt-4">
            <v-theme-provider theme="dark" with-background class="pa-5">
              <v-card title="Editar  Publicación" subtitle="Editar"></v-card>
            </v-theme-provider>
            <v-card-title class="text-h5 font-weight-regular bg-blue-grey"></v-card-title>
            <v-sheet width="1000">
            
  
              
              
            </v-sheet>
          </v-card>
        </v-col>
      </v-row>
  
  
     
    </v-app>
  
  
        
  </template>
  
  
  <style>
  @import 'tailwindcss/base';
  @import 'tailwindcss/components';
  @import 'tailwindcss/utilities';
  
  </style>
  
  
  
  
  <script>
  import axios from 'axios';
  import navegacion from "./barra_navegacion.vue";
  import appbar from "./app_bar.vue";
  
  export default {
  
  
    methods: {
     
     
      
    },
    
   
  
    components: {
        navegacion,
        appbar,
      },
  
    data() {
      return {
   
  
      };
    },
    mounted() {
  
  
      
  
  
  }
  
  };
  </script> 
  