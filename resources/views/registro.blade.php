<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
</head>
<body>
    
<div class="container">
<div class="login-register" >
    <div class="login-box card">
        <div class="card-body">
<form action = "{{route('registrardatos')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <h3 class="box-title m-b-20">Registro</h3>
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
                <div class="form-group">
                    <label for="email">email:
                        @if($errors->first('email'))
                        <p class='text-danger'>{{$errors->first('email')}}</p>
                        @endif
                    </label>
                    <input type="text" value="{{old('email')}}" name="email" id="email" class="form-control" placeholder="email" tabindex="2" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">password:
                        @if($errors->first('password'))
                        <p class='text-danger'>{{$errors->first('password')}}</p>
                        @endif
                    </label>
                    <input type="password" value="{{old('password')}}" name="password" id="password" class="form-control" placeholder="******" tabindex="3" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="passwordrepetir">repetir password:
                        @if($errors->first('passwordrepetir'))
                        <p class='text-danger'>{{$errors->first('passwordrepetir')}}</p>
                        @endif
                    </label>
                    <input type="password" value="{{old('passwordrepetir')}}" name="passwordrepetir" id="passwordrepetir" class="form-control" placeholder="******" tabindex="4">
                </div>
            </div>
        </div>

        
        
        
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>
            
        </div>
    </div>
</div>
</div>
@if (Session::has('mensaje'))
<div class="alert alert-danger">{{Session::get('mensaje')}}</div>
@endif
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>

