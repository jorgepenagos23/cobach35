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
          
<!-- Hero section -->

<section class="relative py-24 mb-0 bg-white lg:py-23"> 
   <div class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-1 max-w-3xl mx-auto lg:w-1/2 lg:h-auto lg:max-w-none lg:mx-0">
      <img class="object-cover w-full h-80 rounded-xl" :src="data.contenido.imagen" alt="">
    </div>

    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-col items-center max-w-3xl mx-auto text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none lg:mx-0 lg:flex-1 lg:w-1/2">
      <div class="absolute inset-y-0 hidden w-full lg:w-1/2 lg:right-0 lg:block">
      </div>
      

      <h1 class="text-3xl font-bold leading-tight text-left text-gray-900 sm:text-4xl md:text-5xl xl:text-6xl">
        {{ data.contenido.titulo }} 
      </h1>
      <p class="mt-8 text-justify text-gray-700">
        {{ data.contenido.descripcion }}
      </p>

    </div>
  </div>
</section>

           <!-- section  -->
           <div v-for="publicacion in list" :key="publicacion.id"
     class="relative flex flex-col justify-center min-h-screen py-3 overflow-hidden bg-white sm:py-5">
     <div class="items-center w-full max-w-screen-xl mx-auto mt-2 mb-4">
              <div class="relative block w-full p-4 text-base leading-5 text-white opacity-100 rounded-xl group-hover:bg-lime-600 bg-teal-950 font-regular">{{ publicacion.titulo }}</div>
        <div class="grid h-full grid-cols-1 gap-6 md:grid-cols-2">
            
    <div class="h-full px-2 py-3 transition-all bg-white w-50 botom-3 md:w-4/6 md:px-2 rounded-xl group-hover:bg-sky-600">
        <h2 class="w-full text-3xl font-bold text-left text-white"></h2>    </div>

            <br>
            <div>
                <div class=" rounded-xl">
                    <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full rounded h-96">
                </div>
            </div>
            <div class="md:pr-3">
                <p class="mb-6 text-justify text-black peer">
                    <v-card class="mx-auto" max-width="1200" color="black" variant="tonal">
                        <v-card-item>
                            <div>
                                <div class="mb-1 text-overline"></div>
                                <p class="mt-6 text-lg leading-8 text-gray-600">{{ publicacion.descripcion }}</p>
                            </div>
                        </v-card-item>
                        <v-card-actions></v-card-actions>
                    </v-card>
                </p>
            </div>
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
