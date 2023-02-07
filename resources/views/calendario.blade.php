@extends('menu')

@section('contenido')
<div class="container">
  <div class="jumbotron">
     <div class="container text-center">
        <h1>Calendario</h1>
     </div>
  </div>
  <div id='calendar'></div>
</div>
<script>
  $(document).ready(function () {
     
  var SITEURL = "{{ url('/') }}";
    
  $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
  var calendar = $('#calendar').fullCalendar({
                      editable: true,
                      events: SITEURL + "/calendario",
                      displayEventTime: false,
                      editable: true,
                      eventRender: function (event, element, view) {
                          if (event.allDay === 'true') {
                                  event.allDay = true;
                          } else {
                                  event.allDay = false;
                          }
                      },
                      selectable: true,
                      selectHelper: true,
                      
                  });
   
  });
   
  function displayMessage(message) {
      toastr.success(message, 'Event');
  } 
    
</script>
@stop   