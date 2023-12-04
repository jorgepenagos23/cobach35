<template>
  <header>
    <navegacion></navegacion>

  </header>
  <v-app>
    <appbar></appbar>
    <v-card-item class="bg-white">
      <v-card
        title="Reportes Escolares"
        subtitle="Reportes escolares"
        class="bg-white"
      ></v-card>
      <template v-slot:append>
        <div>
          <router-link to="/crear-reporte">
            <button class="h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full w-37 min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
              Crear reporte
              <v-icon>
                mdi-plus
              </v-icon>
            </button>
          </router-link>
        </div>
      </template>
    </v-card-item>

    <v-container class="my-8">
      <v-row>
        <v-col cols="12" sm="15">
          <v-row align="center">
            <v-col cols="10">
              <v-text-field v-model="busqueda" label="Buscar por matrícula o nombre" outlined dense variant="solo" prepend-icon="mdi-account-search-outline"></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-btn @click="buscarReportes" color="primary" dark block>
                <v-icon>
                  mdi-magnify
                </v-icon>
              </v-btn>
              <v-btn @click="limpiarBusqueda" color="error" dark block>
                <v-icon>
                  mdi-backspace-outline
                </v-icon>
              </v-btn>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>

    <divider></divider>
    <divider></divider>
    <divider></divider>

    <v-virtual-scroll :items="reportesA" height="100" item-height="40" :style="{ background: '#fffff' }">
  <template v-slot:default="{ item }">
    <v-list-item>
      <v-card class="mx-auto text-center" max-width="800">
        <v-alert border="end" border-color="blue" elevation="2">
          <v-alert border="start" border-color="deep-purple accent-4" elevation="2">
            Matricula: {{ item.matricula }}
            <!-- v-chip para activar el v-dialog -->
            <v-chip class="ma-2" color="red" @click="verReporte(item)">
              <v-icon start icon="mdi-label"></v-icon>
              Detalles
            </v-chip>
          </v-alert>
        </v-alert>
      </v-card>
    </v-list-item>
    
  </template>
</v-virtual-scroll>
 
<v-dialog v-model="dialog" max-width="600">
      <v-card 
      class="mx-auto"
        max-width="344"
        title="Detalles del Reporte"
      > <template v-slot:prepend>
          <v-icon icon="mdi-account" color="primary"></v-icon>
        </template>
        <template v-slot:append>
          <v-icon icon="mdi-check" color="success"></v-icon>
        </template>
    
        <v-card-text>

          <v-col cols="12">
              <strong>Matrícula:</strong>      {{ reporteSeleccionado.matricula }}
            </v-col>

            <v-col cols="12">
              <strong>Descripcion:</strong>      {{ reporteSeleccionado.descripcion }}
            </v-col>
            
            <v-col cols="12">
              <strong>Fecha:</strong>        {{ reporteSeleccionado.fecha }}
            </v-col>
            <v-col cols="12">
              <strong>Nombre :</strong>                  {{ reporteSeleccionado.usuario.nombre }}

            </v-col>
            
            <v-col cols="12">
              <strong>Tipo de Reporte:</strong>                  {{ reporteSeleccionado.reporte.nombre }}

            </v-col>
        </v-card-text>
        <v-card-actions>
          
          <v-btn
            prepend-icon="mdi-close"
            @click="cerrarDialog"
          >
            <template v-slot:prepend>
              <v-icon color="warning"></v-icon>
            </template>

      Cerrar
      <template v-slot:append>
        <v-icon color="warning"></v-icon>
      </template>
    </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</template>

<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";

const url = 'api/v1/reportes/alumnos';

export default {
  data() {
    return {
      reportesA: [], // Arreglo para almacenar los reportes de alumnos

      dialog: false,
      reporteSeleccionado: null,

      busqueda: "",
      headers: [
        { text: 'Matricula', value: 'matricula' },
        { text: 'Descripción', value: 'descripcion' },
        { text: 'Acciones', value: 'actions', sortable: false },
      ],
    };
  },

  created() {
    this.obtenerReportes();
  },

  methods: {


    
    obtenerReportes() {
      axios.get(url)
        .then(response => {
          this.reportesA = response.data.reportesA;
          console.log(response)
        })
        .catch(error => {
          console.log('Error al obtener los datos de la API:', error);
        });
    },

    buscarReportes() {
      this.reportesA = this.reportesA.filter((reporte) =>
        reporte.matricula.includes(this.busqueda)
      );
    },

    limpiarBusqueda() {
      this.busqueda = "";
      this.obtenerReportes();
    },

    verAlumno(item) {
    },
    verReporte(item) {
  try {
    // Hacer la solicitud a la nueva ruta
    const urlReporte = `api/obtener-reporte/${item.matricula}`;

    axios.get(urlReporte)
      .then(response => {
        const reportes = response.data.reportes;
        console.log('ver reporte',response)
        if (reportes.length > 0) {
          const primerReporte = reportes[0];

          this.reporteSeleccionado = {
            id: primerReporte.id,
            descripcion: primerReporte.descripcion,
            matricula: primerReporte.matricula,
            fecha: primerReporte.fecha,
            usuario: {
              id: primerReporte.usuario.id,
              nombre: primerReporte.usuario.nombre
            },
            reporte: {
              id: primerReporte.reporte.id,
              nombre: primerReporte.reporte.nombre,
            }
          };

          this.dialog = true;
        } else {
          console.error('Error: No se encontraron detalles del reporte.');
        }
      })
      .catch(error => {
        console.error('Error al obtener detalles del reporte:', error);
      });
  } catch (error) {
    console.error('Error en verReporte:', error);
  }
},
    cerrarDialog() {
      this.dialog = false;
    },
  },

  components: {
    navegacion,
    appbar,
  },
};
</script>