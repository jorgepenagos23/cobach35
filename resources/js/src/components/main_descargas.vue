<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
    
      <appbar></appbar>
        
        <v-card-item class="bg-lime-accent-4 ">
          <v-theme-provider theme="light" with-background class="pa-5">
              <v-card title=" Administrador de Contenidos Descargables" 
              prepend-icon="mdi-file-chart-outline"
              subtitle="Subir Pdf, Words  "></v-card>
            </v-theme-provider>
        
  

        </v-card-item>
  
        <v-row justify="center">
        <v-col cols="7">
        <v-card color="white" theme="light" class="mt-4">
          
    <v-card-title class="bg-white text-h5 font-weight-regular">
      Subir archivos 
    </v-card-title>

    <form @submit.prevent="subirPDF" class="mb-4" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block mb-2 text-sm font-bold text-gray-700" for="archivo">Subir PDF</label>
      <v-file-input
        ref="archivo"  
        v-model="selectedFile"
        accept=".pdf"
        label="Seleccionar archivo"
        outlined
        dense
      ></v-file-input>
    </div>
    <div class="mb-4">
      <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" :disabled="uploading">
        Subir PDF
      </button>
    </div>
  </form>
  
    <Tabladescargas></Tabladescargas>

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
  import navegacion from "./barra_navegacion.vue";
  import appbar from "./app_bar.vue";
  import Tabladescargas from './descargas/Tabladescargas.vue';
  
  export default {
    data() {
      return {
        selectedFile: null, // Almacena el archivo seleccionado
        uploading: false, // Bandera para controlar el estado de la carga
      };
    },
    methods: {
      handleFileChange(event) {
        // Almacena el archivo seleccionado en la propiedad de datos
        this.selectedFile = event.target.files[0];
      },
      subirPDF() {
        // Validar si hay un archivo seleccionado
        if (!this.selectedFile) {
          console.error('No se ha seleccionado ningún archivo');
          return;
        }

        // Crear un objeto FormData
        const formData = new FormData();

        // Adjuntar el archivo al FormData
        formData.append('archivo', this.selectedFile);

        // Habilitar la bandera de carga
        this.uploading = true;

        // Enviar la solicitud al servidor
        axios.post('/subir-pdf', formData)
          .then(response => {
            console.log('Archivo subido correctamente', response);
            // Realizar lógica adicional si es necesario

            // Restablecer la bandera de carga
            this.uploading = false;
          })
          .catch(error => {
            console.error('Error al subir archivo', error);

            // Restablecer la bandera de carga en caso de error
            this.uploading = false;
          });
      },
    },
    components: {
      navegacion,
      appbar,
      Tabladescargas,
    },
  };
</script>
