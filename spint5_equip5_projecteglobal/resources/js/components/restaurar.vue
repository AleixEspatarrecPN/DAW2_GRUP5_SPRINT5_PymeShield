<template>
    <!-- Taula restore devices  -->
    <div class="m-5">
        <table class="table-fixed w-full text-base text-left text-gray-800 dark:text-gray-400 text-center">
            <thead class="text-xs text-white uppercase bg-orange-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">Marca</th>
                    <th scope="col" class="px-6 py-3">Modelo</th>
                    <th scope="col" class="px-6 py-3">MAC-ethernet</th>
                    <th scope="col" class="px-6 py-3">MAC-wifi</th>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3">Descripcion</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="w-29 px-6 py-3">Funciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="device in restoreData.data" :key="device.id" class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{ device.brand }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.model }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.mac_ethernet }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.mac_wifi }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.type_device_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ device.state }}
                    </td>
                    <td class="px-4 py-4 text-center align-middle" >
                        <button class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> Restaurar </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Paginació amb TailWind -->
        <div class="flex justify-center mt-4">
            <TailwindPagination
            :data="restoreData"
            @pagination-change-page="getDevices"
        />
        </div>
    
    </div>


</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            restoredevices: [],
        }
    }
}
</script>

<script setup>
import { ref } from 'vue'
import { TailwindPagination } from 'laravel-vue-pagination';

const restoreData = ref({});

function getDevices(page = 1) {
    axios.get("/restaurar?page=" + page)
        .then(response => {
        restoreData.value = response.data;
        restoreData.data = response.data.data;
    })
        .catch(error => {
        console.log(error);
    });
}

getDevices()
</script>