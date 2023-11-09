<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    
      <appbar></appbar>
        
        <v-card-item class="bg-lime-accent-4
">
          <v-theme-provider theme="dark" with-background class="pa-5">
              <v-card title=" Administrador de Contenidos Descargables" 
              prepend-icon="mdi-file-chart-outline"
              subtitle="Alumnos"></v-card>
            </v-theme-provider>
        
  

        </v-card-item>
  
        <v-row justify="center">
        <v-col cols="7">
        <v-card color="#385F73" theme="light" class="mt-4">
          
    <v-card-title class="text-h5 font-weight-regular bg-blue-grey">
      Subir archivos 
    </v-card-title>

    <v-card-text>
      <div class="text-caption pa-3">Subir PDF </div>


      <v-file-input accept="image/*" label="File input"></v-file-input>

    </v-card-text>
  </v-card>
        </v-col>
        </v-row>
    


         <v-divider></v-divider>
  
    
  
  
     
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
  