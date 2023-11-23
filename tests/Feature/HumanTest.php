<?php

namespace Tests\Feature;

use App\Models\Human;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HumanTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_human_index()
    {
        $human = Human::factory(3)->create();

        $response = $this->get(route('humans.index'));

        $response->assertOk();
        $this->assertEquals(3, $human->count());
    }

    public function test_can_get_specific_human_show()
    {
       $human = Human::factory()->create();

       $response = $this->get(route('humans.show', $human->id));

       $response->assertOk();
       $this->assertEquals(1, $human->count(1));
    }

    public function test_can_create_human_store()
    {
        $human = Human::factory()->create();

        $response = $this->post(route('humans.store', $human));
        $this->assertEquals(1, $human->count(1));
        $response->assertStatus(302);
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
            'rod_id' => '1',
        ];

        $response = $this->put(route('humans.update', $human->id), $updateHuman);
        $response->assertStatus(302);
        $this->assertDatabaseHas('humans', [
            'name' => $updateHuman['name'],
            'f_name' => $updateHuman['f_name'],
            'o_name' => $updateHuman['o_name'],
            'gender' => $updateHuman['gender'],
            'data_birth' => $updateHuman['data_birth'],
            'location_birth' => $updateHuman['location_birth'],
            'height' => $updateHuman['height'],
            'eye_color' => $updateHuman['eye_color'],
            'hair_color' => $updateHuman['hair_color'],
            'nationality' => $updateHuman['nationality'],
            'generation' => $updateHuman['generation'],
            'rod_id' => $updateHuman['rod_id'],
//            'father_id' => $updateHuman['father_id'],
//            'mother_id' => $updateHuman['mother_id'],
        ]);
    }

    public function test_can_delete_human_destroy()
    {
        $human = Human::factory()->create();

        $response = $this->delete(route('humans.destroy', $human->id));
        $response->assertStatus(302);
        $this->assertEquals(0, $human->count());
    }
}
