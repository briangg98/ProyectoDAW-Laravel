@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Proyectos</div>
    <div class="panel-body">
        @if (session('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
    @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $project->description) }}">
            </div>
            <div class="form-group">
                <label for="start">Fecha de Inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $project->start) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar Proyecto</button>
                </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                <p>Categorias</p>
                <form action="/categorias" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Añadir</button> 
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar Categoria" data-category="{{ $category->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/categoria/{{ $category->id }}/eliminar" class="btn btn-sm btn-danger" title="Quitar Categoria">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <p>Niveles</p>
                <form action="/niveles" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nivel" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Añadir</button> 
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $key => $level)
                        <tr>
                            <td>N {{ $key+1 }}</td>
                            <td>{{ $level->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar Nivel" data-level="{{ $level->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger" title="Quitar Nivel">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalEditCategory">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/categoria/editar" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
              <input type="hidden" name="category_id" id="category_id" value="">
              <div class="form-group">
                  <label for="name">Nombre de la Categoria</label>
                  <input type="text" class="form-control" name="name" id="category_name" value="">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="modalEditLevel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Nivel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/nivel/editar" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
              <input type="hidden" name="level_id" id="level_id" value="">
              <div class="form-group">
                  <label for="name">Nombre de el nivel</label>
                  <input type="text" class="form-control" name="name" id="level_name" value="">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/admin/projects/edit.js"></script>
@endsection

