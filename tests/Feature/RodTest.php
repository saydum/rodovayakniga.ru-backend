<?php

namespace Tests\Feature;

use App\Models\Rod;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RodTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function call_get_all_rod_index(): void
    {
        $rod = Rod::factory(10)->create();

        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
