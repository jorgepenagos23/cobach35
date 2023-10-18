<template>
  <v-app>
    <v-navigation-drawer app>
      <!-- ... otros elementos de navegación ... -->
      <v-list dense>
        <v-list-item to="/" link>
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Inicio</v-list-item-title>
        </v-list-item>
        <v-list-item to="/navegacion" link>
          <v-list-item-icon>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item>
        
        <v-list-item to="/login" link>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Iniciar Sesión</v-list-item-title>
        </v-list-item>
   
        <v-list-item to="/publicaciones" link>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-title>publicaciones</v-list-item-title>
        </v-list-item>
        <!-- Otros elementos de menú de navegación -->
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app>
      <!-- ... contenido de la barra de la aplicación ... -->
    </v-app-bar>

    <!-- Contenido principal -->
    <div class="main-content">


    </div>
  </v-app>
</template>

<style scoped>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

.main-content {
  display: flex;
  flex-direction: column;
  justify-content: center; /* Alinea verticalmente el contenido al centro */
  align-items: center; /* Alinea horizontalmente el contenido al centro */
  height: 100vh; /* Ajusta la altura al 100% del viewport */
}
</style>

<script>
export default {
  data() {
    return {
      mensaje: "Hola",
      drawer: true,
      rail: true,
    };
  },
};
</script>
