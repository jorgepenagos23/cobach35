<template>
    
<div class="container p-4 mx-auto">
    <div class="px-4 py-4 bg-white rounded shadow-md">
      <div v-if="successMessage" class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
        <strong class="font-bold">Éxito!</strong>
        <span class="block sm:inline">{{ successMessage }}</span>
      </div>

      <form @submit.prevent="uploadExcel" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="excel_file">Excel Alumno</label>
          <input type="file" class="block w-full mt-1 form-input" ref="excelFile" @change="handleFileChange">
          @error('excel_file')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
          <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" :disabled="uploading">
            Subir Excel
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      successMessage: '',
      uploading: false,
    };
  },
  methods: {
    handleFileChange() {
      // Puedes manejar aquí la lógica de cambio de archivo si es necesario
    },
    uploadExcel() {
      this.uploading = true;
      const formData = new FormData();
      formData.append('excel_file', this.$refs.excelFile.files[0]);

      // Realiza una solicitud POST para cargar el archivo Excel utilizando axios o fetch
      // Ejemplo con axios:
      axios.post('/import', formData)
        .then(response => {
          this.successMessage = response.data.message;
          console.log("me enviaste")
        })
        .catch(error => {
          // Maneja errores de carga aquí
        })
        .finally(() => {
          this.uploading = false;
        });
    },
  },
};
</script>