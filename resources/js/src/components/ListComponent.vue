<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div class="p-6 bg-gray-100">
      <header class="p-4 text-white bg-blue-500">



      </header>

      <h1 class="text-4xl font-bold text-gray-800 lg:px-20 md:px-10 lg:mx-40 md:mx-20">
      Publicaciones
    </h1>
    <v-carousel cycle hide-delimiters>
      <v-carousel-item v-for="publicacion in publicaciones" :key="publicacion.id">
        <v-card max-width="300" class="mx-auto">
          <v-img :src="publicacion.imagen" aspect-ratio="16/9"></v-img>
          <v-card-title>{{ publicacion.titulo }}</v-card-title>
          <v-card-text>{{ publicacion.descripcion }}</v-card-text>
          <v-card-actions>
            <v-btn text color="blue">Leer más</v-btn>
          </v-card-actions>
        </v-card>
      </v-carousel-item>
    </v-carousel>

  
      <div v-for="publicacion in list" :key="publicacion.id" class="p-4 my-4 bg-white shadow-md">
        <div>
          <img :src="'https://fastly.picsum.photos/id/743/200/200.jpg?hmac=p4EqNQGnGvZo65W4_FlXvjPQG8g1ogR7bgvnrQCUnEs'" alt="Imagen de la publicación">
            <h2 class="text-xl font-semibold">{{ publicacion.id }}</h2>
          <h2 class="text-xl font-semibold">{{ publicacion.titulo }}</h2>
          <p class="text-gray-600">{{ publicacion.nombre }}</p>
          <p class="text-gray-600">{{ publicacion.fecha }}</p>
        </div>
      </div>
  
      <infinite-loading @infinite="infiniteHandler" class="my-4">
        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
          Cargar más
        </button>
      </infinite-loading>
    </div>
  </template>
  
  <style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
  
main {
  margin-top: 20px; /* Adjust the top margin to make space for the banner */
  padding: 20px; /* Adjust the interior space of the content */
}

.my-carousel {
  max-width: 800px;
  margin: 0 auto;
}

.carousel-image {
  height: 600px; /* Set a fixed height for the images within the carousel */
}


</style>
  <script>
  import axios from 'axios';
  
  const api = 'http://127.0.0.1/api/v1/publicacion';
  
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
            this.list.push(...response.data.publicaciones);
            this.isLoading = false;
            console.log("solicitando mas informacion")

            $state.loaded();
  
            if (this.list.length >= response.data.total) {
              // Si has cargado todos los resultados disponibles, completa la paginación
              this.hasMoreResults = false;
              $state.complete();
            }
          } else {
            console.log("has llegado al final del contenido")
            this.isLoading = false;
            this.hasMoreResults = false;
            $state.complete();
          }
        });
      },

      cargarPublicaciones() {
      axios.get('http://127.0.0.1/api/v1/publicacion')
        .then((response) => {
          console.log(response)
          this.publicaciones = response.data.publicaciones;
          console.log(this.publicaciones)

        })
        .catch((error) => {
          console.error('Error al cargar las publicaciones:', error);
        });
    },

    },
  };
  </script>
  