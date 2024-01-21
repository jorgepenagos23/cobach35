<template>
  <div id="app">
    <link rel="icon" href="../src/assets/logo35.png" type="image/x-icon">

    <header>
    </header>

    <main>
      <transition name="fade" mode="out-in">
        <router-view>
          <ListComponent v-if="$route.path === '/'" />
        </router-view>
      </transition>

      <div class="centered-content">
        <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<style scoped>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

#app {
  padding-top: 78px; /* Ajusta el espacio superior para dar lugar al banner */
}

header {
  position: fixed;
  width: 100%;
  background-color: #0d922e;
  color: #f3f3f300;
  padding: 0px 0; /* Ajusta el espacio interior del banner */
  text-align: center;
  z-index: 1000; /* Asegura que el banner esté por encima del contenido */
}

main {
  width: 100%;
  height: auto;
}

.centered-content {
  display: flex;
  justify-content: center;
  text-align: center;
  height: auto;
}

/* Estilo para el contenido debajo del banner en dispositivos móviles */
@media (max-width: 768px) {
  #app {
    padding-top: 20px;
  }

  header {
    padding: 10px 0;
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
