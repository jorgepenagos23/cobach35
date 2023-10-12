<template>
    <div>
      <banner></banner>
    </div>
       

    <main>
<v-container >
  
     
    <v-card theme="light" max-width="800" class="mx-auto">
        <v-card width="320" theme="light" class="mx-auto mt-5">
      <v-card-title class="pb-0">
        <v-img
        src="https://play-lh.googleusercontent.com/X2YowxHVznInuQ23NaoE_rbS7Kq3V0nhnRbxUm7YHcHIndNNXAcG5hKg6nxD5930_w" 
        max-height="150" 
        max-width="150"
        aspect-ratio="1"
        class="mx-auto"
        />
      
        <h1>Iniciar Sesion</h1>
      </v-card-title>
      <v-card-text>
        <v-form>
          <v-text-field 
            label="Username" 
            prepend-icon="mdi-account-circle"
          />
          <v-text-field 
            :type="showPassword ? 'text' : 'password'" 
            label="Contrasena"
            prepend-icon="mdi-lock"
            :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="showPassword = !showPassword"
          />
        </v-form>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn color="info">Entrar</v-btn>
      </v-card-actions>
    </v-card>
  </v-card>
</v-container>
    </main>

  </template>
  


  <script>
  import banner from '../components/inicio.vue';
  
  export default {
    data () {
    return {
      showPassword: false
    }
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


        
  </style>
  