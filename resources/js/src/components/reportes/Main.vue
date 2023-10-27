<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    

      <appbar></appbar>
      <v-card class="mx-auto" max-width="600">
        <v-container class="text-center">
          <v-autocomplete
                      label="Buscar reporte"
                      theme="dark"
                  :items="['reporte']"
                  ></v-autocomplete>
             </v-container>
        <v-card-item class="bg-blue-darken-4">
          
          <v-card-title>reporte</v-card-title>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2">Crear reporte</p>
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

        <v-card-text class="pt-8">
       Panel de Administracion de reporte
        </v-card-text>

         <v-divider></v-divider>

        

     
      </v-card>
    </v-app>


        
</template>


<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

</style>




<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";

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
