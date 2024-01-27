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
<section class="relative py-24 mb-0 bg-white lg:py-23"> 
    <div class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
            <div v-for="data in seccionesContenidoFiltrado" :key="data.seccion.id" class="xl:w-1/2 xl:mx-4">
              <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-black">{{ data.contenido.titulo }}</h1>
              <p class="max-w-2xl mt-4 text-justify text-gray-700 dark:text-gray-700">{{ data.contenido.descripcion }}</p>
            </div>
  
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
              <div v-for="data in seccionesContenidoFiltrado" :key="data.seccion.id">
                <div class="mb-4">
                  <img class="object-cover w-full h-60 rounded-xl" :src="data.contenido.imagen" alt="">
                </div>
                <p class="text-gray-500 dark:text-gray-300"></p>
              </div>
            </div>
          </div>
      </section>
                            
      <v-sheet color="#F5F5F5">
  <v-card-item>
    <template v-slot:prepend>
      <v-card-title>
        <v-icon
          icon="mdi-student"
          start
        ></v-icon>
      </v-card-title>
    </template>

    <v-divider vertical class="mx-2"></v-divider>

    <v-btn
      class="text-none text-subtitle-1"
      color="#5865f2"
      size="small"
      variant="flat"
    >
    Vinculacion
    </v-btn>
  </v-card-item>

  <v-col cols="auto">
    <v-card class="mx-auto" max-width="1400" title="" color="emerald accent-3">
      <template v-slot:prepend>
        <v-icon icon="mdi-account" color="primary"></v-icon>
      </template>
      <template v-slot:append>
        <v-icon icon="mdi-check" color="success"></v-icon>
      </template>
      <v-expansion-panels v-model="panel" :disabled="disabled" multiple>
        <v-expansion-panel v-for="publicacion in list" :key="publicacion.id">
            <v-expansion-panel-title class="primary" theme="dark" color="indigo-darken-4">
                {{ publicacion.titulo }}
            </v-expansion-panel-title>

            <v-expansion-panel-text class="text-justify">
             {{ publicacion.descripcion }}

            </v-expansion-panel-text>

        </v-expansion-panel>
      </v-expansion-panels>

      <infinite-loading @infinite="infiniteHandler" class="my-4">
        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
          Cargar más
        </button>
      </infinite-loading>
    </v-card>
  </v-col>
</v-sheet>

        
         
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
  import { VImg } from "vuetify/lib/components/index.mjs";
  import { format } from 'date-fns';
  import es from 'date-fns/locale/es'; // Importa el idioma español
  import banner from "../inicio.vue";
  import pie from "../footer.vue";
  import Swal from 'sweetalert2';

  const api = '/api/v1/publicacion';

  export default {
    name: 'conocenos',
    components: {
      banner,
      pie,
      VImg,
    },
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
        colors: ['white', 'white'],
        posts: [],
        panel: [0, 1],
            disabled: false,
        secciones: {},
        seccionesContenidoFiltrado: [], // Nuevo array para almacenar secciones y contenido filtrado
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

      fetchData() {
        axios.get('/api/v1/contenido')
          .then(response => {
            this.contenido = response.data.contenido;
            this.filterContenido();
          })
          .catch(error => {
            console.error('Error al obtener datos de la API', error);
          });

        axios.get('/api/v1/secciones')
          .then(response2 => {
            console.log(response2);
            this.secciones = response2.data.secciones;
            this.filterContenido();
          })
          .catch(error => {
            console.error('Error al obtener datos secciones', error);
          });
      },

      filterContenido() {
        this.seccionesContenidoFiltrado = [];

        for (const id in this.secciones) {
          const seccion = this.secciones[id];
          const contenidoId = seccion.contenido_id;

          for (const contenido of this.contenido) {
            if (contenido.id === contenidoId && seccion.ruta === this.componentRuta) {
              this.seccionesContenidoFiltrado.push({ seccion, contenido });
              break;
            }
          }
        }
      },
    },
  };
</script>
