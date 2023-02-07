@extends('menu')

@section('contenido')
<div class="container">
<h1>Listado de mascotas</h1>
<br>
<a href="{{route('crearmascotas')}}">
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
      <th scope="col">Nombre dueño</th>
      <th scope="col">Nombre mascota</th>
      <th scope="col">identificador</th>
      <th scope="col">tipo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($consulta as $c)
    <tr>
      
      <th scope="row">{{$c->idmascotas}}</th>
      <td>{{$c->nom}} {{$c->ape}}</td>
      <td>{{$c->nombre}}</td>
      <td>{{$c->identificador}}</td>
      <td>{{$c->tipo}}</td>
      <td>
      <a href="{{route('actualizarmascotas',['idp'=>$c->idmascotas])}}">
        <button type="button" class="btn btn-info">Modificar</button>
      </a>
      
      <a href="{{route('borrarmascotas',['idp'=>$c->idmascotas])}}">
        <button type="button" class="btn btn-secondary">Borrar</button>
      </a>
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@stop