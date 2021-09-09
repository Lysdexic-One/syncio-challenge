<?php

namespace Tests\Feature;

use App\Repositories\PayloadRepository;
use App\Services\PayloadService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class GetDiffTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetDiffResponse()
    {
        $response = $this->get('/getDiff');

        $response->assertStatus(200);
    }

    public function testGetDiffViewCanBeRendered()
    {
        $view = $this->view(
            'getDiff',
            ['payload1' => "testCase", 'payload2' => 'testCase2', 'diff' => [['this is the diff', 0]]]
        );

        $view->assertSee('this is the diff');
    }

    public function testPayloadService()
    {

        $payloadRepository = new PayloadRepository();
        $payloadService = new PayloadService($payloadRepository);

        $test = $payloadService->getPayload(1);

        $this->assertNotNull($test);

       $this->mock(PayloadService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getPayload');
        });

    }
    public function testPayloadServiceInvalidId()
    {

        $payloadRepository = new PayloadRepository();
        $payloadService = new PayloadService($payloadRepository);

        $test = $payloadService->getPayload(3);

        $this->assertNull($test);

        $mock = $this->mock(PayloadService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getPayload');
        });

    }
}
