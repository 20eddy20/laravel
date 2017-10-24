@extends('layouts.admin')
    @section('content')

        <?php /* Llamar al fichero de gestion de errores */ ?>
        @include('alerts.request')

        {!!Form::open(array('route' => 'usuario.store', 'method' => 'POST'))!!}
            @include('usuario.forms.user')
        {!!Form::submit('Registrar',['class'=>'btn btn.primary'])!!}
        {!!Form::close()!!}
    @stop
