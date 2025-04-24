<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\MeetingLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeetingLocationTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/meetingLocations';
    protected string $tableName = 'meetingLocations';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateMeetingLocation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = MeetingLocation::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllMeetingLocationsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        MeetingLocation::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(MeetingLocation::find(rand(1, 5))->name);
    }

    public function testViewAllMeetingLocationsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        MeetingLocation::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateMeetingLocationValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewMeetingLocationData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        MeetingLocation::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(MeetingLocation::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateMeetingLocation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        MeetingLocation::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteMeetingLocation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        MeetingLocation::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, MeetingLocation::count());
    }
    
}
