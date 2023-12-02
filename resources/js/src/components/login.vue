<template>
  <div>
    <banner></banner>
  </div>

  <div class="group relative w-200 overflow-hidden rounded-[16px] bg-gradient-to-bl from-blue-800 to-sky-900 p-[1px] transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:via-blue-700 hover:to-green-500">
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
      
        
            <form @submit.prevent="login">
              <v-theme-provider theme="success" with-background class="pa-5">
              <v-card title="Iniciar Sesion" subtitle="Sistema "></v-card>
            </v-theme-provider>
              <v-text-field v-model="email" label="Usuario "
              variant="outlined"

              prepend-icon="mdi-card-account-mail" />
              <v-text-field
                v-model="password"
                :type="showPassword ? 'text' : 'password'"
                label="Contraseña"
                variant="outlined"
                prepend-icon="mdi-lock"
                :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off-outline'"
                @click:append="showPassword = !showPassword"
              />

              <button type="submit" class="flex items-center p-2 px-6 text-xl font-thin tracking-widest text-black bg-transparent btn group">
                <span class="relative pr-4 pb-1 text-black after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[2px] after:w-full after:origin-bottom-right after:scale-x-0 after:bg-green-500 after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Entrar</span>
                <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal" class="transition-all duration-300 ease-out -translate-x-2 fill-slate-700 group-hover:translate-x-1 group-hover:scale-x-105 group-hover:fill-white">
                  <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                </svg>
              </button>
           
            </form>
          
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <!-- ... (botón de Entrar) ... -->
          </v-card-actions>
        </v-card>
      </v-card>
    </v-container>

    <v-footer app>
      <v-container>
        <v-row>
          <v-col>
            <v-row>
              <v-col>
                <!-- Contenido del footer -->
                <p class="text-center">© 2023 Tu Empresa. Todos los derechos reservados.</p>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-footer>
  </div>
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
              timer: 1000,
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
