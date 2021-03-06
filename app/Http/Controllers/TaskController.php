<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display only task related to the user
        $userId = Auth::user()->id;
        $tasks = Task::where('user_id',$userId)->get();

		return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //require value
        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'detail' => 'required|max:255',
        ]);

        //store values in the db + "done" is false by default + store user_id
        Auth::user()->tasks()->create([
            'name' => $data['name'],
            'detail' => $data['detail'],
            'done' => 0,
        ]);


        return redirect()->route('task.index')
                        ->with('success','Task created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        //require values
        request()->validate([
            'name' => 'required|max:255',
            'detail' => 'required|max:255',
            'done' => 'required',
        ]);

        

        $task->update($request->all());


        return redirect()->route('task.index')
                        ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();


        return redirect()->route('task.index')
                        ->with('success','task deleted successfully');
    }
}
