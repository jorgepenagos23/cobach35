<template>

    
      <div class="text-gray-900 bg-gray-200">
        <div class="flex p-4">
          <h1 class="text-3xl">PDFs</h1>
        </div>
        <table class="w-full mb-4 bg-white rounded shadow-md text-md">
          <tbody>
            <tr class="border-b">
              <th class="p-3 px-5 text-left">Archivo</th>
              <th></th>
            </tr>
  
            <tr v-for="pdf in pdfs" :key="pdf" class="bg-gray-100 border-b hover:bg-orange-100">
              <td class="p-3 px-5">{{ pdf }}</td>
              <td class="flex justify-end p-3 px-5">
                <!-- Botón para descargar el PDF -->
                <a :href="`/download-pdf/${encodeURIComponent(pdf)}`" target="_blank" class="px-2 py-1 mr-3 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Descargar</a>
              </td>
              <td class="flex justify-end p-3 px-5">
                <!-- Botón para descargar el PDF -->
                <a :href="`/delete-pdf/${encodeURIComponent(pdf)}`" target="_blank" class="px-2 py-1 mr-3 text-sm text-white bg-red-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Eliminar</a>
              </td>
            </tr>
          </tbody>
        </table>
  
        
      </div>
  
      <!-- ... (tu código actual) ... -->
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
        axios.get('/pdfs')
          .then(response => {
            this.pdfs = response.data.pdfs;
          })
          .catch(error => {
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
        axios.post('/api/pdfs', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        })
          .then(response => {
            console.log('PDF subido correctamente', response);
            // Limpiar el campo de selección de archivos
            this.newPdf = null;
            // Recargar la lista de PDFs
            this.cargarPDFs();
          })
          .catch(error => {
            console.error('Error al subir PDF', error);
          });
      },
    },
  };
  </script>
  