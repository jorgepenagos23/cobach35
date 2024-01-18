<template>
      <v-progress-linear v-if="loading" indeterminate color="teal"></v-progress-linear>
  <barra></barra>
  <v-app>
    <v-card max-width="900" class="mx-500">
      <v-expansion-panels>
        <v-expansion-panel v-for="(dataItem, index) in alumnoYUsuario" :key="index">
          <v-expansion-panel-header class="text-black teal lighten-2"> <!-- Agregar color de fondo a la cabecera -->
            <v-chip class="ms-0" color="red" label size="small">

              {{ dataItem.user.nombre }}
            </v-chip>
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            <v-extension-panels v-model="panel" :disabled="disabled" multiple>
              <v-container>
                <v-row justify="center">
                  <v-menu min-width="200px" rounded>
                    <template v-slot:activator="{ props }">
                      <v-btn icon v-bind="props">
                        <v-avatar color="blue" size="large">
                          <span class="text-h5">{{ dataItem.initials }}</span>
                        </v-avatar>
                      </v-btn>
                    </template>
                    <v-card>
                      <v-card-text>
                        <div class="mx-auto text-center">
                          <v-avatar color="blue">
                            <span class="text-h5">{{ dataItem.initials }}</span>
                          </v-avatar>
                          <h3>{{ dataItem.alumno.nombre_completo }}</h3>
                          <p class="mt-1 text-caption">{{ dataItem.user.email }}</p>
                          <v-divider class="my-3"></v-divider>
                          <v-divider class="my-3"></v-divider>
                        </div>

                      </v-card-text>
                    </v-card>
                  </v-menu>
                </v-row>
              </v-container>
            </v-extension-panels>

            <v-expansion-panels v-model="panel" :disabled="disabled" multiple>
              <v-expansion-panel>
                <v-expansion-panel-title class="primary" theme="dark" color="indigo-darken-4">Datos
                  Escolares</v-expansion-panel-title>
                <v-expansion-panel-text v-if="dataItem.alumno">
                </v-expansion-panel-text>

                <v-expansion-panel-text>Matricula: {{ dataItem.alumno.matricula }}</v-expansion-panel-text>
                <v-expansion-panel-text>Nombre: {{ dataItem.alumno.nombre_completo }}</v-expansion-panel-text>
                <v-expansion-panel-text>Grupo: {{ dataItem.alumno.grupo }}</v-expansion-panel-text>

                <v-expansion-panel-text>Grado: {{ dataItem.alumno.grado }}</v-expansion-panel-text>
                <v-expansion-panel-text>Curp: {{ dataItem.alumno.curp }}</v-expansion-panel-text>
              </v-expansion-panel>

              <v-expansion-panel>
    <v-expansion-panel-title class="primary" theme="dark" color="red-darken-4">Historial de Conducta Academica</v-expansion-panel-title>
    <v-expansion-panel-text>
      <div>
        <div v-if="response.reportes && response.reportes.length > 0">
          <table class="my-styled-table">
            <thead>
              <tr>
                <th>Descripción del reporte</th>
                <th>Fecha del reporte</th>
                <th>Nombre del usuario</th>
                <th>Nombre del reporte</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="reporte in response.reportes" :key="reporte.id">
                <td>{{ reporte.descripcion }}</td>
                <td>{{ reporte.fecha }}</td>
                <td>{{ reporte.usuario.nombre }}</td>
                <td>{{ reporte.reporte.nombre }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          <p class="my-styled-paragraph">No hay datos de reportes disponibles.</p>
        </div>
      </div>
    </v-expansion-panel-text>
  </v-expansion-panel>

              


              <v-expansion-panel>


                <v-expansion-panel-title class="primary" theme="dark" color="blue-darken-4">
                  <v-icon left>mdi-star</v-icon> Calificaciones Parcial 1
                </v-expansion-panel-title>

                <v-expansion-panel-text>

                  <div class="overflow-x-auto">
                    <table class="w-full border-collapse table-auto">
                      <thead>
                        <tr>
                          <th class="px-4 py-2">Nombre del Alumno</th>
                          <th class="px-4 py-2">Espanol</th>
                          <th class="px-4 py-2">Matematicas</th>
                          <th class="px-4 py-2">Ingles</th>
                          <th class="px-4 py-2">Promedio</th>
                          <th class="px-4 py-2">Observaciones</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="boleta in boletas" :key="boleta.id">
                          <td class="px-4 py-2 border">{{ boleta.nombre_alumno }}</td>
                          <td class="px-4 py-2 border">{{ boleta.espanol1 }}</td>
                          <td class="px-4 py-2 border">{{ boleta.matematicas1 }}</td>
                          <td class="px-4 py-2 border">{{ boleta.ingles1}}</td>
                          <td class="px-4 py-2 border">{{ boleta.promedio }}</td>
                          <td class="px-4 py-2 border">{{ boleta.observaciones }}</td>
                        </tr>


                      </tbody>
                    </table>
                  </div>


                </v-expansion-panel-text>


              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-title class="primary" theme="dark" color="green-accent-4">
                  <v-icon left>mdi-star</v-icon> Calificaciones Parcial 2

                </v-expansion-panel-title>

                <v-expansion-panel-header>
                </v-expansion-panel-header>
                <v-expansion-panel-text>
                  <div class="overflow-x-auto">

                  <table class="w-full border-collapse table-auto">
                    <thead>
                      <tr>
                        <th class="px-4 py-2">Nombre del Alumno</th>
                          <th class="px-4 py-2">Espanol</th>
                          <th class="px-4 py-2">Matematicas</th>
                          <th class="px-4 py-2">Ingles</th>
                          <th class="px-4 py-2">Biología </th>
                          <th class="px-4 py-2">Promedio</th>
                          <th class="px-4 py-2">Observaciones</th>
                        
                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-if="Object.keys(boletas2).length === 0">
                        <td colspan="5">No hay datos disponibles.</td>
                      </tr>
                      <tr v-else>
                        <td class="px-4 py-2 border">{{ boletas2.nombre_alumno }}</td>
                          <td class="px-4 py-2 border">{{ boletas2.espanol2 }}</td>
                          <td class="px-4 py-2 border">{{ boletas2.matematicas2 }}</td>
                          <td class="px-4 py-2 border">{{ boletas2.ingles2}}</td>
                          <td class="px-4 py-2 border">{{ boletas2.biologia2}}</td>
                          <td class="px-4 py-2 border">{{ boletas2.promedio }}</td>
                          <td class="px-4 py-2 border">{{ boletas2.observaciones }}</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </v-expansion-panel-text>
              </v-expansion-panel>


              <v-expansion-panel>
                <v-expansion-panel-title class="primary" theme="dark" color="yellow-darken-4">
                  <v-icon left>mdi-star</v-icon> Calificaciones Parcial 3

                </v-expansion-panel-title>

                <v-expansion-panel-header>
                </v-expansion-panel-header>
                <v-expansion-panel-text>
                  <div class="overflow-x-auto">

                  <table class="w-full border-collapse table-auto">
                    <thead>
                      <tr>
                        <th class="px-4 py-2">Nombre del Alumno</th>
                          <th class="px-4 py-2">Espanol</th>
                          <th class="px-4 py-2">Matematicas</th>
                          <th class="px-4 py-2">Ingles</th>
                          <th class="px-4 py-2">Biología </th>
                          <th class="px-4 py-2">Promedio</th>
                          <th class="px-4 py-2">Observaciones</th>
                        
                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-if="Object.keys(boletas3).length === 0">
                        <td colspan="5">No hay datos disponibles.</td>
                      </tr>
                      <tr v-else>
                        <td class="px-4 py-2 border">{{ boletas3.nombre_alumno }}</td>
                          <td class="px-4 py-2 border">{{ boletas3.espanol2 }}</td>
                          <td class="px-4 py-2 border">{{ boletas3.matematicas2 }}</td>
                          <td class="px-4 py-2 border">{{ boletas3.ingles2}}</td>
                          <td class="px-4 py-2 border">{{ boletas3.biologia2}}</td>
                          <td class="px-4 py-2 border">{{ boletas3.promedio }}</td>
                          <td class="px-4 py-2 border">{{ boletas3.observaciones }}</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </v-expansion-panel-text>
              </v-expansion-panel>
            


            </v-expansion-panels>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-card>


  </v-app>
</template>
<style scoped>
.my-styled-paragraph {
  /* Agrega estilos personalizados para los párrafos */
  color: #333;
  font-size: 16px;
  /* Ajusta según sea necesario */
}

.my-styled-table {
  /* Agrega estilos personalizados para la tabla */
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px; 
}

.my-styled-table th, .my-styled-table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.my-styled-table th {
  background-color: #f2f2f2; 
}

</style>



<script>
import axios from 'axios';
import appbar from '../app_bar.vue';
import barra from '../VistaEstudiantes/dashboard.vue';
import Swal from 'sweetalert2';

export default {
  data: () => ({
    combinedData: [],
    alumnoYUsuario: [],
    panel: [0, 1],
    disabled: false,
    matriculaDelUsuario: null,
    boletas: [],
    boletas2: [],
    boletas3:[],
    reportesA: [],
    response: {},

  }),

  components: {
    appbar,
    barra,
  },




  async created() {
    try {
      const userDataResponse = await axios.get('/api/user/');
      const matriculaDelUsuario = userDataResponse.data.matricula;

      const combinedDataResponse = await axios.get('/api/user/index2');
      this.combinedData = combinedDataResponse.data;

      this.alumnoYUsuario = this.combinedData.filter(dataItem => dataItem.user.matricula === matriculaDelUsuario);

      this.alumnoYUsuario = this.alumnoYUsuario.map(dataItem => {
        const palabras = dataItem.alumno.nombre_completo.split(' ');
        const iniciales = palabras.map(palabra => palabra.charAt(0)).join('');
        dataItem.initials = iniciales;
        return dataItem;
      });


      this.obteneReporte();
      this.obtenerMatricula();



    }
    catch (error) {
      console.error('Error en la solicitud:', error);
    }





    

  },



  
  methods: {
    obtenerMatricula() {
      axios.get('/api/user/')

        .then(response => {
          this.matriculaDelUsuario = response.data.matricula;
          console.log(response.data);
          this.boletas = response.data.boletas;
          this.boletas2 = response.data.boletas2;
          this.parcial1ObtenerBoleta();
          this.parcial2ObtenerBoleta();
          this.parcial3ObtenerBoleta();

        })

        .catch(error => {

          console.error('error en la solicitud', error);
        }
        )

    },


    parcial1ObtenerBoleta() {
      console.log('Matrícula en funcion segunda llamada de matricula:', this.matriculaDelUsuario);

      axios.get('/api/obtener-boletas/' + this.matriculaDelUsuario)

        .then(response => {
          console.log('BOLETA PARCIAL 1 ', response.data);
          console.log(response.data);
          this.boletas = response.data.boletas;
        })

        .catch(error => {

          console.error('error', error)

        })


    },

    parcial2ObtenerBoleta() {
      console.log('LLAMASTE OBTENER BOLETA PARCIAL 2 CON MATRICULA:', this.matriculaDelUsuario);
      axios.get('/api/obtener-boletas/parcial2/' + this.matriculaDelUsuario)
        .then(response => {
          console.log('BOLETA PARCIAL 2 ', response.data);
          this.boletas2 = response.data.boletas;
        })
        .catch(error => {
          console.error('error', error);
        });
    },

    parcial3ObtenerBoleta() {
      console.log('LLAMASTE OBTENER BOLETA PARCIAL 3 CON MATRICULA:', this.matriculaDelUsuario);
      axios.get('/api/obtener-boletas/parcial3/' + this.matriculaDelUsuario)
        .then(response => {
          console.log('BOLETA PARCIAL 3 ', response.data);
          this.boletas3 = response.data.boletas;
        })
        .catch(error => {
          console.error('error', error);
        });
    },


    


    

    async obteneReporte() {
  try {
    const userDataResponse = await axios.get('/api/user/');
    const matriculaDelUsuario = userDataResponse.data.matricula;
    console.log('haz obtenido la matricula del usuario', matriculaDelUsuario);
    const response = await axios.get('/api/obtener-reporte/' + matriculaDelUsuario);

    console.log('Respuesta completa del servidor:', response);

    if (response.data) {
      console.log('Datos de la respuesta:', response.data);

      const reportes = response.data.reportes;

      if (Array.isArray(reportes) && reportes.length > 0) {
        // Accede al primer reporte del array
        const primerReporte = reportes[0];

        this.response = response.data;

        console.log('ID del reporte:', primerReporte.id);
        console.log('Descripción del reporte:', primerReporte.descripcion);
        console.log('Fecha del reporte:', primerReporte.fecha);
        console.log('Usuario del reporte:', primerReporte.usuario);
        console.log('Nombre del usuario:', primerReporte.usuario.nombre);
        console.log('Reporte en sí:', primerReporte.reporte);
        console.log('Nombre del reporte:', primerReporte.reporte.nombre);
      } else {
        console.error('La respuesta del servidor no contiene datos de reportes o el array está vacío.');
      }
    } else {
      console.error('La respuesta del servidor no contiene datos.');
    }
  } catch (error) {
    console.error('Error al obtener la respuesta del servidor:', error);
  }
}

  },






};
</script>
