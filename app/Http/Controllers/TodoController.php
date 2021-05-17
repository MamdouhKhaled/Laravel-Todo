<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function index()
    {
        $todo = Auth::user()->todos()->paginate(20);
        return response()->json(new TodoResource($todo));
    }

    public function store(TodoRequest $request)
    {
        $data = $request->validated();
        $todo = Auth::user()->todos()->create($data);
        return response()->json(
            ['message' => "created", "data" => new TodoResource($todo)], 201);
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = Auth::user()->todos()->find($id);
        if (!is_null($todo)) {
            $todo->update($request->validated());
            return response()->json(
                ['message' => "update", "data" => new TodoResource($todo)]);
        }
        return response()->json(
            ['message' => "You are not authorized!", "data" => []], 403);
    }

    public function show($id)
    {
        $todo = Auth::user()->todos()->find($id);
        if (!is_null($todo))
            return new TodoResource($todo);
        else
            return response()->json(["message" => "No have Record", 'data' => []], 404);
    }

    public function destroy($id)
    {
        $todo = Auth::user()->todos()->find($id);
        if (!is_null($todo)) {
            $todo->delete();
            return response()->json(['message' => "Deleted"]);
        }
        return response()->json(['message' => "We cannot Delete this Todo"]);
    }
}
