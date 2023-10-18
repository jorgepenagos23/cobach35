<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
        expand-on-hover
        rail
      >
        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            title="Sandra Adams"
            subtitle="sandra_a88@gmailcom"
          ></v-list-item>
        </v-list>


        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-star" title=" Inicio " @click="$router.push('/dashboard')"></v-list-item>
          <v-list-item prepend-icon="mdi-account-multiple" title="Shared with me" value="shared"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Starred" value="starred"></v-list-item>
          <v-list-item prepend-icon="mdi-star" title="Salir" @click="logout"></v-list-item>

        </v-list>
      </v-navigation-drawer>

    </v-layout>
  </v-card>
</template>




<script>
import banner from "../components/inicio.vue";

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
        })
        .then((response) => {
          console.log("Dce");
   
          this.$router.push('/dashboard');
        })

        .catch((error) => {
          console.error("Error al  cerrar iniciar sesión:", error);
        });
    },
  },
  components: {
    banner,
  },
 
};
</script>
