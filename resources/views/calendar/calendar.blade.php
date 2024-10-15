@include('panel.static.header')

<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/main.min.css" rel="stylesheet">

<div class="container">
    <h1 class="text-center my-4">التقويم</h1>
    <div id="calendar"></div>
</div>

<style>
    #calendar {
        max-width: 900px;
        margin: 20px auto;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            selectable: true,
            events: [
                { title: 'اجتماع', start: '2024-10-10T10:00:00', end: '2024-10-10T12:00:00' },
                { title: 'موعد طبي', start: '2024-10-12', allDay: true }
            ],
            dateClick: function(info) {
                alert('تم النقر على: ' + info.dateStr);
            }
        });

        calendar.render();
    });
</script>