<template>
  <div>
    <banner></banner>
  </div>

  <main>
    <v-container >
      <v-card theme="light" max-width="800" class="mx-auto ">
        <v-card width="320" theme="light" class="mx-auto mt-5">
          <v-card-title class="pb-0">
            <v-img
              src="https://play-lh.googleusercontent.com/X2YowxHVznInuQ23NaoE_rbS7Kq3V0nhnRbxUm7YHcHIndNNXAcG5hKg6nxD5930_w"
              max-height="150"
              max-width="150"
              aspect-ratio="1"
              class="mx-auto"
            />
          
          </v-card-title>
          <v-card-text>
         <div class="centered-content">
          

            <form @submit.prevent="login">
              <v-theme-provider theme="success" with-background class="pa-5">
              <v-card title="Iniciar Sesion" subtitle="Sistema "></v-card>
            </v-theme-provider>
              <v-text-field v-model="email" label="Correo Electrónico" prepend-icon="mdi-email" />
              <v-text-field
                v-model="password"
                :type="showPassword ? 'text' : 'password'"
                label="Contraseña"
                prepend-icon="mdi-lock"
                :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="showPassword = !showPassword"
              />
              <button class="w-72 border bg-[#d63434] p-2 text-white shadow-xl font-sans" type="submit">
                Entrar
              </button>
            </form>
          </div>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <!-- ... (botón de Entrar) ... -->
          </v-card-actions>
        </v-card>
      </v-card>
    </v-container>
  </main>
</template>

<style>
.centered-content {
  display: flex;
  text-align: center;
 justify-content: center;
  height: auto; /* Elimina la altura fija para que el contenido se ajuste automáticamente */
}
</style>

<script>
import banner from "../components/inicio.vue";
import Swal from 'sweetalert2';


export default {
  
  data() {
    return {
      email: "",
      password: "",
      user:{} ,
      showPassword: false,
    };
  },
  methods: {
    
    login() {
      axios.post("/api/v1/login", {
    email: this.email,
    password: this.password,
}, {
    headers: {
        'Accept': 'application/json',
        'Authorization':'accessToken'
    }
})
.then((response) => {


            // Accede a los datos en la respuesta
            const status = response.data.status;
            const accessToken = response.data.access_token;
            const user = response.data.user;

            // Hacer lo que necesites con estos datos
            console.log("Estado:", status);
            console.log("Token de acceso:", accessToken);
            console.log("Datos del usuario:", user);

            // Guarda los datos en el estado de tu componente Vue (si es necesario)
            this.status = status;
            this.accessToken = accessToken;
            this.userData = user;
            if(response){

    
    Swal.fire({
              icon: "success",
              title: "Bienvenido!",
              text: "Has iniciado sesión exitosamente.",
              showConfirmButton: false,
              timer: 2000,
            });
  }
  
    console.log("Datos de inicio de sesión:", this.email, this.password, this.token);
    this.$router.push('/dashboard');

    
})
.catch((error) => {
    console.error("Error al iniciar sesión:", error);
});
    },
  },
  components: {
    banner,
  },
 
};

</script>
