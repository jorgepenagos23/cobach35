<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div>
        <banner></banner>
    </div>

    <v-app>


        <body style="overflow-x: auto;">
          
<!-- Sección de Secciones Filtradas -->
<section class="bg-blue-200 dark:bg-gray-900">
      <div class="container px-6 py-10 mx-auto">
        <div class="xl:flex xl:items-center xl:-mx-4">
          <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="xl:w-1/2 xl:mx-4">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">{{ data.contenido.titulo }}</h1>
            <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">{{ data.contenido.descripcion }}</p>
          </div>

          <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
            <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id">
              <div class="mb-4">
                <img class="object-cover w-full h-60 rounded-xl" :src="data.contenido.imagen" alt="">
              </div>
              <p class="text-gray-500 dark:text-gray-300">{{ data.seccion.nombre_subseccion }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>     

      <div v-for="publicacion in list" :key="publicacion.id" class="grid grid-cols-1 gap-6 px-4 my-6 md:px-6 lg:px-8">
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
      <v-chip  color="secondary">
                {{ publicacion.titulo }}
      </v-chip>
    </div>

    <div class="py-2">
      <p class="leading-snug text-justify">{{ publicacion.descripcion }}</p>
    </div>
  </div>
</div>


      
   
  

<infinite-loading @infinite="infiniteHandler" class="my-4">
        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
          Cargar más
        </button>
      </infinite-loading>
        
         
        </body>
     
        <div>
        <pie></pie>
         </div>
    </v-app>
</template>
  
<style>

@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

.centered-content {
    display: flex;
    text-align: center;
    justify-content: center;
    height: auto;
}

@media only screen and (max-width: 600px) {
 
   .text-h2 {
      font-size: 1.5rem;
   }
}
</style>
<script>
import axios from 'axios';
import banner from "../../inicio.vue";
import pie from "../../footer.vue";
import Swal from 'sweetalert2';

  const api = '/api/v1/publicacion';

  export default {
    name: 'mision',
    components: {
      banner,
      pie,
    },
    data() {
      return {
        page: 1,
        list: [],
        isLoading: false,
        hasMoreResults: true,
        
        publicaciones: [],
        slides: ['First', 'Second', 'Third', 'Fourth', 'Fifth'],
        currentIndex: 0,
        colors: ['white', 'white'],
        posts: [],
        contenido: [],
        secciones: {},
        seccionesContenidoFiltrado: [], 
        componentRuta: '',
      };
    },
    created() {
      this.cargarPublicaciones();
      this.componentRuta = this.$route.path;
      this.fetchData();
    },
    methods: {
      infiniteHandler($state) {
        if (this.isLoading) {
        
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
            const newPublicaciones = response.data.publicaciones.sort((a, b) => {
              return new Date(b.fecha) - new Date(a.fecha);
            });
            this.list.push(...newPublicaciones);
            this.isLoading = false;
            console.log("solicitando más información");

            $state.loaded();

            if (this.list.length >= response.data.total) {
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

      fetchData() {
      axios.all([
        axios.get('/api/v1/contenido'),
        axios.get('/api/v1/fachada_subseccion')
      ])
      .then(axios.spread((response1, response2) => {
        console.log('Datos de contenido:', response1.data.contenido);
        console.log('Datos de subsecciones:', response2.data.subsecciones);

        this.contenido = response1.data.contenido;
        this.subsecciones = response2.data.subsecciones;
        this.filterContenido();
      }))
      .catch(error => {
        console.error('Error al obtener datos de la API', error);
      });
    },

    filterContenido() {
  if (this.contenido && this.subsecciones) {
    // Obtiene la ruta actual
    const rutaActual = this.$route.path;

    console.log('Ruta actual:', rutaActual);

    this.subseccionesContenidoFiltrado = Object.values(this.subsecciones).map(seccion => {
      const contenidoRelacionado = this.contenido.find(cont => cont.id === seccion.contenido_id);
      return {
        seccion,
        contenido: contenidoRelacionado,
      };
    }).filter(data => data.seccion.ruta === rutaActual);

    console.log('Contenido filtrado:', this.subseccionesContenidoFiltrado);
  }
},
      
    },
  };
</script>
