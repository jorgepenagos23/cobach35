<template>
  <div class="text-gray-900 bg-gray-200">
    <div class="flex p-4">
      <h1 class="text-3xl">PDFs</h1>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full mb-4 bg-white rounded shadow-md text-md">
        <thead>
          <tr class="border-b">
            <th class="p-3 px-5 text-left">Archivo</th>
            <th></th>
            <th class="p-3 px-5">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="pdf in pdfs" :key="pdf" class="bg-gray-100 border-b hover:bg-orange-100">
            <td class="p-3 px-5">{{ pdf }}</td>
            <td class="p-3 px-5">
              <img src="/storage/app/imagenes/PDF_file_icon.svg.png" alt="Logo PDF" class="w-10 h-10 ml-4" />
            </td>
            <td class="p-3 text-red-400 border cursor-pointer border-grey-light hover:bg-gray-100 hover:text-red-600 hover:font-medium">

              <a :href="`/eliminar-pdf/${encodeURIComponent(pdf)}`" target="_blank" class="btn-primary">Eliminar</a>
            </td>
            <td
                           class="font-medium text-center text-dark"
                        
                          >
                          <a href="#" class="p-2 text-xs font-thin text-white bg-blue-500 hover:shadow-lg">Descargar</a>

            </td>
            
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pdfs: [], // Almacena la lista de PDFs
      newPdf: null, // Almacena el nuevo PDF seleccionado
    };
  },
  mounted() {
    // Cargar la lista de PDFs al cargar el componente
    this.cargarPDFs();
  },
  methods: {
    cargarPDFs() {
      // Llamada a la API para obtener la lista de PDFs
      axios
        .get('/pdfs')
        .then((response) => {
          this.pdfs = response.data.pdfs;
        })
        .catch((error) => {
          console.error('Error al cargar PDFs', error);
        });
    },
    handleFileChange(event) {
      // Actualizar el nuevo PDF seleccionado
      this.newPdf = event.target.files[0];
    },
    subirPdf() {
      // Crear un objeto FormData para enviar el archivo
      const formData = new FormData();
      formData.append('file', this.newPdf);

      // Llamada a la API para subir el PDF
      axios
        .post('/api/pdfs', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        })
        .then((response) => {
          console.log('PDF subido correctamente', response);
          // Limpiar el campo de selección de archivos
          this.newPdf = null;
          // Recargar la lista de PDFs
          this.cargarPDFs();
        })
        .catch((error) => {
          console.error('Error al subir PDF', error);
        });
    },
  },
};
</script>

<style scoped>
/* Agregar estilos específicos si es necesario */
</style>
