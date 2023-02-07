@extends('menu')

@section('contenido')
<div class="container">
<h1>Actualizar Mascota</h1>
<hr>
<form action = "{{route('guardarcambiomascotas')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="well">
        <input type="hidden" value="{{$consulta->idmascotas}}" name="idmascotas" id="idmascotas" class="form-control" placeholder="" tabindex="5">
      
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre:
                        @if($errors->first('nombre'))
                        <p class='text-danger'>{{$errors->first('nombre')}}</p>
                        @endif
                    </label>
                <input type="text" value="{{$consulta->nombre}}" name="nombre" id="nombre" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="identificador">Identificador:
                        @if($errors->first('identificador'))
                        <p class='text-danger'>{{$errors->first('identificador')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{$consulta->identificador}}" name="identificador" id="identificador" class="form-control" placeholder="identificador" tabindex="2">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Dueño:</label>
                    <select name = 'iddue' class="custom-select form-control">
                      <option value="{{$consulta->idcli}}">{{$consulta->nom}} {{$consulta->apel}}</option>
                      @foreach($clientes as $clie)
                      <option value="{{$clie->idclientes}}">{{$clie->nombre}} {{$clie->apellido}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Tipo de mascota:</label>
                    <select name ='idmas' class="custom-select form-control">
                        <option value="{{$consulta->tipo}}">{{$consulta->tipo}}</option>
                      
                      <option value="perro">Perro</option>
                      <option value="gato">Gato</option>
                      <option value="conejo">Conejo</option>
                      <option value="caballo">Caballo</option>
                      
                    </select>
                  </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>
  @stop