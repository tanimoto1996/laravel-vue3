<?php 
namespace Tests\Feature;

use App\Models\User;
use App\Services\ItemService;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    private $itemService;

    public function setUp(): void
    {
        parent::setUp();
        $this->itemService = \Mockery::mock(ItemService::class);
        $this->app->instance(ItemService::class, $this->itemService);
    }

    public function testIndex()
    {
        $this->itemService->shouldReceive('getAllItems')
            ->once()
            ->andReturn(collect(['dummy data']));

        $user = User::factory()->create(); // あるいは既存のユーザーを取得
        $response = $this->actingAs($user)->get(route('items.index'));

        $response->assertStatus(200);
    }

    public function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }
}