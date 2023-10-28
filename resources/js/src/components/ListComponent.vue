<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div class="p-6 bg-gray-100">
      <header class="p-4 text-white bg-blue-500">
        <!-- Tu encabezado -->
      </header>
  
      <div v-for="publicacion in list" :key="publicacion.id" class="p-4 my-4 bg-white shadow-md">
        <div>
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
      };
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
    },
  };
  </script>
  