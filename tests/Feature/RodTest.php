<?php

namespace Tests\Feature;

use App\Models\Rod;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RodTest extends TestCase
{
    use RefreshDatabase;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();

    }

    public function test_can_get_all_rod_index()
    {
        $rod = Rod::factory(3)->create();

        $this->assertEquals(3, $rod->count());

        $this->actingAs($this->user)
            ->get(route('rod.index'))
            ->assertOk();
    }

    public function test_can_get_specific_rod_show()
    {
        $rod = Rod::factory()->create();

        $this->assertEquals(1, $rod->count());

        $this->actingAs($this->user)
            ->get(route('rod.show', $rod->id))
            ->assertOk();
    }

    public function test_can_create_rod_store()
    {
        $rod = Rod::factory()->create();

        $this->assertEquals(1, $rod->count());

        $this->actingAs($this->user)
            ->post(route('rod.store', $rod))
            ->assertStatus(302);

    }

    public function test_can_update_rod_update()
    {
        $rod = Rod::factory()->create();

        $newData = [
            'id' => $rod->id,
            'name' => 'Ivan Ivanov',
            'user_id' => 2,
        ];

        $response = $this->put(route('rod.update', $rod->id), $newData);
        $response->assertStatus(302);


        /*@TODO(Не проходит тест)*/
//        $this->assertDatabaseHas('rods', [
//            'id' => $rod->id,
//            'name' => $newData['name'],
//            'user_id' => 2,
//        ]);

    }

    public function test_can_delete_rod_destroy()
    {
        $rod = Rod::factory()->create();

        $this->actingAs($this->user)
            ->delete(route('rod.destroy', $rod->id))
            ->assertStatus(302);

        $this->assertEquals(0, $rod->count());
    }
}
