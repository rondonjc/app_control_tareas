@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Tarea') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('tarea.update',['tarea'=>$tarea->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="tarea">Tarea</label>
                          <input type="text" class="form-control" id="tarea" value="{{$tarea->tarea}}" placeholder="Nombre de la Tarea" name="tarea">
                        </div>
                        <div class="form-group">
                          <label for="fecha_limite">Fecha Limite</label>
                          <input type="date" class="form-control" id="fecha_limite" value="{{$tarea->fecha_limite}}" name="fecha_limite" placeholder="Fecha Limite">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
