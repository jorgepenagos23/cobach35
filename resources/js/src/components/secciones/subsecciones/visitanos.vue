<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css";
</script>
<template>
  <div>
    <banner></banner>
  </div>

  <v-app>


    <body style="overflow-x: auto;">


      <!-- Sección de Secciones Filtradas -->
      <section class="relative bg-white py-27 lg:py-27">
        <div
          class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
          <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id"
            class="relative flex flex-1 max-w-3xl mx-auto lg:w-1/2 lg:h-auto lg:max-w-none lg:mx-0">
            <img class="object-cover w-full h-60 rounded-xl" :src="data.contenido.imagen" alt="">
          </div>




          <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id"
            class="relative flex flex-col items-center max-w-3xl mx-auto text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none lg:mx-0 lg:flex-1 lg:w-1/2">
            <div class="absolute inset-y-0 hidden w-full lg:w-1/2 lg:right-0 lg:block">
              <span
                class="absolute hidden w-24 h-24 rotate-90 skew-x-12 bg-green-400 -left-6 md:left-4 top-24 lg:top-28 rounded-3xl blur-xl opacity-60 lg:opacity-25 lg:block"></span>
              <span class="absolute w-24 h-24 bg-blue-600 right-4 bottom-12 rounded-3xl blur-xl opacity-20"></span>
            </div>

            <span
              class="absolute w-4/12 rotate-90 rounded-full skew-y-15 skew-x-18 lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 -top-5 lg:left-0 blur-2xl opacity-40"></span>

            <div class="py-2">
              <p class="leading-snug text-justify" v-html="data.contenido.titulo"></p>
            </div>


            <span
              class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 from-20% via-blue-600 via-30% to-green-600"></span>
            <p class="leading-snug text-justify" v-html="data.contenido.descripcion"></p>

          </div>
        </div>
      </section>

      <div>
        <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id">
          <!-- Renderiza la información de la publicación aquí -->
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
                <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>
              </v-chip>
            </div>

            <div class="py-2">
              <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
            </div>
          </div>
        </div>

      </div>

    </body>
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
