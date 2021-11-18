<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function show($id)
    // {
    //     $task = Task::findOrFail($id);
    //     $messages = $task->messages;
    //     return view('tasks.show')->with(compact('task', 'messages'));
    // }

    public function create()
    {
        $categories = Category::where('project_id', auth()->user()->selected_project_id)->get();
        return view('manage')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'sometimes|exists:categories,id',
            'priority' => 'required|in:B,N,A',
            'title' => 'required|min:5',
            'description' => 'required|min:15'
        ];

        $messages = [
            'category_id.exists' => 'La categoría que ha seleccionado no existe.',
            'title.required' => 'Ingresé un título a la tarea.',
            'title.min' => 'El título tiene que tener mínimo 5 caracteres.',
            'description.required' => 'Ingresé una descripción a la tarea.',
            'description.min' => 'La descripción tiene que tener mínimo 15 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $task = new Task();
        $task->category_id = $request->input('category_id') ?: null;
        $task->priority = $request->input('priority');
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->usercreate_id = auth()->user()->id;
        $task->save();

        return back();
    }
}
