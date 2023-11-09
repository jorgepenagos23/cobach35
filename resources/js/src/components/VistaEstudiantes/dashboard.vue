<template>
  <v-app>
    <v-app-bar app
        color="teal-darken-4"
        image="https://static.wixstatic.com/media/c17ec1_a01ff6549e284a1e804dba7234814694~mv2.jpg/v1/fill/w_978,h_372,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/c17ec1_a01ff6549e284a1e804dba7234814694~mv2.jpg"
    
    >

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
      >     
     
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
  data() {
    return {
      user: {
        fullName: '',
        email: '',
        matricula: '',
      },
      drawer: false, // Inicialmente, el cajón está cerrado
      rail: false,
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
      this.drawer = !this.drawer; // Abre o cierra el cajón al hacer clic en el botón
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
