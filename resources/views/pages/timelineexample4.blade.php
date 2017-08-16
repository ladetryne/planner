@extends('layouts.admin')

@section('content-header')
      <h1>
        Timeline Example
        <small><a href="https://docs.anychart.com/Gantt_Chart/Quick_Start">Anychart</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-calendar"></i> Dashboard</a></li>
        <li class="active">Timeline</li>
      </ol>
@endsection

@section('maincontent')

    <div id="container" style="height: 800px;"></div>

@endsection

@push('styles')
	<link rel="stylesheet" href="https://cdn.anychart.com/css/latest/anychart-ui.css">

@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.anychart.com/js/latest/anychart.min.js" type="text/javascript"></script>
    <script src="https://cdn.anychart.com/js/latest/anygantt.min.js" type="text/javascript"></script>
	<script>
anychart.onDocumentReady(function() {

  var data = [
    {"id": "1", "name": "Phase 1 - Strategic Plan", "progressValue": "14%", "actualStart": 951350400000, "actualEnd": 951609600000},
    {"id": "2", "name": "Self-Assessment", parent:"1", "progressValue": "25%", "actualStart": 951350400000, "actualEnd": 951782400000},
    {"id": "3", "name": "Define business vision", parent:"2", "progressValue": "0%", "actualStart": 951408000000, "actualEnd": 951440400000, "connectTo": "4", "connectorType": "FinishStart"},
    {"id": "4", "name": "Identify available skills, information and support", parent:"2", "progressValue": "0%", "actualStart": 951494400000, "actualEnd": 951526800000, "connectTo": "5", "connectorType": "FinishStart"},
    {"id": "5", "name": "Decide whether to proceed", parent:"2", "progressValue": "0%", "actualStart": 951609600000, "actualEnd": 951696000000, "connectTo": "6", "connectorType": "FinishStart"},
    {"id": "6", "name": "Define the Opportunity", parent:"1", "progressValue": "27%", "actualStart": 951696000000, "actualEnd": 951782400000}
  ];
  var treeData = anychart.data.tree(data, anychart.enums.TreeFillingMethod.AS_TABLE);
  chart = anychart.ganttProject();
  chart.data(treeData);
  chart.splitterPosition(332);

  var dataGrid = chart.dataGrid();
  var column0 = dataGrid.column(0);
  column0.width(25);

  var column1 = dataGrid.column(1);
  column1.width(70);
  var column2 = dataGrid.column(2);

  column2.title("Start");
  // Sets column formats.
  column2.setColumnFormat("actualStart", {
    "formatter": columnFormatter,
    "textStyle": {
      "fontColor": "blue"
    },
    "width": 115
  });

  var column3 = dataGrid.column(3);
  column3.title("End");
  // Sets column formats.
  column3.setColumnFormat("actualEnd", {
    "formatter": columnFormatter,
    "textStyle": {
      "fontColor": "green"
    },
    "width": 115
  });

  chart.container("container");
  chart.draw();
  chart.fitAll();

  function columnFormatter (value){
    var date = new Date(value);
    // get minuts
    var minutes = date.getUTCMinutes();
    // get hours
    var hours = date.getUTCHours();
    // get month as a word 3 letters long
    var month = date.toLocaleDateString("en-US", {month: "short"});
    // if it is between 12.00 a.m. and 11.59 a.m.
    if (hours < 12) {
      // if 12.00 a.m.
      if (hours === 0 && minutes === 0)
      // display just month and day
return month + " " + format(date.getUTCDate());
      // format and display hours, minutes, month and day
      return format(hours) + ":" + format(minutes) + " a.m. " + month + " " + format(date.getUTCDate());
      // if it is between 12.00 p.m. and 11.59 p.m
    }else{
      // format and display hours, minutes, month and day
      return format(hours) + ":" + format(minutes) + " p.m. " + month + " " + format(date.getUTCDate());
    }
  }
  // format numbers
  function format (val) {
    // if the number is less than 10
    if (val<10)
    // add zero before the digit
      return "0" + val;
    return val;
  }
});
	</script>
   
@endpush