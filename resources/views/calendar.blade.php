@extends('layouts.admin')

@section('content-header')
      <h1>
        Kalender
        <small>maskinoversikt</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-calendar"></i> Hjem</a></li>
        <li class="active">Kalender</li>
      </ol>
@endsection

@section('maincontent')
      <!-- Default box -->
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
      </div>
      <!-- /.box -->
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css" media="print">
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/nb.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                weekends: true, // will hide Saturdays and Sundays
                weekNumbers: true,
                events: [
                {
                    title  : 'Nifty 170',
                    start  : '2017-06-22'
                },
                {
                    title  : 'Laski F460',
                    start  : '2017-06-13',
                    end    : '2017-06-13'
                },
                {
                    title  : 'Palazzani TZX190C',
                    start  : '2017-06-09'
                },
                {
                    title  : 'Nifty HR28',
                    start  : '2017-06-22'
                }
                ]
            })

        });
    </script>
@endpush
