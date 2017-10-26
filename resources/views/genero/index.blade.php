@extends('layouts.admin')
    @section('content')

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