<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
    <appbar></appbar>
    <v-row justify="center">
      <v-col cols="12" md="8" lg="6"> <!-- Tamaño ajustado para dispositivos medianos y grandes -->
        <v-card>
          <v-theme-provider theme="light" with-background class="pa-5">
            <v-card title="Crear Reporte" ></v-card>
          </v-theme-provider>
          <v-card-title class="bg-white text-h5 font-weight-regular"></v-card-title>
          <v-sheet>
            <v-form ref="form">
              <v-text-field
                v-model="publicacion.descripcion"
                label="Descripción"
                required
                variant="solo"
                prepend-icon="mdi-comment-text"
                class="w-full px-4 py-2"
              ></v-text-field>
              <v-text-field
                v-model="publicacion.matricula"
                label="Matrícula"
                required
                variant="solo"
                prepend-icon="mdi-account-badge"
                class="w-full px-4 py-2"
              ></v-text-field>
              <v-text-field
                v-model="publicacion.fecha"
                label="Fecha"
                required
                type="date"
                prepend-icon="mdi-calendar"
                variant="solo"
                class="w-full px-4 py-2"
              ></v-text-field>
              <v-sheet class="w-full px-4 py-2">
                <input
                  v-model="publicacion.reporte_nombre"
                  @click="toggleDropdown"
                  class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                  placeholder="Seleccione un Asunto"
                />
                <div v-if="showDropdown" class="w-full px-4 py-2 bg-white border rounded shadow-lg">
                  <div v-for="reporte in combinedReporteOptions" :key="reporte.id" @click="selectReporte(reporte)" class="px-2 py-1 cursor-pointer hover:bg-blue-100">
                    {{ reporte.nombre }}
                  </div>
                </div>
              </v-sheet>
              <div class="mt-4">
                <v-btn color="success" block @click="createPublicacion">
                  <v-icon left>mdi-plus</v-icon> Generar reporte
                </v-btn>
                <v-btn color="red" block @click="limpiarReporteBusqueda">
                  <v-icon left>mdi-delete</v-icon> Limpiar
                </v-btn>
              </div>
            </v-form>
          </v-sheet>
        </v-card>
      </v-col>
    </v-row>
  </v-app>
</template>

<script>
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
  data() {
    return {
      publicacion: {
        descripcion: "",
        matricula: "",
        fecha: null,
        reporte_nombre: "", // Usamos reporte_nombre para mostrar el nombre en el combo box
        reporte_id: "", // Usamos reporte_id para almacenar el ID seleccionado
      },
      reporteOptions: [], // Inicialmente vacío
      reporteOptions2: {},
      showDropdown: false,
    };
  },
  created() {
    axios.get('/api/v1/reporte')
      .then(response => {
        if (Array.isArray(response.data.reportes)) {
          response.data.reportes.forEach(item => {
            this.reporteOptions.push({ id: item.id, nombre: item.nombre });
            this.reporteOptions2[item.nombre] = item.id;
          });
        } else {
          console.error('Error en el formato de respuesta del servidor');
        }
      })
      .catch(error => {
        console.error('Error al cargar las opciones de reporte', error);
      });
  },
  computed: {
    combinedReporteOptions() {
      return this.reporteOptions;
    },
  },
  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
    },
    selectReporte(reporte) {
      this.publicacion.reporte_nombre = reporte.nombre;
      this.publicacion.reporte_id = reporte.id;
      this.showDropdown = false;
    },
    createPublicacion() {
      const publicacionData = {
        descripcion: this.publicacion.descripcion,
        matricula: this.publicacion.matricula,
        fecha: this.publicacion.fecha,
        usuario_id: this.publicacion.usuario_id,
        reporte_id: this.publicacion.reporte_id, // Enviamos el ID al servidor
      };
      axios.post('/api/v1/reporte/subir', publicacionData)
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Reporte creado con éxito',
            showConfirmButton: false,
            timer: 3500
          });
          console.log('Reporte creado con éxito', response.data);
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Error al crear reporte',
            text: 'Ha ocurrido un error al crear el reporte',
          });
          console.error('Error al crear el reporte', error);
        });
    },

    limpiarReporteBusqueda(){

      this.publicacion = {
        descripcion: "",
      matricula: "",
      fecha: null,
      reporte_id: "",

        
      }
      
    },
    
  },
  components: {
    appbar,
    navegacion,
  },
};
</script>
