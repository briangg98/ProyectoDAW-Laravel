@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Proyecto</th>
                    <th>Categoría</th>
                    <th>Fecha de envío</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="task_key">{{ $task->id }}</td>
                    <td id="task_project">{{ $task->project->name }}</td>
                    <td id="task_category">{{ $task->category_name }}</td>
                    <td id="task_created_at">{{ $task->created_at }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Asignada a</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Severidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="task_responsible">{{ $task->support_name }}</td>
                    <td>{{ $task->level->name }}</td>
                    <td id="task_state">{{ $task->state }}</td>
                    <td id="task_priority">{{ $task->priority_full }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Título</th>
                    <td id="task_summary">{{ $task->title }}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td id="task_description">{{ $task->description }}</td>
                </tr>
                <tr>
                    <th>Adjuntos</th>
                    <td id="task_attachment">No se han adjuntado archivos</td>
                </tr>
            </tbody>
        </table>

        @if ($task->support_id == null && $task->active && auth()->user()->canTake($task))
        <a href="/incidencia/{{ $task->id }}/atender" class="btn btn-primary btn-sm" id="task_btn_apply">
            Atender incidencia
        </a>
        @endif

        @if (auth()->user()->id == $task->client_id)
            @if ($task->active)
                <a href="/incidencia/{{ $task->id }}/resolver" class="btn btn-info btn-sm" id="task_btn_solve">
                    Marcar como resuelto
                </a>
                <a href="/incidencia/{{ $task->id }}/editar" class="btn btn-success btn-sm" id="task_btn_edit">
                    Editar incidencia
                </a>
            @else
                <a href="/incidencia/{{ $task->id }}/abrir" class="btn btn-info btn-sm" id="task_btn_open">
                    Volver a abrir incidencia
                </a>
            @endif
        @endif

        @if (auth()->user()->id == $task->support_id && $task->active)
        <a href="/incidencia/{{ $task->id }}/derivar" class="btn btn-danger btn-sm" id="task_btn_derive">
            Derivar al siguiente nivel
        </a>
        @endif  
        
    </div>
</div>

    @include('layouts.chat')
@endsection