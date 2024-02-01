<template>
      <header>
      <navegacion></navegacion>
    </header>
    <v-app>

  <div>
      <appbar></appbar> 
   
    <v-dialog v-model="dialog" max-width="600">
      <v-card>
    <v-card-title>Editar Sección</v-card-title>
    <v-card-text>
      <v-text-field v-model="seccionEditada.nombre" label="Nombre"></v-text-field>

      <v-text-field v-model="seccionEditada.nombre_subseccion" label="Subsección"></v-text-field>

      <!-- Contenido del diálogo para la visibilidad -->
      <v-radio-group v-model="seccionEditada.visible">
        <v-radio label="Visible" :value="true"></v-radio>
        <v-radio label="No Visible" :value="false"></v-radio>
      </v-radio-group>
    </v-card-text>
    <v-card-actions>
      <v-btn
        prepend-icon="mdi-check-circle"
        color="blue-darken-4"
        density="compact"
        hide-details
        inline
        inset
        @click="guardarCambios"
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
  </v-card>
    </v-dialog>

    <table class="min-w-full table-auto">
      <thead class="justify-between">
        <tr class="bg-gray-800">
          <th class="px-16 py-2">
            <span class="text-gray-300">ID</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Nombre Sección</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Nombre Subsección</span>
          </th>
       
          <th class="px-16 py-2">
            <span class="text-gray-300">Acciones Sección</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Acciones Subsección</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="seccion in secciones_todos" :key="seccion.id" class="bg-gray-100 border-b hover:bg-orange-100">
          <td class="px-16 py-2">{{ seccion.id }}</td>
          <td class="px-16 py-2">{{ seccion.nombre }}</td>
          <td class="px-16 py-2">
            <span v-if="seccion.subsecciones.length > 0">
              <span v-for="(subseccion, index) in seccion.subsecciones" :key="index">
                {{ subseccion.nombre_subseccion }}
                <span v-if="index < seccion.subsecciones.length - 1">, </span>
              </span>
            </span>
            <span v-else>No hay subsecciones</span>
          </td>
          <td class="px-16 py-2">
            <v-btn class="px-4 py-2 m-2" color="blue" dark @click="mostrarDialogSeccion(seccion)">
              Editar Sección
            </v-btn>
          </td>
          <td class="px-16 py-2">
            <v-chip v-for="(subseccion, index) in seccion.subsecciones" :key="index" class="m-2" @click="mostrarDialogSubseccion(seccion, subseccion)">
              Editar {{ subseccion.nombre_subseccion }}
            </v-chip>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</v-app>
</template>

<script>
import axios from 'axios';
import navegacion from "./barra_navegacion.vue";
import appbar from "./app_bar.vue";

export default {
  data() {
    return {
      secciones_todos: [],
      dialog: false,

      seccionEditada: {
      id: null,
      nombre: '',
      nombre_subseccion: '',
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
    obtenerSecciones() {
      axios.get('/api/v1/secciones_todas')
        .then(response => {
          this.secciones_todos = response.data.secciones_todos;
        })
        .catch(error => {
          console.error('Hubo un error', error);
        });
    },
    mostrarDialogSeccion(seccion) {
      console.log('Mostrar acciones de la sección:', seccion);
      this.dialog = true;
    },
    mostrarDialogSubseccion(seccion, subseccion) {
      console.log('Mostrar acciones de la subsección:', subseccion, 'de la sección:', seccion);
      this.dialog = true;
    },
    cerrarDialog() {
      this.dialog = false;
    },
  },
};
</script>

<style>
</style>
