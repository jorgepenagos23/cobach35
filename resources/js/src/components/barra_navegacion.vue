<template>
  <v-card class="my-card">
    <v-layout>
      <v-navigation-drawer 
        expand-on-hover
        rail
      >
        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            title="Sandra Adams"
            subtitle="sandra_a88@gmailcom"
          ></v-list-item>
        </v-list>


        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-star" title=" Inicio " @click="$router.push('/dashboard')"></v-list-item>
          <v-list-item prepend-icon="mdi-account-multiple" title="Shared with me" value="shared"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Starred" value="starred"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Salir" @click="logout"></v-list-item>
          
        </v-list>
      </v-navigation-drawer>

    </v-layout>
  </v-card>
</template>


<style scoped>
.my-card {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.9); /* Color de fondo semi-transparente */
  z-index: 9999; /* Coloca la tarjeta en la parte superior */
  /* Otros estilos de diseño de la tarjeta */
}
</style>
<script>
import Swal from 'sweetalert2';

export default{
  
methods: {
  logout() {
        axios.post('/api/logout')
          .then(response => {
           if(response){
            Swal.fire({
                background: 'rgba(238, 59, 27)', // Estilo de fondo definido en tu CSS
                icon: 'success',
                title: '¡Hasta pronto!',
                text: 'Has cerrado sesión exitosamente.',
                showConfirmButton: false,
                timer: 7000 // Cambia el tiempo que deseas que aparezca la alerta
                });
                window.location.reload();

           }
            localStorage.removeItem('access_token');

          })
          .catch(error => {
            console.error('Error al cerrar sesión:', error);
          });
},
  
}
}
</script>