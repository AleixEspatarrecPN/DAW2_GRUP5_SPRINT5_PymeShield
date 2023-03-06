<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;


class InventoryController extends Controller
{
    public function index(){
        return view('inventario');
    }

    public function inventario(Request $request){
        $idUser = 1;//Aquí es possara la variable de sessió que contingui el id de la sessió

        $filtro = $request->buscar;

$dispositivosInventario = Device::where('user_id', $idUser)
                                ->where(function ($query) use ($filtro) {
                                    $query->where('brand', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('model', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('mac_ethernet', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('mac_wifi', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('type_device_id', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('description', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('state', 'LIKE', '%'.$filtro.'%')
                                        ->orWhere('serial_number', 'LIKE', '%'.$filtro.'%');                                    
                                    })
                                    ->get();

        return response()->json($dispositivosInventario, 200);
    }
}
