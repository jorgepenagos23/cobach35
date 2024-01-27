<script setup>
  import InfiniteLoading from "v3-infinite-loading";
  import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots
</script>

<template>
    <div>
        <banner></banner>
    </div>

    <v-app>


  
      <body style="overflow-x: auto;">
          
<!-- Sección de Secciones Filtradas -->
<section class="relative py-32 bg-white lg:py-36">
  <div class="flex flex-col w-full gap-10 px-5 mx-auto lg:max-w-7xl sm:px-10 md:px-12 lg:px-5 lg:flex-row lg:gap-12">
    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-1 max-w-3xl mx-auto lg:w-1/2 lg:h-auto lg:max-w-none lg:mx-0">
      <img class="object-cover w-full h-60 rounded-xl" :src="data.contenido.imagen" alt="">
    </div>

    <div v-for="data in subseccionesContenidoFiltrado" :key="data.seccion.id" class="relative flex flex-col items-center max-w-3xl mx-auto text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none lg:mx-0 lg:flex-1 lg:w-1/2">
      <div class="absolute inset-y-0 hidden w-full lg:w-1/2 lg:right-0 lg:block">
        <span class="absolute hidden w-24 h-24 rotate-90 skew-x-12 bg-green-400 -left-6 md:left-4 top-24 lg:top-28 rounded-3xl blur-xl opacity-60 lg:opacity-95 lg:block"></span>
        <span class="absolute w-24 h-24 bg-blue-600 right-4 bottom-12 rounded-3xl blur-xl opacity-80"></span>
      </div>
      
      <span class="absolute w-4/12 rotate-90 skew-x-12 skew-y-12 rounded-full lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 -top-5 lg:left-0 blur-2xl opacity-40"></span>

      <h1 class="text-3xl font-bold leading-tight text-gray-900 sm:text-4xl md:text-5xl xl:text-6xl">
        {{ data.contenido.titulo }} 
      </h1>
      <p class="mt-8 text-justify text-gray-700">
        {{ data.contenido.descripcion }}
      </p>

      <div class="flex w-full max-w-md mx-auto mt-10 lg:mx-0">
        <div class="flex flex-col w-full gap-5 sm:flex-row">
          <form action="#" class="flex items-center w-full gap-3 py-1 pl-6 pr-1 text-gray-600 ease-linear bg-gray-100 border border-gray-200 rounded-full shadow-lg shadow-gray-200/20 focus-within:bg-white focus-within:border-blue-600">
            <!-- Contenido del formulario -->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



        <div class="max-w-full mx-auto">
  <div v-for="publicacion in list" :key="publicacion.id" class="transition-transform transform bg-white rounded-lg shadow-md px-7 hover:shadow-lg">
    <div class="flex">
      <div class="w-1/2">
        <button class="bg-[#1a58a3c9] rounded-[5px] py-[15px] px-[25px] text-[#fff] text-[14px] leading-[17px] font-semibold">
          <img :src="publicacion.imagen" alt="Imagen" class="object-cover w-full rounded-lg hover:shadow-lg h-72"> <!-- Ajusta el tamaño de la imagen según tus preferencias -->
        </button>
      </div>
      <div class="w-1/2 px-4 py-4">
        <div class="mt-2">
          <div class="pt-[15px] pb-[25px] text-justify">
            <div class="flex justify-end">
              <div class="bg-[#F6F6F7] rounded-[20px] flex justify-center align-center px-[12px]">
                <p class="text-[#00153B] text-[12px] leading-[28px] font-bold"></p>
              </div>
            </div>
            <p class="text-[#00153B] text-[50px] leading-[63px] font-bold">
              {{ publicacion.titulo }}
            </p>
            <div>
              <p class="text-[#00153B] text-[19px] leading-[24px] font-bold">
                {{ publicacion.descripcion }}
              </p>
              <p class="text-[#00153B] text-[50px] leading-[63px] font-bold">
                <br><br>
                
              </p>
            </div>
          </div>
        </div>
        <div class="pt-[25px] pb-[35px]">
          <div>
            <p class="text-[#717F87] text-[10px] leading-[24px] font-medium">
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<infinite-loading @infinite="infiniteHandler" class="my-4">
  <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">
    Cargar más
  </button>
</infinite-loading>

<div class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-gray- sm:py-12">
  <div class="w-full max-w-screen-xl px-4 mx-auto">
    <h2 class="mb-4 text-xl font-bold text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, consequuntur.</h2>
    <div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">

      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      <div class="relative flex flex-col max-w-sm overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
        <a href="" class="absolute right-0 z-30 mt-2 mr-3 hover:text-orange-600 top-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
        <a href="" class="absolute top-0 left-0 z-20 w-full h-full ">&nbsp;</a>
        <div class="h-auto overflow-hidden">
          <div class="relative overflow-hidden h-44">
            <img src="https://picsum.photos/400/400" alt="">
          </div>
        </div>
        <div class="px-3 py-4 bg-white">
          <h3 class="mb-2 text-xs font-medium">Des cadeaux incroyables prêts à être utilisés dans votre prochain projet</h3>
          <div class="flex items-center justify-between">
            <p class="text-xs text-gray-400">
            Lorem, ipsum dolor sit amet
          </p>
          <div class="relative z-40 flex items-center gap-2">
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
            </a>
            <a class="text-orange-600 hover:text-blue-500" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </a>
          </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </div>
</div>

        </body>
     
        <div>
        <pie></pie>
         </div>
    </v-app>
</template>
  
<style>

@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

.centered-content {
    display: flex;
    text-align: center;
    justify-content: center;
    height: auto;
}

@media only screen and (max-width: 600px) {
 
   .text-h2 {
      font-size: 1.5rem;
   }
}


.max-w-full {
    max-width: 80%;
    
  }




</style>

<script>
import axios from 'axios';
import banner from "../../inicio.vue";
import pie from "../../footer.vue";
import Swal from 'sweetalert2';

  const api = '/api/v1/publicacion';

  export default {
    name: 'mision',
    components: {
      banner,
      pie,
    },
    data() {
      return {
        page: 1,
        list: [],
        isLoading: false,
        hasMoreResults: true,
        
        publicaciones: [],
        slides: ['First', 'Second', 'Third', 'Fourth', 'Fifth'],
        currentIndex: 0,
        colors: ['white', 'white'],
        posts: [],
        contenido: [],
        secciones: {},
        seccionesContenidoFiltrado: [], 
        componentRuta: '',
      };
    },
    created() {
      this.cargarPublicaciones();
      this.componentRuta = this.$route.path;
      this.fetchData();
    },
    methods: {
      infiniteHandler($state) {
        if (this.isLoading) {
        
          return;
        }

        this.isLoading = true;

        axios.get(api, {
          params: {
            page: this.page,
          },
        }).then((response) => {
          if (response.data.publicaciones.length) {
            this.page += 1;
            const newPublicaciones = response.data.publicaciones.sort((a, b) => {
              return new Date(b.fecha) - new Date(a.fecha);
            });
            this.list.push(...newPublicaciones);
            this.isLoading = false;
            console.log("solicitando más información");

            $state.loaded();

            if (this.list.length >= response.data.total) {
              this.hasMoreResults = false;
              $state.complete();
            }
          } else {
            console.log("has llegado al final del contenido");
            this.isLoading = false;
            this.hasMoreResults = false;
            $state.complete();
          }
        });
      },

      cargarPublicaciones() {
        axios.get('/api/v1/publicacion')
          .then((response) => {
            console.log(response);
            this.publicaciones = response.data.publicaciones.sort((a, b) => {
              return new Date(b.fecha) - new Date(a.fecha);
            });
            console.log(this.publicaciones);
          })
          .catch((error) => {
            console.error('Error al cargar las publicaciones:', error);
          });
      },

      formatDate(isoDate) {
        const options = {
          year: 'numeric',
          month: 'short',
          day: 'numeric',
          timeZone: 'UTC'
        };
        return new Date(isoDate).toLocaleString('es-es', options);
      },

      fetchData() {
      axios.all([
        axios.get('/api/v1/contenido'),
        axios.get('/api/v1/fachada_subseccion')
      ])
      .then(axios.spread((response1, response2) => {
        console.log('Datos de contenido:', response1.data.contenido);
        console.log('Datos de subsecciones:', response2.data.subsecciones);

        this.contenido = response1.data.contenido;
        this.subsecciones = response2.data.subsecciones;
        this.filterContenido();
      }))
      .catch(error => {
        console.error('Error al obtener datos de la API', error);
      });
    },

    filterContenido() {
  if (this.contenido && this.subsecciones) {
    // Obtiene la ruta actual
    const rutaActual = this.$route.path;

    console.log('Ruta actual:', rutaActual);

    this.subseccionesContenidoFiltrado = Object.values(this.subsecciones).map(seccion => {
      const contenidoRelacionado = this.contenido.find(cont => cont.id === seccion.contenido_id);
      return {
        seccion,
        contenido: contenidoRelacionado,
      };
    }).filter(data => data.seccion.ruta === rutaActual);

    console.log('Contenido filtrado:', this.subseccionesContenidoFiltrado);
  }
},
      
    },
  };
</script>
