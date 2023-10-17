<template>
  <v-card>
    <v-layout>
      <!-- Barra de navegación -->
      <v-navigation-drawer
        color="#226f54"
        expand-on-hover
        rail
        style="position: fixed; z-index: 4;"
        :width="drawerWidth"
      >
        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            title="Usuario"
            subtitle="Rol"
          ></v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list density="compact" nav>
          <v-list-item :to="{ name: 'dashboard' }" prepend-icon="mdi-folder" title="Inicio"></v-list-item>
          <v-list-item prepend-icon="mdi-account-multiple" title="Base de Datos" value="shared"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Configuracion " value="starred"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Modo Dark" @click="toggleTheme"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Salir" @click="logout"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title=" Vista Alumno " @click="$router.push('/index-alumno')"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title=" banner " @click="$router.push('/banner')"></v-list-item>

        </v-list>
      </v-navigation-drawer>

   
    </v-layout>
  </v-card>
</template>

<script>


</script>