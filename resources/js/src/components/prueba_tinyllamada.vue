<template>
    <div>
      <h1>Editar Entrada</h1>
      <RichTextEditor v-model="entry.content" />
      <!-- Otras entradas del CRUD -->
      <button @click="guardarCambios">Guardar Cambios</button>
    </div>
  </template>
  
  <script>
  import RichTextEditor from '../components/tiny.vue';
  
  export default {
    components: {
      RichTextEditor,
    },
    data() {
      return {
        entry: {
          content: '', // Asegúrate de tener una propiedad para el contenido enriquecido
          // Otras propiedades del CRUD
        },
      };
    },
    methods: {
      guardarCambios() {
        // Envía los cambios al backend utilizando axios u otra biblioteca
        // Aquí podrías realizar una solicitud a tu API Laravel para guardar la entrada
        console.log(tinymce.majorVersion + "." + tinymce.minorVersion);
      },
      
    },
  };
  </script>
  