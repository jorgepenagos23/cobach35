<template>
  <div id="app">
    <header>
    </header>
        <main>
      <transition name="fade" mode="out-in">
        <router-view>
          <ListComponent v-if="$route.path === '/'" />
        </router-view>
      </transition>
    </main>
    <body>
      <div class="centered-content"> 

      <router-view></router-view>      </div>

  
    </body>
      </div>
    
</template>

<style scoped>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
header {
  position: fixed; /* Fija el banner en la parte superior */
  width: 80%; /* Ancho completo */
  background-color: #ffffff; /* Cambia el color de fondo según tus preferencias */
  color: #f3f3f300; /* Cambia el color del texto según tus preferencias */
  padding: 78px 0; /* Ajusta el espacio interior del banner */
  text-align: center; /* Centra el contenido del banner */
  z-index: -3; /* Asegura que el banner esté por encima del contenido */
}

main {
  margin-top: 70px; /* Ajusta el margen superior para dar espacio al banner en dispositivos móviles */
  width: auto; /* Ancho completo en dispositivos móviles */
  height: auto; /* Cambia la altura automática a "auto" para ajustarse al contenido */
}
.centered-content {
  display: flex;
  justify-content: center;
  text-align: center;
  height: auto;
}
/* Estilo para el contenido debajo del banner en dispositivos móviles */
@media (max-width: 768px) {
  main {
    margin-top: 10px; /* Ajusta el margen superior para dar espacio al banner en dispositivos móviles */
    width: 100%; /* Ancho completo en dispositivos móviles */
  }
}
</style>

<script>
import ListComponent from './components/ListComponent.vue';

export default {
  components: {
    ListComponent,
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 45, behavior: 'smooth' });
    },
  },
};
</script>
