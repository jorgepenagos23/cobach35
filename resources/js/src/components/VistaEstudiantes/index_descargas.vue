<template>
  <div class="flex items-center justify-center h-screen">
    <barra></barra>
    <v-app>
      <v-card class="mx-auto" max-width="mx-auto">
        <v-expansion-panels v-model="panel" :readonly="readonly" multiple>
          <v-expansion-panel>
            <v-expansion-panel-title>Panel 1</v-expansion-panel-title>
            <v-expansion-panel-text>
              <div>
                
                
              </div>
            </v-expansion-panel-text>
          </v-expansion-panel>


          <todos></todos>
    

       

      
        </v-expansion-panels>
      </v-card>
    </v-app>
  </div>
</template>

<script>
import appbar from "../app_bar.vue";
import barra from "../VistaEstudiantes/dashboard.vue";
import Swal from 'sweetalert2';
import todos from '../todos.vue'

export default {
  components: {
    appbar,
    barra,
    todos,
  },

  data: () => ({
    panel: [0, 1],
  }),

  created() {},

  methods: {
    descargarPDF() {
      // Nombre del archivo a descargar
      const nombreArchivo = '22a0710035m0092_boleta.pdf';

      // Construir la URL del PDF
      const pdfUrl = `/descargar-pdf/primer-semestre-/a/parcial1/${nombreArchivo}`;

      // Abrir la URL en una nueva ventana para descargar el archivo
      window.open(pdfUrl, '_blank');
    },
  },
};
</script>

<style scoped>
/* Agrega estilos adicionales aquí si es necesario */
</style>
