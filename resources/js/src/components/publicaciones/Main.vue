<script setup>
import InfiniteLoading from "v3-infinite-loading";
import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots

import Editor from '@tinymce/tinymce-vue';

const editorConfig = {
  language: 'es',
  toolbar_mode: 'sliding',
  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ],

  

};
const tituloEditorConfig = {
  language: 'es',
  toolbar_mode: 'sliding',
  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen  advtemplate advtable advcode editimage   powerpaste tinymcespellchecker autocorrect a11ychecker  inlinecss',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ],
};





const apiKey = 'vgvm9x4wbo925nbtlkqal2wmuebfvsqvb8lgq99i2rumla9w';
const initialValue = 'Bienvenido';
</script>

<template>
  <header>
    <navegacion></navegacion>
  </header>


    <appbar></appbar>
    <v-app>
    <v-app-bar app color="green darken-4" dark>
      <v-btn icon>
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <v-toolbar-title>Administracion de Publicaciones  y Contenidos del Sitio</v-toolbar-title>

      <v-spacer></v-spacer>

      <router-link to="/editar-contenidos">
        <v-btn > 
          Editar Contenidos
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
      </router-link>
    </v-app-bar>

    
    <v-card class="mx-auto" max-width="1400">
      <v-container class="text-center">


      </v-container>

      <v-card-item class="bg-blue-darken-4">
  <v-card-title>Publicaciones</v-card-title>
  
  <template v-slot:append>
    <div>
      <p class="inline-block mr-2"></p>
      <router-link to="/crear-publicaciones">
        <button
          class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow"
        >
          <v-icon>
            mdi-post-outline
          </v-icon>
          Crear Publicaciones
        </button>
      </router-link>
    </div>
  </template>
</v-card-item>



      <v-divider></v-divider>


      <!-- Scroll vue infinite para publicaciones -->

      <div v-for="publicacion in list" :key="publicacion.id" class="grid max-w-2xl grid-cols-1 gap-6 px-4 my-6 md:px-6 lg:px-8">
                <div class="max-w-xl px-4 py-4 mx-auto bg-white rounded-lg shadow-md ">
          <div class="flex flex-row items-center justify-between py-2">
            <div class="flex flex-row items-center">


              <a href="#" class="flex flex-row items-center rounded-lg focus:outline-none focus:shadow-outline">
                <img class="object-cover w-5 h-8 rounded-full"
                  src="https://sistemascobach.cobach.edu.mx/ConsultaCertificados/Content/imagenes/logo.png"
                  alt="">
                <p class="ml-2 text-base font-medium">{{ publicacion.publicador }}</p>
              </a>
            </div>

            <div class="flex flex-row items-center">

              <div class="mb-2 text-2xl font-light head">{{ formatDate(publicacion.fecha) }}</div>
            </div>
          </div>

          <div class="mt-2">
            <img :src="publicacion.imagen" alt="Imagen" style="width: 500px; height: 300px;" />
            <div class="flex flex-row items-center py-2">

            </div>
          </div>

          <div class="flex flex-row items-center">
            <p class="leading-snug text-justify" v-html="publicacion.titulo"></p>
          </div>

          <div class="py-2">
            <p class="leading-snug text-justify" v-html="publicacion.descripcion"></p>
          </div>

        </div>
        <v-btn @click="editarPublicacion(publicacion.id)" size="small" color="green">
          <v-icon>
            mdi-pencil
          </v-icon>
          Editar
        </v-btn>

        <v-btn @click="eliminarPublicacion(publicacion.id)" size="small" color="red">
          <v-icon size="18">
            mdi-delete
          </v-icon>
          Eliminar
        </v-btn>
      </div>
      <infinite-loading ref="infiniteLoading" @infinite="infiniteHandler" class="my-4">
      </infinite-loading>



    </v-card>

    

  

  <v-dialog v-model="mostrarFormularioEdicion" max-width="1200" :persistent="true" style="z-index: 900;">
  <template v-slot:activator="{ props }">
    <v-btn class="text-none" color="white" rounded="0" variant="outlined" v-bind="props">
      Abrir Diálogo
    </v-btn>
  </template>

  <v-card title="Editar Publicación">
    <v-card-text>
      <form @submit.prevent="guardarCambios">
        <!-- Contenido del formulario -->

        <label for="datepicker" class="block text-sm font-medium text-gray-700"> Editar titulo</label>
        <!-- Título con TinyMCE -->
        <Editor
          ref="editor"
          :api-key="apiKey"
          :init="tituloEditorConfig"
          :initial-value="publicacionEditando.titulo"
          v-on:blur="handleTituloEditorInput"
          class="custom-tinymce_titulo"
          style="z-index: 1001;"
        />
        <label for="datepicker" class="block text-sm font-medium text-gray-700"> Editar Descripcion</label>
        <Editor
          ref="editor"
          :api-key="apiKey"
          :init="editorConfig"
          :initial-value="publicacionEditando.descripcion"
          v-on:blur="handleEditorInput"
          class="custom-tinymce"
          style="z-index: 1000;"
        />
        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700">Cambiar Fecha:</label>
        <input type="date" id="fecha" name="fecha" v-model="publicacionEditando.fecha"
          class="block w-full px-3 py-2 text-sm placeholder-gray-300 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <button type="submit"
          class="relative w-40 h-12 overflow-hidden text-white transition-all bg-green-500 border border-green-500 shadow-2xl before:ease before:absolute before:right-0 before:top-0 before:h-12 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-10 before:duration-700 hover:shadow-green-500 hover:before:-translate-x-40">
          <span relative="relative z-10">Guardar Cambios</span>
        </button>
      </form>
    </v-card-text>

    <v-btn   @click="closeDialog"  size="small" color="red">
          <v-icon size="18">
            mdi-close
          </v-icon>
          Cerrar
        </v-btn>
  
  </v-card>
</v-dialog>
</v-app>
</template>

<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

.custom-tinymce {
  height: 700px; /* Ajusta el tamaño según tus necesidades */
  
  margin-bottom: 10px; /* Espaciado inferior para separarlo de otros elementos */

}

.custom-tinymce_titulo {
  height: 500px; /* Ajusta el tamaño según tus necesidades */
  
  margin-bottom: 10px; /* Espaciado inferior para separarlo de otros elementos */

}

</style>

<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";
import Swal from "sweetalert2";
import { format } from 'date-fns';
import es from 'date-fns/locale/es'; // Importa el idioma español
const api = '/api/v1/publicacion';

export default {
  beforeRouteUpdate(to, from, next) {
    this.cargarPublicaciones();

    // Llama a next() para continuar con la actualización de la ruta
    next();
  },

  created() {
    this.cargarPublicaciones();
  },
  methods: {

    closeDialog() {
      this.mostrarFormularioEdicion = false;
  },

    handleEditorInput(event) {
      const content = typeof event === 'object' ? event.target.getContent() : event;
      this.publicacionEditando.descripcion = content;
    },
    handleTituloEditorInput(event) {
      const content = typeof event === 'object' ? event.target.getContent() : event;
      this.publicacionEditando.titulo = content;
    },


    eliminarPublicacion(publicacion) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará la publicación.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
      }).then(async (result) => {
        if (result.isConfirmed) {
          const eliminarlink = `/api/v1/publicacion/delete/${publicacion}`;

          try {
            // Elimina la publicación
            await axios.delete(eliminarlink);

            // Recarga las publicaciones y espera a que se complete
            await this.cargarPublicaciones();

            // Reinicia el scroller después de un pequeño retraso
            setTimeout(() => {
              const scroller = document.querySelector('.your-scroller-selector'); // Reemplaza con el selector adecuado
              if (scroller) {
                scroller.scrollTop = 0; // Esto reinicia la posición del scroller
              }
            }, 100);

            Swal.fire({
              icon: 'success',
              title: 'Se ha eliminado correctamente',
              showConfirmButton: false,
              timer: 3000
            });
          } catch (error) {
            console.error('Error al eliminar', error);
            Swal.fire({
              icon: 'error',
              title: 'Error al eliminar la publicación',
              text: 'Ha ocurrido un error al eliminar la publicación'
            });
          }
        }
      });
    },


    editarPublicacion(publicacion) {
      this.publicacionEditando = {}; // Inicializa publicacionEditando como un objeto vacío

      const url = `/api/v1/publicacion/${publicacion}`;

      axios.get(url)
        .then((response) => {
          // Asigna los datos de la respuesta a publicacionEditando
          this.publicacionEditando = response.data.data;

          console.log("ID de la publicación:", this.publicacionEditando.id);
          console.log("Título:", this.publicacionEditando.titulo);
          console.log("Descripción:", this.publicacionEditando.descripcion);
          console.log("fecha:", this.publicacionEditando.fecha);
          this.mostrarFormularioEdicion = true;
        })
        .catch((error) => {
          console.error('Error al obtener la publicación:', error);
        });
    },


    guardarCambios() {
      console.log("ID de la publicación:", this.publicacionEditando.id);
      console.log("Título:", this.publicacionEditando.titulo);
      console.log("Descripción:", this.publicacionEditando.descripcion);
      console.log("fecha:", this.publicacionEditando.fecha);
      console.log("imagen:", this.publicacionEditando.imagen);

      axios.put(`/api/v1/publicacion/${this.publicacionEditando.id}`, {
        titulo: this.publicacionEditando.titulo,
        descripcion: this.publicacionEditando.descripcion,
        fecha: this.publicacionEditando.fecha,
        imagen: this.publicacionEditando.imagen,

      })
        .then((response) => {

          if (response) {
            Swal.fire({
              icon: 'success',
              title: 'Se ha actualizado exitosamente',
              showConfirmButton: true,
              timer: 3000

            });
            this.mostrarFormularioEdicion = false;
            console.log('Cambios guardados con éxito', response);


          }

        })
        .catch((error) => {
          Swal.fire({
            icon: 'error',
            title: 'Debes llenar todos los campos',
            showConfirmButton: true,
            timer: 3000
          });
          console.error('Error al guardar los cambios:', error);
        });
    },
    cargarPublicaciones() {
      axios.get('/api/v1/publicacion')
        .then((response) => {
          console.log(response)
          this.publicaciones = response.data.publicaciones;
          console.log(this.publicaciones)

        })
        .catch((error) => {

          console.error('Error al cargar las publicaciones:', error);
        });
    },


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

    formatDate(isoDate) {
      const options = {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        ///hour: '2-digit',
        ///minute: '2-digit',
        timeZone: 'UTC'
      };
      return new Date(isoDate).toLocaleString('es-es', options);
    },
  },





  components: {
    navegacion,
    appbar,
  },

  data() {
    return {
      dialog: false,
      advertising: true,
      performance: true,
      publicaciones: [],
      publicacionEditando: {
        titulo: '',
        descripcion: '',
        id: '',
        fecha: '', // Inicializa con la fecha en el formato adecuado (por ejemplo, 'YYYY-MM-DD')
        imagen: '',
      },
      showDialog: false,
      mostrarFormularioEdicion: false,
      page: 1,
      list: [], // Define la propiedad list aquí
      isLoading: false,
      hasMoreResults: true,
      currentIndex: 0,
    };
  },
  mounted() {

    const token = '';

    axios.get('/api/user/index', {

    })
      .then((response) => {
        console.log('Respuesta de la API:', response.data);
        this.publicaciones = response.data.publicaciones;
      })
      .catch((error) => {
        console.error('Error al obtener las publicaciones:', error);
      });


    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js';
    script.defer = true;
    document.body.appendChild(script);

  }

};
</script> 