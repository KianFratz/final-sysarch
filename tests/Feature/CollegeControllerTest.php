<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\College;

class CollegeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_college()
    {
        $response = $this->post('/colleges', [
            'CollegeName' => 'Test College',
            'CollegeCode' => 'TC001',
            'CollegeEmail' => 'test@college.edu',
            'CollegePhone' => '1234567890',
        ]);

        $response->assertRedirect('/colleges'); // Adjust if your route differs
        $this->assertDatabaseHas('colleges', [
            'CollegeName' => 'Test College',
            'CollegeCode' => 'TC001',
        ]);
    }
}
