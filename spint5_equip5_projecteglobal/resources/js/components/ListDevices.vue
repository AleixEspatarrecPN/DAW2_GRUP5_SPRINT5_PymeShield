<template>
<div class="grid justify-items-end mr-10">
    <button class="bg-orange-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="openModalCrear()">Crear dispositiu</button>
</div>
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

<TransitionRoot as="template" :show="ModalCrear">
    <Dialog as="div" class="relative z-10" @close="ModalCrear = false">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
        </TransitionChild>

        <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <form @submit.prevent="submitForm">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="xl:items-start">
                    <div class="flex space-x-2 items-center">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <PlusCircleIcon class="h-6 w-6 text-orange-400" aria-hidden="true" />
                        </div>
                        <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">Crear nuevo dispositivo</DialogTitle>
                    </div>

                    <div class="mt-3 text-center md:text-left">

                            <div class="mt-2">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                    <input v-model="crear.nameCrear" type="text" id="name" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-400 focus:border-orange-400" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
                                    <input v-model="crear.emailCrear" type="text" id="email" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-400 focus:border-orange-400" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="flex w-full space-x-8">
                                    <div class="w-full">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                                        <input v-model="crear.phoneCrear" type="text" id="phone" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-400 focus:border-orange-400" required>
                                    </div>
                                    <div class="w-full">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CIF</label>
                                        <input v-model="crear.cifCrear" type="text" id="cif" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-400 focus:border-orange-400" required>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" @click="submitFormCrear()">Crear</button>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="ModalCrear = false" ref="cancelButtonRef">Cancelar</button>
                </div>
            </form>
            </DialogPanel>
            </TransitionChild>
        </div>
        </div>
    </Dialog>
</TransitionRoot>
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
    },
    methods: {
        openModalCrear() {
            this.ModalCrear = true;
        },
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
