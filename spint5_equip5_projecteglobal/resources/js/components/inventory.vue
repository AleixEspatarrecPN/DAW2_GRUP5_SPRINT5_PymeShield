<template>
<div class="flex justify-between mx-12">
    <div class="ml-auto">
        <form class="flex shadow-md">   
            <div class="w-full">
                <div class="inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" @keyup="buscar" v-model="query" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar dispositivo">
            </div>
        </form>
    </div>
</div>


    <div class="flex justify-center mb-6">
        <table class="container shadow-xl table-auto w-full rounded-lg bg-white mt-5 w-99 text-center">
            <thead class="bg-orange-500 text-white">
              <tr>
                <th>Marca</th>
                <th>Model</th>
                <th>MAC</th>
                <th>Wifi</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Núm Serie</th>          
                </tr>
            </thead>
            <tbody v-if="dispositivosInventario.length > 0">        
              <tr v-for="(dispositivo, key) in dispositivosInventario" :key="key" class="h-14 bg-orange-100 border-b hover:bg-orange-300">
                <td>{{dispositivo.brand}}</td>
                <td>{{dispositivo.model}}</td>
                <td>{{dispositivo.mac_ethernet}}</td>
                <td>{{dispositivo.mac_wifi}}</td>
                <td>{{dispositivo.type_device_id}}</td>
                <td>{{dispositivo.description}}</td>
                <td>{{dispositivo.state}}</td>
                <td>{{dispositivo.serial_number}}</td>
              </tr>
            </tbody>
            <h1 class="text-lg content-center" v-else>No tienes dipositivos asignados.</h1>
          </table>
    </div>
        
        
</template>

<script>

import axios from 'axios'

export default{

    data() {
        return{
            dispositivosInventario: [],
            query: ''
        };
    },
    mounted() {
        this.caragrDispositivos();
    },
    methods: {
        caragrDispositivos(){
            axios.get("/listInventory")
            .then(response => {
                this.dispositivosInventario = [];
                this.dispositivosInventario = response.data;
            })
                .catch(error => {
                console.log(error);
        });
    },
        buscar(){
            axios.post('/inventario/buscar',{
                q: this.query
            } ).then( res => {
                    console.log(res);
                    console.log(this.query);

            }).catch( error => {
                    console.log(error.response);
            })

        },
    }
}

</script>


