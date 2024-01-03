@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Tareas
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{route('tarea.create')}}" class="m-1">Nueva</a>
                                <a href="{{route('tarea.exportar',['extension'=>'xlsx'])}}" class="m-1">XLSX</a>
                                <a href="{{route('tarea.exportar',['extension'=>'csv'])}}" class="m-1">CSV</a>
                                <a href="{{route('tarea.exportarPdf')}}" target="_blank" class="m-1">PDF</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarea</th>
                            <th scope="col">Fecha Limite</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $tarea)
                            <tr>
                                <th scope="row">{{$tarea->id}}</th>
                                <td>{{$tarea->tarea}}</td>
                                <td>{{date('d/m/Y',strtotime($tarea->fecha_limite))}}</td>
                                <td>
                                    <a href="{{route('tarea.edit',$tarea->id)}}" >Editar</a>
                                    <form id="form_delete_{{$tarea->id}}" method="POST" action="{{route('tarea.destroy',['tarea'=>$tarea->id])}}" >
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_delete_{{$tarea->id}}').submit()">Eliminar</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="{{$tareas->previousPageUrl()}}">Previa</a></li>
                              @for ($i=1;$i<=$tareas->lastPage();$i++)
                                <li class="page-item {{$tareas->currentPage()==$i?'active':''}}">
                                    <a class="page-link" href="{{$tareas->url($i)}}">{{$i}}</a>
                                </li>
                              @endfor
                              <li class="page-item"><a class="page-link" href="{{$tareas->nextPageUrl()}}">Siguiente</a></li>
                            </ul>
                          </nav>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
