@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$tarea->tarea }}</div>
                <div class="card-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="fecha_limite">Fecha Limite</label>
                            <input type="date" class="form-control" id="fecha_limite"  value="{{$tarea->fecha_limite }}" >
                        </div>
                    </fieldset>
                    <br>
                    <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
