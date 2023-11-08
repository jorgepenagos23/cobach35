<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    
      <appbar></appbar>
        
        <v-card-item class="bg-pink-darken-4">
          <v-theme-provider theme="light" with-background class="pa-5">
              <v-card title="  USUARIOS " 
              prepend-icon="mdi-file-chart-outline"
              subtitle="Todos los usuarios "></v-card>
            </v-theme-provider>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2">Subir excel usuarios</p>
            <router-link to="/subir-excel-usuarios">
              <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                <v-icon>
                  mdi-plus
                </v-icon>
              </button>
            </router-link>
          </div>
        </template>
        </v-card-item>

        <v-virtual-scroll :items="users" height="300" item-height="50">
        <template v-slot:default="{ item }">
      <v-list-item>
        <v-card
            class="mx-auto"
            width="900"
            prepend-icon="mdi-account-alert"
            label="indigo-darken-3"
            color="dark"
            value="indigo-darken-3"
            
            variant="tonal"

          >
          <v-list-item-title>ID : {{ item.id }}</v-list-item-title>
        <v-list-item-title>Nombre : {{ item.nombre }}</v-list-item-title>
        <v-list-item-title>Email: {{ item.email }}</v-list-item-title>
        <v-list-item-title>Matricula: {{ item.matricula }}</v-list-item-title>

        <template v-slot:append>
          <v-icon class="bg-primary">mdi-account</v-icon>
          <v-btn
        color="orange-darken-2"
        variant="text">
        Explorar
      </v-btn>
        </template>
        
      </v-card>
      </v-list-item>
    </template>
    
  </v-virtual-scroll>
      
        
  
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

const url = '/api/user/index3';

export default {
  data() {
    return {
      users: [], // Arreglo para almacenar los usuarios
    };
  },

  created() {
  axios.get(url)
    .then(response => {
      this.users = response.data.users; // Cambiar de this.data a this.users
    })
    .catch(error => {
      console.log('Error al obtener los datos de la API:', error);
    });
},
  methods: {
    verUsuario(usuario) {
      // Lógica para ver el detalle del usuario
      // Puedes usar vue-router para navegar a la página de detalle del usuario
    },
  },

  components: {
    navegacion,
    appbar,
  },
};
</script>