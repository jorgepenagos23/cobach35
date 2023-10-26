<template>
  <barra></barra>
  <v-app>
    <v-card class="mx-auto" max-width="mx-auto">
      <v-expansion-panels>
        <v-expansion-panel v-for="(dataItem, index) in alumnoYUsuario" :key="index">
          <v-expansion-panel-header>
            {{ dataItem.user.nombre }}
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            <v-list-item>
              <v-list-item-subtitle>Matrícula: {{ dataItem.user.matricula }}</v-list-item-subtitle>
              <v-list-item-subtitle v-if="dataItem.alumno">
                Grado: {{ dataItem.alumno.grado }}
                Grupo: {{ dataItem.alumno.grupo }}
                Nombre del Alumno: {{ dataItem.alumno.nombre_completo }}
                Email: {{ dataItem.alumno.curp }}
                Observaciones: {{ dataItem.alumno.observaciones }}
              </v-list-item-subtitle>
            
            </v-list-item>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-card>
  </v-app>
</template>


<script>
import appbar from "../app_bar.vue";
import barra from "../VistaEstudiantes/dashboard.vue";
import Swal from 'sweetalert2';

export default {
  data: () => ({
    // ... (otros datos)
    combinedData: [], // Almacena datos combinados de usuarios y alumnos
    alumnoYUsuario: [], // Almacena datos combinados de un alumno y su usuario

  }),
  components: {
    appbar,
    barra,
  },
  created() {
  // Realiza una solicitud GET para obtener los datos de usuario y su matrícula desde el servidor
  axios.get('http://127.0.0.1/api/user/')
    .then(response => {
      // Asumiendo que la matrícula del usuario se encuentra en la propiedad "matricula" de la respuesta
      const matriculaDelUsuario = response.data.matricula;
      console.log('Matrícula del usuario:', matriculaDelUsuario);

      // Ahora puedes usar "matriculaDelUsuario" en tu filtro
      axios.get('http://127.0.0.1/api/user/index2')
        .then(response => {
          console.log(response.data);
          this.combinedData = response.data; // Asigna los datos combinados a combinedData

          // Filtra y muestra solo el usuario cuya matrícula coincide con matriculaDelUsuario
          this.alumnoYUsuario = this.combinedData.filter(dataItem =>
            dataItem.user.matricula === matriculaDelUsuario
          );
        })
        .catch(error => {
          console.error('Error al obtener los datos combinados:', error);
        });
    })
    .catch(error => {
      console.error('Error al obtener la matrícula del usuario:', error);
    });
},

  methods: {
    // ... (otros métodos)
  },
};
</script>
