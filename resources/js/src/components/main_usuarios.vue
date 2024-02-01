<template>
      <v-app>

  <div>
    <header>
      <navegacion></navegacion>
    </header>


    <appbar></appbar>
    <div class="bg-deep-orange">
      <div class="max-w-screen-xl">
        <div class="max-w-4xl p-5 mx-auto bg-light">
          <h2 class="mb-3 text-2xl font-bold">USUARIOS</h2>
          <p class="mb-5">Todos los usuarios</p>
        </div>
        <div class="flex items-center justify-end px-5">
          <p class="mr-2"></p>
          <router-link to="/subir-excel-usuarios">
            <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
              <v-icon>
                mdi-microsoft-excel
              </v-icon>           
            </button>
          </router-link>
        </div>
      </div>

      <v-container class="my-8">
        <v-row>
          <v-col cols="12" sm="15">
            <v-row align="center">
              <v-col cols="10">
                <v-text-field v-model="busqueda" label="Buscar por matrícula o nombre" outlined dense variant="solo" prepend-icon="mdi-account-search-outline"></v-text-field>
              </v-col>
              <v-col cols="2">
                <v-btn @click="buscarAlumnos" color="primary" dark block>
                  <v-icon>
                    mdi-magnify
                  </v-icon>
                </v-btn>
                <v-btn @click="limpiarBusqueda" color="error" dark block>
                  <v-icon>
                    mdi-backspace-outline
                  </v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </div>

    <div class="flex items-center justify-center mt-5">
      <div class="max-w-4xl">
        <div v-for="user in filteredUsers" :key="user.id" class="mb-5">
          <div class="p-5 mx-auto bg-white shadow-md">
            <div class="flex items-center">
              <div class="flex items-center justify-center w-16 h-16 mr-5 text-white rounded-full bg-primary">
                <span class="mdi mdi-account"></span>
              </div>
              <div>
                <div class="text-lg">Rol: {{ user.rol }}</div>
                <div class="text-lg">Nombre: {{ user.nombre }}</div>
                <div class="text-lg">Email: {{ user.email }}</div>
                <div class="text-lg">Matricula: {{ user.matricula }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</v-app>
</template>

<script>
import axios from 'axios';
import navegacion from "./barra_navegacion.vue";
import appbar from "./app_bar.vue";

const url = '/api/user/index3';

export default {
  data() {
    return {
      users: [],
      busqueda: '',
    };
  },
  computed: {
    filteredUsers() {
      return this.users.filter(user =>
        user.matricula.toLowerCase().includes(this.busqueda.toLowerCase()) ||
        user.nombre.toLowerCase().includes(this.busqueda.toLowerCase())
      );
    },
  },
  created() {
    axios.get(url)
      .then(response => {
        this.users = response.data.users;
      })
      .catch(error => {
        console.log('Error al obtener los datos de la API:', error);
      });
  },
  methods: {
    buscarAlumnos() {
      // No es necesario realizar ninguna acción específica aquí,
      // ya que la función filteredUsers se encargará automáticamente del filtrado.
    },
    limpiarBusqueda() {
      this.busqueda = '';
    },
    verUsuario(usuario) {
     
    },
  },
  components: {
    navegacion,
    appbar,
  },
};
</script>

<style scoped>
</style>
