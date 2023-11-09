<template>
    <header>
      <navegacion></navegacion>
    </header>
    <v-app>
      <appbar></appbar>
      <v-card-item class="bg-lime-accent-4">
          <v-card
            title="REPORTES"
            prepend-icon="mdi-account-check"
            subtitle="Reportes escolares"
            class="bg-indigo-darken-4"
          ></v-card>
        <template v-slot:append>
          <div>
            <router-link to= "/crear-reporte">
              <button class="h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full w-37 min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
               Crear reporte
                <v-icon>
                  mdi-plus
                </v-icon>
              </button>
            </router-link>
          </div>
    
    
        </template>
      </v-card-item>

      <v-container class="my-8">
  <v-row>
    <v-col cols="12" sm="15">
      <v-row align="center">
        <v-col cols="10">
          <v-text-field v-model="busqueda" label="Buscar por matrícula o nombre" outlined dense variant="solo" prepend-icon="mdi-account-search-outline"></v-text-field>
        </v-col>
        <v-col cols="2">
          <v-btn @click="buscarAlumnos" color="primary" dark block>
            Buscar
            <v-icon>
              mdi-magnify
            </v-icon>
          </v-btn>
          <v-btn @click="limpiarBusqueda" color="error" dark block>
            <v-icon>
              mdi-backspace-outline
             </v-icon>
            Limpiar Búsqueda
          </v-btn>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</v-container>

    
  <divider></divider>

    
        <divider></divider>
        <divider></divider>

      <v-virtual-scroll :items="reportesA" height="100" item-height="40"
      :style="{ 
      background: 'linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%)'
    }" >
    <template v-slot:default="{ item }">
      <v-list-item>
                <v-card
                class="mx-auto text-center"
  
                max-width="800"
                 >
                <v-card 
                
                  :title="item.id"    
                  subtitle="No Reporte"
                   class="text-left bg-red-darken-4"
                   variant="tonal" >

                   

                   <template v-slot:append>
          <v-icon class="bg-primary">mdi-file-pdf-box</v-icon>
              <v-btn
            color="white"
            variant="text">
             PDF
          </v-btn>
        </template>
            </v-card>
        
            <v-card 
         
         prepend-icon="mdi-account-school"
         :subtitle="item.matricula"   
         class="bg-white"
         >
         <v-theme-provider theme="light">
         <v-card 
         
         :subtitle="item.descripcion"   
         >

       </v-card>
       </v-theme-provider>
       </v-card>
         
          </v-card>
          
          

          
    
      
      </v-list-item>



      
    </template>
  </v-virtual-scroll>
      
        
  
    </v-app>
  
</template>

<script>
import axios from 'axios';
import navegacion from "../barra_navegacion.vue";
import appbar from "../app_bar.vue";

const url = 'api/v1/reportes/alumnos';

export default {
  data() {
    return {
      reportesA: [], // Arreglo para almacenar los reportes de alumnos
      headers: [
        { text: 'Matricula', value: 'matricula' },
        { text: 'Descripción', value: 'descripcion' },
        { text: 'Acciones', value: 'actions', sortable: false },
      ],
    };
  },

  created() {
    axios.get(url)
      .then(response => {
        this.reportesA = response.data.reportesA;
      })
      .catch(error => {
        console.log('Error al obtener los datos de la API:', error);
      });
  },

  methods: {
    verAlumno(item) {
      // Lógica para ver el reporte del alumno
    },
  },

  components: {
    navegacion,
    appbar,
  },
};
</script>
