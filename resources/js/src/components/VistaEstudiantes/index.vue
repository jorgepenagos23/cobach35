<template>
  <barra></barra>
  <v-app>
    <v-card class="mx-auto" max-width="mx-auto">
      <v-virtual-scroll :items="alumnoYUsuario" height="500" item-height="50">
        <template v-slot:default="{ item: dataItem }">
          <v-list-item>
            <v-list-item-title>{{ dataItem.user.nombre }}</v-list-item-title>
            <template v-slot:append>
              <v-btn @click="editarPublicacion(dataItem)" size="small" variant="secondary">
                <v-icon>mdi-pencil</v-icon>
                Editar
                <v-icon color="orange-darken-4" end>mdi-open-in-new</v-icon>
              </v-btn>
              <v-btn @click="eliminarPublicacion(dataItem.id)" size="small" color="red">
                <v-icon size="18">mdi-delete</v-icon>
                Eliminar
              </v-btn>
            </template>

            <v-list-item-subtitle>Matrícula: {{ dataItem.user.matricula }}</v-list-item-subtitle>
            
            <v-list-item-subtitle v-if="dataItem.alumno">
              <!-- Muestra información del alumno solo si la propiedad alumno existe -->
              Grado: {{ dataItem.alumno.grado }}
              Grupo: {{ dataItem.alumno.grupo }}
              Nombre del Alumno: {{ dataItem.alumno.nombre_completo }}
              Email {{ dataItem.alumno.email }}

              <!-- Puedes agregar más información del alumno si es necesario -->
            </v-list-item-subtitle>
          </v-list-item>
        </template>
      </v-virtual-scroll>
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
    // Realiza una solicitud GET para obtener los datos combinados de usuarios y alumnos
    axios.get('http://127.0.0.1/api/user/index2')
      .then(response => {
        this.combinedData = response.data; // Asigna los datos combinados a combinedData
        
        // Filtra los datos para mostrar solo el alumno y su usuario correspondiente
        const matricula = 'COBACH98718MCSCGYAk9'; // Reemplaza con la matrícula que desees mostrar
        this.alumnoYUsuario = this.combinedData.filter(dataItem =>
          dataItem.user.matricula === matricula
        );
      })
      .catch(error => {
        console.error('Error al obtener los datos combinados:', error);
      });
  },
  methods: {
    // ... (otros métodos)
  },
};
</script>
