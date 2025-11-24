<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth as SupportFacadesAuth;

class TaskController extends Controller
{

     public function getAllTasks()
    {
        $tasks=Task::all();
        return response() ->json($tasks , 200);
    }


    public function addcategoriestoTask(Request $request, $taskid)
    {
        $task=Task::findOrfail($taskid);
        $task->categories()->attach($request->category_id);
        return response()->json('category attach successfully', 200);
    }


    public function index()
    {
        $task=Auth::user()->tasks;
        return response() ->json($task , 200);
    }

    public function store(StoreTaskRequest $request)
    {
        $user_id=Auth::user()->id;
        $validateddata=$request->validated();
        $validateddata['user_id']=$user_id;
        $task=Task::create($validateddata);
        return response() ->json($task , 201);
    }

     public function update(UpdateTaskRequest $request, $id)
    {
        $user_id= Auth::user()->id;
        $task=Task::findorfail($id);
        if($task->user_id!=$user_id);
        return response() ->json(['message'=>'unauthurized'] , 403);

        $task->update($request->validated());
        return response()->json($task, 200);
    }

    public function show($id)
    {
        $task= Task::find($id);
        return response()->json($task, 200,);
    }

    public function destroy($id)
    {
        try{
        $task=Task::FindOrFail($id);
        $task->delete();
        return response()->json('task deleted succuessfully', 200, );
        }
        catch(Exception $m){
        return response()->json([
            'error'=> 'Task Not Found',
            'details'=> $m->getMessage()
        ],404);
        }
    }
}
