

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEventos");

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'America/Bogota',
      initialView: 'dayGridMonth',
      locale:'es',
      displayEventTime: false,
      selectable: true,
      selectHelper: true ,
      // editable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      events: baseURL+"/evento/mostrar",

      dateClick:function(info){  
        formulario.reset();

        //asignamos las fechas en en formulario
        formulario.start.value = info.dateStr;     
        formulario.end.value = info.dateStr;            

        $('#evento').modal('show');          
      },
      eventClick: function (info) {
        var evento = info.event;

        axios.post(baseURL+"/evento/editar/"+info.event.id).
        then(
          (respuesta)=>{

            formulario.id.value = respuesta.data.id;
            formulario.title.value = respuesta.data.title;
            formulario.descripcion.value = respuesta.data.descripcion;
            formulario.color.value = respuesta.data.color;
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
      // Obtenemos el color seleccionado por el usuario
      var color = formulario.color.value;
      // Agregamos el nuevo evento con el color seleccionado
      calendar.addEvent({
        color: color // Asignamos el color al evento
      });

      enviarDatos("/evento/agregar");

      // Mostrar alerta de éxito después de guardar
    Swal.fire({
      icon: 'success',
      title: 'Guardado',
      text: 'El evento ha sido guardado exitosamente.'
    });
               
    });

    document.getElementById("btnEliminar").addEventListener("click", function(){
      enviarDatos("/evento/borrar/" + formulario.id.value);
      
      // alerta de éxito después de eliminar
    Swal.fire({
      icon: 'error',
      title: 'Eliminado',
      text: 'El evento ha sido eliminado exitosamente.'
    });
      
    });
    document.getElementById("btnModificar").addEventListener("click", function(){
      enviarDatos("/evento/actualizar/" + formulario.id.value);

      // alerta de éxito después de modificar
    Swal.fire({
      icon: 'success',
      title: 'Modificado',
      text: 'El evento ha sido modificado exitosamente.'
    });
          
    });

    function enviarDatos(url){
      const datos = new FormData(formulario);

      const nuevaURL = baseURL + url;
      
      axios.post(nuevaURL, datos).
      then(
        (respuesta)=>{
          calendar.refetchEvents(); 
          
          //oculta el modal
          $("#evento").modal("hide");
        }
        ).catch(
          error=>{if(error.response){console.log(error.response.data);}
          }
        )

    }

    

  });      
