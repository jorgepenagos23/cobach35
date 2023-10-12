<template>
<header>

  <slot name="banner"></slot>
</header>
<div class="centered-content"> <!-- Agrega una clase al contenedor del contenido -->
<router-view></router-view>
</div>

     
</template>



<style scoped>
.centered-content {
  display: flex;
 justify-content: center;
  height: auto; /* Elimina la altura fija para que el contenido se ajuste automáticamente */
}
</style>


  <script>

import banner from "../src/components/inicio.vue";

  export default {
   
    components: {
        banner,
    },

    methods:{
 
 
   }
  }

  </script>