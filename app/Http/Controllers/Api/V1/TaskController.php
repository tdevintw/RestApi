<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\V1\TaskCollection;
use App\Http\Resources\V1\TaskResource;
use Illuminate\Support\Facades\Auth;
use APP\Policies\TaskPolicy;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user = Auth::user();
        $tasks = Task::all()->where('user_id',$user->id);
        return new TaskCollection($tasks);

        
    }


    public function store(StoreTaskRequest $request)
    {
        return new TaskResource(Task::create($request->all()));
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        $this->authorize('view', $task);
        return new TaskResource($task);

    }



    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->all());
        return new TaskResource($task);
    }


    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return response()->noContent();
    }
}
