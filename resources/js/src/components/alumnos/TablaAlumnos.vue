<template>
    <v-card class="mx-auto" max-width="auto">
        <v-container class="text-center">
          <v-autocomplete
                  label="Buscar alumno"
                  theme="dark"
                  :items="['Alumno']"
                  ></v-autocomplete>
                      </v-container>



      <v-card-item class="bg-orange-darken-4">
        <v-card-title> Directorio de Alumnos  </v-card-title>

        <template v-slot:append>
          <v-btn color="white" icon="mdi-plus" size="small"></v-btn>
        </template>
      </v-card-item>

      <v-card-text class="pt-4">
      Directorio de Alumnos
      </v-card-text>

      <v-divider></v-divider>

      <v-virtual-scroll :items="items" height="300" item-height="50">
        <template v-slot:default="{ item }">
          <v-list-item>
            <template v-slot:prepend>
              <v-avatar :color="item.color" class="text-white" size="40">
                {{ item.initials }}
              </v-avatar>
            </template>

            <v-list-item-title>{{ item.fullName }}</v-list-item-title>

            <template v-slot:append>
              <v-btn size="small" variant="tonal">
                VER ALUMNO

                <v-icon color="orange-darken-4" end> mdi-open-in-new </v-icon>
              </v-btn>
            </template>
          </v-list-item>
        </template>
      </v-virtual-scroll>
    </v-card>
  </template>

  <script>
    export default {
      data: () => ({
        colors: [
          '#2196F3',
          '#90CAF9',
          '#64B5F6',
          '#42A5F5',
          '#1E88E5',
          '#1976D2',
          '#1565C0',
          '#0D47A1',
          '#82B1FF',
          '#448AFF',
          '#2979FF',
          '#2962FF',
        ],
        names: [
        'Santiago López',
        'Valentina García',
        'Mateo Rodríguez',
        'Sofía Martínez',
        'Sebastián González',
        'Lucía Pérez',
        'Leonardo Torres',
        'Ximena Ramírez',
        'Diego Flores',
        'Regina Vargas',
        'Daniel Herrera',
        'Camila Silva',
        'Nicolás Morales',
        'Valeria Fernández',
        'Emiliano Pérez',
        'Victoria Mendoza',
        'Ángel Castro',
        'Renata Ríos',
        'Adrián Guzmán',
        'Renata Sánchez'
                ],
        surnames: [
        'González García',
        'López Martínez',
        'Ramírez Rodríguez',
        'Silva González',
        'Martínez Pérez',
        'Torres García',
        'Fernández López',
        'Flores González',
        'Sánchez Ramírez',
        'Herrera Mendoza',
        'Morales Silva',
        'Pérez Torres',
        'Vargas González',
        'Ríos López',
        'Castro Martínez',
        'García Silva',
        'Mendoza Pérez',
        'Guzmán Ramírez',
        'Martínez López',
        'Ríos García'
        ],
      }),

      computed: {
        items() {
          const namesLength = this.names.length
          const surnamesLength = this.surnames.length
          const colorsLength = this.colors.length

          return Array.from({ length: 100 }, () => {
            const name = this.names[this.genRandomIndex(namesLength)]
            const surname = this.surnames[this.genRandomIndex(surnamesLength)]

            return {
              color: this.colors[this.genRandomIndex(colorsLength)],
              fullName: `${name} ${surname}`,
              initials: `${name[0]} ${surname[0]}`,
            }
          })
        },
      },

      methods: {
        genRandomIndex(length) {
          return Math.ceil(Math.random() * (length - 1))
        },
      },
    }
  </script>


<style>


</style>