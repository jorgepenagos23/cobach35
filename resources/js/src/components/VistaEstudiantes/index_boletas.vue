<template>
  <barra></barra>
  <v-app>
    <v-card class="mx-auto" max-width="mx-auto">
  
    </v-card>
  </v-app>
</template>


<script>
import appbar from "../app_bar.vue";
import barra from "../VistaEstudiantes/dashboard.vue";
import Swal from 'sweetalert2';

export default {
  data: () => ({


  }),
  components: {
    appbar,
    barra,
  },
  methods: {
    // ... (otros métodos)
  },
};
</script>
