<template>
  <v-app>
    <v-navigation-drawer 
      v-model="drawer"
      :rail="rail"
      permanent
      @click="rail = false"
    >
      <!-- Contenido de la barra de navegación -->
      <v-list-item title="Plantel 35" nav>
        <p>{{ mensaje }}</p>
        <template v-slot:append>
          <v-btn variant="text" icon="mdi-chevron-left" @click.stop="rail = !rail"></v-btn>
        </template>
      </v-list-item>
      <v-divider></v-divider>
      <v-list density="compact" nav color="success">
        <v-list-item to="/" prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item>
        <v-list-item to="/login" prepend-icon="mdi-account" title="Sistema" value="account"></v-list-item>
        <v-list-item to="/publicaciones" prepend-icon="mdi-newspaper" title="Noticias" value="users"></v-list-item>
        <v-list-item to="/prueba-scroll" prepend-icon="mdi-newspaper" title="Noticias" value="users"></v-list-item>

      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="#041233" style="position: fixed; top: 0; width: 100%;">
      <v-img src="https://www.cobach.edu.mx/assets/img/contenido/logoCBC.png" max-width="100" max-height="30"></v-img>
      <v-toolbar-title></v-toolbar-title>
    </v-app-bar>

    <v-main style="padding-top: 200px;">
      <!-- Contenido de la página -->
      <router-view></router-view>
    </v-main>
  </v-app>
</template>
<style>
    @import 'tailwindcss/base';
    @import 'tailwindcss/components';
    @import 'tailwindcss/utilities';
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
}
</script>
