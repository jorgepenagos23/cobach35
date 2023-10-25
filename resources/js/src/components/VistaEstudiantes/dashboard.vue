<template>
  <v-app>
    <v-navigation-drawer expand-on-hover rail>
      <v-list>
        <v-list-item
          prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
          :title="user.fullName"
          :subtitle="user.email"
        ></v-list-item>
      </v-list>
      <v-divider></v-divider>
      <v-list density="compact" nav>
        <v-list-item
          prepend-icon="mdi-folder"
          title="My Files"
          value="myfiles"
        ></v-list-item>
      </v-list>
      <v-list-item link @click="$router.push('/index-boletas')">
        <template v-slot:prepend>
          <v-avatar class="mt-2 me-4" rounded="0">
            <v-img
              src="https://ofertaeducativa.org/wp-content/uploads/2022/06/Universidad-en-Linea-6-1024x1024.jpg"
              cover
            ></v-img>
          </v-avatar>
        </template>
        <v-list-item-title class="text-left text-no-wrap">Boletas</v-list-item-title>
      </v-list-item>
      <v-list-item link>
        <template v-slot:prepend>
          <v-avatar class="mt-2 me-4" rounded="0">
            <v-img
              src="https://us.123rf.com/450wm/creativepriyanka/creativepriyanka2201/creativepriyanka220100582/181466550-icono-de-calificaci%C3%B3n-m%C3%A9rito.jpg?ver=6"
              cover
            ></v-img>
          </v-avatar>
        </template>
        <v-list-item-title class="text-left text-no-wrap">Reportes</v-list-item-title>
      </v-list-item>
      <v-list-item link @click="$router.push('/index-descargas')">
        <template v-slot:prepend>
          <v-avatar class="mt-2 me-4" rounded="0">
            <v-img
              src="https://calificacionessep.online/wp-content/uploads/2023/07/descargar-boleta-sep.png"
              cover
            ></v-img>
          </v-avatar>
        </template>
        <v-list-item-title class="text-left text-no-wrap">Descargas</v-list-item-title>
      </v-list-item>
      <v-list-item prepend-icon="mdi-close" title="Salir" @click="logout"></v-list-item>
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
