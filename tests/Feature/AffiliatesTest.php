<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;

class AffiliatesTest extends TestCase
{
   public const AFFILIATES = 'Affiliates';

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_page()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);

        $page = $response->viewData('page');

        $this->assertEquals(self::AFFILIATES, $page['component']);

    }

    public function test_the_application_returns_page_with_data()
    {
        $response = $this->get('/');
        $response->assertStatus(Response::HTTP_OK);


        $page = $response->viewData('page');
        $this->assertEquals(self::AFFILIATES, $page['component']);

        $response->assertValid($page['props']['sortedResults']);
        $this->assertCount(16, $page['props']['sortedResults']);

    }
}
