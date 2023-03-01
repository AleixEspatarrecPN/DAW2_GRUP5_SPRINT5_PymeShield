<template>
<div class="grid justify-items-end mr-10">
    <button class="bg-orange-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">Crear dispositiu</button>
</div>
<div class="m-5">
    <table class="table-fixed w-full text-base text-left text-gray-500 dark:text-gray-400 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-orange-400 dark:bg-gray-700 dark:text-gray-400">
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
            <tr v-for="device in devicesData.data" :key="device.id" class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
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
                    <button class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-2 ml-2 rounded " ><ArchiveBoxArrowDownIcon class="h-6 w-6 text-white-400" aria-hidden="true" /></button>
                    <button class="bg-orange-400 hover:bg-orange-600  text-white font-bold py-2 px-2 ml-2 rounded"><PencilSquareIcon class="h-6 w-6 text-white-400" aria-hidden="true" /></button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-center mt-4">
        <TailwindPagination
        :data="devicesData"
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
            ModalCrear: ref(false),
            NotificacionCrear: ref(false),
            ModalEditar: ref(false),
            NotificacionEditar: ref(false),
            ModalBaja: ref(false),
            NotificacionBaja: ref(false),
            devices: [],
            crear: { nameCrear: "", emailCrear: "", phoneCrear: "", cifCrear: "" },
            editar: { id: "",nameEditar: "", emailEditar: "", phoneEditar: "", cifEditar: "" },
            baja: {id:"", removed_reason:""},
            paginaActual: 1
        };
    },
    mounted() {
        // this.getDevices();
    },
    methods: {
        // openModalCrear() {
        //     this.ModalCrear = true;
        // },
        // openModalEditar(id ,name, email, phone, cif) {
        //     this.ModalEditar = true;
        //     this.editar.id = id
        //     this.editar.nameEditar = name;
        //     this.editar.emailEditar = email;
        //     this.editar.phoneEditar = phone;
        //     this.editar.cifEditar = cif;
        // },
        // openModalBaja(id) {
        //     this.baja.id = id;
        //     this.ModalBaja = true;
        // },
        // getDevices(page = 1) {
        //     axios.get("/devices/list?page=" + page)
        //         .then(response => {
        //         this.devices = response.data.data;
        //         this.devices.meta = response.data.meta;
        //     })
        //         .catch(error => {
        //         console.log(error);
        //     });
        // },
        // submitFormCrear() {
        //     axios.post("listadoEmpresas/createCompany", {
        //         name: this.crear.nameCrear,
        //         email: this.crear.emailCrear,
        //         phone: this.crear.phoneCrear,
        //         cif: this.crear.cifCrear
        //     })
        //         .then(response => {
        //         this.getCompanies();
        //         console.log(response);
        //         this.ModalCrear = false;
        //         this.crear.nameCrear = "";
        //         this.crear.emailCrear = "";
        //         this.crear.phoneCrear = "";
        //         this.crear.cifCrear = "";
        //         this.NotificacionCrear = true;
        //         setTimeout(() => { this.NotificacionCrear = false; }, 2500);
        //     })
        //         .catch(error => {
        //         console.error(error);
        //     });
        // },
        // submitFormEditar() {
        //     axios.post("listadoEmpresas/editCompany", {
        //         id: this.editar.id,
        //         name: this.editar.nameEditar,
        //         email: this.editar.emailEditar,
        //         phone: this.editar.phoneEditar,
        //         cif: this.editar.cifEditar
        //     })
        //         .then(response => {
        //         this.getCompanies();
        //         console.log(response);
        //         this.ModalEditar = false;
        //         this.editar.id = "";
        //         this.editar.nameEditar = "";
        //         this.editar.emailEditar = "";
        //         this.editar.phoneEditar = "";
        //         this.editar.cifEditar = "";
        //         this.NotificacionEditar = true;
        //         setTimeout(() => { this.NotificacionEditar = false; }, 2000);
        //     })
        //         .catch(error => {
        //         console.error(error);
        //     });
        // },
        // submitFormBaja() {
        //     axios.post("listadoEmpresas/unsuscribeCompany", {
        //         id: this.baja.id,
        //         removed_reason: this.baja.removed_reason
        //     })
        //     .then(response => {
        //         this.getCompanies();
        //         console.log(response);
        //         this.ModalBaja = false;
        //         this.NotificacionBaja = true;
        //         setTimeout(() => { this.NotificacionBaja = false; }, 2000);
        //     })
        //         .catch(error => {
        //         console.error(error);
        //     });
        // }
    },
};
</script>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { PlusCircleIcon, ShieldCheckIcon, ArchiveBoxArrowDownIcon, PencilSquareIcon } from '@heroicons/vue/24/outline'
import { TailwindPagination } from 'laravel-vue-pagination';

const devicesData = ref({});

function getDevices(page = 1) {
    axios.get("/devices/list?page=" + page)
        .then(response => {
        devicesData.value = response.data;
        devicesData.data = response.data.data;
    })
        .catch(error => {
        console.log(error);
    });
}

getDevices()
</script>
