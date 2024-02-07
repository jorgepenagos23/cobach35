<script setup>
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
  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen  advtemplate advtable advcode editimage  mergetags powerpaste tinymcespellchecker autocorrect a11ychecker  inlinecss',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ],
};





const apiKey = 'vgvm9x4wbo925nbtlkqal2wmuebfvsqvb8lgq99i2rumla9w';
const initialValue = 'jorge';
</script>
<template>
  <header>
    <navegacion></navegacion>
  </header>
 <v-app>

    <appbar></appbar>
    <!-- Agrega clases de alineación para centrar el formulario -->
    <v-row justify="center">
    <v-col cols="10">
      <v-card color="#01579B" theme="light" class="mt-4">
        <v-theme-provider theme="dark" with-background class="pa-7">
          <v-card title="Crear Publicación" subtitle="Crear"></v-card>
        </v-theme-provider>
        <v-card-title class="text-h5 font-weight-regular blue-accent-4"></v-card-title>
        <v-sheet width="1800">
          <v-form ref="form">
            
            <!-- Título -->
            <label for="datepicker" class="block text-sm font-medium text-gray-700">Titulo</label>

            <Editor
            ref="tituloEditor"
            :api-key="apiKey"
            :init="tituloEditorConfig"
            :initial-value="publicacion.titulo"
            v-on:blur="handleTituloEditorInput"
            class="custom-tinymce_titulo"
          />
          <label for="datepicker" class="block text-sm font-medium text-gray-700">Descripcion</label>

              <Editor
            ref="editor"
            :api-key="apiKey"
            :init="editorConfig"
            :initial-value="publicacion.descripcion"
            v-on:blur="handleEditorInput"
            class="custom-tinymce" 

          />
                                  <!-- Nombre -->
            <v-text-field
              v-model="publicacion.publicador"
              label="Publicador"
              required
              prepend-icon="mdi-tooltip-account"
              variant="solo"
            ></v-text-field>

            <div class="flex items-center justify-center">
          <v-col cols="12" md="6">
            <label for="seccion" class="block text-sm font-medium text-gray-700">Selecciona una sección funcional:</label>
            <select id="seccion" name="seccion" v-model="publicacion.seccion_id" @change="imprimirSeleccion" class="w-full p-2 border border-blue-500 rounded">
              <option value="" disabled selected>Selecciona una sección funcional</option>
              <option v-for="seccion in publicacion.secciones" :key="seccion.id" :value="seccion.id">
                {{ seccion.nombre }}
              </option>
            </select>
            <p>Sección ID seleccionada: {{ publicacion.seccion_id }}</p>
          </v-col>
        </div>

<div class="flex items-center justify-center my-4">
  <v-col cols="12" md="6">
    <label for="subseccion" class="block text-sm font-medium text-gray-700">Selecciona una subsección:</label>
    <select id="subseccion" name="subseccion" v-model="publicacion.subseccion_id" @change="imprimirSeleccion" class="w-full p-2 border border-green-500 rounded">
      <option value="" disabled selected>Selecciona una subsección</option>
      <option v-for="seccion in publicacion.secciones" :key="seccion.id" :value="seccion.id">
        {{ seccion.nombre_subseccion }}
      </option>
    </select>
    <p class="mt-2 text-sm text-gray-500">Subsección ID seleccionada: {{ publicacion.subseccion_id }}</p>
  </v-col>
</div>

<!-- Sección e Imagen -->
<div class="grid grid-cols-1 gap-4 md:grid-cols-2">

  <!-- Sección -->
  <div class="div-botones">
    <v-col cols="12">
      <label class="block text-sm font-medium text-gray-700">Imagen:</label>
      <input type="file" id="imagenFile" @change="handleFileUpload" accept="image/*" class="w-full p-2 border border-gray-300 rounded">
    </v-col>
  </div>

  <!-- Imagen -->
  <div class="div-botones">
    <v-col cols="12">
      <label for="datepicker" class="block text-sm font-medium text-gray-700">Selecciona una fecha:</label>
      <input type="date" id="datepicker" name="datepicker" v-model="publicacion.fecha" class="p-2 border border-gray-300 rounded">
    </v-col>
  </div>

</div>


            <!-- Botones -->
            <div class="div-botones">
              <v-btn color="success" class="mt-4" block @click="createPublicacion">
                Crear Publicación
              </v-btn>
              <v-btn color="red" class="mt-2" block @click="vaciarFormulario">
                Vaciar Formulario
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

.custom-tinymce {
  height: 500px; /* Ajusta el tamaño según tus necesidades */
  
  margin-bottom: 20px; /* Espaciado inferior para separarlo de otros elementos */

}

.custom-tinymce_titulo {
  height: 300px; /* Ajusta el tamaño según tus necesidades */
  
  margin-bottom: 50px; /* Espaciado inferior para separarlo de otros elementos */

}



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
        publicaciones: [],
        imagenFile: null,
        imagen: "",
        seccion_id: null,
        subseccion_id: null,
        secciones: [],
        subsecciones: [],
        seccionSeleccionada: null,
        subseccionSeleccionada: null,
      },
      subsecciones: [],
      entry: {
          content: '', // Asegúrate de tener una propiedad para el contenido enriquecido
     
        },
    };
  },

  mounted() {
    this.fetchConSecciones();
    console.log('TinyMCE Instance instanciado:', this.$refs.editor);  
    console.log('Contenido de TinyMCE:', this.entry.content);

  },
  methods: {
    handleEditorInput(event) {
  // Verifica si el evento es un objeto (podría ser el objeto de evento del editor)
  const content = typeof event === 'object' ? event.target.getContent() : event;

  console.log('Evento input-change disparado. Contenido:', content);

  // Almacena el contenido directamente en publicacion.descripcion
  this.publicacion.descripcion = content;
},

handleTituloEditorInput(event) {
    const content = typeof event === 'object' ? event.target.getContent() : event;
    this.publicacion.titulo = content;
  },
    vaciarFormulario() {
      // Reiniciar todos los valores del objeto publicacion a su estado inicial
      this.publicacion = {
        titulo: "",
        descripcion: "",
        fecha: null,
        publicador: "",
        publicaciones: [],
        imagenFile: null,
        imagen: "",
     
      };
      this.fetchConSecciones();

      // Mostrar alerta de éxito
      Swal.fire({
        icon: 'success',
        title: 'Formulario vaciado con éxito',
        showConfirmButton: false,
        timer: 2000
      });
    },
    
    imprimirSeleccion() {
      console.log('Sección ID seleccionada:', this.publicacion.seccion_id);
      console.log('Subsección ID seleccionada:', this.publicacion.subseccion_id);
    },
    handleFileUpload(event) {
      this.publicacion.imagenFile = event.target.files[0];
      this.manejadorImagen();
    },
    createPublicacion() {
  const formData = new FormData();
  formData.append('titulo', this.publicacion.titulo);

  formData.append('descripcion', this.publicacion.descripcion);
  
  formData.append('fecha', this.publicacion.fecha);
  formData.append('publicador', this.publicacion.publicador);
  formData.append('imagenFile', this.publicacion.imagenFile);

  // Agregar seccion_id solo si está presente y no es nulo
  if (this.publicacion.seccion_id !== null && this.publicacion.seccion_id !== undefined) {
    formData.append('seccion_id', this.publicacion.seccion_id);
  }

  // Agregar subseccion_id solo si está presente y no es nulo
  if (this.publicacion.subseccion_id !== null && this.publicacion.subseccion_id !== undefined) {
    formData.append('subseccion_id', this.publicacion.subseccion_id);
  }
  console.log('Datos enviados al servidor:', formData); // Agrega este log
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
  

      console.error('Error al crear la publicación', error.response);
      // Manejar errores según sea necesario
    });
},

    
    manejadorImagen() {
      const file = this.publicacion.imagenFile;
      if (file) {
        this.publicacion.imagen = URL.createObjectURL(file);
      }
    },
    
    fetchConSecciones() {
  axios.get('api/v1/publicaciones-con-secciones/3')
    .then(response => {
      this.publicacion.secciones = response.data.secciones;
      this.publicacion.subsecciones = response.data.subsecciones;
      console.log('Secciones obtenidas:', this.publicacion.secciones);
      console.log('Subsecciones obtenidas:', this.publicacion.subsecciones);
    })
    .catch(error => {
      console.error('Error al obtener publicaciones', error);
      console.log('Respuesta del servidor:', error.response); // Agrega esta línea
    });
},

    getSeccionId(publicacion) {
      return publicacion.seccion_id !== null ? publicacion.seccion.nombre : '';
    },
    getSubseccionId(publicacion) {
      return publicacion.subseccion_id !== null ? publicacion.subseccion.nombre_subseccion : '';
    }
  },
  components: {
    appbar,
    navegacion,

  },
};
</script>