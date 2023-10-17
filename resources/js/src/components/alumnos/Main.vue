<template>

    <header>
      <navegacion></navegacion>
      <h1>hola</h1>

    </header>


    <main>
        <div class="d-flex">

        </div>
        <body>

        <tablaAlumnos></tablaAlumnos>


          <subir-alumno>

          </subir-alumno>


        </body>
    </main>

  </template>

  
<script>

import navegacion from "../barra_navegacion.vue";
import tablaAlumnos from "../alumnos/TablaAlumnos.vue";

  export default {
   
    components: {
      navegacion,
      tablaAlumnos,
    },

    methods:{
 
 
   }
  }

  </script>