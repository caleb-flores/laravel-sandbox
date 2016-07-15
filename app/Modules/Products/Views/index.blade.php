@extends('layouts.master')

@section('content')
    <a href="/Products/create">new</a>
<table>
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Opciones</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>
                <form method="POST" action="/Products/{{$product->id}}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <input type="submit" value="eliminar">
                </form>
            </td>
        </tr>
    @endforeach


    </tbody>
</table>
@stop