<template>
    <div>
      <banner></banner>
    </div>
       

    <main>
        <v-carousel>
        <v-carousel-item
            v-for="(item, i) in items"
            :key="i"
        >
            <v-sheet
            :color="item.color"
            height="300">
            <v-row class="fill-height" align="center" justify="center">
                <v-col>
                <h1>{{ item.text }}</h1>
                </v-col>
            </v-row>
            </v-sheet>
        </v-carousel-item>
        </v-carousel>

        <v-card class="mx-auto" width="800" prepend-icon="mdi-home">
        <template v-slot:title> Publicaciones </template>

        <v-card-text> Sitio para publicar anuncios oficiales</v-card-text>
    </v-card>
    <br><br>
    <v-card theme="dark"
    max-width="800" class="mx-auto">
   <v-system-bar
      color="pink darken-2"
      dark
    >
      <v-spacer></v-spacer>

      <v-icon>mdi-window-minimize</v-icon>

      <v-icon>mdi-window-maximize</v-icon>

      <v-icon>mdi-close</v-icon>
    </v-system-bar>

    <v-container>
        <div class="border border-gray-400 rounded-lg shadow lg:flex">
      <div class="block h-full py-4 bg-blue-600 rounded-lg shadow-inner lg:w-2/12">
        <div class="tracking-wide text-center">
          <div class="text-4xl font-bold text-white ">24</div>
          <div class="text-2xl font-normal text-white">Sept</div>
        </div>
      </div>
      <div class="w-full px-1 py-5 tracking-wide bg-white lg:w-11/12 xl:w-full lg:px-2 lg:py-2">
        <div class="flex flex-row justify-center lg:justify-start">
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            <i class="far fa-clock"></i> 1:30 PM
          </div>
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            Organiser : IHC
          </div>
        </div>
        <div class="px-2 text-xl font-semibold text-center text-gray-800 lg:text-left">
          International Conference Dubai
        </div>

        <div class="px-2 pt-1 text-sm font-medium text-center text-gray-600 lg:text-left">
          A-142/1, A-142, Ganesh Nagar, Tilak Nagar, New Delhi, 110018
        </div>
      </div>
      <div class="flex flex-row items-center justify-center w-full px-2 py-4 bg-white lg:w-1/3 lg:justify-end lg:px-0">
        <span class="px-2 mx-2 text-sm font-semibold leading-loose tracking-wider text-gray-600 bg-gray-200 rounded">
          Going
        </span>
      </div>
    </div>
    </v-container>

  </v-card>
    
  <v-container>
        <div class="border border-gray-400 rounded-lg shadow lg:flex">
      <div class="block h-full py-4 bg-blue-600 rounded-lg shadow-inner lg:w-2/12">
        <div class="tracking-wide text-center">
          <div class="text-4xl font-bold text-white ">24</div>
          <div class="text-2xl font-normal text-white">Sept</div>
        </div>
      </div>
      <div class="w-full px-1 py-5 tracking-wide bg-white lg:w-11/12 xl:w-full lg:px-2 lg:py-2">
        <div class="flex flex-row justify-center lg:justify-start">
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            <i class="far fa-clock"></i> 1:30 PM
          </div>
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            Organiser : IHC
          </div>
        </div>
        <div class="px-2 text-xl font-semibold text-center text-gray-800 lg:text-left">
          International Conference Dubai
        </div>

        <div class="px-2 pt-1 text-sm font-medium text-center text-gray-600 lg:text-left">
          A-142/1, A-142, Ganesh Nagar, Tilak Nagar, New Delhi, 110018
        </div>
      </div>
      <div class="flex flex-row items-center justify-center w-full px-2 py-4 bg-white lg:w-1/3 lg:justify-end lg:px-0">
        <span class="px-2 mx-2 text-sm font-semibold leading-loose tracking-wider text-gray-600 bg-gray-200 rounded">
          Going
        </span>
      </div>
    </div>
    </v-container>
    <v-container>
        <div class="border border-gray-400 rounded-lg shadow lg:flex">
      <div class="block h-full py-4 bg-blue-600 rounded-lg shadow-inner lg:w-2/12">
        <div class="tracking-wide text-center">
          <div class="text-4xl font-bold text-white ">24</div>
          <div class="text-2xl font-normal text-white">Sept</div>
        </div>
      </div>
      <div class="w-full px-1 py-5 tracking-wide bg-white lg:w-11/12 xl:w-full lg:px-2 lg:py-2">
        <div class="flex flex-row justify-center lg:justify-start">
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            <i class="far fa-clock"></i> 1:30 PM
          </div>
          <div class="px-2 text-sm font-medium text-center text-gray-700 lg:text-left">
            Organiser : IHC
          </div>
        </div>
        <div class="px-2 text-xl font-semibold text-center text-gray-800 lg:text-left">
          International Conference Dubai
        </div>

        <div class="px-2 pt-1 text-sm font-medium text-center text-gray-600 lg:text-left">
          A-142/1, A-142, Ganesh Nagar, Tilak Nagar, New Delhi, 110018
        </div>
      </div>
      <div class="flex flex-row items-center justify-center w-full px-2 py-4 bg-white lg:w-1/3 lg:justify-end lg:px-0">
        <span class="px-2 mx-2 text-sm font-semibold leading-loose tracking-wider text-gray-600 bg-gray-200 rounded">
          Going
        </span>
      </div>
    </div>
    </v-container>

    </main>
    



    
  </template>
  
  


  <script>
  import banner from '../components/inicio.vue';
  
  export default {
    data() {
    return {
      items: [
        { text: 'Slide 1', color: 'blue' },
        { text: 'Slide 2', color: 'green' },
        { text: 'Slide 3', color: 'red' },
      ],
    };
  },


    components: {
      banner
    },
  };
  </script>
  
  <style >
   @import 'tailwindcss/base';
    @import 'tailwindcss/components';
    @import 'tailwindcss/utilities';
    main {
        
            margin-top: 60px; /* Ajusta el margen superior para dar espacio al banner */
            padding: 20px; /* Ajusta el espacio interior del contenido */
        }

        .my-carousel {
            max-width: 800px; 
            margin: 0 auto;    }

  </style>
  