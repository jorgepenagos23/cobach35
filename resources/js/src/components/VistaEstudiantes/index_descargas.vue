<template>
<div class="flex items-center justify-center flex-1 min-h-screen p-4 bg-gray-200">
<div class="w-full bg-white rounded-lg shadow md:max-w-4xl">
<div class="flex items-center justify-between h-12 m-4 border-b border-gray-200">
  <div >
   <div class="text-xl font-bold text-gray-700">Josef256 Lobby</div>
   <div class="text-sm text-gray-500 font-base">Waiting for more players...</div>
  </div>
  <div>
    <div class="flex items-center justify-center w-full rounded-full shadow-md">
      <label
          htmlFor="toogleA"
          class="flex items-center cursor-pointer"
      >
        <div class="flex items-center">
          <input id="toogleA" type="checkbox" class="hidden"/>
          <div
              class="w-20 h-10 bg-gray-300 rounded-full shadow-inner toggle__line"
          >
          </div>
          <div
              class="absolute flex items-center justify-center w-10 h-10 bg-white bg-red-400 rounded-full shadow toggle__dot"
          >
            <svg class="w-6 h-6 text-white " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
      </label>
    </div>
  </div>
</div>
<div class="px-6">
  <div class="flex items-center justify-between h-16 p-4 my-6 border border-gray-100 rounded-lg shadow-md">
    <div class="flex items-center">
      <img class="w-12 h-12 rounded-full" src="https://static-cdn.jtvnw.net/jtv_user_pictures/27fdad08-a2c2-4e0b-8983-448c39519643-profile_image-70x70.png" alt="Logo" />
    <div class="ml-2">
      <div class="text-sm font-semibold text-gray-600">Lirik</div>
      <div class="text-sm font-light text-gray-500">Level 6 - Warlock</div>
    </div>
    </div>
    <div>
      <button class="flex items-center justify-center p-2 bg-red-400 rounded-full shadow-md hover:bg-red-500">
        <svg class="w-6 h-6 text-white toggle__lock" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  <div class="flex items-center justify-between h-16 p-4 my-6 border border-gray-100 rounded-lg shadow-md">
    <div class="flex items-center">
      <img class="w-12 h-12 rounded-full" src="https://static-cdn.jtvnw.net/jtv_user_pictures/cb661e9a-68e5-4e37-89ce-231960ff7f8e-profile_image-70x70.png" alt="Logo" />
      <div class="ml-2">
        <div class="text-sm font-semibold text-gray-600">MembTV</div>
        <div class="text-sm font-light text-gray-500">Level 4 - Monk</div>
      </div>
    </div>
    <div>
      <button class="flex items-center justify-center p-2 bg-red-400 rounded-full shadow-md hover:bg-red-500">
        <svg class="w-6 h-6 text-white toggle__lock" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  <div class="flex items-center justify-between h-16 p-4 my-6 border border-gray-100 rounded-lg shadow-md">
    <div class="flex items-center">
      <img class="w-12 h-12 rounded-full" src="https://static-cdn.jtvnw.net/jtv_user_pictures/e82b2c90-efe6-41c7-bd50-7caba86fd3b5-profile_image-70x70.png" alt="Logo" />
      <div class="ml-2">
        <div class="text-sm font-semibold text-gray-600">DansGaming</div>
        <div class="text-sm font-light text-gray-500">Level 12 - Paladan</div>
      </div>
    </div>
    <div>
      <button class="flex items-center justify-center p-2 bg-red-400 rounded-full shadow-md hover:bg-red-500">
        <svg class="w-6 h-6 text-white toggle__lock" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  <div class="flex items-center justify-center h-16 p-4 my-6 bg-gray-200 rounded-lg shadow-inner">
    <div class="flex items-center p-2 border border-gray-400 border-dashed rounded cursor-pointer">
    <div>
      <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    </div>
      <div class="ml-1 font-medium text-gray-500"> Invite a friend</div>
    </div>
  </div>
</div>
  <div class="p-6 ">
    <button class="w-full p-4 text-xl font-medium text-white uppercase bg-green-400 rounded-lg shadow hover:bg-green-500">Start the game</button>
  </div>
</div>
    </div>

  </template>
  
<style>
.toggle__dot {
  transition: all 0.3s ease-in-out;
}

input:checked ~ .toggle__dot {
  transform: translateX(100%);
  background-color:#68D391
}
</style>
  <script>
    export default {
      data: () => ({
        items: [
          {
            name: 'Item #1',
            id: 1,
          },
          {
            name: 'Item #2',
            id: 2,
          },
          {
            name: 'Item #3',
            id: 3,
          },
        ],
      }),
    }
  </script>