<template>
    <div>
      <header>
        <navegacion></navegacion>
      </header>
      <v-app>
        <appbar></appbar>
        <h1>CONTENIDOS DE LAS SECCIONES</h1>



        
        <v-dialog v-model="dialog" max-width="600">
  <v-card>
    <v-card-title>Editar Sección</v-card-title>
    <v-card-text>
      <form @submit.prevent="guardarCambios">
        <v-text-field v-model="seccionEditada.nombre" label="Nombre"></v-text-field>
        <v-textarea v-model="seccionEditada.nombre_subseccion" label="Subsección"></v-textarea>
        <v-text-field v-model="seccionEditada.fecha" label="Fecha" type="date"></v-text-field>

        <!-- Imagen -->
        <div class="div-botones">
          <v-col cols="19">
            <label class="block text-sm font-medium text-gray-700">Imagen:</label>
            <input type="file" id="imagenFile" @change="handleFileUpload" accept="image/*">
          </v-col>
        </div>

        <!-- Otros campos del formulario, si los hay -->

        <v-card-actions>
          <v-btn
            prepend-icon="mdi-check-circle"
            color="blue darken-4"
            density="compact"
            hide-details
            inline
            inset
            type="submit"
          >
            <template v-slot:prepend>
              <v-icon color="success"></v-icon>
            </template>
            Guardar
            <template v-slot:append>
              <v-icon color="warning"></v-icon>
            </template>
          </v-btn>
          <v-btn color="red darken-4" @click="eliminarSeccion">Eliminar</v-btn>
          <v-btn @click="cerrarDialog">Cancelar</v-btn>
        </v-card-actions>
      </form>
    </v-card-text>
  </v-card>
</v-dialog>



        
        <table class="min-w-full table-auto">
          <thead class="justify-between">
            <tr class="bg-gray-800">
              <th class="px-16 py-2">
                <span class="text-gray-300">ID</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Nombre Contenido Seccion Principal</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Descripcion</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Acciones Contenido</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Fecha</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Publicador</span>
              </th>
              <th class="px-16 py-2">
                <span class="text-gray-300">Imagen</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="seccion in contenido" :key="seccion.id" class="bg-gray-100 border-b hover:bg-orange-100">
              <td class="px-16 py-2">{{ seccion.id }}</td>
              <td class="px-16 py-2 text-justify">{{ seccion.titulo }}</td>
              <td class="px-16 py-2 text-justify">{{ seccion.descripcion }}</td>
              <td class="px-16 py-2">
                <v-btn class="px-4 py-2 m-2" color="blue" dark @click="mostrarDialogSeccion(seccion)">
                  Editar contenido
                </v-btn>
              </td>
              <td class="px-16 py-2">{{ seccion.fecha }}</td>
              <td class="px-16 py-2">{{ seccion.publicador }}</td>
              <td class="px-16 py-2">
                <img :src="seccion.imagen" alt="Imagen" class="object-cover w-full rounded h-50">
              </td>
            </tr>
          </tbody>
        </table>
      </v-app>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import navegacion from "./barra_navegacion.vue";
  import appbar from "./app_bar.vue";
  
  export default {
    data() {
      return {
        contenido: [],
        dialog: false,
        seccionEditada: {
          id: null,
          nombre: '',
      nombre_subseccion: '',
      fecha: '',   // Agrega la propiedad fecha
      imagen: '',  // Agrega la propiedad imagen
      visible: true,
        },
      };
    },
    components: {
      navegacion,
      appbar,
    },
    created() {
      this.obtenerSecciones();
    },
    methods: {
        handleFileUpload(event) {
  this.seccionEditada.imagenFile = event.target.files[0];
  this.manejadorImagen();
},

manejadorImagen() {
  const file = this.seccionEditada.imagenFile;
  if (file) {
    this.seccionEditada.imagen = URL.createObjectURL(file);
  }
},


      obtenerSecciones() {
        axios.get('/api/v1/contenido')
          .then(response => {
            this.contenido = response.data.contenido;
          })
          .catch(error => {
            console.error('Hubo un error', error);
          });
      },
  
      mostrarDialogSeccion(seccion) {
        this.seccionEditada.id = seccion.id;
        this.seccionEditada.nombre = seccion.titulo;
        this.seccionEditada.nombre_subseccion = seccion.descripcion;
        this.seccionEditada.imagenFile = null; // Asegúrate de inicializarlo correctamente si es necesario

        
        this.seccionEditada.visible = true;
        this.dialog = true;
      },
  
      mostrarDialogSubseccion(seccion, subseccion) {
        console.log('Mostrar acciones de la subsección:', subseccion, 'de la sección:', seccion);
        this.dialog = true;
      },
  
      cerrarDialog() {
        this.dialog = false;
      },
  

      
      guardarCambios() {
  // Imprime los datos antes de enviar la solicitud
  console.log('Datos a enviar:', {
    titulo: this.seccionEditada.nombre,
    descripcion: this.seccionEditada.nombre_subseccion,
    fecha: this.seccionEditada.fecha,
    imagenFile: this.seccionEditada.imagen = '/storage/images/contenidos/nombre_personalizado.jpg'
  });

  axios.put(`/api/v1/contenido/update/${this.seccionEditada.id}`, {
    titulo: this.seccionEditada.nombre,
    descripcion: this.seccionEditada.nombre_subseccion,
    fecha: this.seccionEditada.fecha,
  })
    .then(response => {
      Swal.fire({
        icon: 'success',
        title: 'Se ha actualizado exitosamente',
        showConfirmButton: true,
        timer: 3000,
      });
      this.dialog = false; // Cierra el diálogo después de guardar
      this.obtenerSecciones(); // Actualiza la lista después de editar
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Error al guardar los cambios',
        showConfirmButton: true,
        timer: 3000,
      });
      console.error('Error al guardar los cambios:', error.response);
    });
},

    },
  };
  </script>
  
  <style>
  </style>
  