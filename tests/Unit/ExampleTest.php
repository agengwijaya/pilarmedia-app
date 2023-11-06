<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $room = new User(["Ageng", "Wijaya", "Test"]);
        $this->assertTrue($room->has("Ageng"));
        $this->assertFalse($room->has("Eric"));
    }
}
