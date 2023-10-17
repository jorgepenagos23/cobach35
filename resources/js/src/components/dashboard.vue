<template>

  <header>
 <navegacion> </navegacion>

  </header>

        
  <body>

<v-container class="bg-gradient-to-r from-green-400 to-blue-500 ">
<v-row justify="center">
<v-col cols="12" lg="8" >
<v-card color="#0d1b2a" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between ">
<div>
  <v-card-title class="text-h5">PUBLICACIONES</v-card-title>
  <v-card-subtitle>Manejador de Publicaciones</v-card-subtitle>
  <v-card-actions>
    <button @click="$router.push('/editar-publicaciones')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>              </v-card-actions>
</div>
<v-avatar class="ma-3" size="125" rounded="0">
  <v-img src="https://www.agr.una.py/assets/images/iconos/publicaciones.png"></v-img>
</v-avatar>
</div>
</v-card>
</v-col>


<v-col cols="12" lg="8">
<v-card color="#1b263b" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between">
<div>
  <v-card-title class="text-h5">REPORTES</v-card-title>
  <v-card-subtitle>Manejador de Reportes</v-card-subtitle>
  <v-card-actions>
    <button  @click="$router.push('/editar-reportes')"  class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>



</v-card-actions>
</div>
<v-avatar class="ma-3" size="125" rounded="0">
  <v-img src="https://cdn-icons-png.flaticon.com/512/2852/2852376.png"></v-img>
</v-avatar>
</div>
</v-card>
</v-col>

<v-col cols="12" lg="8">
<v-card color="#415a77" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between">
<div>
  <v-card-title class="text-h5">ALUMNOS</v-card-title>
  <v-card-subtitle>SISTEMA</v-card-subtitle>
  <v-card-actions>
    <button @click="$router.push('/main_alumnos')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>
  </v-card-actions>
</div>
<v-avatar class="ma-5" size="125"  rounded="2">
    <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
style="background-image: url('https://www.escenachiapas.com/wp-content/uploads/2019/06/FOTO-BOLET%C3%8DN-COBACH-2-3.jpg');">
<img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

<div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
</div>
<div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


</div>
</article>
</v-avatar>
</div>
</v-card>
</v-col>
<v-col cols="12" lg="8">
<v-card color="#778da9" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between">
<div>
  <v-card-title class="text-h5">BOLETAS</v-card-title>
  <v-card-subtitle>SISTEMA</v-card-subtitle>
  <v-card-actions>
    <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>
  </v-card-actions>
</div>
<v-avatar class="ma-5" size="125"  rounded="2">
    <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
style="background-image: url('https://calificacionessep.online/wp-content/uploads/2023/07/Calificaciones-de-preparatoria-SEP.jpg');">
<img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

<div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
</div>
<div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


</div>
</article>
</v-avatar>
</div>
</v-card>
</v-col>

<v-col cols="12" lg="8">
<v-card color="#e0e1dd" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between">
<div>
  <v-card-title class="text-h5">SECCIONES</v-card-title>
  <v-card-subtitle>SISTEMA</v-card-subtitle>
  <v-card-actions>
    <button @click="$router.push('/tabla-secciones')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>
  </v-card-actions>
</div>
<v-avatar class="ma-5" size="125"  rounded="2">
    <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
style="background-image: url('https://cdn-icons-png.flaticon.com/512/1627/1627294.png');">
<img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

<div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
</div>
<div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


</div>
</article>
</v-avatar>
</div>
</v-card>
</v-col>

<v-col cols="12" lg="8">
<v-card color="#078559" theme="dark">
<div class="flex-no-wrap d-flex justify-space-between">
<div>
  <v-card-title class="text-h5">SUBIR HOJAS DE EXCEL  ALUMNOS</v-card-title>
  <v-card-subtitle>SISTEMA</v-card-subtitle>
  <v-card-actions>
    <button @click="subiralumno" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
     ENTRAR
    </button>
  </v-card-actions>
</div>
<v-avatar class="ma-5" size="125"  rounded="2">
    <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
style="background-image: url('https://miro.medium.com/v2/resize:fit:720/format:webp/1*4nLaSMTo7mb66Vl6tlReTw.jpeg');">
<img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

<div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
</div>
<div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


</div>
</article>
</v-avatar>
</div>
</v-card>
</v-col>





</v-row>
</v-container>



</body>
</template>

<script>

import navegacion from "../components/barra_navegacion.vue";

  export default {
   
    components: {
      navegacion,
    },

    methods:{
 
 
   }
  }

  </script>