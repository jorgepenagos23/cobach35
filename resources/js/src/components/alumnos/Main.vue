<template>

    <header>
      <navegacion></navegacion>

    </header>


    <main>
        <div class="d-flex">
          <tablaAlumnos></tablaAlumnos>

        </div>
        
        <body>



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