@extends('layouts.admin')
    @section('content')

        <?php /* Llamar al fichero de gestion de errores */ ?>
        @include('alerts.request')

        {{ Form::model($user, array('route' => array('usuario.update', $user->id), 'method' => 'PUT')) }}
            @include('usuario.forms.user')
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}

        {{ Form::open(array('route' => array('usuario.destroy', $user->id), 'method' => 'DELETE')) }}
            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
        {!!Form::close()!!}
    @stop

