jQuery(document).ready(function () {
  jQuery("#add-event").submit(function () {
    alert("Submitted");
    var values = {};
    $.each($("#add-event").serializeArray(), function (i, field) {
      values[field.name] = field.value;
    });
    console.log(values);
  });
});

let events;
fetch("/accountly/server/controllers/controllerDiary.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify({
    action: "get_events",
  }),
})
  .then((res) => res.json())
  .then((dat) => {
    console.log(dat);
    events = dat;
  });

(function () {
  "use strict";
  // ------------------------------------------------------- //
  // Calendar
  // ------------------------------------------------------ //
  jQuery(function () {
    // page is ready
    setTimeout(() => {
      jQuery("#calendar").fullCalendar({
        themeSystem: "bootstrap4",

        // emphasizes business hours
        businessHours: false,
        defaultView: "month",

        // event dragging & resizing
        editable: false,
        //editable: true,
        // header
        header: {
          left: "title",
          center: "month,agendaWeek,agendaDay",
          right: "today prev,next",
        },

        events: events,
        dayClick: function () {
          jQuery("#modal-view-event-add").modal();
        },
        eventClick: function (event, jsEvent, view) {
          jQuery(".event-icon").html(
            "<i class='fa fa-" + event.icon + "'></i>"
          );
          jQuery(".event-title").html(event.title);
          jQuery(".event-body").html(event.description);
          jQuery(".eventUrl").attr("href", event.url);
          jQuery("#modal-view-event").modal();
        },
      });
    }, 100);
  });
})(jQuery);
