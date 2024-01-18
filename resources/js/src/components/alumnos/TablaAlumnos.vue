<template>
  <v-app>
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

    <v-card class="mx-auto" max-width="800">
      <v-virtual-scroll :items="alumnosFiltrados" style="margin-top: 60px;" item-height="200">
        <template v-slot:default="{ item: alumnos }">
          <v-list-item class="custom-list-item" elevation="16">
            <v-list-item-content class="custom-list-content">
              <v-list-item-title class="font-weight-bold">Matricula {{ alumnos.matricula }}</v-list-item-title>
              <v-list-item-title class="font-weight-bold">Nombre {{ alumnos.nombre_completo }}</v-list-item-title>

            </v-list-item-content>
            <v-list-item-action>
              <v-btn @click="verAlumno(alumnos)" class="custom-btn" small>
                <v-icon>mdi-account-box</v-icon>
                Ver Alumno
                <v-icon align-center>mdi-open-in-new</v-icon>
              </v-btn>
            </v-list-item-action>
          </v-list-item>
        </template>
      </v-virtual-scroll>
    </v-card>

    <v-dialog v-model="dialog" max-width="700">
      <v-card 
      class="mx-auto"
        max-width="600"
        title="Detalles del Alumno"
      > 
    
      <template v-slot:prepend>
          <v-icon icon="mdi-account" color="primary"></v-icon>
        </template>
        <template v-slot:append>
          <v-btn 
          size="small"
        color="deep-purple-darken-2"
          icon @click="cerrarDialogo">
        <v-icon>mdi-close</v-icon>
      </v-btn>
        </template>    
  
    <v-card-text>
      <v-row>
        <v-col>
          <v-row>
            <v-col cols="12">
              <strong>Matrícula:</strong> {{ alumnoSeleccionado.data.matricula }}
            </v-col>
            <v-col cols="12">
              <strong>Nombre Completo:</strong> {{ alumnoSeleccionado.data.nombre_completo }}
            </v-col>
            <v-col cols="12">
              <strong>Semestre:</strong> {{ alumnoSeleccionado.data.grado }}
            </v-col>
            <v-col cols="12">
              <strong>Grupo:</strong> {{ alumnoSeleccionado.data.grado }}
            </v-col>
            <v-col cols="12">
              <strong>Observaciones:</strong> {{ alumnoSeleccionado.data.observaciones }}
            </v-col>
            <v-col cols="12">
              <strong>Curp:</strong> {{ alumnoSeleccionado.data.curp }}
            </v-col>
          </v-row>
          
          <v-expansion-panels variant="inset" class="my-4">
            
    
              
          </v-expansion-panels>
          
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</v-dialog>
  
  </v-app>
</template>

<style scoped>
.custom-list-item {
  border-radius: 8px; 
  margin: 10px; 
}

.custom-list-content {
  padding: 10px; /* Espaciado interno */
}

.custom-btn {
  background-color: teal; /* Color de fondo personalizado */
  color: white; /* Color del texto personalizado */
text-align: left; 
justify-content: left;
 border: 1px solid teal; /* Borde personalizado */
}

.custom-btn:hover {
  background-color: #00796b; /* Cambiar color al pasar el ratón sobre el botón */
}
</style>



<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";
import Swal from 'sweetalert2';

export default {
  methods: {
    buscarAlumnos() {
      this.alumnosFiltrados = this.alumnos.filter((alumno) =>
        alumno.matricula.includes(this.busqueda) || alumno.nombre_completo.toLowerCase().includes(this.busqueda.toLowerCase())
      );

      if(this.alumnosFiltrados.length==0){

        this.mostrarAlertaNoresultados();
        
      }

    },
    limpiarBusqueda() {
      this.busqueda = "";
      this.alumnosFiltrados = [];
    },
    verAlumno(alumno) {
  const url = `/api/v1/alumno/show/${alumno.id}`;
  axios.get(url)
    .then((response) => {
      console.log("Respuesta de la API:", response.data);
      this.alumnoSeleccionado = response.data;
      this.dialog = true;
    })
   
},

    mostrarAlertaNoresultados(){
      Swal.fire({

        icon: 'info',
        title:'No se hallaron resultados',
        text:'No hay alumnos que concidan con la busqueda',
        confirmButtonText:'Aceptar'

        
      })
    },
    cerrarDialogo() {
      this.dialog = false;
      this.alumnoSeleccionado = {};
    },

  },
  components: {
    navegacion,
    appbar,
  },
  data() {
    return {
      busqueda: "",
      alumnos: [], 
      alumnosFiltrados: [], 
      dialog: false, 
      alumnoSeleccionado:[],

    };
  },
  mounted() {
    const token = "";
    axios
      .get("/api/user/index", {
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
