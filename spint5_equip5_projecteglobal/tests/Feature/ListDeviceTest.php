<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Device;


class ListDeviceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //Creem una instancia del model sense persistencia


        $carga = $this->get('/devices');
        $carga->assertStatus(200);

        $create = $this->post('/devices/create');
        $create->assertStatus(200);

        $edit = $this->post('/devices/edit');
        $edit->assertStatus(200);

    }
}
