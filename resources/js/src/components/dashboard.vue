<template>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <header>

    <navegacion> </navegacion>

        </header>

        <body>

            <v-container class="bg-blue-950 ">
    <v-row justify="center">
        <v-col cols="12" lg="8">
        <v-card color="#476270" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">PUBLICACIONES</v-card-title>
              <v-card-subtitle>Manejador de Publicaciones</v-card-subtitle>
              <v-card-actions>
                <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                 ENTRAR
                </button>              </v-card-actions>
            </div>
            <v-avatar class="ma-3" size="125" rounded="0">
              <v-img src="https://www.agr.una.py/assets/images/iconos/publicaciones.png"></v-img>
            </v-avatar>
          </div>
        </v-card>
      </v-col>


      <v-col cols="12" lg="8">
        <v-card color="#770B2A" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">REPORTES</v-card-title>
              <v-card-subtitle>Manejador de Reportes</v-card-subtitle>
              <v-card-actions>
                <button  @click="$router.push('/editar-reportes')"  class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                 ENTRAR
                </button>



            </v-card-actions>
            </div>
            <v-avatar class="ma-3" size="125" rounded="0">
              <v-img src="https://cdn-icons-png.flaticon.com/512/2852/2852376.png"></v-img>
            </v-avatar>
          </div>
        </v-card>
      </v-col>

      <v-col cols="12" lg="8">
        <v-card color="#256325" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">ALUMNOS</v-card-title>
              <v-card-subtitle>SISTEMA</v-card-subtitle>
              <v-card-actions>
                <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                 ENTRAR
                </button>
              </v-card-actions>
            </div>
            <v-avatar class="ma-5" size="125"  rounded="2">
                <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
            style="background-image: url('https://www.escenachiapas.com/wp-content/uploads/2019/06/FOTO-BOLET%C3%8DN-COBACH-2-3.jpg');">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


            </div>
        </article>
     </v-avatar>
          </div>
        </v-card>
      </v-col>
      <v-col cols="12" lg="8">
        <v-card color="#0B1877" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">BOLETAS</v-card-title>
              <v-card-subtitle>SISTEMA</v-card-subtitle>
              <v-card-actions>
                <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                 ENTRAR
                </button>
              </v-card-actions>
            </div>
            <v-avatar class="ma-5" size="125"  rounded="2">
                <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
            style="background-image: url('https://calificacionessep.online/wp-content/uploads/2023/07/Calificaciones-de-preparatoria-SEP.jpg');">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


            </div>
        </article>
     </v-avatar>
          </div>
        </v-card>
      </v-col>

      <v-col cols="12" lg="8">
        <v-card color="#078559" theme="dark">
          <div class="flex-no-wrap d-flex justify-space-between">
            <div>
              <v-card-title class="text-h5">SECCIONES</v-card-title>
              <v-card-subtitle>SISTEMA</v-card-subtitle>
              <v-card-actions>
                <button class="w-32 h-10 p-2 font-semibold text-white transition-all duration-200 ease-in-out rounded-r-full min-w-auto bg-sky-800 hover:bg-green-500 hover:flex-grow">
                 ENTRAR
                </button>
              </v-card-actions>
            </div>
            <v-avatar class="ma-5" size="125"  rounded="2">
                <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl "
            style="background-image: url('https://cdn-icons-png.flaticon.com/512/1627/1627294.png');">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/bd.png" 	style=" z-index: -1;"		alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-white bg-opacity-10 group-hover:opacity-75">
            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">


            </div>
        </article>
     </v-avatar>
          </div>
        </v-card>
      </v-col>

    </v-row>
  </v-container>


    <div class="h-full mb-10 ml-14 mt-14 md:ml-64 bg-sky-800 " style=" z-index: -1;">

        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4" style=" z-index: -1;">

        <article class="relative w-full h-40 overflow-hidden transition duration-500 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
            style="background-image: url('https://scontent-qro1-1.xx.fbcdn.net/v/t1.6435-9/118988297_924535877956405_7357496037096699677_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=e3f864&_nc_ohc=PtFLKGCFv08AX994twK&_nc_ht=scontent-qro1-1.xx&oh=00_AfDpGJA3_oVykRab4e1FW8tgdW3-ezYLj_KizPW_BplE7A&oe=653054BA'); ">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/estudiantes.png" 			alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75">

            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">

                <h3 class="text-center">
                    <a class="text-2xl font-bold text-center text-white" href="#">
                        <span class="absolute inset-0"></span>
                        SECCIONES
                        <div class="relative flex items-center cursor-pointer group">
                            <button @click="subiralumno" class="text-sm font-medium leading-6 text-white uppercase">ALUIMNOS</button>
                        </div>
                    </a>

                </h3>
            </div>
        </article>

        <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
            style="background-image: url('https://insyde.org.mx/wp-content/uploads/2019/08/banner_publicaciones-1800x469.jpg');">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/publicaciones.png" 			alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75">

            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">

                <h3 class="text-center">
                    <a class="text-2xl font-bold text-center text-white" href="#">
                        <span class="absolute inset-0"></span>
                        Publicaciones
                        <div class="relative flex items-center cursor-pointer group">
                            <button @click="subiralumno" class="text-sm font-medium leading-6 text-white uppercase">PUBLICACIONES</button>
                        </div>
                    </a>

                </h3>
            </div>
        </article>

        <article class="relative w-full h-40 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
            style="background-image: url('https://calificacionessep.online/wp-content/uploads/2023/07/Calificaciones-de-preparatoria-SEP.jpg');">
            <img class="absolute bottom-0 right-1 w-[4rem] h-[4rem] transition duration-300 group-hover:scale-[1.4]" src="https://www.agr.una.py/assets/images/iconos/encuestas.png" 			alt="" />

            <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75">

            </div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">

                <h3 class="text-center">
                    <a class="text-2xl font-bold text-center text-white" href="#">
                        <span class="absolute inset-0"></span>
                        Boletas
                        <div class="relative flex items-center cursor-pointer group">
                            <button @click="subiralumno" class="text-sm font-medium leading-6 text-white uppercase">BOLETAS</button>
                        </div>
                    </a>

                </h3>
            </div>
        </article>

</div>


</div>

</body>

</template>


<script>

</script>