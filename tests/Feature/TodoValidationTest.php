<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class TodoValidationTest extends TestCase
{
    use RefreshDatabase;

    private $user, $todo;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Passport::actingAs($this->user);
        $this->todo = Todo::factory()->make();
    }

    public function testCannotCreateTodoWithoutTitle()
    {
        $this->todo->title = "";
        $response = $this->postJson('/api/v1/todos', $this->todo->toArray());
        $response->assertJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "title" => [
                    "Title Cannot be Empty.."
                ]
            ]
        ]);
    }

    public function testTitleLengthMinimumIs20Char()
    {
        $this->todo->title = "asda";
        $response = $this->postJson('/api/v1/todos', $this->todo->toArray());
        $response->assertJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "title" => [
                    "Minimum Length is 10 characters"
                ]
            ]
        ]);
    }

    public function testCannotCreateTodoWithoutUserID()
    {

        $this->todo->user_id = "";
        $response = $this->postJson('/api/v1/todos', $this->todo->toArray());
        $response->assertJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "user_id" => [
                    "Must Be Authed User"
                ]
            ]
        ]);
    }

    public function testCannotCreateTodoWithUserIdNotNumber()
    {

        $this->todo->user_id = "aa";
        $response = $this->postJson('/api/v1/todos', $this->todo->toArray());
        $response->assertJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "user_id" => [
                    "The user id must be a number."
                ]
            ]
        ]);
    }
}
