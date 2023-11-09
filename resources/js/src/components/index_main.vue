<template>
 <header>
      <navegacion></navegacion>
    </header>
    <v-app>
      <appbar></appbar>
  
  <v-container id="dashboard" fluid tag="section" class="bg-lime-accent-4





">
    <v-row>
      <v-col cols="12" lg="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-r from-emerald-400 to-cyan-400">
          <v-card title=" " theme="light">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">PUBLICACIONES</v-card-title>
                    <v-card-subtitle>Manejador de Publicaciones</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/index_publicaciones')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://cdn-icons-png.flaticon.com/128/929/929115.png"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>

      <v-col cols="12" lg="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-tr from-slate-900 to-slate-700">            <v-card title=" " theme="dark">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">ALUMNOS</v-card-title>
                    <v-card-subtitle>Manejador de Alumnos</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main_alumnos')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://cdn-icons-png.flaticon.com/512/3596/3596788.png"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>

      <v-col cols="12" lg="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-r from-emerald-400 to-cyan-400">
          <v-card title=" " theme="light">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">REPORTES</v-card-title>
                    <v-card-subtitle>Manejador de Reportes</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main-reportes')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://cdn-icons-png.flaticon.com/256/1482/1482599.png"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>

  
      <v-col cols="12" sm="6" lg="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-tr from-slate-900 to-slate-700">            <v-card title=" " theme="dark">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">SECCIONES</v-card-title>
                    <v-card-subtitle>Manejador de Secciones</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main-secciones')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBwu_JVV9ppd86KmxFztDP3hfBisRCa-WuVg&usqp=CAU"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>


      <v-col cols="12" md="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-r from-emerald-400 to-cyan-400">
          <v-card title=" " theme="light">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">BOLETAS</v-card-title>
                    <v-card-subtitle>Manejador de Boletas</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main-boletas')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://cdn-icons-png.flaticon.com/128/9554/9554398.png"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>

      <v-col cols="12" md="6">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-tr from-slate-900 to-slate-700">       
               <v-card title=" " theme="dark">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="light">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">USUARIOS</v-card-title>
                    <v-card-subtitle>Manejador de Usuarios</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main-usuarios')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBwu_JVV9ppd86KmxFztDP3hfBisRCa-WuVg&usqp=CAU"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>

      <v-col cols="23" md="9">
        <div class="flex items-center justify-center w-full h-56 lg:h-50 rounded-xl focus:outline-none bg-gradient-to-tr from-slate-900 to-slate-700">     
         <v-card title=" " theme="light">
            <v-col cols="20" sm="50" md="23" lg="23" rows="2">
              <v-card color="#0d1b2a" theme="primary">
                <div class="flex-no-wrap d-flex justify-space-between">
                  <div>
                    <v-card-title class="text-h5">DESCARGAS</v-card-title>
                    <v-card-subtitle>Manejador de Contenidos Descargables</v-card-subtitle>
                    <v-card-actions>
                      <button @click="$router.push('/main-descargas')" class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                        ENTRAR
                      </button>
                    </v-card-actions>
                  </div>
                  <v-avatar class="ma-3" size="125" rounded="0">
                    <v-img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBwu_JVV9ppd86KmxFztDP3hfBisRCa-WuVg&usqp=CAU"></v-img>
                  </v-avatar>
                </div>
              </v-card>
            </v-col>
          </v-card>
        </div>
      </v-col>
      
    </v-row>
  </v-container>
    </v-app>
</template>


<script>
import navegacion from "../components/barra_navegacion.vue";
import appbar from "../components/app_bar.vue";

export default {
  components: {
    navegacion,
    appbar,
  },
  methods: {
    // Métodos de tu componente si es necesario
  },
};
</script>