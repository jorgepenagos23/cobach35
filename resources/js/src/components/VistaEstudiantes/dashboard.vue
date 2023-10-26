<template>
  <v-app>
    <v-app-bar app>
      <v-btn icon @click="toggleDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>
      <v-app-bar-title>Estudiantes</v-app-bar-title>
    </v-app-bar>
    <v-navigation-drawer
        v-model="drawer"
        :rail="rail"
        permanent
        @click="rail = false"
      >      <v-list>
        <v-list-item
          prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
          :title="user.fullName"
          :subtitle="user.email"
        ></v-list-item>
      </v-list>
      <v-divider></v-divider>
      <v-list density="compact" nav>
        <v-list-item
          prepend-icon="mdi-home"
          title="Inicio"
          link @click="$router.push('/index-alumnos')"
          value="myfiles"
        ></v-list-item>
        <v-list-item
          prepend-icon="mdi-file"
          title="Calificaciones"
          value="myfiles"
          link @click="$router.push('/index-boletas')"
        ></v-list-item>
        <v-list-item
          prepend-icon="mdi-file-download"
          title="Descargas"
          value="myfiles"
          link @click="$router.push('/index-descargas')"
        ></v-list-item>
        <v-list-item prepend-icon="mdi-close" title="Salir" @click="logout"></v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-app>
</template>

<style>
/* Aquí puedes agregar estilos CSS personalizados si es necesario */
</style>

<script>
import Swal from 'sweetalert2';

export default {
  data: () => ({
    user: {
      fullName: '',
      email: '',
    },
    drawer: true, // Inicialmente el drawer estará cerrado
  }),
  created() {
    axios.get('http://127.0.0.1/api/user')
      .then(response => {
        this.user.fullName = response.data.nombre;
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
              background: 'rgba(238, 59, 27)',
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
