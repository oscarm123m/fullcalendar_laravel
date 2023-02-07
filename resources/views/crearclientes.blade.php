@extends('menu')

@section('contenido')
<div class="container">
<h1>Crear cliente</h1>
<hr>
<form action = "{{route('guardarclientes')}}" method = "POST" enctype="multipart/form-data">
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
                    <label for="apellido">Apellido:
                        @if($errors->first('apellido'))
                        <p class='text-danger'>{{$errors->first('apellido')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{old('apellido')}}" name="apellido" id="apellido" class="form-control" placeholder="Apellido" tabindex="2">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="documento">Documento:
                        @if($errors->first('documento'))
                        <p class='text-danger'>{{$errors->first('documento')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{old('documento')}}" name="documento" id="documento" class="form-control" placeholder="Documento" tabindex="4">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email:
                        @if($errors->first('email'))
                        <p class='text-danger'>{{$errors->first('email')}}</p>
                        @endif
                    </label>
                    <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">Celular:
                        @if($errors->first('celular'))
                        <p class='text-danger'>{{$errors->first('celular')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{old('celular')}}" name="celular" id="celular" class="form-control" placeholder="Celular" tabindex="3">
                </div>
            </div>

        </div>
        
        
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>
  @stop