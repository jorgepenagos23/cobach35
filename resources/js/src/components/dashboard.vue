<template>
  <div id="app">
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>

   <appbar></appbar>
   <body>
      <v-container fluid class="bg-gradient-to-r from-green-400 to-blue-500 ">
        <!-- Contenido de la página -->
        <v-card color="#0d1b2a" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">PUBLICACIONES</v-card-title>
              <v-card-subtitle>Manejador de Publicaciones</v-card-subtitle>
              <v-card-actions>
                <button @click="$router.push('/index_publicaciones')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                  ENTRAR
                </button>
              </v-card-actions>
            </div>
            <v-avatar class="ma-3" size="125" rounded="0">
              <v-img src="https://www.agr.una.py/assets/images/iconos/publicaciones.png"></v-img>
            </v-avatar>
          </div>
        </v-card>
      </v-container>
      <br>
      <v-container fluid class="bg-gradient-to-r from-green-400 to-blue-500 ">
        <!-- Contenido de la página -->
        <v-card color="#0d1b2a" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">ALUMNOS</v-card-title>
              <v-card-subtitle>Manejador de Alumnos</v-card-subtitle>
              <v-card-actions>
                <button @click="$router.push('/main_alumnos')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                  ENTRAR
                </button>
              </v-card-actions>
            </div>
            <v-avatar class="ma-3" size="125" rounded="0">
              <v-img src="https://www.escenachiapas.com/wp-content/uploads/2019/06/FOTO-BOLET%C3%8DN-COBACH-2-3.jpg"></v-img>
            </v-avatar>
          </div>
        </v-card>
      </v-container>
   </body>
    </v-app>
  </div>
  

</template>

<style scoped>

.custom-app-bar {
  z-index: -3; /* Ajusta el valor de z-index según tus necesidades */
  
}</style>

<script>
import navegacion from "../components/barra_navegacion.vue";
import appbar from "../components/app_bar.vue";

export default {
  components: {
    navegacion,
    appbar,
  },
  methods: {
    // Métodos de tu componente si es necesario
  },
};
</script>
