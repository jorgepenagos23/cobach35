<template>
  <div>
    <!-- Botón o enlace para iniciar la descarga -->
    <a :href="'/descargar-pdf/' + '22a0710035m0092_boleta.pdf'" target="_blank">Descargar Boleta</a>  </div>

  <div>
    <!-- Botón o enlace para iniciar la descarga -->
    <v-btn @click="descargarPDF">Descargar Formato de Becas</v-btn>
  </div>
  <div>
    <!-- Botón o enlace para iniciar la descarga -->
    <v-btn @click="descargarPDF">Descargar Formato de Reiscripcion</v-btn>
  </div>
</template>

<script>
export default {
created(){



},


  methods: {





    descargarPDF() {
      // Nombre del archivo a descargar
      const nombreArchivo = '22a0710035m0092_boleta.pdf';

      // Construir la URL del PDF
      const pdfUrl = `/descargar-pdf/${nombreArchivo}`;

      // Abrir la URL en una nueva ventana para descargar el archivo
      window.open(pdfUrl, '_blank');
    },
  },
};
</script>
