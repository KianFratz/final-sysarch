<?php

namespace Tests\Feature;

use Tests\TestCase;

class CiGateTest extends TestCase
{
    /** @test */
    public function this_will_fail_for_ci()
    {
        $this->assertTrue(false, 'Intentionally failing to test CI gate');
    }
}
