@extends('layouts.admin')
    @section('content')
        @include('genero.modal')
        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            <strong>Genero Actualizado Correctamente.</strong>
        </div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Operaciones</th>
            </thead>
            <tbody id="datos"></tbody>
        </table>
    @endsection

    <!-- Se especifica el script que solo se va a usar -->
    @section('scripts')
        {!!Html::script('js/script2.js') !!}
    @endsection