<template>
<section class="h-screen px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Customers</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <div class="text-gray-900 bg-gray-200">
    <div class="flex p-4">
        <h1 class="text-3xl">
            Users
        </h1>
    </div>
        <table class="w-full mb-4 bg-white rounded shadow-md text-md">
            <tbody>
                <tr class="border-b">
                    <th class="p-3 px-5 text-left">Email</th>
                    <th></th>
                </tr>
          
         
                <tr class="bg-gray-100 border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                 
                    <td class="flex justify-end p-3 px-5"><button type="button" class="px-2 py-1 mr-3 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Save</button><button type="button" class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
       
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                   
                    <td class="flex justify-end p-3 px-5"><button type="button" class="px-2 py-1 mr-3 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Save</button><button type="button" class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


                    
                </div>
            </div>
        </div>
</section>
</template>