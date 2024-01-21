<template>
  <v-app>
    <!-- Menú de navegación responsivo -->
    <v-app-bar app color="#041233" dark fixed>
      <!-- Botón de menú para pantallas pequeñas -->
      <v-app-bar-nav-icon v-if="isMobile" @click.stop="drawer = !drawer" class="custom-icon-btn"></v-app-bar-nav-icon>

      <v-img src="https://www.cobach.edu.mx/assets/img/contenido/logoCBC.png" max-width="100" max-height="30"></v-img>

      <div>
    <v-menu
      open-on-hover
      transition="scale-transition"
      v-if="!isMobile"
      v-for="(seccion, seccionId) in secciones"
      :key="seccionId"
    >
      <template v-slot:activator="{ props }">
        <v-btn v-bind="props" color="light" @click="navigateTo(seccion.ruta)">
          <v-icon>mdi-menu-down</v-icon>
          {{ seccion.nombre }}
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="(subseccion, subseccionId) in subseccionesPorSeccion[seccionId]"
          :key="subseccionId"
        >
          <v-list-item-content>
            <v-list-item-title @click="navigateTo(subseccion.ruta)">
              {{ subseccion.nombre_subseccion }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>

    </v-app-bar>

    <!-- Menú de navegación lateral -->
    <v-navigation-drawer
      v-model="drawer"
      floating
      app
      class="custom-drawer"
      :temporary="isMobile"
      v-if="isMobile" 
    >
      <v-list dense nav>
        <v-list-item @click="navigateTo('')" prepend-icon="mdi-menu-right" title="Inicio" value=""></v-list-item>
        <v-list-item @click="navigateTo('conocenos')" prepend-icon="mdi-menu-right" title="Conocenos" value=""></v-list-item>
        <v-list-item @click="navigateTo('oferta')" prepend-icon="mdi-menu-right" title="Oferta Educativa" value=""></v-list-item>
        <v-list-item @click="navigateTo('alumnos')" prepend-icon="mdi-menu-right" title="Sistema Estudiantes" value=""></v-list-item>
        <v-list-item @click="navigateTo('login')" prepend-icon="mdi-menu-right" title="Sistema Estudiantes" value=""></v-list-item>
        <v-list-item @click="navigateTo('instalaciones')" prepend-icon="mdi-menu-right" title="Instalaciones" value=""></v-list-item>

        <v-list-item @click="navigateTo('todos')" prepend-icon="mdi-menu-right" title="Descargas" value=""></v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      isMobile: false, 
      drawer: false,
      secciones: [],
      subseccionesPorSeccion: {},
    };
  },
  beforeDestroy() {
    if (typeof window === 'undefined') return;
    window.removeEventListener('resize', this.onResize, { passive: true });
  },
  mounted() {
    this.onResize();
    this.fetchSecciones();
    window.addEventListener('resize', this.onResize, { passive: true });
    axios.get('api/v1/secciones')
      .then(response => {
        this.secciones = response.data.secciones;
      })
      .catch(error => {
        console.error('Error al obtener las secciones:', error);
      });

  },
  methods: {


    onResize() {
      this.isMobile = window.innerWidth < 600;
    },

    fetchSecciones() {
     
      axios.get('api/v1/secciones')
        .then(response => {
          this.secciones = response.data.secciones;
          this.fetchSubsecciones();
        })
        .catch(error => {
          console.error('Error al obtener las secciones', error);
        });
    },
    fetchSubsecciones() {
      // Hacer la llamada a la API para obtener las subsecciones
      // Puedes ajustar la URL según tu estructura de API
      axios.get('api/v1/subseccion')
        .then(response => {
          this.subseccionesPorSeccion = response.data.subseccionesPorSeccion;
        })
        .catch(error => {
          console.error('Error al obtener las subsecciones', error);
        });
    },
    navigateTo(ruta) {
      // Implementa la lógica para navegar a la ruta deseada
      this.$router.push({ path: `${ruta}` });
      this.drawer = false;
      console.log('Navegar a:', ruta);
    },
  },
};
</script>

<style scoped>
.custom-drawer {
  background-color: #ffffff;
  color: #041233;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.custom-icon-btn {
  background-color: #18b36d;
  color: #f0faf5;
  border-radius: 50%;
  padding: 8px;
}
</style>
