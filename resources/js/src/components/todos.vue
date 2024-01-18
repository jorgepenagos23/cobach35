<template>
  <div>
    <banner></banner>
  </div>

  <div class="container mt-5">
    <v-card-item class="bg-white">
          <v-theme-provider theme="light" with-background class="pa-5">
              <v-card title=" Descargar Contenidos" 
              prepend-icon="mdi-file-chart-outline"
              centered
              ></v-card>
            </v-theme-provider>
        <template v-slot:activator="{ props }">
          <v-btn
            class="text-none"
            color="blue-darken-4"
            rounded="0"
            variant="outlined"
            v-bind="props"
          >
              
     </v-btn>
        </template>

       
  
        </v-card-item>

        
    <table class="w-full mb-4 bg-white rounded shadow-md text-md">
      <thead>
        <tr class="border-b">
          <th class="p-3 px-5 text-left">Archivo</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="pdf in pdfs" :key="pdf.id" class="bg-gray-100 border-b hover:bg-orange-100">
          <td v-if="pdf.visible === 1" class="p-3 px-5">{{ pdf.nombre }}
            <td class="font-medium text-center text-dark">
              <v-btn :href="'/descargar_pdf/todos/'+pdf.nombre" color="primary" small class="text-center">
                Descargar
              </v-btn>
            </td>
          </td>
        </tr>
        <tr v-if="pdfs.length === 0">
          <td colspan="2" class="text-center">No hay contenidos disponibles para descargar</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import banner from "../components/inicio.vue";
import axios from "axios";

export default {
  components: {
    banner,
  },

  data() {
    return {
      pdfs: [],
      headers: [{ text: 'Formatos de Descarga', value: 'nombre' }],
    };
  },

  mounted() {
    this.cargarPDFs();
  },

  methods: {
    cargarPDFs() {
      axios
        .get('/contenidos')
        .then((response) => {
          console.log('Respuesta de la API:', response.data);
          this.pdfs = response.data.pdfs;
        })
        .catch((error) => {
          console.error('Error al cargar PDFs', error);
        });
    },
  },
};
</script>

<style scoped>
  /* Puedes agregar estilos específicos si es necesario */
</style>
