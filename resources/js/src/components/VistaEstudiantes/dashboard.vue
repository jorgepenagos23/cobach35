<template>
  <v-app>
    <v-app-bar app color="teal darken-4">
      <v-btn icon @click="toggleDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <v-app-bar-title>Estudiantes</v-app-bar-title>

      <v-spacer></v-spacer>

      <v-btn icon @click="logout">
        <v-icon>mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" :rail="rail" permanent @click="rail = false">
      <v-list dense nav>
        <v-list-item
          v-for="(item, index) in items"
          :key="index"
          :prepend-icon="item.icon"
          :title="item.title"
          link
          @click="$router.push(item.route)"
        ></v-list-item>

        <v-divider></v-divider> <!-- Agregar un divisor antes de la opción "Salir" -->

        <v-list-item
          prepend-icon="mdi-logout"
          title="Salir"
          link
          @click="logout"
        ></v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-app>
</template>

<style scoped>
/* Puedes agregar estilos CSS personalizados aquí */
</style>

<script>
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      user: {
        fullName: '',
        email: '',
        matricula: '',
      },
      drawer: false,
      rail: false,
      items: [
        { title: 'Inicio', icon: 'mdi-home', route: '/index-alumnos' },
        { title: 'Calificaciones', icon: 'mdi-file', route: '/index-boletas' },
        { title: 'Descargas', icon: 'mdi-file-download', route: '/index-descargas' },
      ],
    };
  },
  created() {
    axios.get('/api/user')
      .then(response => {
        this.user.fullName = response.data.nombre;
        this.user.matricula = response.data.matricula;
        this.user.email = response.data.email;
      })
      .catch(error => {
        console.error('Error al obtener los datos del usuario:', error);
      });
  },
  methods: {
    toggleDrawer() {
      this.drawer = !this.drawer;
    },
    logout() {
      axios.post('/api/logout')
        .then(response => {
          if (response) {
            Swal.fire({
              icon: 'success',
              title: '¡Hasta pronto!',
              text: 'Has cerrado sesión exitosamente.',
              showConfirmButton: false,
              timer: 7000,
            });
            window.location.reload();
          }
          localStorage.removeItem('access_token');
        })
        .catch(error => {
          console.error('Error al cerrar sesión:', error);
        });
    },
  },
};
</script>
