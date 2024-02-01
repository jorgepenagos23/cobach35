<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div>
        <banner></banner>
    </div>
    <v-app>
                    <!-- meter el carrusel component   -->

        <v-container>
            <v-card class="mt-5">
                <v-carousel height="460" width="800" show-arrows hide-delimiter-background>
                    <template v-slot:prev="{ props }"></template>
                    <v-carousel-item v-for="(slide, i) in slides" :key="i">
                        <v-sheet :color="colors[i]" height="100%">
                            <v-img :src="slide.url" height="200%" class="object-cover w-full h-full rounded"></v-img>

                        </v-sheet>
                    </v-carousel-item>
                </v-carousel>
            </v-card>


        </v-container>

        <body>
            <!-- section  -->
            <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id"
     class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-white sm:py-12">
    <div class="items-center w-full max-w-screen-xl mx-auto">
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
                              <div class="py-2">
                        <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
                      </div>
                            </div>
                        </v-card-item>
                        <v-card-actions></v-card-actions>
                    </v-card>
                </p>
            </div>
        </div>
    </div>
</div>


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
