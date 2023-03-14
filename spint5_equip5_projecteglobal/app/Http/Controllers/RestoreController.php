<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class RestoreController extends Controller
{

    //Funcio per a llistar
    public function devices(){
        return Device::whereNotNull("hidden")->paginate(5);
    }

    // Funcio per a restaurar
    public function restaurar($id){
        $dispositiu = Device::find($id);
        $dateNow = null;
        $dispositiu->hidden = $dateNow;
        $dispositiu->save();
    }
}
