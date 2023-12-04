<template>
  <div class="flex items-center justify-center h-screen">
    <barra></barra>
    <v-app>
      <v-card class="mx-auto" max-width="mx-auto">
        <v-expansion-panels v-model="panel" :readonly="readonly" multiple>
         
          <v-expansion-panel>
            <v-expansion-panel-title class="primary" theme="dark" color="orange-darken-4">Boleta  Parcial 1</v-expansion-panel-title>
            <v-expansion-panel-text>
               
              <div>
                <!-- Botón o enlace para iniciar la descarga -->
                <v-btn
                  @click="descargarPDF"
                  class="px-4 py-2 mt-2 text-white bg-green-500 rounded-full"
                >
                Descargar
                  <svg
                    class="inline-block w-6 h-6 mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 5l7 7-7 7"
                    />
                  </svg>
                </v-btn>
              </div>
            </v-expansion-panel-text>
          </v-expansion-panel>

          <v-expansion-panel>
            <v-expansion-panel-title class="primary" theme="dark" color="purple-darken-4">Boleta  Parcial 2</v-expansion-panel-title>
            <v-expansion-panel-text>
              <div>
                <!-- Botón o enlace para iniciar la descarga -->
                <v-btn
                  @click="descargarPDFparcial2"
                  class="px-4 py-2 mt-2 text-white bg-red-500 rounded-full"
                >
                  <svg
                    class="inline-block w-6 h-6 mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 5l7 7-7 7"
                    />
                  </svg>
                  Descargar 
                </v-btn>
              </div>
            </v-expansion-panel-text>
          </v-expansion-panel>
          <v-expansion-panel>
            <v-expansion-panel-title class="primary" theme="dark" color="yellow-darken-4">Boleta  Parcial 3</v-expansion-panel-title>
            <v-expansion-panel-text>
              <div>
                <!-- Botón o enlace para iniciar la descarga -->
                <v-btn
                  @click="descargarPDFparcial3"
                  class="px-4 py-2 mt-2 text-white bg-red-500 rounded-full"
                >                  Descargar 

                  <svg
                    class="inline-block w-6 h-6 mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 5l7 7-7 7"
                    />
                  </svg>
                </v-btn>
              </div>
            </v-expansion-panel-text>
          </v-expansion-panel>


        </v-expansion-panels>



        
      </v-card>
    </v-app>
  </div>
</template>
<script>
import appbar from "../app_bar.vue";
import barra from "../VistaEstudiantes/dashboard.vue";
import Swal from 'sweetalert2';

export default {
  components: {
    appbar,
    barra,
  },

  data() {
    return {
      panel: [0, 1, 2],
      MatriculaUsuario: '',
    };
  },

  created() {
    this.obtenerMatricula();
  },

  methods: {
    obtenerMatricula() {
      axios.get('/api/user/')
        .then(response => {
          this.MatriculaUsuario = response.data.matricula.toLowerCase();
          console.log('response', response);
          console.log('response.data', response.data);
          console.log('MatriculaUsuario', this.MatriculaUsuario);
        })
        .catch(error => {
          console.log('Hubo un error', error);
        });
    },

    descargarPDF() {
      const pdfUrl = `/descargar-pdf/primer-semestre-/a/parcial1/${this.MatriculaUsuario}_boleta.pdf`; 
      console.log(pdfUrl);
      window.open(pdfUrl, '_blank');
    },
  },
};
</script>


<style scoped>
/* Agrega estilos adicionales aquí si es necesario */
</style>
