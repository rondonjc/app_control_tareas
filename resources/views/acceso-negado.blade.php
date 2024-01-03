@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Acceso Negado') }}</div>

                <div class="card-body">
                    <p>Usted no tiene acceso a esta pagina</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
