<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
    <appbar></appbar>
    <!-- Agrega clases de alineación para centrar el formulario -->
    <v-row justify="center">
      <v-col cols="10">
        <v-card color="#385F73" theme="light" class="mt-4">
          <v-theme-provider theme="dark" with-background class="pa-5">
            <v-card title="Crear Reporte" subtitle="Crear"></v-card>
          </v-theme-provider>
          <v-card-title class="text-h5 font-weight-regular bg-amber-lighten-1
"></v-card-title>
          <v-sheet width="1000">
            <v-form ref="form">
              <v-text-field
                v-model="publicacion.descripcion"
                label="Descripción"
                required
                variant="solo"
                prepend-icon="mdi-comment-text"
              ></v-text-field>
              <v-text-field
                v-model="publicacion.matricula"
                label="Matrícula"
                required
                variant="solo"
                prepend-icon="mdi-account-badge"
              ></v-text-field>
              <v-text-field
                v-model="publicacion.fecha"
                label="Fecha"
                required
                type="date"
                prepend-icon="mdi-calendar"
                variant="solo"
              ></v-text-field>
              <v-text-field
                v-model="publicacion.usuario_id"
                label="ID de Usuario"
                required
                variant="solo"
                prepend-icon="mdi-account"
              ></v-text-field>
              <v-select
                v-model="publicacion.reporte_id"
                label="Selecciona un Reporte"
                required
                class="dark"
                :items="reporteOptions"
                item-text="nombre" 
                item-value="id"
                prepend-icon="mdi-notebook"
              ></v-select>
              <div class="div-botones">
                <v-btn color="success" class="mt-4" block @click="createPublicacion">
                  Crear Reporte
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
import axios from 'axios'; // Asegúrate de importar axios

export default {
  data() {
    return {
      publicacion: {
        descripcion: "",
        matricula: "",
        fecha: null,
        usuario_id: "",
        reporte_id: "",

      },
      reporteOptions: [], // Inicialmente vacío

    };
  },
  created(){
  // Realiza una solicitud HTTP para obtener las opciones desde el servidor
  axios.get('/api/v1/reporte') // Ajusta la URL según tu API
      .then(response => {
        console.log(response);
        console.log(response.data.reportes); // Verifica la respuesta del servidor

        if (Array.isArray(response.data.reportes)) {
  this.reporteOptions = response.data.reportes;
} else {
  console.error('Error en el formato de respuesta del servidor');
}
      })
      .catch(error => {
        console.error('Error al cargar las opciones de reporte', error);
      });
  },

  methods: {
    createPublicacion() {
      const publicacionData = {
        descripcion: this.publicacion.descripcion,
        matricula: this.publicacion.matricula,
        fecha: this.publicacion.fecha,
        usuario_id: this.publicacion.usuario_id,
        reporte_id: this.publicacion.reporte_id,
      };

      // Hacemos la solicitud POST al servidor
      axios.post('/api/v1/reporte/subir', publicacionData)
        .then(response => {
          Swal.fire({
            icon: 'success',
            title: 'Reporte creado   con éxito',
            showConfirmButton: false,
            timer: 3500 // Cierra automáticamente después de 1.5 segundos
          });
          console.log('Reporte  creado  con éxito', response.data);
          // Aquí puedes realizar cualquier acción adicional después de una creación exitosa
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Error al crear reporte',
            text: 'Ha ocurrido un error al crear el reporte',
          });
          console.error('Error al crear el reporte', error);
          // Maneja errores o muestra mensajes de error al usuario
        });
    },
  },
  components: {
    appbar,
    navegacion,
  },
};
</script>
