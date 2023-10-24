<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    

      <appbar></appbar>
      <v-card class="mx-auto" max-width="600">
        <v-container class="text-center">
          <v-autocomplete
                      label="Buscar publicacion"
                      theme="dark"
                  :items="['Publicacion']"
                  ></v-autocomplete>
             </v-container>
        <v-card-item class="bg-blue-darken-4">
          
          <v-card-title>Publicaciones</v-card-title>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2">Crear Publicacion</p>
            <router-link to="/crear-publicaciones">
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
        Crear , Editar  , Eliminar Publicaciones
        </v-card-text>

        <v-divider></v-divider>

        <v-virtual-scroll :items="publicaciones" height="500" item-height="50">
          <template v-slot:default="{ item: publicacion }">
            <v-list-item>
              <v-list-item-title>{{ publicacion.titulo }}</v-list-item-title>
              <template v-slot:append>
              <v-btn  @click="editarPublicacion(publicacion)" size="small" variant="secondary">
                <v-icon>
                  mdi-pencil
                </v-icon>
                Editar
              <v-icon color="orange-darken-4" end> mdi-open-in-new </v-icon>
              </v-btn>
              <v-btn @click="eliminarPublicacion(publicacion.id)" size="small" color="red">
                <v-icon size="18">
                  mdi-delete
                </v-icon>
                Eliminar
              </v-btn>
              
             </template>
             
              <v-list-item-subtitle>{{ publicacion.descripcion }}</v-list-item-subtitle>
            
            
            </v-list-item>
          </template>
        </v-virtual-scroll>
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
   
    editarPublicacion(publicacion) {
      // Lógica para editar la publicación
    },
    eliminarPublicacion(publicacionId) {
    
  },

  agregarPublicacion(publicacion){

    router.router.push("/crear-publicaciones");
    
  },
  navigateToIndex() {
      this.$router.push('/index_publicaciones');
    }
  
  },

  components: {
      navegacion,
      appbar,
    },

  data() {
    return {
      publicaciones: [], 
    };
  },
  mounted() {

  const token = ''; 

  axios.get('http://127.0.0.1/api/user/index', {
    headers: {
      'Authorization': `Bearer ${token}`,
    },
  })
    .then((response) => {
      console.log('Respuesta de la API:', response.data);
      this.publicaciones = response.data.publicaciones;
    })
    .catch((error) => {
      console.error('Error al obtener las publicaciones:', error);
    });

    
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js';
    script.defer = true;
    document.body.appendChild(script);
    
}


};
</script> 
