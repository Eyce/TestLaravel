@extends('template')

@section('contenu')
    {{ Form::open(array('url' => 'users/infos')) }}
        {{ Form::label('nom', 'Entrez votre nom : ') }}
        {{ Form::text('nom') }}
        {{ Form::submit('Envoyer !') }}
	{{ Form::close() }}
@stop