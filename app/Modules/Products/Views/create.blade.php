@extends('layouts.master')

@section('content')
    <h1>Create</h1>
    <form action="/Products" method="POST">
        {!! csrf_field() !!}
        <input type="text" name="name" value="{{old('name')}}"/>
        <input type="submit" value="create">
    </form>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@stop