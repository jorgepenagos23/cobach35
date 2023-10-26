<template>
  <div>
    <banner></banner>
  </div>

  <main>
    <v-carousel>
      <v-carousel-item v-for="(item, i) in items" :key="i">
        <v-sheet :color="item.color" height="300">
          <v-row class="fill-height" align="center" justify="center">
            <v-col>
              <!-- Add an image with a fixed height and src attribute from the internet -->
              <img :src="item.image" alt="Slide Image" class="carousel-image" />
              <h1>{{ item.text }}</h1>
            </v-col>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
    
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


    <header class="bg-white dark:bg-gray-800">


<div class="container flex flex-col px-6 py-4 mx-auto space-y-6 md:h-128 md:py-16 md:flex-row md:items-center md:space-x-6">
    <div class="flex flex-col items-center w-full md:flex-row md:w-1/2">
        <div class="flex justify-center order-2 mt-6 md:mt-0 md:space-y-3 md:flex-col">
            <button class="w-3 h-3 mx-2 bg-blue-500 rounded-full md:mx-0 focus:outline-none"></button>
            <button class="w-3 h-3 mx-2 bg-gray-300 rounded-full md:mx-0 focus:outline-none hover:bg-blue-500"></button>
            <button class="w-3 h-3 mx-2 bg-gray-300 rounded-full md:mx-0 focus:outline-none hover:bg-blue-500"></button>
            <button class="w-3 h-3 mx-2 bg-gray-300 rounded-full md:mx-0 focus:outline-none hover:bg-blue-500"></button>
        </div>

        <div class="max-w-lg md:mx-12 md:order-2">
            <h1 class="text-3xl font-medium tracking-wide text-gray-800 dark:text-white md:text-4xl">BANNER</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Espacio para publicaciones y Anuncios Oficiales de la Institucion</p>
            <div class="mt-6">
                <a href="#" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-blue-500 rounded-md md:inline hover:bg-blue-400">DESCARGA</a>
            </div>
        </div>
    </div>

    <div class="grid w-4/6 p-8 m-auto text-center bg-gray-200 border rounded-lg hero md:grid-cols-2 bg-opacity-90">
                                <img class="m-auto rounded-lg icon" src="http://35tuxtlanorte.edu.mx/images/portfolio/02.jpg" alt="" />
                                <div class="p-5 m-auto text-lg text md:ml-5 md:text-left">
                                    <div class="mb-3 text-3xl font-semibold head">INSCRIPCIONES ABIERTAS</div>
                                    <div class="desc">Incripciones abiertas </div>
                                </div>
                                </div>
</div>
</header>

<div class="flex flex-col m-auto bg-blue-200 p-auto">
<h1
    class="flex px-5 py-5 mx-5 text-4xl font-bold text-gray-800 lg:px-20 md:px-10 lg:mx-40 md:mx-20" >
    Publicaciones
  </h1>
  <div
    class="flex pb-10 overflow-x-scroll hide-scroll-bar">
    <div class="flex ml-10 flex-nowrap lg:ml-40 md:ml-20 " >


      <div class="inline-block px-3">
     <div class="w-64 h-64 max-w-xs overflow-hidden transition-shadow duration-300 ease-in-out bg-white rounded-lg shadow-md hover:shadow-xl">
     <div>
    <h2 class="font-medium text-gray-800 dark:text-white ">Publicacion 1 </h2>
        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">Entrada 8 PM</p>
      </div>

     <div class="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
      Vespertino
    </div>





 </div>
      </div>
      <div class="inline-block px-3">
        <div class="w-64 h-64 max-w-xs overflow-hidden transition-shadow duration-300 ease-in-out bg-white rounded-lg shadow-md hover:shadow-xl">
            <div>
             <h4 class="text-gray-700 dark:text-gray-200">Entrega de boletas</h4>
              <p class="text-gray-500 dark:text-gray-400">3 Semestre B</p>
             </div>
               <div class="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                 Matutino
                 </div>



        </div>
      </div>
      <div class="inline-block px-3">
        <div
          class="w-64 h-64 max-w-xs overflow-hidden transition-shadow duration-300 ease-in-out bg-white rounded-lg shadow-md hover:shadow-xl"
        ></div>
      </div>



      </div>
    </div>
  </div>
<!-- component -->
<section class="container px-4 mx-auto">
<div class="sm:flex sm:items-center sm:justify-between">
    <div>
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Noticias y Publicaciones del Plantel 35</h2>

            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">3 Publicaciones</span>
        </div>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Espacio para publicaciones y Anuncios Oficiales de la Institucion</p>
    </div>


</div>

<div class="mt-6 md:flex md:items-center md:justify-between">
    <div class="inline-flex overflow-hidden bg-yellow-200 border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
        <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
            Todos
        </button>

        <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
            Matutino
        </button>

        <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
            Vespertino
        </button>
    </div>

    <div class="relative flex items-center mt-4 md:mt-0">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </span>

        <input type="text" placeholder="Buscar" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
    </div>
</div>

<div class="flex flex-col mt-6">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">

               <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <button class="flex items-center gap-x-3 focus:outline-none">
                                    <span>Anuncios / Noticias</span>

                                    <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                        <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                        <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                    </svg>
                                </button>
                            </th>

                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Turno
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Descripcion
                            </th>


                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Vistas</th>

                            <th scope="col" class="relative py-3.5 px-4">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        <tr>
                    <section class="bg-white dark:bg-gray-900">
                    <div class="container px-6 py-10 mx-auto">
                        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Espacio para publicaciones</h1>

                        <div class="mt-8 bg-red-100 lg:-mx-6 lg:flex lg:items-center" >
                            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://www.sspc.chiapas.gob.mx/mediaboletines/images/C1(1).JPG" alt="">

                            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                <p class="text-sm text-blue-500 uppercase">category</p>

                                <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                                   Revision de Mochilas
                                </a>

                                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure veritatis sint autem nesciunt,
                                    laudantium quia tempore delect
                                </p>

                                <a href="#" class="inline-block mt-2 text-blue-500 underline hover:text-blue-400">Read more</a>


                            </div>
                        </div>
                                <div class="mt-8 bg-red-100 lg:-mx-6 lg:flex lg:items-center" >
                                <div class="grid w-4/6 p-8 m-auto text-center bg-gray-200 border rounded-lg hero md:grid-cols-2 bg-opacity-90">
                                <img class="m-auto rounded-lg icon" src="http://35tuxtlanorte.edu.mx/images/portfolio/02.jpg" alt="" />
                                <div class="p-5 m-auto text-lg text md:ml-5 md:text-left">
                                    <div class="mb-3 text-3xl font-semibold head">Why We Love Pizza ?</div>
                                    <div class="desc">There's a reason pizza is so popular. Humans are drawn to foods that are fatty, sweet, rich and complex. Pizza has all of these components. Cheese is fatty, meat toppings tend to be rich and the sauce is sweet.</div>
                                </div>
                                </div>
                            </div>
                    </div>
                    </section>
                        </tr>

                        <tr>
                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div>
                                    <h2 class="font-medium text-gray-800 dark:text-white ">Publicacion 1 </h2>
                                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">Entrada 8 PM</p>
                                </div>
                            </td>
                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                    Vespertino
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div>
                                    <h4 class="text-gray-700 dark:text-gray-200">Entrega de boletas</h4>
                                    <p class="text-gray-500 dark:text-gray-400">3 Semestre B</p>
                                </div>
                            </td>

                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="w-48 h-1.5 bg-blue-200 overflow-hidden rounded-full">
                                    <div class="bg-blue-500 w-2/5 h-1.5"></div>
                                </div>
                            </td>

                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <section class="bg-white dark:bg-gray-900">
                                <div class="py-16 bg-green-100">
                        <div class="container px-6 m-auto text-gray-600 md:px-12 xl:px-6">
                            <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                                <div class="md:5/12 lg:w-5/12">
                                <img src="http://35tuxtlanorte.edu.mx/images/portfolio/02.jpg" alt="image" loading="lazy" width="" height="">
                                </div>
                                <div class="md:7/12 lg:w-6/12">
                                <h2 class="text-2xl font-bold text-gray-900 md:text-4xl">Nuxt development is carried out by passionate developers</h2>
                                <p class="mt-6 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum omnis voluptatem accusantium nemo perspiciatis delectus atque autem! Voluptatum tenetur beatae unde aperiam, repellat expedita consequatur! Officiis id consequatur atque doloremque!</p>
                                <p class="mt-4 text-gray-600"> Nobis minus voluptatibus pariatur dignissimos libero quaerat iure expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.</p>
                                </div>
                            </div>
                            </div>
                            </div>
                           </section>
                           </tr>

                        <tr>
                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="w-100">
                                <div class="p-3 bg-gray-100 border shadow-md rounded-xl">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                        <div class="text-sm font-semibold text-slate-700">Director</div>
                                    </div>

                                <div class="mt-2">
                                    <div class="text-lg font-bold mb-7">RESULTADOS EXAMEN 2023 -B</div>
                                    <div class="text-xs text-neutral-600">Primer Semestre B </div>
                                    <div class="text-xs text-neutral-600">Publicacion</div>
                                </div>

                                <div class="flex items-center justify-between mt-3 text-xs text-slate-500">
                                    <div class="flex space-x-2">
                                        <div class="flex items-center transition cursor-pointer hover:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            <span>Fecha de Hoy</span>
                                        </div>
                                        <div class="flex items-center transition cursor-pointer hover:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                            </svg>
                                            <span>4</span>
                                        </div>
                                    </div>
                                    <div class="text-xs text-neutral-500">Hace 7 dias</div>
                                </div>
                            </div>
                        </div>
                            </td>
                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                    Vespertino
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div>
                                    <h4 class="text-gray-700 dark:text-gray-200">Resultados 2023</h4>
                                    <p class="text-gray-500 dark:text-gray-400">Lista de Aceptados</p>
                                </div>
                            </td>


                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="w-48 h-1.5 bg-blue-200 overflow-hidden rounded-full">
                                    <div class="bg-blue-500 w-1/3 h-1.5"></div>
                                </div>
                            </td>

                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 sm:flex sm:items-center sm:justify-between ">
    <div class="text-sm text-gray-500 dark:text-gray-400">
        Pagina <span class="font-medium text-gray-700 dark:text-gray-100">1 de  1</span>
    </div>

    <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
        <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>

            <span>
                Antes
            </span>
        </a>

        <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <span>
                Despues
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </a>
    </div>
</div>
</section>

  </main>
</template>

<script>
import banner from '../components/inicio.vue';

export default {
  data() {
    return {
      items: [
        { text: 'Slide 1', color: 'white', image: 'https://i.ytimg.com/vi/lZ-D6vgcie0/maxresdefault.jpg' },
        { text: 'Slide 2', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1N5xmc3hGjYTCZMnzaMoTRZe80LlEBH8z0w&usqp=CAU' },
        { text: 'Slide 3', color: 'white', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThLrpEm8LVg2Y8GeINyUAlzavtT4lFvr4pFA&usqp=CAU' },
      ],
    };
  },
  components: {
    banner,
  },
};
</script>

<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
main {
  margin-top: 60px; /* Adjust the top margin to make space for the banner */
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
