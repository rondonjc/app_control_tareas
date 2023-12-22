@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Tarea') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('tarea.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="tarea">Tarea</label>
                          <input type="text" class="form-control" id="tarea" placeholder="Enter email" name="tarea">
                        </div>
                        <div class="form-group">
                          <label for="fecha_limite">Fecha Limite</label>
                          <input type="date" class="form-control" id="fecha_limite"  name="fecha_limite" placeholder="Fecha Limite">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Crear</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
