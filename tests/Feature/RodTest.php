<?php

namespace Tests\Feature;

use App\Models\Rod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RodTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_rod_index()
    {
        $rod = Rod::factory(3)->create();

        $response = $this->get(route('rod.index'));

        $response->assertOk();
        $this->assertEquals(3, $rod->count());
    }

    public function test_can_get_specific_rod_show()
    {
       $rod = Rod::factory()->create();

       $response = $this->get(route('rod.show', $rod->id));

       $response->assertOk();
       $this->assertEquals(1, $rod->count(1));
    }

    public function test_can_create_rod_store()
    {
        $rod = Rod::factory()->create();

        $response = $this->post(route('rod.store', $rod));
        $this->assertEquals(1, $rod->count(1));
        $response->assertStatus(302);
    }

    public function test_can_update_rod_update()
    {
        $rod = Rod::factory()->create();
        $updateRod = [
            'id' => $rod->id,
            'name' => 'Ivan Ivanov',
            'user_id' => 2,
        ];

        $response = $this->put(route('rod.update', $rod->id), $updateRod);
        $response->assertStatus(302);
        $this->assertDatabaseHas('rods', [
            'id' => $updateRod['id'],
            'name' => $updateRod['name'],
            'user_id' => $updateRod['user_id'],
        ]);
    }

    public function test_can_delete_rod_destroy()
    {
        $rod = Rod::factory()->create();

        $response = $this->delete(route('rod.destroy', $rod->id));
        $response->assertStatus(302);
        $this->assertEquals(0, $rod->count());
    }
}
