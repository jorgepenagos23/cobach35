<template>
  <header>
    <barra_navegacion></barra_navegacion>
  </header>
  <v-app>
    <appbar></appbar>

    <v-card-item class="bg-yellow-darken-2">
      <v-theme-provider theme="dark" with-background class="pa-5">
        <v-card
          title="BOLETAS PARCIAL 1"
          prepend-icon="mdi-microsoft-excel"
          subtitle="ALUMNOS GRUPO A"
        ></v-card>
      </v-theme-provider>
      <template v-slot:append></template>
    </v-card-item>

    <v-divider></v-divider>

    <div class="container p-4 mx-auto">
      <div class="px-4 py-4 bg-white rounded shadow-md">
        <div v-if="successMessage" class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
          <strong class="font-bold">Éxito!</strong>
          <span class="block sm:inline">{{ successMessage }}</span>
        </div>

        <form @submit.prevent="uploadExcel" class="mb-4" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="excel_file">Excel users</label>
            <v-file-input
              ref="excelFile"
              v-model="excelFile"
              accept=".xlsx, .xls"
              label="Seleccionar archivo"
              outlined
              dense
            ></v-file-input>
          </div>

          <div class="mb-4">
            <v-select v-model="selectedGroup" :items="grupos" label="Seleccionar Grupo"></v-select>
          </div>

          <div class="mb-4">
            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover-bg-blue-700" :disabled="uploading">
              Subir Excel
            </button>
          </div>
        </form>
      </div>
    </div>
  </v-app>
</template>

<script>
import Swal from 'sweetalert2';
import barra_navegacion from '../barra_navegacion.vue';
import appbar from '../app_bar.vue';

export default {
  components: {
    barra_navegacion,
    appbar,
  },
  data() {
    return {
      successMessage: '',
      uploading: false,
      excelFile: null,
      selectedGroup: null,
      grupos: ['Grupo A', 'Grupo B', 'Grupo C', 'Grupo D', 'Grupo E', 'Grupo F', 'Grupo G'],
    };
  },
  methods: {
    handleFileChange() {
      // Puedes manejar aquí la lógica de cambio de archivo si es necesario
    },
    uploadExcel() {
      if (this.excelFile && this.selectedGroup) {
        const formData = new FormData();
        formData.append('excel_file', this.$refs.excelFile.files[0]);
        formData.append('grupo', this.selectedGroup);

        this.uploading = true;

        axios.post('/import_parcial1', formData)
          .then(response => {
            this.successMessage = response.data.message;
            Swal.fire({
              background: 'rgba( 167, 242, 162 )',
              icon: 'success',
              title: 'Se ha subido exitosamente',
              showConfirmButton: true,
              timer: 3000,
            });
          })
          .catch(error => {
            Swal.fire({
              background: 'rgba( 167, 242, 162 )',
              icon: 'error',
              title: 'Archivo no permitido',
              showConfirmButton: true,
              timer: 3000,
            });
          })
          .finally(() => {
            this.uploading = false;
          });
      } else {
        Swal.fire({
          background: 'rgba( 167, 242, 162 )',
          icon: 'error',
          title: 'Por favor, selecciona grupo, parcial y archivo',
          showConfirmButton: true,
          timer: 3000,
        });
      }
    },
  },
};
</script>

<style scoped>
.icono-personalizado {
  font-size: 2em; /* Ajusta el tamaño según tus necesidades */
}
</style>
