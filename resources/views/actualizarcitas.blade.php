@extends('menu')

@section('contenido')
<div class="container">
<h1>Actualizar Citas</h1>
<hr>
<form action = "{{route('guardarcambiocitas')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="well">
        <input type="hidden" value="{{$consulta->idcitas}}" name="idcitas" id="idcitas" class="form-control" placeholder="" tabindex="5">

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Mascota:</label>
                    <select name = 'iddue' class="custom-select form-control">
                      <option value="{{$consulta->idmascotas}}">{{$consulta->nom}}</option>
                      @foreach($mascotas as $clie)
                      <option value="{{$clie->idmascotas}}">{{$clie->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>

            

        </div>
      
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="start">fecha:
                        @if($errors->first('start'))
                        <p class='text-danger'>{{$errors->first('start')}}</p>
                        @endif
                    </label>
                <input type="date" value="{{$consulta->start}}" name="start" id="start" class="form-control" placeholder="Fecha" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Hora:</label>
                    
                    
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            <span class="glyphicon glyphicon-globe"></span>
                        </span>
                        <select class="form-control" id="end" name="end" required>
                            <option value="{{$consulta->end}}">{{$consulta->end}}</option>
                           </select>  
                   </div>
                      
                      
                      <!--<option value="08:00:00">08:00</option>
                      <option value="09:00:00">09:00</option>
                      <option value="10:00:00">10:00</option>
                      <option value="11:00:00">11:00</option>
                      <option value="12:00:00">12:00</option>
                      <option value="01:00:00">01:00</option>
                      <option value="02:00:00">02:00</option>
                      <option value="03:00:00">03:00</option>
                      <option value="04:00:00">04:00</option>
                      <option value="05:00:00">05:00</option>
                      <option value="06:00:00">06:00</option>-->
                      
                    
                  </div>
            </div>
        </div>

        
        
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>
<script type="text/javascript">
    /*$(function(){
        $('#start').on('change',onSelectProjectChange);
    });
    function onSelectProjectChange(){
        var project_id =$(this).val();
        //alert(project_id);


    }/*


    /*$(document).ready(function(){
        recargarLista();

        $('#start').change(function() {
            recargarLista();
            //console.log(recargarLista);
        });
    });

    function recargarLista(){
            $.ajax({
                url:'../../app/Http/Controllers/CitasController.php',
                type:"POST",
                data:"tipopro="+ $('#start').val(),
                success:function(r){
                    $('#end').html(r);
                }
            });
        }*/

        ///-----------------------------------------------
        
        $(function(){
            $('#start').on('change',onSelectProjectChange);
        });
        function onSelectProjectChange(){
        var region =$(this).val();
        console.log(region);
            
            if(!region){ 
                $('#end').html('No ha Seleccione una Región'); 
                return; 
            } 
         $.get('end/'+region, function(data) { 
            /*var html_select = 'Seleccione una hora'; 
            for(var i=0; i<data.length; ++i) html_select += ''+data[i].end+'';
            $('#end').html(html_select);*/
            //------------
            var opciones ="<option value=''>Elegir</option>";
            if (data=='') {
                    opciones+='<option value="08:00:00">08:00</option>';
                    opciones+='<option value="09:00:00">09:00</option>';
                    opciones+='<option value="10:00:00">10:00</option>';
                    opciones+='<option value="11:00:00">11:00</option>';
                    opciones+='<option value="12:00:00">12:00</option>';
                    opciones+='<option value="01:00:00">01:00</option>';
                    opciones+='<option value="02:00:00">02:00</option>';
                    opciones+='<option value="03:00:00">03:00</option>';
                    opciones+='<option value="04:00:00">04:00</option>';
                    opciones+='<option value="05:00:00">05:00</option>';
                    opciones+='<option value="06:00:00">06:00</option>';
                }
                
            for (var i=0; i<data.length; ++i) {
                console.log(data.length);
                if (data[i].end=='') {
                    
                } else {
                    
                }
            //for (var i=0; i<11;i=i+1){
               opciones+= '<option value="'+data[i].end+'">'+data[i].end+'</option>';
            }
            document.getElementById("end").innerHTML = opciones;
            //--------------
            }); 
            }
</script>
  @stop