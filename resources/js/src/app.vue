<template>
  <div id="app">
    <header>
      <banner v-if="$route.name !== 'dashboard' "></banner>
    </header>
    <main>
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
  </div>
</template>

<style scoped>
/* Estilo para el banner */
header {
  position: fixed; /* Fija el banner en la parte superior */
  width: 100%; /* Ancho completo */
  background-color: #ffffff; /* Cambia el color de fondo según tus preferencias */
  color: #f3f3f300; /* Cambia el color del texto según tus preferencias */
  padding: 20px 0; /* Ajusta el espacio interior del banner */
  text-align: center; /* Centra el contenido del banner */
  z-index: -3; /* Asegura que el banner esté por encima del contenido */
}

/* Estilo para el contenido debajo del banner en dispositivos de escritorio */
main {
  display: flex;
  margin-top: 60px; /* Ajusta el margen superior para dar espacio al banner */
  justify-content: center;
  height: 120vh; 
  width: 180vh;
}

/* Estilo para el contenido debajo del banner en dispositivos móviles */
@media (max-width: 768px) {
  main {
    margin-top: 10px; /* Ajusta el margen superior para dar espacio al banner en dispositivos móviles */
    width: 100%; /* Ancho completo en dispositivos móviles */
    height: auto; /* Altura automática en dispositivos móviles */
  }
}
</style>

<script>
export default {
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 45, behavior: 'smooth' });
    }
  }
};
</script>
