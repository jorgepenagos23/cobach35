<template>
    <barra></barra>

<div class="flex items-center justify-center h-screen">
  <v-app>
    <header>
        <appbar></appbar>

    </header>

    <v-card class="mx-auto" max-width="mx-auto">
        <v-expansion-panels v-model="panel" :readonly="readonly" multiple>            
            <v-app-bar-title>SEGUNDO SEMESTRE</v-app-bar-title>
      <v-expansion-panel>
        

        <v-expansion-panel-title class="primary" theme="light" color="yellow-accent-4">
  <v-icon left>mdi-star</v-icon>  Parcial 1
</v-expansion-panel-title>              
        <v-expansion-panel-text>
          <router-link to="#" class="inline-block px-4 py-2 mt-2 text-white bg-blue-500 rounded-full">
            <svg
              class="inline-block w-6 h-6 mr-2"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
            
          </router-link>
        </v-expansion-panel-text>
      </v-expansion-panel>

      <v-expansion-panel>
        
        <v-expansion-panel-title class="primary" theme="dark" color="green-accent-3">
  <v-icon left>mdi-star</v-icon>  Parcial 2
</v-expansion-panel-title>             <v-expansion-panel-text>
          <router-link to="#" class="inline-block px-4 py-2 mt-2 text-white bg-green-500 rounded-full">
            <svg
              class="inline-block w-6 h-6 mr-2"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
          </router-link>
        </v-expansion-panel-text>
      </v-expansion-panel>

      <v-expansion-panel>
        
        <v-expansion-panel-title class="primary" theme="dark" color="cyan-darken-4">
  <v-icon left>mdi-star</v-icon>  Parcial 3
</v-expansion-panel-title>             <v-expansion-panel-text>
          <router-link to="#" class="inline-block px-4 py-2 mt-2 text-white bg-red-500 rounded-full">
            <svg
              class="inline-block w-6 h-6 mr-2"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
          </router-link>
        </v-expansion-panel-text>
      </v-expansion-panel>

      </v-expansion-panels>
    </v-card>
  </v-app>
</div>
</template>

<script>
import appbar from "/var/www/app/resources/js/src/components/app_bar.vue";
import barra from "/var/www/app/resources/js/src/components/barra_navegacion.vue";
import Swal from 'sweetalert2';

export default {
data: () => ({
    panel: [0, 1, 2, 3, 4], 
}),

components: {
  appbar,
  barra,
},
methods: {
},
};
</script>
