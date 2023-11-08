<template>
  <div>
    <h1>Bienvenido, {{ userData.nombre }}</h1>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userData: {
        nombre: '',
        rol: '',
        // Otros campos del usuario según la respuesta del servidor
      },
    };
  },
  created() {
    // Realiza una solicitud GET para obtener los datos del usuario
    axios.get('/api/user')
      .then(response => {
        this.userData = response.data;

        // Redirige al usuario según su rol
        switch (this.userData.rol) {
          case 'estudiante':
            this.$router.push('/index-alumnos');
            break;
          case 'administrador':
            this.$router.push('/index-main');
            break;
          case 'director':
            this.$router.push('/index-main');
            break;
          case 'subdirector':
            this.$router.push('/index-main');
            break;
            case 'orientador':
            this.$router.push('/index-main');
            break;

          default:
            // Puedes manejar otros roles o situaciones aquí
            break;
        }
      })
      .catch(error => {
        console.error('Error al obtener los datos del usuario:', error);
      });
  },
};
</script>
