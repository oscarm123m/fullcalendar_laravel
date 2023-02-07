@extends('menu')

@section('contenido')
<div class="container">
<h1>Listado de clientes</h1>
<br>
<a href="{{route('crearclientes')}}">
    <button type="button" class="btn btn-success">Nuevo</button>
</a>
<br>
@if (Session::has('mensaje'))
  <div class="alert alert-success">{{Session::get('mensaje')}}</div>  
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre completo</th>
      <th scope="col">documentos</th>
      <th scope="col">celular</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    @foreach($consulta as $c)
    <tr>
      
      <th scope="row">{{$c->idclientes}}</th>
      <td>{{$c->nombre}} {{$c->apellido}}</td>
      <td>{{$c->documento}}</td>
      <td>{{$c->celular}}</td>
      <td>{{$c->email}}</td>
      <td>
      <a href="{{route('actualizarclientes',['idp'=>$c->idclientes])}}">
        <button type="button" class="btn btn-info">Modificar</button>
      </a>
      
      <a href="{{route('borrarclientes',['idp'=>$c->idclientes])}}">
        <button type="button" class="btn btn-secondary">Borrar</button>
      </a>
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@stop