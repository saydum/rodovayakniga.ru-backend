<?php

namespace Tests\Feature\Http;

use App\Models\Human;
use App\Models\Rod;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HumanControllerTest extends TestCase
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
        $human = Human::factory()->create(['name' => 'Ivan']);

        $this->actingAs($this->user)
            ->get(route('humans.edit', $human->id))
            ->assertViewIs('app.human.edit')
            ->assertViewHas('human', function (Human $human) {
                return $human->name === 'Ivan';
        })
            ->assertOk();
    }

    public function testShow()
    {
        $human = Human::factory()->create(['name' => 'Ivan']);

        $this->actingAs($this->user)
            ->get(route('humans.show', $human->id))
            ->assertViewIs('app.human.show')
            ->assertOk();
    }

    public function testCreate()
    {
        $this->actingAs($this->user)
            ->get(route('humans.create'))
            ->assertViewIs('app.human.add')
            ->assertOk();
    }

    public function testIndex()
    {
        $humans = Rod::factory(5)->create();

        $this->assertEquals(5, $humans->count());

        $this->actingAs($this->user)
            ->get(route('humans.index'))
            ->assertViewIs('app.human.index')
            ->assertOk();
    }

    public function testStore()
    {
        $human = ['name' => 'Saydum'];

        $this->actingAs($this->user)
            ->post(route('humans.store', $human))
            ->assertStatus(302)
            ->assertRedirect(route('humans.index'));
    }

    public function testUpdate()
    {
        $human = Human::factory()->create();
        $updateHuman = ['name' => 'Saydum',];

        $this->actingAs($this->user)
            ->put(route('humans.update', $human->id, ), $updateHuman)
            ->assertStatus(302)
            ->assertRedirect(route('humans.index'));
    }

    public function testDestroy()
    {
        $human = Human::factory()->create();

        $this->actingAs($this->user)
            ->delete(route('humans.destroy', $human->id))
            ->assertStatus(302)
            ->assertRedirect(route('humans.index'));

        $this->assertEquals(0, Human::count());
    }
}
