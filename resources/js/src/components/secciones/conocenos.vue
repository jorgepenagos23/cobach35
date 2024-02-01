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
        <div class="container px-6 py-10 mx-auto">
        <div class="xl:flex xl:items-center xl:-mx-4">
            <div v-for="data in seccionesContenidoFiltrado" :key="data.seccion.id" class="xl:w-1/2 xl:mx-4">
              <h1 class="text-3xl font-bold leading-tight text-dark sm:text-4xl md:text-5xl xl:text-6xl">
          {{ data.contenido.titulo }}
        </h1>
              <p class="max-w-2xl mt-4 text-justify text-gray-700 dark:text-grey-700">{{ data.contenido.descripcion }}</p>
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
        </div>
      </section>

                            

      <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id" class="grid grid-cols-1 gap-6 px-4 my-6 md:px-6 lg:px-8">
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
  <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
</div>

  </div>
</div>


      
   
  

         
        </body>
     
        <div>
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
import banner from "../../components/inicio.vue";
import pie from "../../components/footer.vue";
import Swal from 'sweetalert2';


export default {
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
  components: {
      banner,
      pie,
    },
  computed: {
    publicacionesFiltradas() {
      const rutaActual = this.$route.path.toLowerCase();
      return this.publicaciones.filter(publicacion => {
        const rutaPublicacion = (publicacion.seccion || publicacion.subseccion)?.ruta.toLowerCase();
        return rutaPublicacion === rutaActual;
      });
    },
  },
  created() {
    // Llama automáticamente a cargarPublicacionesConSecciones al crear la instancia
    this.cargarPublicacionesConSecciones();
    this.componentRuta = this.$route.path;
      this.fetchData();
  },
  methods: {
    async cargarPublicacionesConSecciones() {
      try {
        const response = await axios.get('api/v1/publicaciones-con-secciones');
        this.publicaciones = response.data;
        console.log('Publicaciones cargadas:', this.publicaciones);
      } catch (error) {
        console.error('Error al cargar las publicaciones con secciones', error);
      }
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

    infiniteHandler($state) {
      if (this.isLoading) {
        return;
      }

      this.isLoading = true;

      axios.get('/api/v1/publicaciones-con-secciones', {
        params: {
          page: this.page,
        },
      }).then((response) => {
        if (response.data.length) {
          this.page += 1;
          const newPublicaciones = response.data.sort((a, b) => {
            return new Date(b.fecha) - new Date(a.fecha);
          });
          this.publicaciones.push(...newPublicaciones);
          this.isLoading = false;
          console.log("Solicitando más información");

          $state.loaded();

          if (this.publicaciones.length >= response.data.total) {
            this.hasMoreResults = false;
            $state.complete();
          }
        } else {
          console.log("Has llegado al final del contenido");
          this.isLoading = false;
          this.hasMoreResults = false;
          $state.complete();
        }
      });
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
