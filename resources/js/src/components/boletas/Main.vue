<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    

      <appbar></appbar>
      <v-card max-width="800px" max-height="300" >
        <v-container class="text-center">
          <v-autocomplete
                      label="Buscar Boleta"
                      theme="dark"
                  :items="['Boleta']"
                  ></v-autocomplete>
             </v-container>
        <v-card-item class="bg-blue-darken-4">
          
          <v-card-title>Boleta</v-card-title>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2">Crear Boleta</p>
            <router-link to="/crear-Boleta">
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
       Panel de Administracion de Boletas
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
