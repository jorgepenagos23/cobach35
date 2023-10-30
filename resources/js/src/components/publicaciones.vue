
<template>
   <div>
    <banner></banner>
  </div>

  <main>
 
    <div>
    <h1 class="text-4xl font-bold text-gray-800 lg:px-20 md:px-10 lg:mx-40 md:mx-20">
      Publicaciones
    </h1>
    <v-carousel cycle hide-delimiters>
      <v-carousel-item v-for="publicacion in publicaciones" :key="publicacion.id">
        <v-card max-width="300" class="mx-auto">
          <v-img :src="publicacion.imagen" aspect-ratio="16/9"></v-img>
          <v-card-title>{{ publicacion.titulo }}</v-card-title>
          <v-card-text>{{ publicacion.descripcion }}</v-card-text>
          <v-card-actions>
            <v-btn text color="blue">Leer más</v-btn>
          </v-card-actions>
        </v-card>
      </v-carousel-item>
    </v-carousel>


    <listcomponent></listcomponent>
    
  </div>
      



  
</main>

</template>


<script>
import banner from '../components/inicio.vue';
import axios from 'axios';
import listcomponent from '../components/ListComponent.vue'
export default {
mounted(){

},
  
  data() {

    
    return {
      items: [
        { text: 'Slide 1', color: 'white', image: 'https://i.ytimg.com/vi/lZ-D6vgcie0/maxresdefault.jpg' },
        { text: 'Slide 2', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1N5xmc3hGjYTCZMnzaMoTRZe80LlEBH8z0w&usqp=CAU' },
        { text: 'Slide 3', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThLrpEm8LVg2Y8GeINyUAlzavtT4lFvr4pFA&usqp=CAU' },
      ],
      publicaciones: [],
    };
  },
  components: {
    banner,
    listcomponent,
  },
  created() {
    this.cargarPublicaciones();
  },
  methods: {
    cargarPublicaciones() {
      axios.get('http://127.0.0.1/api/v1/publicacion')
        .then((response) => {
          console.log(response)
          this.publicaciones = response.data.publicaciones;
          console.log(this.publicaciones)

        })
        .catch((error) => {
          console.error('Error al cargar las publicaciones:', error);
        });
    },

  },

};



</script>

<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
main {
  margin-top: 20px; /* Adjust the top margin to make space for the banner */
  padding: 20px; /* Adjust the interior space of the content */
}

.my-carousel {
  max-width: 800px;
  margin: 0 auto;
}

.carousel-image {
  height: 600px; /* Set a fixed height for the images within the carousel */
}



</style>
