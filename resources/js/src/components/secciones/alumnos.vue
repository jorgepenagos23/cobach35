<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>
<template>
  <div>
    <banner></banner>
  </div>
  <v-app>
    <section class="relative py-24 mb-0 bg-white lg:py-23">
      <div class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
        <div v-for="data in seccionesContenidoFiltrado" :key="data.seccion.id" class="xl:w-1/2 xl:mx-4">
          <h1 class="text-3xl font-bold leading-tight text-dark sm:text-4xl md:text-5xl xl:text-6xl">
            <p class="leading-snug text-justify" v-html="data.contenido.titulo"></p>
          </h1>
          <p class="max-w-2xl mt-4 text-justify text-gray-700 dark:text-grey-700">
          <p class="leading-snug text-justify" v-html="data.contenido.descripcion"></p>
          </p>
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
    <body>
      <v-sheet color="#F5F5F5">
        <v-card-item>
          <template v-slot:prepend>
            <v-card-title>
              <v-icon icon="mdi-student" start></v-icon>


            </v-card-title>
          </template>

          <v-divider vertical class="mx-2"></v-divider>
        </v-card-item>
        <v-col cols="auto">
          <v-card class="mx-auto" max-width="1400" title="Alumnos" color="blue accent-3">
            <template v-slot:prepend>
              <v-icon icon="mdi-account" color="primary"> </v-icon>
            </template>
            <template v-slot:append>
              <v-icon icon="mdi-check" color="success"></v-icon>
            </template>
            <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id">
              <v-card class="relative flex flex-col items-center justify-center py-6 overflow-hidden bg-white sm:py-12"
                max-width="1400">
                <div class="w-full max-w-screen-xl mx-auto">
                  <div role="alert"
                    class="relative flex block w-full px-2 py-2 bg-gray-100 rounded-lg ">
                    <div class="mr-12 ">
                      <p class="font-bold text-black">
                        <span >
                          <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>
                        </span>
                        <span title=""
                          class="inline-flex items-center justify-center ml-4 text-sm font-bold text-yellow-300 transition-all duration-200 rounded-md hover:text-gray-700"
                          role="button">
                       
                        </span>
                      </p>
                    </div>
                    <h4
                      class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    </h4>
                  </div>
                  <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="py-2">
                      <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
                    </div>
                    <div class="rounded-xl">
                      <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full rounded h-50">
                    </div>
                  </div>
                </div>
              </v-card>
            </div>
          </v-card>
        </v-col>
      </v-sheet>
    </body>
  </v-app>
</template>
  
<style>
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

      colors: [
        'white',
        'white',

      ],
      slides: [
        { title: 'First', url: 'https://scontent.ftgz1-1.fna.fbcdn.net/v/t1.6435-9/51929161_1997642960535831_2328698321197072384_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=755d08&_nc_eui2=AeGpxHOYLPxGKT0wmlPMOgQwKoD6vWtBkMAqgPq9a0GQwF4-l0d-THD-ZRIXG3uvP2QDjC2qY8tm-vVtfPrRGlQI&_nc_ohc=IKG0BOXqaPsAX9eqt4Z&_nc_ht=scontent.ftgz1-1.fna&oh=00_AfCd27xmSLpEe0JRwdiV0obvT98f9REA5RYO6wTiDy6lvg&oe=65D1916C' },
        { title: 'Second', url: 'https://scontent.ftgz1-1.fna.fbcdn.net/v/t1.6435-9/51929161_1997642960535831_2328698321197072384_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=755d08&_nc_eui2=AeGpxHOYLPxGKT0wmlPMOgQwKoD6vWtBkMAqgPq9a0GQwF4-l0d-THD-ZRIXG3uvP2QDjC2qY8tm-vVtfPrRGlQI&_nc_ohc=IKG0BOXqaPsAX9eqt4Z&_nc_ht=scontent.ftgz1-1.fna&oh=00_AfCd27xmSLpEe0JRwdiV0obvT98f9REA5RYO6wTiDy6lvg&oe=65D1916C' },
        { title: 'Third', url: 'URL_DE_LA_IMAGEN_3' },
      ],


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
