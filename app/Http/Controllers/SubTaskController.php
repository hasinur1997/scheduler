<?php

namespace App\Http\Controllers;

use App\SubTask;
use App\Task;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubTaskController extends Controller
{
    //

    public function index(Task $task)
    {
        
    }

    /**
     * Store subtask
     *
     * @param Request $request
     * @param Task $task
     * @return object
     */
    public function store(Request $request, Task $task)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'description'   => 'required',
            'start_date'    =>  'required',
            'end_date'      =>  'required',
            'completed_date'    =>  'required',
            'working_time'  =>  'required',
            'user_id'   =>  'required'
        ]);

        $subtask =  $task->subTasks()->create([
            'name'  =>  $request->name,
            'description' =>    $request->description,
            'start_date'    =>  $request->start_date,
            'end_date'      =>  $request->end_date,
            'completed_date'    =>  $request->completed_date,
            'working_time'  =>  $request->working_time,
            'user_id'   =>  $request->user_id  
        ]);


        return $subtask->with('user')->first();
    }

    /**
     * Update subtask
     *
     * @param Request $request
     * @param Task $task
     * @param SubTask $subTask
     * @return bool
     */
    public function update(Request $request, Task $task, SubTask $subtask)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'description'   => 'required',
            'start_date'    =>  'required',
            'end_date'      =>  'required',
            'completed_date'    =>  'required',
            'working_time'  =>  'required',
            'user_id'   =>  'required'
        ]);

        $subtask->update([
            'name'  =>  $request->name,
            'description' =>    $request->description,
            'start_date'    =>  $request->start_date,
            'end_date'      =>  $request->end_date,
            'completed_date'    =>  $request->completed_date,
            'working_time'  =>  $request->working_time,
            'user_id'   =>  $request->user_id  
        ]);

        return $subtask->with('user')->first();
    }

    public function destroy(Task $task, SubTask $subtask)
    {
        return $subtask->delete();
    }
}
