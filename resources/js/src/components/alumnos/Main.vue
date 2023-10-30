<template>
  <header>
    <navegacion></navegacion>
  </header>

  <main>
    <div class="flex-wrap d-flex"> <!-- Utiliza flex-wrap para que los elementos se ajusten al tamaño del contenido -->
   

      <tablaAlumnos class="mx-auto" max-width="600" style="width: 100%;"> <!-- Ajusta el tamaño de la tabla -->
      </tablaAlumnos>
    </div>
  </main>
  <v-card max-width="400" class="mx-auto mb-3"> <!-- Agrega margen inferior (mb-4) para separar los elementos -->
                <subiralumno></subiralumno>
            
        </v-card>
</template>
  
<script>

import navegacion from "../barra_navegacion.vue";
import tablaAlumnos from "../alumnos/TablaAlumnos.vue";
import subiralumno from "../Excel/SubirAlumno.vue";

  export default {
   
    components: {
      navegacion,
      tablaAlumnos,
      subiralumno,
    },

    methods:{
 
 
   }
  }

  </script>