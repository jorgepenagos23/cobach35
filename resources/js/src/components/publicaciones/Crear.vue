<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
    <appbar></appbar>
      <!-- Agrega clases de alineación para centrar el formulario -->
      <v-row justify="center">
        <v-col cols="7">
          <v-card color="#385F73" theme="light" class="mt-4">
            <v-theme-provider theme="dark" with-background class="pa-5">
              <v-card title="Crear Publicación" subtitle="Crear"></v-card>
            </v-theme-provider>
            <v-card-title class="text-h5 font-weight-regular bg-blue-grey"></v-card-title>
            <v-sheet width="900">
              <v-form ref="form">
                <v-text-field
                  v-model="publicacion.titulo"
                  label="Título"
                  required
                  variant="solo"
                  prepend-icon="mdi-format-text-variant-outline"
                ></v-text-field>
                <v-text-field
                  v-model="publicacion.descripcion"
                  label="Descripción"
                  required
                  prepend-icon="mdi-comment-text"
                   variant="solo"
                ></v-text-field>
                <v-text-field
                  v-model="publicacion.publicador"
                  label="Nombre"
                  required
                  prepend-icon="mdi-tooltip-account"
                  variant="solo"
                ></v-text-field>
                <v-text-field
                  v-model="publicacion.imagen"
                  label="Imagen"
                  prepend-icon="mdi-image-area"
                  variant="solo"
                  required
                ></v-text-field>
                <label for="datepicker">Selecciona una fecha:</label>
                <input type="date" id="datepicker" name="datepicker" v-model="publicacion.fecha">
                <!-- Vincula el campo de fecha al modelo de datos publicacion.fecha -->
                <div class="div-botones">
                  <v-btn color="success" class="mt-4" block @click="createPublicacion">
                    Crear Publicación
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

export default {
  data() {
    return {
      publicacion: {
        titulo: "",
        descripcion: "",
        fecha: null,
        publicador: "",
        imagen: "",
      },
    };
  },
  methods: {
    createPublicacion() {
  const publicacionData = {
    titulo: this.publicacion.titulo,
    descripcion: this.publicacion.descripcion,
    fecha: this.publicacion.fecha,
    publicador: this.publicacion.publicador,
    imagen: this.publicacion.imagen,

  };

  // Hacemos la solicitud POST al servidor
  axios.post('api/v1/publicacion', publicacionData)
    .then(response => {
      Swal.fire({
        icon: 'success',
            title: 'Publicación creada con éxito',
            showConfirmButton: false,
            timer: 3500 // Cierra automáticamente después de 1.5 segundos

      })
      console.log('Publicación creada con éxito', response.data);
      // Aquí puedes realizar cualquier acción adicional después de una creación exitosa
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Error al crear publicacion',
        text: 'Ha ocurrido un error al crear la publicación',

      })
      console.error('Error al crear la publicación', error);
      // Maneja errores o muestra mensajes de error al usuario
    });
}
  },
  components: {
    appbar,
    navegacion,
  },
};
</script>
