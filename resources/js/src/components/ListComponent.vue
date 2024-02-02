<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>

 
    <div class="p-6 bg-white">
     <header class="bg-green-100 dark:bg-blue-950">
        <div class="container flex flex-col px-6 py-4 mx-auto space-y-6 md:h-128 md:py-16 md:flex-row md:items-center md:space-x-6">
    
          <v-carousel
    height="400"
    hide-delimiters
    progress="green"
    show-arrows="hover"
    v-model="currentIndex"
  >
      <v-carousel-item v-for="publicacion in publicaciones" :key="publicacion.id">
        <v-sheet class="bg-opacity-0" height="100%">
          <div class="justify-center d-flex fill-height align-center">
            <div class="text-h2">
              <div class="grid p-8 m-auto text-center bg-white border rounded-lg w-800 hero md:grid-cols-2 bg-opacity-90">
                <img :src="publicacion.imagen" alt="Imagen" style="width: 1200px;" />
                <div class="p-5 m-auto text-lg text md:ml-5 md:text-left">
                  
                  <div class="py-2">
                <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>
              </div>


                  <div class="mb-2 text-xl font-semibold text-green-600">{{ formatDate(publicacion.fecha) }}</div>

                  <div class="text-gray-700 desc">{{ publicacion.nombre }}</div>
                </div>
              </div>
            </div>
          </div>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
      
      
        </div>
    </header>

    <div v-for="publicacion in list" :key="publicacion.id" class="max-w-xl px-4 py-4 mx-auto transition-transform transform bg-white rounded-lg shadow-md hover:shadow-lg">
  <div class="max-w-xl px-4 py-4 mx-auto transition-transform transform bg-white rounded-lg shadow-md hover:shadow-lg">
    <div class="flex flex-row items-center justify-between py-2">
      <div class="flex flex-row items-center">
        <a href="#" class="flex flex-row items-center rounded-lg focus:outline-none focus:shadow-outline">
          <img class="object-cover w-8 h-8 rounded-full" src="https://static.wixstatic.com/media/c17ec1_c5f829f2caf944b6add97e07291c016c~mv2.jpg/v1/fit/w_2500,h_1330,al_c/c17ec1_c5f829f2caf944b6add97e07291c016c~mv2.jpg" alt="">
          <v-chip color="primary"> 
            {{ publicacion.publicador }}
          </v-chip>
        </a>
      </div>
    
      <div class="flex flex-row items-center">
        <v-chip  color="red">
          {{ formatDate(publicacion.fecha) }}
        </v-chip>
      </div>
    </div>

    <div class="mt-2">
      <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full h-48 rounded">
      <div class="flex flex-row items-center py-2"></div>
    </div>

    <div class="flex flex-row items-center">
      <v-chip  color="red">
        <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>
      </v-chip>
    </div>

    <div class="py-2">
      <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
    </div>


  </div>
</div>

      <infinite-loading @infinite="infiniteHandler" class="my-4">
        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
          Cargar más
        </button>
      </infinite-loading>
    </div>zz
  </template>
  
  <style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
  
.centered-content {
  display: flex;
 justify-content: center;
  height: auto; /* Elimina la altura fija para que el contenido se ajuste automáticamente */
}


main {
  margin-top: 20px; /* Adjust the top margin to make space for the banner */
  padding: 20px; /* Adjust the interior space of the content */
}

.my-carousel {
  max-width: 800px;
  margin: 0 auto;
}


.text-h2 {

font-family: 'Mifuente',sans-serif;
  
}

</style>
  <script>
  import axios from 'axios';
import { VImg } from "vuetify/lib/components/index.mjs";
import { format } from 'date-fns';
import es from 'date-fns/locale/es'; // Importa el idioma español
  const api = '/api/v1/publicacion';
  
  export default {
    data() {
      return {
        page: 1,
        list: [],
        isLoading: false,
        hasMoreResults: true,
        items: [
        { text: 'Slide 1', color: 'white', image: 'https://i.ytimg.com/vi/lZ-D6vgcie0/maxresdefault.jpg' },
        { text: 'Slide 2', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1N5xmc3hGjYTCZMnzaMoTRZe80LlEBH8z0w&usqp=CAU' },
        { text: 'Slide 3', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThLrpEm8LVg2Y8GeINyUAlzavtT4lFvr4pFA&usqp=CAU' },
      ],
      publicaciones: [],

        slides: ['First', 'Second', 'Third', 'Fourth', 'Fifth'],
        currentIndex: 0,
        
      };
    },
    created() {
    this.cargarPublicaciones();
  },
    methods: {
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
      // Ordena las publicaciones por fecha en orden descendente antes de agregarlas a la lista existente
      const newPublicaciones = response.data.publicaciones.sort((a, b) => {
        return new Date(b.fecha) - new Date(a.fecha);
      });
      this.list.push(...newPublicaciones);
      this.isLoading = false;
      console.log("solicitando más información");

      $state.loaded();

      if (this.list.length >= response.data.total) {
        // Si has cargado todos los resultados disponibles, completa la paginación
        this.hasMoreResults = false;
        $state.complete();
      }
    } else {
      console.log("has llegado al final del contenido");
      this.isLoading = false;
      this.hasMoreResults = false;
      $state.complete();
    }
  });
},

      cargarPublicaciones() {
  axios.get('/api/v1/publicacion')
    .then((response) => {
      console.log(response);
      this.publicaciones = response.data.publicaciones.sort((a, b) => {
        // Ordenar por fecha en orden descendente (más reciente primero)
        return new Date(b.fecha) - new Date(a.fecha);
      });
      console.log(this.publicaciones);
    })
    .catch((error) => {
      console.error('Error al cargar las publicaciones:', error);
    });
},
    formatDate(isoDate) {
      const options = {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        timeZone: 'UTC'
      };
      return new Date(isoDate).toLocaleString('es-es', options);

    },

    },
  };
  </script>
  