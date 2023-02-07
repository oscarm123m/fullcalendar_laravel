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
<div class="login-register">
    <div class="login-box card">
        <div class="card-body">
    <form action="{{route('validar')}}" method="POST">
        <h3 class="box-title m-b-20">Inicio de Session</h3>
        {{ csrf_field() }}
        <div class="well">
            <div class="form-group">
                <label for="dni">Usuario:
                    @if($errors->first('usuario'))
                    <p class='text-danger'>{{$errors->first('usuario')}}</p>
                    @endif
                </label>
                <input type="text" name="usuario" id="usuario" value="" class="form-control" placeholder="Usuario">

            </div>
            <div class="form-group">
                <label for="dni">Password:
                    @if($errors->first('password'))
                    <p class='text-danger'>{{$errors->first('password')}}</p>
                    @endif
                </label>
                <input type="text" name="password" id="password" value="" class="form-control" placeholder="password">

            </div>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="submit" value="Iniciar" class="btn btn-danger">
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    No tiene una cuenta? <a href="{{route('registro')}}" class="text-info m-l-5"><b>Registro</b></a>
                </div>
            </div>
        </div>
    </form>
    
                
        </div>
    </div>
</div>
    @if (Session::has('mensaje'))
        <div class="alert alert-danger">{{Session::get('mensaje')}}</div>
    @endif
    
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>

