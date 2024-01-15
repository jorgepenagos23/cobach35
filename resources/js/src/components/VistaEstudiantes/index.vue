<template>
  <barra></barra>
  <v-app>
    <v-card max-width="900" class="mx-500">
      <v-expansion-panels>
        <v-expansion-panel v-for="(dataItem, index) in alumnoYUsuario" :key="index">
          <v-expansion-panel-header class="text-black teal lighten-2"> <!-- Agregar color de fondo a la cabecera -->      
            <v-chip class="ms-0" color="red" label size="small">
     
            {{ dataItem.user.nombre }}
            </v-chip>
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            <v-extension-panels v-model="panel" :disabled="disabled" multiple>
              <v-container>
                <v-row justify="center">
                  <v-menu min-width="200px" rounded>
                    <template v-slot:activator="{ props }">
                      <v-btn icon v-bind="props">
                        <v-avatar color="blue" size="large">
                          <span class="text-h5">{{ dataItem.initials }}</span>
                        </v-avatar>
                      </v-btn>
                    </template>
                    <v-card>
                      <v-card-text>
                        <div class="mx-auto text-center">
                          <v-avatar color="blue">
                            <span class="text-h5">{{ dataItem.initials }}</span>
                          </v-avatar>
                          <h3>{{ dataItem.alumno.nombre_completo }}</h3>
                          <p class="mt-1 text-caption">{{ dataItem.user.email }}</p>
                          <v-divider class="my-3"></v-divider>
                          <v-divider class="my-3"></v-divider>
                        </div>
                        
                      </v-card-text>
                    </v-card>
                  </v-menu>
                </v-row>
              </v-container>
            </v-extension-panels>
            
            <v-expansion-panels v-model="panel" :disabled="disabled" multiple >
              <v-expansion-panel >
                <v-expansion-panel-title class="primary" theme="dark" color="indigo-darken-4">Datos Escolares</v-expansion-panel-title>
                <v-expansion-panel-text v-if="dataItem.alumno">
                </v-expansion-panel-text>

                  <v-expansion-panel-text>Matricula: {{ dataItem.alumno.matricula }}</v-expansion-panel-text>
                  <v-expansion-panel-text>Nombre: {{ dataItem.alumno.nombre_completo }}</v-expansion-panel-text>
                <v-expansion-panel-text>Grupo: {{ dataItem.alumno.grupo }}</v-expansion-panel-text>

                <v-expansion-panel-text>Grado: {{ dataItem.alumno.grado }}</v-expansion-panel-text>
                <v-expansion-panel-text>Curp: {{ dataItem.alumno.curp }}</v-expansion-panel-text>
              </v-expansion-panel>
              
              <v-expansion-panel>
          <v-expansion-panel-title class="primary" theme="dark" color="red-darken-4">Conducta Academica</v-expansion-panel-title>
          <v-expansion-panel-text>
            <div>
              <div v-if="response && response.reportes">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Descripción</th>
                      <th>Fecha</th>
                      <th>Usuario ID</th>
                      <th>Usuario Nombre</th>
                      <th>Reporte ID</th>
                      <th>Reporte Nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                <td>{{ response.reportes.id }}</td>
                <td>{{ response.reportes.descripcion }}</td>
                <td>{{ response.reportes.fecha }}</td>
                <td>{{ response.reportes.usuario.id }}</td>
                <td>{{ response.reportes.usuario.nombre }}</td>
                <td>{{ response.reportes.reporte.id }}</td>
                <td>{{ response.reportes.reporte.nombre }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-else>
          <p>No hay datos de reportes disponibles.</p>
        </div>
      </div>
    </v-expansion-panel-text>
  </v-expansion-panel>



              <v-expansion-panel>


 <v-expansion-panel-title class="primary" theme="dark" color="blue-darken-4">
      <v-icon left>mdi-star</v-icon> Calificaciones Parcial 1
    </v-expansion-panel-title>   
    
    <v-expansion-panel-text>   

                  <div class="overflow-x-auto">
                  <table class="w-full border-collapse table-auto">
                    <thead>
                      <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre del Alumno</th>
                        <th class="px-4 py-2">Espanol</th>

                        
                        <th class="px-4 py-2">Promedio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="boleta in boletas" :key="boleta.id">
                        <td class="px-4 py-2 border">{{ boleta.id }}</td>
                        <td class="px-4 py-2 border">{{ boleta.nombre_alumno }}</td>
                        <td class="px-4 py-2 border">{{ boleta.espanol1 }}</td>
                        <td class="px-4 py-2 border">{{ boleta.promedio }}</td>
                      </tr>


                      
                    </tbody>
                  </table>
                </div>

                  
                </v-expansion-panel-text>

              
              </v-expansion-panel>
              <v-expansion-panel>


                <v-expansion-panel-title class="primary" theme="dark" color="orange-darken-4">
      <v-icon left>mdi-star</v-icon> Calificaciones Parcial 2
    </v-expansion-panel-title><v-expansion-panel-text>   

  <div class="overflow-x-auto">
  <table class="w-full border-collapse table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Nombre del Alumno</th>
        <th class="px-4 py-2">Espanol</th>

        
        <th class="px-4 py-2">Promedio</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="boleta in boletas" :key="boleta.id">
        <td class="px-4 py-2 border">{{ boleta.id }}</td>
        <td class="px-4 py-2 border">{{ boleta.nombre_alumno }}</td>
        <td class="px-4 py-2 border">{{ boleta.espanol1 }}</td>
        <td class="px-4 py-2 border">{{ boleta.promedio }}</td>
      </tr>


      
    </tbody>
  </table>
</div>

  
</v-expansion-panel-text>


</v-expansion-panel>


<v-expansion-panel>


  <v-expansion-panel-title class="primary" theme="dark" color="teal-darken-4">
      <v-icon left>mdi-star</v-icon> Calificaciones Parcial 3
    </v-expansion-panel-title><v-expansion-panel-text>   

  <div class="overflow-x-auto">
  <table class="w-full border-collapse table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Nombre del Alumno</th>
        <th class="px-4 py-2">Espanol</th>

        
        <th class="px-4 py-2">Promedio</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="boleta in boletas" :key="boleta.id">
        <td class="px-4 py-2 border">{{ boleta.id }}</td>
        <td class="px-4 py-2 border">{{ boleta.nombre_alumno }}</td>
        <td class="px-4 py-2 border">{{ boleta.espanol1 }}</td>
        <td class="px-4 py-2 border">{{ boleta.promedio }}</td>
      </tr>


      
    </tbody>
  </table>
</div>

  
</v-expansion-panel-text>


</v-expansion-panel>
 </v-expansion-panels>
 </v-expansion-panel-content>
</v-expansion-panel>
</v-expansion-panels>
</v-card>
   

  </v-app>



</template>
<script>
import axios from 'axios';
import appbar from '../app_bar.vue';
import barra from '../VistaEstudiantes/dashboard.vue';
import Swal from 'sweetalert2';

export default {
  data: () => ({
    combinedData: [],
    alumnoYUsuario: [],
    panel: [0, 1],
    disabled: false,
    matriculaDelUsuario: null,
    boletas: [],
    reportesA: [],
    response: {},

  }),

  components: {
    appbar,
    barra,
  },



  
  async created() {
    try {
      // Obtener datos de usuario y su matrícula
      const userDataResponse = await axios.get('/api/user/');
      const matriculaDelUsuario = userDataResponse.data.matricula;

      const combinedDataResponse = await axios.get('/api/user/index2');
      this.combinedData = combinedDataResponse.data;

      this.alumnoYUsuario = this.combinedData.filter(dataItem => dataItem.user.matricula === matriculaDelUsuario);

      this.alumnoYUsuario = this.alumnoYUsuario.map(dataItem => {
        const palabras = dataItem.alumno.nombre_completo.split(' ');
        const iniciales = palabras.map(palabra => palabra.charAt(0)).join('');
        dataItem.initials = iniciales;
        return dataItem;
      });


      this.obteneReporte();
      this.obtenerMatricula();

      
     
    } 
    catch (error) {
      console.error('Error en la solicitud:', error);
    }


    
  },
  methods: {
obtenerMatricula()
  {
          axios.get('/api/user/')

.then(response =>{
  this.matriculaDelUsuario = response.data.matricula;
  console.log(response.data);
  this.boletas = response.data.boletas;
  this.otraFuncionQueUsaMatricula();
  this.obtenerReportes();

})

.catch(error =>{

    console.error('error en la solicitud',error);
}
)

},


otraFuncionQueUsaMatricula(){
  console.log('Matrícula en funcion segunda llamada de matricula:', this.matriculaDelUsuario);

  axios.get('/api/obtener-boletas/'+this.matriculaDelUsuario)

  .then(response =>{
    console.log(response.data);
    this.boletas = response.data.boletas;
  })

  .catch(error => {

    console.error('error', error)
    
  })
  
},

    
    
    async obteneReporte() {
  try {
    const userDataResponse = await axios.get('/api/user/');
    const matriculaDelUsuario = userDataResponse.data.matricula;
console.log('haz obtenido la matricula del usuario',matriculaDelUsuario);
    const response = await axios.get('/api/obtener-reporte/' + matriculaDelUsuario);

    console.log('Respuesta completa del servidor:', response);

    if (response.data) {
      console.log('Datos de la respuesta:', response.data);

      if (response.data.reportes) {
        console.log('Reportes presentes en la respuesta:', response.data.reportes);

        this.response = response.data;

        console.log('ID del reporte:', response.data.reportes.id);
        console.log('Descripción del reporte:', response.data.reportes.descripcion);
        console.log('Fecha del reporte:', response.data.reportes.fecha);
        console.log('Usuario del reporte:', response.data.reportes.usuario);
        console.log('Nombre del usuario:', response.data.reportes.usuario.nombre);
        console.log('Reporte en sí:', response.data.reportes.reporte);
        console.log('Nombre del reporte:', response.data.reportes.reporte.nombre);
      } else {
        console.error('La respuesta del servidor no contiene datos de reportes.');
      }
    } else {
      console.error('La respuesta del servidor no contiene datos.');
    }
  } catch (error) {
    console.error('Error al obtener la respuesta del servidor:', error);
  }
}

},






};
</script>
