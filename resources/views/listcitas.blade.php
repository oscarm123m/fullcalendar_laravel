@extends('menu')

@section('contenido')
<div class="container">
<h1>Listado de citas</h1>
<br>
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6">
  <a href="{{route('crearcitas')}}">
    <button type="button" class="btn btn-success">Nuevo</button>
</a>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
  <a href="{{route('calendario')}}">
    <button type="button" class="btn btn-warning">Calendario</button>
</a>
</div>
</div>

<br>
@if (Session::has('mensaje'))
  <div class="alert alert-success">{{Session::get('mensaje')}}</div>  
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre mascota</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
    </tr>
  </thead>
  <tbody>
    @foreach($consulta as $c)
    <tr>
      
      <th scope="row">{{$c->idcitas}}</th>
      <td>{{$c->nom}}</td>
      <td>{{$c->start}}</td>
      <td>{{$c->end}}</td>
      <td>
      <a href="{{route('actualizarcitas',['idp'=>$c->idcitas])}}">
        <button type="button" class="btn btn-info">Modificar</button>
      </a>
      
      <a href="{{route('borrarcitas',['idp'=>$c->idcitas])}}">
        <button type="button" class="btn btn-secondary">Borrar</button>
      </a>
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@stop