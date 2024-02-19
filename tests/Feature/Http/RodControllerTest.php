<?php

namespace Tests\Feature\Http;

use App\Models\Rod;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RodControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testEdit() : void
    {
        $rod = Rod::factory()->create([
            'name' => 'ROD',
            'user_id' => 1
        ]);

        $this->actingAs($this->user)
            ->get(route('rods.edit', $rod->id))
            ->assertViewIs('app.rod.edit')
            ->assertViewHas('rod', function (Rod $rod) {
                return $rod->name === 'ROD';
        })
            ->assertOk();
    }

    public function testShow()
    {
        $rod = Rod::factory()->create([
            'name' => 'ROD',
            'user_id' => 1
        ]);

        $this->actingAs($this->user)
            ->get(route('rods.show', $rod->id))
            ->assertViewIs('app.human.index')
            ->assertOk();
    }

    public function testCreate()
    {
        $this->actingAs($this->user)
            ->get(route('rods.create'))
            ->assertViewIs('app.rod.add')
            ->assertOk();
    }

    public function testIndex()
    {
        $rods = Rod::factory(5)->create();

        $this->assertEquals(5, $rods->count());

        $this->actingAs($this->user)
            ->get(route('rods.index'))
            ->assertViewIs('app.rod.index')
            ->assertOk();
    }

    public function testStore()
    {
        $data = ['name' => 'Saydum', 'user_id' => 1];
        $this->actingAs($this->user)
            ->post(route('rods.store', $data))
            ->assertStatus(302)
            ->assertRedirect(route('rods.index'));
    }

    public function testUpdate()
    {
        $rod = Rod::factory()->create();
        $updateRod = ['name' => 'Saydum', 'user_id' => 1];

        $this->actingAs($this->user)
            ->put(route('rods.update', $rod->id, ), $updateRod)
            ->assertStatus(302)
            ->assertRedirect(route('rods.index'));
    }

    public function testDestroy()
    {
        $rod = Rod::factory()->create();

        $this->actingAs($this->user)
            ->delete(route('rods.destroy', $rod->id))
            ->assertStatus(302)
            ->assertRedirect(route('rods.index'));

        $this->assertEquals(0, Rod::count());
    }
}
