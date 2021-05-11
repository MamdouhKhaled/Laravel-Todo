<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoTest extends TestCase
{
    use RefreshDatabase;

    private $user, $todo, $authed = true;

    public function data()
    {
        $this->user = User::factory()->create();
        !$this->authed || Passport::actingAs($this->user);
        $this->todo = Todo::factory()->make([
            "user_id" => $this->user->id,
        ]);
    }

    public function test_Show_all_Todo()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        $todo = Todo::factory(1)->create();

        $request = $this->getJson('/api/v1/todos');
        $request->assertOk();
        $request->assertJson([
            "todos" => $todo->toArray()
        ]);
    }

    public function test_user_can_show_Todo_invalid_id()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        $response = $this->getJson('/api/v1/todos/-1');
        $response->assertNotFound();
        $response->assertJson(["message" => "No have Record", "data" => []]);
    }

    public function test_user_can_show_Todo()
    {
        $this->withoutExceptionHandling();
        $this->data();
        $todo = Todo::factory()->create();
        $request = $this->getJson('/api/v1/todos/' . $todo->id);
        $request->assertJson(["data" => $todo->toArray()]);
    }


    public function test_user_can_add_todo()
    {
        $this->data();
        $request = $this->postJson('/api/v1/todos', $this->todo->toArray());
        $request->assertCreated();
        $request->assertJson(["message" => "created"]);
        $this->assertDatabaseCount('Todos', 1);
    }

    public function test_user_can_update_title_todo()
    {
        $this->data();
        $todo = Todo::factory()->create();
        $request = $this->putJson('/api/v1/todos/' . $todo->id,
            [
                "title" => "New Title New Title New Title",
                "user_id" => $todo->user_id,
            ]);
        $todo->title = "New Title New Title New Title";
        $todo->status = (string)$todo->status;
        $request->assertOk();
        $request->assertJson(["message" => "update", "data"=> $todo->toArray()]);
        $this->assertDatabaseHas('Todos', [
            "title" => "New Title New Title New Title"
        ]);
    }


    public function test_User_Can_Delete_Todo()
    {
        $this->data();
        $todo = Todo::factory()->create([
            'user_id' => $this->user->id,
        ]);
        $this->assertDatabaseCount('Todos', 1);
        $request = $this->deleteJson('/api/v1/todos/' . $todo->id);
        $this->assertDatabaseCount('Todos', 0);
        $request->assertJson(["message" => "Deleted"]);
    }

    public function test_User_Can_Delete_Todo_invalid_ID()
    {
        $this->data();
        $request = $this->deleteJson('/api/v1/todos/-1');
        $request->assertJson(["message" => "We cannot Delete this Todo"]);
    }


}
