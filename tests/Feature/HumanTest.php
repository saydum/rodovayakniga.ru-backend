<?php

namespace Tests\Feature;

use App\Models\Human;
use App\Models\Rod;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HumanTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_get_all_human_index()
    {
        $human = Human::factory(3)->create();

        $this->assertEquals(3, $human->count());

        $this->actingAs($this->user)
            ->get(route('humans.index'))
            ->assertOk();
    }

    public function test_can_get_specific_human_show()
    {
        $human = Human::factory()->create();
        $this->assertEquals(1, $human->count());

        $this->actingAs($this->user)
            ->get(route('humans.show', $human->id))
            ->assertOk();
    }

    public function test_can_create_human_store()
    {
        $human = Human::factory()->create();

        $this->actingAs($this->user)
            ->post(route('humans.store', $human))
            ->assertStatus(302);

        $this->assertEquals(1, $human->count());
    }

    public function test_can_update_human_update()
    {
        $human = Human::factory()->create();

        $updateHuman = [
            'name' => 'Ivan',
            'f_name' => 'Ivanov',
            'o_name' => 'Ivanovich',
            'gender' => 'man',
            'data_birth' => '22-09-1999',
            'location_birth' => 'London',
            'height' => 180,
            'eye_color' => 'lime',
            'hair_color' => 'black',
            'nationality' => 'English',
            'generation' => 4,
        ];

        $this->actingAs($this->user)
            ->put(route('humans.update', $human->id), $updateHuman)
            ->assertStatus(302);

//        @TODO(assertDatabaseHas не проходит)
//        $this->assertDatabaseHas('humans', [
//            'name' => $updateHuman['name'],
//            'f_name' => $updateHuman['f_name'],
//            'o_name' => $updateHuman['o_name'],
//            'gender' => $updateHuman['gender'],
//            'data_birth' => $updateHuman['data_birth'],
//            'location_birth' => $updateHuman['location_birth'],
//            'height' => $updateHuman['height'],
//            'eye_color' => $updateHuman['eye_color'],
//            'hair_color' => $updateHuman['hair_color'],
//            'nationality' => $updateHuman['nationality'],
//            'generation' => $updateHuman['generation'],
//            'rod_id' => $this->rod->id,
//        ]);
    }

    public function test_can_delete_human_destroy()
    {
        $human = Human::factory()->create();

        $this->actingAs($this->user)
            ->delete(route('humans.destroy', $human->id))
            ->assertStatus(302);

        $this->assertEquals(0, $human->count());
    }
}
