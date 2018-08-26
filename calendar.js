
 $(document).ready(function() {

  $('#calendar').fullCalendar({

   theme: true,
   editable: false,
   weekends: false,
   allDaySlot: false,
   allDayDefault: false,
   slotMinutes: 15,
   firstHour: 8,
   minTime: 8,
   maxTime: 17,
   height: 600,
   defaultView: 'agendaWeek',

   events: "json_events.php",

   loading: function(bool) {
    if (bool) $('#loading').show();
    else $('#loading').hide();
   }

  });

 });

