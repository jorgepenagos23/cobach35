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
            <td class="p-3 px-5">{{ pdf.nombre }}</td>
            <td class="p-3 px-5">
              <img v-if="pdf.visible" src="../../assets/ojo_verde.png" alt="Logo PDF" class="w-10 h-10 ml-4" />
              <img v-else src="../../assets/ojo.png" alt="Logo PDF No Visible" class="w-10 h-10 ml-4" />
            </td>
            <td class="p-3 text-blue-700 border cursor-pointer border-grey-light hover:bg-gray-100 hover:text-green-600 hover:font-medium">
              <v-btn @click="mostrarDialogo(pdf)">
                Modificar Visibilidad
              </v-btn>
            </td>
            
            <td class="font-medium text-center text-dark">
              <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-600 uppercase bg-blue-200 rounded-full">
                Descargar     
               </span>
            </td>
            <td class="font-medium text-center text-dark">
              <span class="inline-block px-2 py-1 text-xs font-semibold text-red-600 uppercase bg-red-200 rounded-full">
                <a :href="`/eliminar-pdf/${encodeURIComponent(pdf.nombre)}`" target="_blank" class="btn-primary">Eliminar</a>
     
               </span>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Diálogo para modificar visibilidad -->
      <v-dialog  v-model="dialogoVisible"  width="500">
  <v-card>
    <v-card-title>Modificar Visibilidad</v-card-title>
    <v-card-text>
      <!-- Contenido del diálogo -->
      <v-radio-group v-model="nuevaVisibilidad">
        <v-radio label="Visible" :value="true"></v-radio>
        <v-radio label="No Visible" :value="false"></v-radio>
      </v-radio-group>
    </v-card-text>
    <v-card-actions>
      <v-btn
      prepend-icon="mdi-check-circle"
      color="blue-darken-4"
              density="compact"
              hide-details
              inline
              inset
      @click="guardarVisibilidad"
    >
      <template v-slot:prepend>
        <v-icon color="success"></v-icon>
      </template>

      Guardar

      <template v-slot:append>
        <v-icon color="warning"></v-icon>
      </template>
    </v-btn>
      <v-btn @click="cerrarDialogo">Cancelar</v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pdfs: [], // Almacena la lista de PDFs
      newPdf: null, // Almacena el nuevo PDF seleccionado
      dialogoVisible: false, // Controla la visibilidad del diálogo
      pdfActual: null, // PDF seleccionado para modificar visibilidad
      nuevaVisibilidad: true, // Inicialmente visible
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
    mostrarDialogo(pdf) {
      // Mostrar el diálogo para modificar visibilidad
      this.pdfActual = pdf;
      this.nuevaVisibilidad = pdf.visible;
      this.dialogoVisible = true;
    },
    guardarVisibilidad() {
  // Guardar la nueva visibilidad en el servidor
  axios
    .put(`/contenidos/${this.pdfActual.id}/visibilidad`, { visible: this.nuevaVisibilidad })
    .then((response) => {
      console.log('Visibilidad modificada correctamente', response);
      // Recargar la lista de PDFs
      this.cargarPDFs();
      // Cerrar el diálogo
      this.cerrarDialogo();
    })
    .catch((error) => {
      console.error('Error al modificar la visibilidad', error);
      // Manejo de errores específicos
      if (error.response) {
        console.error('Respuesta del servidor:', error.response.data);
      } else if (error.request) {
        console.error('No se recibió respuesta del servidor');
      } else {
        console.error('Error al realizar la solicitud:', error.message);
      }
    });
},
    cerrarDialogo() {
      // Cerrar el diálogo
      this.dialogoVisible = false;
      this.pdfActual = null;
      this.nuevaVisibilidad = false;
    },
  },
};
</script>

<style scoped>
/* Agregar estilos específicos si es necesario */
</style>
