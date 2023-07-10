

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEventos");
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: 'dayGridMonth',
      locale:'es',
      // displayEventTime: false,
      // selectable: true,      
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },
      events: baseURL+"/evento/mostrar",
      dayMaxEvents: true,//cuando hay demasiados eventos en un día, muestra el popover

      editable: true,
      eventResize: function(info) {
        alert(info.event.title + " ahora termina en " + info.event.end.toISOString());
        
      },  

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

      if (formulario.title.value === '' || formulario.color.value === '' || formulario.descripcion.value === '' || formulario.start.value === '' || formulario.end.value === ''){
        Swal.fire({
          title: 'Error',
          text:'Por favor, complete todos los campos son obligatorios.'
          });
      }else{
        enviarDatos("/evento/agregar");
        //alerta de éxito después de guardar
        Swal.fire({
          type: 'success',
          title: 'Guardado',
          text: 'El evento ha sido guardado exitosamente.'
        });
      }   
               
    });

    document.getElementById("btnEliminar").addEventListener("click", function(){

      swal({
      title: '¿Estás seguro de eliminar?',
      text: 'Una vez eliminado, no se podrá recuperar',
      icon: 'warning', buttons: true, dangerMode: true}).
      then((eliminar) => { 
        if (eliminar){
          enviarDatos("/evento/borrar/" + formulario.id.value);
        }else {
          swal('Elemento no eliminado');
        }});          
          
    });

    document.getElementById("btnModificar").addEventListener("click", function(){

      enviarDatos("/evento/actualizar/" + formulario.id.value);

      // alerta de éxito después de modificar
      Swal.fire({
        type: 'success',
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
