<template>
  <v-app>
    <v-navigation-drawer 
          v-model="drawer"
          :rail="rail"
          permanent
          @click="rail = false" >
          <v-list-item
            title="Plantel 35"  nav >
            <p>{{ mensaje }}</p>
            <template v-slot:append>
              <v-btn
                variant="text"
                icon="mdi-chevron-left"
                @click.stop="rail = !rail"
              ></v-btn>
            </template>
          </v-list-item>
      <v-divider></v-divider>
  
  <v-list density="compact" nav color="success">
    <v-list-item to="/" prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item>
    <v-list-item to="/login" prepend-icon="mdi-account" title="Sistema" value="account"></v-list-item>
    <v-list-item to="/publicaciones" prepend-icon="mdi-newspaper" title="Noticias" value="users"></v-list-item>
  </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="#0a2463">
      <v-img src="https://www.cobach.edu.mx/assets/img/contenido/logoCBC.png" max-width="100" max-height="30" ></v-img>
      <v-toolbar-title></v-toolbar-title>
    </v-app-bar>

    <v-main>
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



  data () {
    return {
      mensaje: "Hola",
      drawer: true,
      rail: true,
    }
  },
}
</script>