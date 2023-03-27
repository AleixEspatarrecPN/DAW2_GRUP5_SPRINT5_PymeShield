<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Device;

class RestoreTest extends TestCase
{

    use RefreshDatabase;
    // use DatabaseMigrations;
    /**
     * My test implementation
     */
    public function testApproachIsIncredible()
    {
        //Creem una instancia del model sense persistencia
        $device = Device::factory()->create([
            'id' => '1',
            'brand' => 'Asus',
            'model' => 'Pro',
            'mac_ethernet' => 'EC:06:70:6E:CF:59',
            'mac_wifi' => '3A:79:AE:L8:77:4B',
            'description' => 'Dispositiu Computacio',
            'state' => 'actiu',
            'tag' => 'Si',
            'serial_number' => '07878966865',
            'type_device_id' => '2',
            // 'user_id' => '12',
            'hidden' => null,
        ]);

        $carga = $this->get('/restore');
        $carga->assertStatus(200);

        $response = $this->post(route('restaurar',  ['id' => '1']));
        $response->assertStatus(200);

    }
}