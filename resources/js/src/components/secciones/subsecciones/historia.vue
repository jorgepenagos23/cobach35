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
  <div class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
   <!-- Sección de Secciones Filtradas 
  
    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-1 max-w-3xl mx-auto lg:w-1/2 lg:h-auto lg:max-w-none lg:mx-0">
      <img class="object-cover w-full h-60 rounded-xl" :src="data.contenido.imagen" alt="">
    </div>

  -->

    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-col items-center max-w-3xl mx-auto text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none lg:mx-0 lg:flex-1 lg:w-1/2">
      <div class="absolute inset-y-0 hidden w-full lg:w-1/2 lg:right-0 lg:block">
        <span class="absolute hidden w-24 h-24 rotate-90 skew-x-12 bg-green-400 -left-6 md:left-4 top-24 lg:top-28 rounded-3xl blur-xl opacity-60 lg:opacity-25 lg:block"></span>
        <span class="absolute w-24 h-24 bg-blue-600 right-4 bottom-12 rounded-3xl blur-xl opacity-20"></span>
      </div>
      
      <span class="absolute w-4/12 rotate-90 rounded-full skew-y-15 skew-x-18 lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 -top-5 lg:left-0 blur-2xl opacity-40"></span>

      <h1 class="text-3xl font-bold leading-tight text-gray-900 sm:text-4xl md:text-5xl xl:text-6xl">
        {{ data.contenido.titulo }} 
        <span class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 from-20% via-blue-600 via-30% to-green-600"></span>
      </h1>
      <p class="mt-8 text-justify text-gray-700">
        {{ data.contenido.descripcion }}
      </p>
    </div>
  </div>
</section>

<br>
<br>

        <div class="max-w-full mx-auto">
  <div v-for="publicacion in publicacionesFiltradas" :key="publicacion.id" class="transition-transform transform bg-white rounded-lg shadow-md px-7 hover:shadow-lg">
    <div class="flex">
      <div class="w-1/2">
        <button class="bg-[#1a58a3c9] rounded-[5px] py-[15px] px-[25px] text-[#fff] text-[14px] leading-[17px] font-semibold">
          <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full rounded-lg hover:shadow-lg h-72"> <!-- Ajusta el tamaño de la imagen según tus preferencias -->
        </button>
      </div>
      <div class="w-1/2 px-4 py-4">
        <div class="mt-2">
          <div class="pt-[15px] pb-[25px] text-justify">
            <div class="flex justify-end">
              <div class="bg-[#F6F6F7] rounded-[20px] flex justify-center align-center px-[12px]">
                <p class="text-[#00153B] text-[12px] leading-[28px] font-bold"></p>
              </div>
            </div>
            <p class="text-[#00153B] text-[30px] leading-[63px] font-bold">
              <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>

            </p>
            <div>
              <p class="text-[#00153B] text-[19px] leading-[24px] font-bold">
                <div class="py-2">
                        <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
                      </div>              </p>
              <p class="text-[#00153B] text-[50px] leading-[63px] font-bold">
                <br><br>
                
              </p>
            </div>
          </div>
        </div>
        <div class="pt-[25px] pb-[35px]">
          <div>
            <p class="text-[#717F87] text-[10px] leading-[24px] font-medium">
            </p>
          </div>
        </div>
      </div>
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


.max-w-full {
    max-width: 80%;
    
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
        currentIndex: 0,
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
