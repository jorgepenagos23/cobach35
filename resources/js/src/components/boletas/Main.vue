<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
  
    <appbar></appbar>
      
      <v-card-item class="bg-red-darken-4">
        <v-theme-provider theme="dark" with-background class="pa-5">
            <v-card title="  BOLETAS" 
            prepend-icon="mdi-file-chart-outline"
            subtitle="Alumnos"></v-card>
          </v-theme-provider>
      <template v-slot:append>
        <div>
          <p class="inline-block mr-2">BOLETAS</p>
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
    BOLETAS
      </v-card-text>

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
