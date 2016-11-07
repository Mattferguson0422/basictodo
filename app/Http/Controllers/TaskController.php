<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
	// Show all Tasks
    public function index() {
    	$tasks = Task::orderBy('created_at', 'asc')->get();

    	return view('tasks', compact('tasks'));
    }

    // Add task and validate
    public function create(Request $request) {

	    $validator = Validator::make($request->all(), [
	        'name' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    // Create The Task...
	    $task = new Task;
	    $task->name = $request->name;
	    $task->save();

	    return redirect('/');
    }

    public function remove($id) {
    	Task::findOrFail($id)->delete();

	    return redirect('/');
	}
}
