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
       Panel de Administracion de Publicaciones
        </v-card-text>

        <v-divider></v-divider>

        <v-virtual-scroll :items="publicaciones" height="500" item-height="50">
          <template v-slot:default="{ item: publicacion }">
            <v-list-item>
              <v-list-item-title>{{ publicacion.titulo }}</v-list-item-title>
              <template v-slot:append>
                <v-btn @click="editarPublicacion(publicacion.id)" size="small" color="red">
                <v-icon>
                  mdi-pencil
                </v-icon>
                Editar
              </v-btn>

              <v-icon color="orange-darken-4" end> mdi-open-in-new </v-icon>
            
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

            <!-- Formulario de edición -->
             <v-card>
              <v-card-title>Edicion de Publicaciones</v-card-title>

            <form>
              
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" v-model="publicacionEditando.titulo">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" v-model="publicacionEditando.descripcion"></textarea>
            <button @click="guardarCambios">Guardar Cambios</button>

          </form>
        </v-card>
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
      this.publicacionEditando = {}; // Inicializa publicacionEditando como un objeto vacío

    const url = `/api/v1/publicacion/${publicacion}`;

axios.get(url)
  .then((response) => {
    // Asigna los datos de la respuesta a publicacionEditando
    this.publicacionEditando = response.data.data;
  })
  .catch((error) => {
    console.error('Error al obtener la publicación:', error);
  });
    },
  },
  guardarCambios() {
    // Realiza una solicitud para actualizar la publicación en el servidor
    // Usando axios o la librería que estés utilizando para manejar las solicitudes HTTP
    axios.put(`/api/v1/publicacion/${this.publicacionEditando.id}`, {
      titulo: this.publicacionEditando.titulo,
      descripcion: this.publicacionEditando.descripcion,
    })
    .then((response) => {
      // La publicación se ha actualizado con éxito en el servidor
      console.log('Cambios guardados con éxito', response);
      // Redirige a donde desees después de guardar los cambios
      this.$router.push('/index_publicaciones'); // O la ruta que necesites
    })
    .catch((error) => {
      console.error('Error al guardar los cambios:', error);
    });
  },

  components: {
      navegacion,
      appbar,
    },

  data() {
    return {
      publicaciones: [], 
      publicacionEditando: {
      titulo: '',
      descripcion: '',
      // Otras propiedades que necesites
    } // Publicación que se está editando

    };
  },
  mounted() {

  const token = ''; 

  axios.get('http://127.0.0.1/api/user/index', {
   
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
