

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'dayGridMonth',
      locale:'es',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      events:"http://127.0.0.1:8000/evento/mostrar",

      dateClick:function(info){  
        formulario.reset();

        //asignamos las fechas en en formulario
        formulario.start.value = info.dateStr;     
        formulario.end.value = info.dateStr;     

        $('#evento').modal('show');
      },
      eventClick: function (info) {
        var evento = info.event;

        axios.post("http://127.0.0.1:8000/evento/editar/"+info.event.id).
        then(
          (respuesta)=>{

            formulario.id.value = respuesta.data.id;
            formulario.title.value = respuesta.data.title;
            formulario.descripcion.value = respuesta.data.descripcion;
            formulario.start.value = respuesta.data.start;
            formulario.end.value = respuesta.data.end;

            //mostar el nodal             
            $("#evento").modal("show");
          }
          ).catch(
            error=>{if(error.response){console.log(error.response.data);}
            }
        )
        
      }

    });
    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function(){

      enviarDatos("http://127.0.0.1:8000/evento/agregar");      
    });

    document.getElementById("btnEliminar").addEventListener("click", function(){

      enviarDatos("http://127.0.0.1:8000/evento/borrar/" + formulario.id.value);    
    });

    function enviarDatos(url){
      const datos = new FormData(formulario);
      axios.post(url, datos).
      then(
        (respuesta)=>{
          calendar.refetchEvents();          
          $("#evento").modal("hide");
        }
        ).catch(
          error=>{if(error.response){console.log(error.response.data);}
          }
        )

    }

    

  });      
