<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
    <appbar></appbar>
      <!-- Agrega clases de alineación para centrar el formulario -->
      <v-row justify="center">
        <v-col cols="7">
          <v-card color="#385F73" theme="light" class="mt-4">
            <v-theme-provider theme="light" with-background class="pa-5">
              <v-card title="Crear Publicación" subtitle="Crear"></v-card>
            </v-theme-provider>
            <v-card-title class="text-h5 font-weight-regular bg-blue-grey"></v-card-title>
            <v-sheet width="900">
              <v-form ref="form">
                <v-text-field
                  v-model="publicacion.titulo"
                  label="Título"
                  required
                  variant="solo"
                  prepend-icon="mdi-format-text-variant-outline"
                ></v-text-field>
                <v-text-field
                  v-model="publicacion.descripcion"
                  label="Descripción"
                  required
                  prepend-icon="mdi-comment-text"
                   variant="solo"
                ></v-text-field>
                
                <v-text-field
                  v-model="publicacion.publicador"
                  label="Nombre"
                  required
                  prepend-icon="mdi-tooltip-account"
                  variant="solo"
                ></v-text-field>
                
                <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-600 uppercase bg-blue-200 rounded-full">
                  Imagen      </span>
        
                <input type="file" id="imagenFile" @change="handleFileUpload" accept="image/*">


                <label for="datepicker">Selecciona una fecha:</label>
                <input type="date" id="datepicker" name="datepicker" v-model="publicacion.fecha">
                <div class="div-botones">
                  <v-btn color="success" class="mt-4" block @click="createPublicacion">
                    Crear Publicación
                  </v-btn>
                </div>
              </v-form>
            </v-sheet>
          </v-card>
        </v-col>
      </v-row>
  </v-app>
</template>

<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
</style>
<script>

import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      publicacion: {
        titulo: "",
        descripcion: "",
        fecha: null,
        publicador: "",
        imagenFile: null,
        imagen: "", 
      },
    };
  },
  methods: {
    handleFileUpload(event) {
      this.publicacion.imagenFile = event.target.files[0];
      this.manejadorImagen(); // Llama a la función para manejar la imagen después de cargarla
    },
    createPublicacion() {
      const formData = new FormData();
      formData.append('titulo', this.publicacion.titulo);
      formData.append('descripcion', this.publicacion.descripcion);
      formData.append('fecha', this.publicacion.fecha);
      formData.append('publicador', this.publicacion.publicador);
      formData.append('imagenFile', this.publicacion.imagenFile);

      // Hacemos la solicitud POST al servidor
      axios.post('api/v1/publicacion', formData)
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Publicación creada con éxito',
            showConfirmButton: false,
            timer: 3500
          });
          console.log('Publicación creada con éxito', response.data);
        })
        .catch(error => {
          console.error('Error al crear la publicación', error);
          if (error.response) {
            console.error('Código de estado HTTP:', error.response.status);
            console.error('Respuesta del servidor:', error.response.data);
          } else if (error.request) {
            console.error('No se recibió respuesta del servidor');
          } else {
            console.error('Error durante la configuración de la solicitud', error.message);
          }
        });
    },

    manejadorImagen() {
      const file = this.publicacion.imagenFile;
      if (file) {
        this.publicacion.imagen = URL.createObjectURL(file);
      }
    },
  },
  components: {
    appbar,
    navegacion,
  },
};
</script>
