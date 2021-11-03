@extends('adminlte::page')
@section('title', 'Agenda')
@section('content_header')
<link rel="stylesheet" href="{{asset ('assets/fullcalendar/main.css') }}">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Agendar consulta para <b>{{$paciente_infos->name}}</b></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('pacientes')}}">Pacientes</a></li>
                <li class="breadcrumb-item active">Agendar consulta</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<script src="assets/fullcalendar/fullcalendar.js"></script>
<script src="assets/fullcalendar/lang/pt-br.js"></script>
<!-- Main content -->
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{url('storage/images/user.png')}}" alt="User profile">
                </div>

                <h3 class="profile-username text-center">{{$paciente_infos->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>CPF:</b> <a class="float-right">{{$paciente_infos->cpf}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Sexo:</b> <a class="float-right">{{$paciente_infos->sexo}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Telefone:</b> <a class="float-right">{{$paciente_infos->telefone}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Dt. Nascimento:</b> <a class="float-right">{{date("d/m/Y", strtotime($paciente_infos->dat_nascimento ))}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Convenio:</b> <a class="float-right">{{$paciente_infos->convenio}}</a>
                    </li>
                    <li class="list-group-item">
                        <b><i class="fas fa-map-marker-alt mr-1"></i>Endereço:</b> <p class="float-right">{{$paciente_infos->endereco}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-3" hidden>
        <div class="sticky-top mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                    <div id="external-events">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-body">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
                <div class="modal fade" id="consulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Agendamento de Consulta</h5>
                            </div>
                            <form action="{{route('agendamento-post')}}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nome do Paciente:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{$paciente_infos->name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">CPF do Paciente:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{$paciente_infos->cpf}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Hora Inicio Consulta:</label>
                                        <input type="text" class="form-control" id="start" name="inicio" readonly>
                                    </div>
                                    <input type="text" class="form-control" id="id" name="id" value="{{$paciente_infos->id}}" hidden readonly>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Hora Termino Consulta:</label>
                                        <input type="text" class="form-control" id="end" name="fim" readonly>
                                    </div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" required>
                                            Confirmo os dados da consulta
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Agendar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- jQuery -->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/main.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/js/demo.js') }}"></script>
<!-- Page specific script -->

<script>
    $(function() {
        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }


                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // // make the event draggable using jQuery UI
                // $(this).draggable({
                //     zIndex: 1070,
                //     revert: true, // will cause the event to go back to its
                //     revertDuration: 0 //  original position after the drag
                // })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)

        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            slotDuration: '00:05:00',
            select: function(start, end) {
                $('#consulta #start').val(moment(start.startStr).format('DD/MM/YYYY HH:mm:ss'));
                $('#consulta #end').val(moment(start.endStr).format('DD/MM/YYYY HH:mm:ss'));
                $('#consulta').modal('show');
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Random default events
            events: [
                <?php foreach ($consultas as $consulta) {
                ?>

                    {
                        title: '<?php echo ($consulta->nomepaciente[0]->name) ?>',
                        start: '<?php echo ($consulta->inicio) ?>',
                        end: '<?php echo ($consulta->fim) ?>',
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: false
                    },

                <?php };
                ?>
            ],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }

        });

        calendar.render();
        console.log('->', calendar.events);

        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            // Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
        })
    })
</script>
@endsection