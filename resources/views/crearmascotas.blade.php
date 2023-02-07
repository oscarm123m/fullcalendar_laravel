@extends('menu')

@section('contenido')
<div class="container">
<h1>Crear mascota</h1>
<hr>
<form action = "{{route('guardarmascotas')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="well">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre:
                        @if($errors->first('nombre'))
                        <p class='text-danger'>{{$errors->first('nombre')}}</p>
                        @endif
                    </label>
                <input type="text" value="{{old('nombre')}}" name="nombre" id="nombre" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="identificador">Identificador:
                        @if($errors->first('identificador'))
                        <p class='text-danger'>{{$errors->first('identificador')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{old('identificador')}}" name="identificador" id="identificador" class="form-control" placeholder="identificador" tabindex="2">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Dueño:</label>
                    <select name = 'iddue' class="custom-select form-control">
                      <option selected="">Selecciona el dueño</option>
                      @foreach($departamentos as $depa)
                      <option value="{{$depa->idclientes}}">{{$depa->nombre}} {{$depa->apellido}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Tipo de mascota:</label>
                    <select name ='idmas' class="custom-select form-control">
                      <option selected="">Selecciona un tipo</option>
                      
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