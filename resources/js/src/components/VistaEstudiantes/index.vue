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

                  <v-card>
                    <div class="overflow-x-auto">
              <table class="w-full overflow-hidden bg-white divide-y divide-gray-200 rounded-md shadow-md">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">ID</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Descripción</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="reporte in reportes" :key="reporte.id" class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ reporte.id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ reporte.descripcion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ reporte.fecha }}</td>
                  </tr>
                </tbody>
              </table>
            </div>




                  
                </v-card>
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
import axios, { Axios } from "axios";
import appbar from "../app_bar.vue";
import barra from "../VistaEstudiantes/dashboard.vue";
import Swal from 'sweetalert2';

export default {
  data: () => ({
    combinedData: [], // Almacena datos combinados de usuarios y alumnos
    alumnoYUsuario: [], // Almacena datos combinados de un alumno y su usuario
    panel: [0, 1],
      disabled: false,
    matricula:null,
    boletas: [],
    reportes: [],

  }),

  components: {
    appbar,
    barra,
  },


  
  created() {
    // Realiza una solicitud GET para obtener los datos de usuario y su matrícula desde el servidor
    axios.get('/api/user/')
      .then(response => {
        // Asumiendo que la matrícula del usuario se encuentra en la propiedad "matricula" de la respuesta
        const matriculaDelUsuario = response.data.matricula;
        console.log(response)

        const matricula = response.data.matricula;
        console.log('esta es tu matricula',matricula);
          


        
        // Ahora puedes usar "matriculaDelUsuario" en tu filtro
        axios.get('/api/user/index2')
          .then(response => {
            this.combinedData = response.data; // Asigna los datos combinados a combinedData

            // Filtra y muestra solo el usuario cuya matrícula coincide con matriculaDelUsuario
            this.alumnoYUsuario = this.combinedData.filter(dataItem =>
              dataItem.user.matricula === matriculaDelUsuario
            
              
              
            );

            // Lógica para obtener las iniciales del nombre completo
            this.alumnoYUsuario = this.alumnoYUsuario.map(dataItem => {
              // Separa el nombre completo en palabras
              const palabras = dataItem.alumno.nombre_completo.split(' ');

              // Obtiene la primera letra de cada palabra y las une en un string
              const iniciales = palabras.map(palabra => palabra.charAt(0)).join('');

              // Actualiza el objeto dataItem con las iniciales
              dataItem.initials = iniciales;

              return dataItem;
            });
          })
          .catch(error => {
            console.error('Error al obtener los datos combinados:', error);
          });
      })
      .catch(error => {
        console.error('Error al obtener la matrícula del usuario:', error);
      });



      this.obtenerMatricula();

      this.obtenerReportes();

          
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


obtenerReportes(){
  console.log('Matrícula en funcion reporte:', this.matriculaDelUsuario);

axios.get('/api/obtener-reporte/'+this.matriculaDelUsuario)
.then(response => {
  this.reportes = response.data.reportes;

  console.log('reportes hallados',response.data)
   // Ejemplo de condición para mostrar una notificación
   if (this.reportes.length > 0) {
            // Muestra una notificación utilizando SweetAlert2
            Swal.fire({
              icon: 'info',
              title: 'Información',
              text: 'Tienes un reporte  Notifica a tus tutores ',
            });
          }


  
  
})


.catch(error =>{
console.error('error al obtener el reporte',error)

}
)
  
},



}


  
};
</script>
