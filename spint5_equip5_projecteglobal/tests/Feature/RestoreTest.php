<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RestoreTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * My test implementation
     */
    public function testApproachIsIncredible()
    {
        //Artisan::call('migrate');
        

        $carga = $this->get('/restore');
        $carga->assertStatus(200);

        $id = 1; // Número de ejemplo
        $response = $this->post(route('restaurar', $id));
        $response->assertStatus(200);

    }
}
