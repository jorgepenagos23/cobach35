<template>
    <v-layout>
      <!-- Navigation Drawer -->
      <v-navigation-drawer
        v-model="drawer"
        floating
        permanent
        app
        class="custom-drawer"
      >
        <v-list dense nav>
          <v-list-item @click="navigateTo('')" prepend-icon="mdi-menu-right" title="Inicio" value=""></v-list-item>
          <v-list-item @click="navigateTo('login')" prepend-icon="mdi-menu-right" title="Sistema Estudiantes" value=""></v-list-item>
          <v-list-item @click="navigateTo('todos')" prepend-icon="mdi-menu-right" title="Descargas" value=""></v-list-item>

        </v-list>
      </v-navigation-drawer>

      <!-- Main Content -->
      <v-main>
        <v-app-bar app color="#041233" dark fixed>
          <v-app-bar-nav-icon @click.stop="drawer = !drawer" class="custom-icon-btn"></v-app-bar-nav-icon>
          <v-img src="https://www.cobach.edu.mx/assets/img/contenido/logoCBC.png" max-width="100" max-height="30"></v-img>
        </v-app-bar>

        <router-view></router-view>
      </v-main>
    </v-layout>
</template>

<style scoped>
.custom-drawer {
  background-color: #ffffff; /* Fondo del drawer personalizado (blanco) */
  color: #041233; /* Color del texto en el drawer */
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombra del drawer */
}

.custom-icon-btn {
  background-color: #18b36d; /* Color de fondo personalizado */
  color: #f0faf5; /* Color del icono */
  border-radius: 50%; /* Borde redondeado */
  padding: 8px; /* Espaciado interno */
}
</style>

<script>
export default {
  data() {
    return {
      drawer: false,
    };
  },
  methods: {
    navigateTo(route) {
      // Puedes personalizar esto según tus necesidades
      this.$router.push({ path: `/${route}` });
      this.drawer = false; // Cierra el cajón después de la navegación
    },
  },
};
</script>
