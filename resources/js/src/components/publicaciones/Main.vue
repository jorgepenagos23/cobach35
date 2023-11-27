
<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    

      <appbar></appbar>
      <v-card-item class="bg-lime-accent-4 ">
          <v-theme-provider theme="light" with-background class="pa-5">
              <v-card title=" Administrador Publicaciones" 
              prepend-icon="mdi-file-chart-outline"
              ></v-card>
            </v-theme-provider>
        
  
        </v-card-item>

        
      <v-card class="mx-auto" max-width="600">
        <v-container class="text-center">
         
             </v-container>
        <v-card-item class="bg-blue-darken-4">
          
          <v-card-title>Publicaciones</v-card-title>
        <template v-slot:append>
          <div>
            <p class="inline-block mr-2"></p>
            <router-link to="/crear-publicaciones">
              <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                <v-icon>
                  mdi-post-outline       
                         </v-icon>
              </button>
            </router-link>
          </div>
        </template>


        </v-card-item>

        <v-card-text class="pt-8">
        </v-card-text>

        <v-divider></v-divider>

        
            <!-- Scroll vue infinite para publicaciones -->
            <div v-for="publicacion in list" :key="publicacion.id"  class="grid grid-cols-1 gap-6 px-4 my-6 md:px-6 lg:px-8">
    <div class="max-w-xl px-4 py-4 mx-auto bg-white rounded-lg shadow-md ">
      <div class="flex flex-row items-center justify-between py-2">
        <div class="flex flex-row items-center">
               
              
          <a href="#" class="flex flex-row items-center rounded-lg focus:outline-none focus:shadow-outline">
            <img class="object-cover w-8 h-8 rounded-full" src="https://static.wixstatic.com/media/c17ec1_c5f829f2caf944b6add97e07291c016c~mv2.jpg/v1/fit/w_2500,h_1330,al_c/c17ec1_c5f829f2caf944b6add97e07291c016c~mv2.jpg" alt="">
            <p class="ml-2 text-base font-medium">{{ publicacion.publicador }}</p>
          </a>
        </div>
      
        <div class="flex flex-row items-center">
        
          <div class="mb-2 text-2xl font-light head">{{ formatDate(publicacion.fecha) }}</div>
        </div>
      </div>

      <div class="mt-2">
        <img :src="publicacion.imagen" alt="Imagen" style="width: 500px; height: 300px;" />
        <div class="flex flex-row items-center py-2">
         
        </div>
      </div>
      <div class="flex flex-row items-center">
            <p class="ml-2 text-base font-medium">Titulo : {{ publicacion.titulo }}</p>
        </div>
      <div class="py-2">
        <p class="leading-snug">Descripcion: {{ publicacion.descripcion }}</p>
      </div>
    </div>
    <v-btn @click="editarPublicacion(publicacion.id)" size="small" color="green">
                <v-icon>
                  mdi-pencil
                </v-icon>
                Editar
              </v-btn>
            
              <v-btn @click="eliminarPublicacion(publicacion.id)" size="small" color="red">
                <v-icon size="18">
                  mdi-delete
                </v-icon>
                Eliminar
              </v-btn>
  </div>
  
      <infinite-loading @infinite="infiniteHandler" class="my-4">
     
      </infinite-loading>

        

            <!-- Formulario de edición -->
    
      </v-card>
    </v-app>

    <v-card class="mx-auto" max-width="400">
  <!-- ... Otras partes de la tarjeta ... -->

  <!-- Formulario de edición dentro de la tarjeta -->
  
  
</v-card>



        <v-col cols="15">
          <v-card class="mx-auto bg-slate-100" max-width="600">
            <v-theme-provider theme="dark" with-background class="pa-5">
              <v-card title="Editar  Publicación" subtitle="Editar"></v-card>
            </v-theme-provider>
            <v-card-title class="text-h5 font-weight-regular bg-blue-grey"></v-card-title>
              
              <form @submit.prevent="guardarCambios">
            <v-text-field
                v-model="publicacionEditando.titulo"
                label="Titulo"
                id="titulo" 
                type="text "
                variant="solo"
                prepend-icon="mdi-format-text-variant-outline"

              ></v-text-field>
              
              <v-text-field
                v-model="publicacionEditando.descripcion"
                label="Descripcion"
                id="Descripcion" 
                type="text "
                prepend-icon="mdi-comment-text"
                variant="solo"
              ></v-text-field>
                 
              <v-text-field
                v-model="publicacionEditando.imagen"
                label="imagen"
                id="imagen" 
                type="text "
                prepend-icon="mdi-image-area"
                variant="solo"

              ></v-text-field>
              
              
              <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700">Cambiar Fecha:</label>
            <input type="date" id="fecha" name="fecha" v-model="publicacionEditando.fecha" class="block w-full px-3 py-2 text-sm placeholder-gray-300 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

            
        
                <button  type="submit"
              class="relative w-40 h-12 overflow-hidden text-white transition-all bg-green-500 border border-green-500 shadow-2xl before:ease before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:shadow-green-500 hover:before:-translate-x-40">
                  <span relative="relative z-10">Guardar Cambios</span>
                </button>
              </form>

              
          </v-card>
        </v-col>


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
import Swal from "sweetalert2";
import { format } from 'date-fns';
import es from 'date-fns/locale/es'; // Importa el idioma español
const api = '/api/v1/publicacion';

export default {
 

  created() {
    this.cargarPublicaciones();
  },
  methods: {
   
    editarPublicacion(publicacion) {
      this.publicacionEditando = {}; // Inicializa publicacionEditando como un objeto vacío

    const url = `/api/v1/publicacion/${publicacion}`;

axios.get(url)
  .then((response) => {
    // Asigna los datos de la respuesta a publicacionEditando
    this.publicacionEditando = response.data.data;

    console.log("ID de la publicación:", this.publicacionEditando.id);
    console.log("Título:", this.publicacionEditando.titulo);
    console.log("Descripción:", this.publicacionEditando.descripcion);
    console.log("fecha:", this.publicacionEditando.fecha);

      })
  .catch((error) => {
    console.error('Error al obtener la publicación:', error);
  });
    },

    
    guardarCambios() {
    console.log("ID de la publicación:", this.publicacionEditando.id);
    console.log("Título:", this.publicacionEditando.titulo);
    console.log("Descripción:", this.publicacionEditando.descripcion);
    console.log("fecha:", this.publicacionEditando.fecha);
    console.log("imagen:", this.publicacionEditando.imagen);

    axios.put(`/api/v1/publicacion/${this.publicacionEditando.id}`, {
      titulo: this.publicacionEditando.titulo,
      descripcion: this.publicacionEditando.descripcion,
      fecha: this.publicacionEditando.fecha,
      imagen: this.publicacionEditando.imagen,


    })
    .then((response) => {

      if(response){
        Swal.fire({
              background: 'rgba( 167, 242, 162 )', // Estilo de fondo definido en tu CSS
              icon: 'success' ,
              title: 'Se ha actualizado exitosamente',
              showConfirmButton: true,
              timer: 3000 // Cambia el tiempo que deseas que aparezca la alerta
              
            });
                
        console.log('Cambios guardados con éxito', response);
        this.cargarPublicaciones();
      }
      
      // Redirige a donde desees después de guardar los cambios
      this.$router.push('/index_publicaciones'); // O la ruta que necesites
    })
    .catch((error) => {
      Swal.fire({
              background: 'rgba( 167, 242, 162 )', // Estilo de fondo definido en tu CSS
              icon: 'error' ,
              title: 'error al guardar llenar los campos correctamente',
              showConfirmButton: true,
              timer: 3000 // Cambia el tiempo que deseas que aparezca la alerta
            });
      console.error('Error al guardar los cambios:', error);
    });
  },
  cargarPublicaciones() {
      axios.get('/api/v1/publicacion')
        .then((response) => {
          console.log(response)
          this.publicaciones = response.data.publicaciones;
          console.log(this.publicaciones)

        })
        .catch((error) => {
        
          console.error('Error al cargar las publicaciones:', error);
        });
    },


  infiniteHandler($state) {
        if (this.isLoading) {
          // Evita realizar múltiples solicitudes simultáneas
          return;
        }
  
        this.isLoading = true;
  
        axios.get(api, {
          params: {
            page: this.page,
          },
        }).then((response) => {
          if (response.data.publicaciones.length) {
            this.page += 1;
            this.list.push(...response.data.publicaciones);
            this.isLoading = false;
            console.log("solicitando mas informacion")

            $state.loaded();
  
            if (this.list.length >= response.data.total) {
              // Si has cargado todos los resultados disponibles, completa la paginación
              this.hasMoreResults = false;
              $state.complete();
            }
          } else {
            console.log("has llegado al final del contenido")
            this.isLoading = false;
            this.hasMoreResults = false;
            $state.complete();
          }
        });
      },

      formatDate(isoDate) {
  const options = {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    ///hour: '2-digit',
    ///minute: '2-digit',
    timeZone: 'UTC'
  };
  return new Date(isoDate).toLocaleString('es-es', options);
},
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
        id: '',
        fecha: '', // Inicializa con la fecha en el formato adecuado (por ejemplo, 'YYYY-MM-DD')
        imagen:'',
      },
      page: 1,
      list: [], // Define la propiedad list aquí
      isLoading: false,
      hasMoreResults: true,
      currentIndex: 0,
    };
  },
  mounted() {

  const token = ''; 

  axios.get('/api/user/index', {
   
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
