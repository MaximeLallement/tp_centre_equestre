<?php require_once '../inc/bdd.inc.php';?>

<html>
<head>
    <!--SweetAlert-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--SweetAlert-->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    


  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    eventResizableFromStart: true,
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
    var title =  prompt("Enter Event Title")
        if(title)
        {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url:"insert.php",
                type:"POST",
                data:{title:title, start:start, end:end},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Ajouté avec succès !");
                }
            })
        }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
      }
     });
    },

    eventClick:function(event)
    {
    Swal.fire({
        icon: 'warning',
        title: 'Voulez-vous réellement supprimer ce cours ?',
        showDenyButton: true,
        confirmButtonText: 'Oui',
        denyButtonText: 'Non',
    }).then((result) => {
        var id = event.id;
        if (result.isConfirmed){
            $.ajax({
                url:"delete.php",
                type:"POST",
                data:{id:id},
            })
            calendar.fullCalendar('refetchEvents');
            Swal.fire({
                icon: 'success',
                title: 'La suppression a été réalisé avec succès',
            })
        }

        else if (result.isDenied){
            calendar.fullCalendar('refetchEvents');
            Swal.fire({
                icon: 'info',
                title: 'La suppression a été annulé',
            }

            )
        }
        
        })
    },

   });
  });
   
  </script>
 </head>
 <body>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>


 </body>
</html>