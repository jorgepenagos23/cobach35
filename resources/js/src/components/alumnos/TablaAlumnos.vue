<template>
  <div id="app">
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
      <appbar></appbar>
      <v-card class="mx-auto" max-width="900" theme="light">
        <v-card-item class="bg-blue-darken-4">
        
          <v-card-title>Base de Datos de Alumnos</v-card-title>
          <v-icon>
          mdi-account
         </v-icon>
        </v-card-item>

        <v-container class="my-8">
        <v-row>
          <v-col cols="12" sm="15">
            <v-text-field v-model="busqueda" label="Buscar por matrícula o nombre" outlined dense></v-text-field>
          </v-col>
          <v-col cols="12" sm="15">
            <v-btn @click="buscarAlumnos" color="primary" dark block>
              Buscar
              <v-icon>
                  mdi-search
                </v-icon>
            </v-btn>
            <v-btn @click="limpiarBusqueda" color="error" dark block>
              <v-icon>
                  mdi-close
                </v-icon>
              Limpiar Búsqueda
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
      <v-card class="mx-auto" max-width="800">
        <v-virtual-scroll :items="alumnosFiltrados" style="margin-top: 40px;" item-height="100">
          <template v-slot:default="{ item: alumnos }">
            <v-list-item >
              <v-list-item-content>
                <v-list-item-title class="font-weight-bold">Matricula
                  {{ alumnos.matricula }}
                </v-list-item-title>
                <v-list-item-subtitle>Nombre Completo : {{ alumnos.nombre_completo }}</v-list-item-subtitle>
                <v-list-item-subtitle> Observaciones: {{ alumnos.observaciones }}</v-list-item-subtitle>
              </v-list-item-content>
              <v-list-item-action>
                <v-btn @click="editaralumnos(alumnos)" color="primary" small>
                  <v-icon>
                    mdi-pencil
                  </v-icon>
                  Ver Alumno
                  <v-icon right>
                    mdi-open-in-new
                  </v-icon>
                </v-btn>
              </v-list-item-action>
            </v-list-item>
          </template>
        </v-virtual-scroll>
      </v-card>
</v-card>
</v-app>
</div>
</template>

<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";

export default {
  methods: {
    buscarAlumnos() {
      // Limpia la lista de alumnos filtrados antes de realizar la búsqueda.
      this.alumnosFiltrados = [];
      
      // Busca el alumno según la matrícula o el nombre.
      this.alumnosFiltrados = this.alumnos.filter((alumno) =>
        alumno.matricula.includes(this.busqueda) || alumno.nombre_completo.toLowerCase().includes(this.busqueda.toLowerCase())
      );
    },
    limpiarBusqueda() {
      this.busqueda = "";
      this.alumnosFiltrados = [];
    },
    editaralumnos(alumnos) {
      // Lógica para editar la publicación
    },
  },
  components: {
    navegacion,
    appbar,
  },
  data() {
    return {
      busqueda: "",
      alumnos: [], // Tu lista completa de alumnos
      alumnosFiltrados: [], // Aquí almacenaremos los alumnos filtrados
    };
  },
  mounted() {
    const token = "";
    axios
      .get("http://127.0.0.1/api/user/index", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        console.log("Respuesta de la API:", response.data);
        this.alumnos = response.data.alumnos;
      })
      .catch((error) => {
        console.error("Error al obtener las alumnos:", error);
      });

    const script = document.createElement("script");
    script.src =
      "https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js";
    script.defer = true;
    document.body.appendChild(script);
  },
};
</script>
