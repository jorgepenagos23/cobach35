<script setup>
import Editor from '@tinymce/tinymce-vue';

const editorConfig = {
  language: 'es',
  toolbar_mode: 'sliding',


  plugins: 'table powepaste list media paste',
  toolbar: 'undo redo | styleselect |bold italic | alignleft | alignleft aligncenter alignright',
  
  
  tinycomments_mode: 'embedded',
  
popup_css: {
    'z-index': 103213, // Ajusta el z-index de las ventanas emergentes de TinyMCE
  },
  

};
const tituloEditorConfig = {
  language: 'es',
  toolbar_mode: 'sliding',
  plugins: 'table powepaste list media paste',
  toolbar: 'undo redo | styleselect |bold italic | alignleft | alignleft aligncenter alignright',
  
  tinycomments_mode: 'embedded',
  
};

const apiKey = 'vgvm9x4wbo925nbtlkqal2wmuebfvsqvb8lgq99i2rumla9w';
const initialValue = 'Bienvenido';
</script>
<template>
    <div>
      <header>
        <navegacion></navegacion>
      </header>
      <v-app>
        <appbar></appbar>
        <h1>CONTENIDOS DE LAS SECCIONES</h1>

        <div>

<v-dialog v-model="dialog" max-width="1200" :persistent="true" style="z-index: 900;">
  <v-card title="Editar Publicación">


    <form @submit.prevent="guardarCambios" enctype="multipart/form-data"> <!-- Contenido del formulario -->
      <label for="datepicker" class="block text-sm font-medium text-gray-700"> Editar titulo</label>
      <!-- Título con TinyMCE -->
      <Editor ref="editorTitulo" :api-key="apiKey" :init="tituloEditorConfig"
        :initial-value="seccionEditada.nombre" v-on:blur="handleTituloEditorInput" class="custom-tinymce_titulo"
        style="z-index: 1001;" />

      <!-- Editor de descripción -->
      <Editor ref="editorDescripcion" :api-key="apiKey" :init="editorConfig"
        :initial-value="seccionEditada.nombre_subseccion" v-on:blur="handleDescripcionEditorInput"
        class="custom-tinymce" style="z-index: 1000;" />



      <div class="div-botones">
        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700">Cambiar Fecha:</label>
        <input type="date" id="fecha" name="fecha" v-model="seccionEditada.fecha"
          class="block w-full px-3 py-2 text-sm placeholder-gray-300 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>



      <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
        Guardar cambios
      </button>

<br><br>
      
    </form>
  </v-card>

  <v-card title="Actualizar Imagen " class="p-4 bg-blue-100">
    <div class="card-body">
      <div v-if="success !== ''" class="alert alert-success" role="alert">
        {{ success }}
      </div>

      <form @submit="formSubmit" enctype="multipart/form-data" class="mt-4">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
          <input type="text" id="name" v-model="name" class="block w-full mt-1 rounded-md form-input">
        </div>

        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Imagen:</label>
          <input type="file" id="image" v-on:change="onImageChange" class="block w-full mt-1 rounded-md form-input">
        </div>
        <input type="hidden" v-model="seccionEditada.id" name="id">
        <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
          Subir imagen
        </button>
      </form>
    </div>
  </v-card>


  <v-btn @click="cerrarDialog" color="red">Cerrar</v-btn>

        </v-dialog>
</div>

        
        <table class="min-w-full table-auto">
          <thead class="justify-between">
            <tr class="bg-gray-800">
              <th class="px-16 py-2">
                <span class="text-gray-300">ID</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Nombre Contenido Seccion Principal</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Descripcion</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Acciones Contenido</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Fecha</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Publicador</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Imagen</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="seccion in contenido" :key="seccion.id" class="bg-gray-100 border-b hover:bg-orange-100">
              <td class="px-16 py-2">{{ seccion.id }}</td>
              <td class="px-16 py-2 text-justify">
                <p class="leading-snug text-justify" v-html="seccion.titulo"></p>              
              </td>
              <td class="px-16 py-2 text-justify">
                <p class="leading-snug text-justify" v-html="seccion.descripcion"></p>              
              </td>
              <td class="px-16 py-2">
                <v-btn class="px-4 py-2 m-2" color="blue" dark @click="mostrarDialogSeccion(seccion)">
                  Editar contenido
                </v-btn>
              </td>
              <td class="px-16 py-2">{{ seccion.fecha }}</td>
              <td class="px-16 py-2">{{ seccion.publicador }}</td>
              <td class="px-16 py-2">
                <img :src="seccion.imagen" alt="Imagen" class="object-cover w-full rounded h-50">
              </td>
            </tr>
          </tbody>
        </table>
      </v-app>
    </div>
  </template>
<style scoped>



</style>

  
  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import navegacion from "./barra_navegacion.vue";
  import appbar from "./app_bar.vue";
  
  export default {
    data() {
      return {
        contenido: [],
        dialog: false,
        seccionEditada: {
          id: null,
          nombre: '',
      nombre_subseccion: '',
      fecha: '',   // Agrega la propiedad fecha
      imagen: '',  // Agrega la propiedad imagen
      visible: true,
        },

        name: '',
      image: '',
      success: ''
      };
    },
    components: {
      navegacion,
      appbar,
    },
    created() {
      this.obtenerSecciones();
    },
    methods: {
      submitForm() {
    // Lógica para el formulario principal
    this.guardarCambios();

    // Lógica para el segundo formulario
    this.formSubmit();
  },

      
      onImageChange(e) {
      console.log(e.target.files[0]);
      this.image = e.target.files[0];
    },
    formSubmit(e) {
      e.preventDefault();
      let currentObj = this;
      const config = {
        headers: { 'content-type': 'multipart/form-data' }
      };
      let formData = new FormData();
      formData.append('id', this.seccionEditada.id );
      formData.append('image', this.image);
      axios.post('/formSubmit', formData, config)
        .then(function (response) {
          console.log('enviado', formData);
          currentObj.success = response.data.success;
        })
        .catch(function (error) {
          currentObj.output = error;
          console.log('error es',error.response)
        });
    },

      
      
      handleTituloEditorInput(event) {
  const content = typeof event === 'object' ? event.target.getContent() : event;

  console.log('Evento input-change disparado. Contenido:', content);

  this.seccionEditada.nombre = content;
},

handleDescripcionEditorInput(event) {
  const content = typeof event === 'object' ? event.target.getContent() : event;
  this.seccionEditada.nombre_subseccion = content;
},



  
        handleFileUpload(event) {
  this.seccionEditada.imagenFile = event.target.files[0];
  this.manejadorImagen();
},

manejadorImagen() {
  const file = this.seccionEditada.imagenFile;
  if (file) {
    this.seccionEditada.imagen = URL.createObjectURL(file);
  }
},


      obtenerSecciones() {
        axios.get('/api/v1/contenido')
          .then(response => {
            this.contenido = response.data.contenido;
          })
          .catch(error => {
            console.error('Hubo un error', error);
          });
      },
  
      mostrarDialogSeccion(seccion) {
        this.seccionEditada.id = seccion.id;
        this.seccionEditada.nombre = seccion.titulo;
        this.seccionEditada.nombre_subseccion = seccion.descripcion;
        this.seccionEditada.imagenFile = null; // Asegúrate de inicializarlo correctamente si es necesario

        
        this.seccionEditada.visible = true;
        this.dialog = true;
      },
  
      mostrarDialogSubseccion(seccion, subseccion) {
        console.log('Mostrar acciones de la subsección:', subseccion, 'de la sección:', seccion);
        this.dialog = true;
      },
  
      cerrarDialog() {
        this.dialog = false;
      },
  

      
      guardarCambios() {
  // Imprime los datos antes de enviar la solicitud
  console.log('Datos a enviar:', {
    titulo: this.seccionEditada.nombre,
    descripcion: this.seccionEditada.nombre_subseccion,
    fecha: this.seccionEditada.fecha,
    imagenFile: this.seccionEditada.imagen = '/storage/images/contenidos/nombre_personalizado.jpg'
  });

  axios.put(`/v1/contenido/update/${this.seccionEditada.id}`, {
    titulo: this.seccionEditada.nombre,
    descripcion: this.seccionEditada.nombre_subseccion,
    fecha: this.seccionEditada.fecha,
  })
    .then(response => {
      Swal.fire({
        icon: 'success',
        title: 'Se ha actualizado exitosamente',
        showConfirmButton: true,
        timer: 3000,
      });
      this.dialog = false; // Cierra el diálogo después de guardar
      this.obtenerSecciones(); // Actualiza la lista después de editar
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Error al guardar los cambios',
        showConfirmButton: true,
        timer: 3000,
      });
      console.error('Error al guardar los cambios:', error.response);
    });
},

    },
  };
  </script>
  
 