<template>
<!-- component -->
<div>
      <table class="min-w-full table-auto">
        <thead class="justify-between">
          <tr class="bg-gray-800">
            <th class="px-16 py-2">
              <span class="text-gray-300"></span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Name</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Invitation</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Date</span>
            </th>

            <th class="px-16 py-2">
              <span class="text-gray-300">Time</span>
            </th>

            <th class="px-16 py-2">
              <span class="text-gray-300">Status</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
          <tr class="bg-white border-4 border-gray-200">
            <td class="flex flex-row items-center px-16 py-2">
              <img
                class="object-cover w-8 h-8 rounded-full "
                src="https://randomuser.me/api/portraits/men/30.jpg"
                alt=""
              />
            </td>
            <td>
              <span class="ml-2 font-semibold text-center">Dean Lynch</span>
            </td>
            <td class="px-16 py-2">
              <button class="px-4 py-2 text-white bg-indigo-500 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Open Link
              </button>
            </td>
            <td class="px-16 py-2">
              <span>05/06/2020</span>
            </td>
            <td class="px-16 py-2">
              <span>10:00</span>
            </td>

            <td class="px-16 py-2">
              <span class="text-green-500">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h5 "
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#2c3e50"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <path d="M5 12l5 5l10 -10" />
                </svg>
              </span>
            </td>
          </tr>
          <tr class="bg-white border-4 border-gray-200">
            <td class="flex flex-row items-center px-16 py-2">
            <img
                  class="object-cover w-8 h-8 rounded-full "
                  src="https://randomuser.me/api/portraits/men/76.jpg"
                  alt=""
                />
            </td>
            <td>
              <span class="ml-2 font-semibold text-center">Ralph Barnes</span>
            </td>
            <td class="px-16 py-2">
              <button class="px-4 py-2 text-white bg-indigo-500 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Open Link
              </button>
            </td>
            <td class="px-16 py-2">
              <span>05/06/2020</span>
            </td>
            <td class="px-16 py-2">
              <span>12:15</span>
            </td>

            <td class="px-16 py-2">
              <span class="text-yellow-500">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#2c3e50"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <circle cx="12" cy="12" r="9" />
                  <polyline points="12 7 12 12 15 15" />
                </svg>
              </span>
            </td>
          </tr>
          <tr class="bg-white border-4 border-gray-200">
            <td class="flex flex-row items-center px-16 py-2">
            <img
                  class="object-cover w-8 h-8 rounded-full "
                  src="https://randomuser.me/api/portraits/men/38.jpg"
                  alt=""
                />
            </td>
            <td>
              <span class="ml-2 font-semibold text-center">Brett Castillo</span>
            </td>
            <td class="px-16 py-2">
              <button class="px-4 py-2 text-white bg-indigo-500 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Open Link
              </button>
            </td>
            <td class="px-16 py-2">
              <span>05/06/2020</span>
            </td>
            <td class="px-16 py-2">
              <span>08:35</span>
            </td>

            <td class="px-16 py-2">
              <span class="text-yellow-500">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#2c3e50"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>



</template>