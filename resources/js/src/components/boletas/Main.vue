<template>
  <header>
    <navegacion></navegacion>
  </header>
  <v-app>
  
    <appbar></appbar>
      
        <v-theme-provider theme="light" with-background class="pa-5">
            <v-card title="  BOLETAS" 
            prepend-icon="mdi-file-chart-outline"
            subtitle="Alumnos"></v-card>
          </v-theme-provider>
   


      <v-card-text class="pt-8">
    


    <div class="text-center">

      
      <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('/main-parciales-primer-semestre')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center" color="default">
      <v-icon size="30" class="mx-2">mdi-numeric-1-circle</v-icon>
      PRIMER SEMESTRE
    </v-chip>

    
  </v-card>





    </div>


  <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('/main-parciales-segundo-semestre')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center" color="primary">
      <v-icon size="30" class="mx-2">mdi-numeric-2-circle</v-icon>
      SEGUNDO  SEMESTRE
    </v-chip>
  </v-card>
  <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('/main-parciales-tercer-semestre')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center"  color="teal-darken-4" text-color="white">
      <v-icon size="30" class="mx-2">mdi-numeric-3-circle</v-icon>
      TERCER  SEMESTRE
    </v-chip>
  </v-card>
  
  <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('/main-parciales-cuarto-semestre')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center"  color="deep-orange-accent-4" text-color="white">
      <v-icon size="30" class="mx-2">mdi-numeric-4-circle</v-icon>
      CUARTO  SEMESTRE
    </v-chip>
  </v-card>
  
  <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center" color="indigo">
      <v-icon size="30" class="mx-2">mdi-numeric-5-circle</v-icon>
      QUINTO  SEMESTRE
    </v-chip>
  </v-card>

  
  <v-card
    class="mx-auto my-4 d-flex align-start"
    max-width="500"
    @click="$router.push('#')"
    target="_blank"
  >
    <v-chip class="justify-center ma-4 d-flex align-center" color="brown-darken-4">
      <v-icon size="30" class="mx-2">mdi-numeric-6-circle</v-icon>
      SEXTO SEMESTRE
    </v-chip>
  </v-card>
  
     </v-card-text>



  


  </v-app>


      
</template>


<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

</style>


<script>
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";

export default {


  data() {
    return {
      grupo: '',
      semestre: '',
      archivo: null,
    };
  },
  methods: {
    subirBoletas() {
      // Aquí puedes manejar la lógica para subir el archivo y procesar las boletas
      console.log('Grupo:', this.grupo);
      console.log('Semestre:', this.semestre);
      console.log('Archivo:', this.archivo);
      // Llama a tu API de Laravel para subir el archivo y procesar las boletas
    },
  },

  components: {
      navegacion,
      appbar,
    },
};
</script>

<style scoped>
  .icono-personalizado {
    font-size: 2em; /* Ajusta el tamaño según tus necesidades */


    
  }</style>