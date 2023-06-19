<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyFirstTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/category');
        $response->assertDontSeeText('dfgd');
        $response->assertDontSeeText('ТеКст');
        $response->assertSeeText('текст');
        //Утверждают, что ответ имеет код состояния 201:
        $response->assertCreated();
        $response->assertStatus(200);






    }
}
