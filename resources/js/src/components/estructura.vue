<template>
  <div>
    <v-dialog v-model="dialog" max-width="600">
      <v-card>
    <v-card-title>Editar Sección</v-card-title>
    <v-card-text>
      <!-- Campo de texto para editar el nombre -->
      <v-text-field v-model="seccionEditada.nombre" label="Nombre"></v-text-field>

      <!-- Campo de texto para editar la subsección -->
      <v-text-field v-model="seccionEditada.nombre_subseccion" label="Subsección"></v-text-field>

      <!-- Contenido del diálogo para la visibilidad -->
      <v-radio-group v-model="seccionEditada.visible">
        <v-radio label="Visible" :value="true"></v-radio>
        <v-radio label="No Visible" :value="false"></v-radio>
      </v-radio-group>
    </v-card-text>
    <v-card-actions>
      <!-- Botón para guardar los cambios -->
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

      <!-- Botón para eliminar la sección -->
      <v-btn color="red darken-4" @click="eliminarSeccion">Eliminar</v-btn>

      <!-- Botón para cancelar la edición -->
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
            <!-- Verifica si hay subsecciones y muestra sus nombres -->
            <span v-if="seccion.subsecciones.length > 0">
              <span v-for="(subseccion, index) in seccion.subsecciones" :key="index">
                {{ subseccion.nombre_subseccion }}
                <!-- Agrega una coma después de cada nombre de subsección, excepto el último -->
                <span v-if="index < seccion.subsecciones.length - 1">, </span>
              </span>
            </span>
            <!-- Si no hay subsecciones, muestra "N/A" -->
            <span v-else>No hay subsecciones</span>
          </td>
          <td class="px-16 py-2">
            <!-- Botón para editar la sección -->
            <v-btn class="px-4 py-2 m-2" color="blue" dark @click="mostrarDialogSeccion(seccion)">
              Editar Sección
            </v-btn>
          </td>
          <td class="px-16 py-2">
            <!-- Lista de chips para editar cada subsección -->
            <v-chip v-for="(subseccion, index) in seccion.subsecciones" :key="index" class="m-2" @click="mostrarDialogSubseccion(seccion, subseccion)">
              Editar {{ subseccion.nombre_subseccion }}
            </v-chip>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
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
      // Lógica para mostrar el diálogo de acciones de la sección
      console.log('Mostrar acciones de la sección:', seccion);
      this.dialog = true;
    },
    mostrarDialogSubseccion(seccion, subseccion) {
      // Lógica para mostrar el diálogo de acciones de la subsección
      console.log('Mostrar acciones de la subsección:', subseccion, 'de la sección:', seccion);
      this.dialog = true;
    },
    cerrarDialog() {
      // Lógica para cerrar el diálogo
      this.dialog = false;
    },
  },
};
</script>

<style>
/* Estilos personalizados si es necesario */
</style>
