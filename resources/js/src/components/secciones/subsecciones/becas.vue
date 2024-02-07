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
      <section class="bg-blue-200 dark:bg-blue-900">
        <h1>BECAS</h1>
        <div class="container px-6 py-10 mx-auto">
          <div class="xl:flex xl:items-center xl:-mx-4">
            <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="xl:w-1/2 xl:mx-4">

              <p class="leading-snug text-justify" v-html="data.contenido.titulo"></p>


              <p class="leading-snug text-justify" v-html="data.contenido.descripcion"></p>

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
      <!--PUBLICACIONES  Filtradas    -->
      <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id"
        class="grid grid-cols-1 gap-6 px-4 my-6 md:px-6 lg:px-8">
        <div
          class="max-w-xl px-4 py-4 mx-auto transition-transform transform bg-white rounded-lg shadow-md hover:shadow-lg">
          <div class="flex flex-row items-center justify-between py-2">
            <div class="flex flex-row items-center">
              <a href="#" class="flex flex-row items-center rounded-lg focus:outline-none focus:shadow-outline">
                <img class="object-cover w-5 h-8 rounded-full"
                src="https://sistemascobach.cobach.edu.mx/ConsultaCertificados/Content/imagenes/logo.png">
                 
                <v-chip color="primary">
                  {{ publicacion.publicador }}
                </v-chip>
              </a>
            </div>

            <div class="flex flex-row items-center">
              <v-chip color="red">
                {{ formatDate(publicacion.fecha) }}
              </v-chip>
            </div>
          </div>

          <div class="mt-2">
            <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full h-48 rounded">
            <div class="flex flex-row items-center py-2"></div>
          </div>

          <div class="flex flex-row items-center">
            <v-chip color="secondary">
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
import banner from "../../inicio.vue";
import pie from "../../footer.vue";
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
      subsecciones: {}, // Cambié secciones a subsecciones para reflejar el nombre correcto
      subseccionesContenidoFiltrado: [],
      componentRuta: '',
      cacheKey: 'miAppCacheKey', // Agregado la clave de caché
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
  mounted() {
    // Intenta obtener datos en caché al cargar la componente
    const cachedData = localStorage.getItem(this.cacheKey);
    if (cachedData) {
      const parsedData = JSON.parse(cachedData);
      this.publicaciones = parsedData.publicaciones;
      this.hasMoreResults = parsedData.hasMoreResults;
      this.page = parsedData.page;
      console.log('Datos cargados desde la caché:', this.publicaciones);
    } else {
      // Si no hay datos en caché, realiza la solicitud a la API para obtenerlos
      console.log('No hay datos en caché. Realizando solicitud a la API.');
      this.cargarPublicacionesConSecciones();
      this.componentRuta = this.$route.path;
      this.fetchData();
    }
  },
  methods: {
    async cargarPublicacionesConSecciones() {
      try {
        const response = await axios.get('api/v1/publicaciones-con-secciones');
        this.publicaciones = response.data;
        console.log('Publicaciones cargadas:', this.publicaciones);
        // Guarda los datos en caché al cargar las publicaciones
        this.saveDataToCache();
      } catch (error) {
        console.error('Error al cargar las publicaciones con secciones', error);
      }
    },

    // Método para guardar datos en caché
    saveDataToCache() {
      const dataToCache = {
        publicaciones: this.publicaciones,
        hasMoreResults: this.hasMoreResults,
        page: this.page,
      };

      // Convierte y guarda los datos en caché
      localStorage.setItem(this.cacheKey, JSON.stringify(dataToCache));
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