@extends('layouts.admin')

@section('content-header')
      <h1>
        Timeline
        <small>Prosjekt: </small>
      </h1>
     <div class="row">
          <div class="col-sm-11">
              <ol class="breadcrumb">
                  <li><a href="/home"><i class="fa fa-calendar"></i> Dashboard</a></li>
                  <li class="active">Timeline</li>
              </ol>
          </div>
          
      </div>
@endsection

@section('maincontent')
	<div class="container">
		<div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (count($currentProjectId) > 0)
                        @foreach($currentproject as $project)
                    <h1>{{ $project->name }}</h1>
                        @endforeach
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        @if (count($currentProjectId) > 0)
                            @foreach($currentproject as $project)
                        <p><strong>Start Dato</strong>: {{$project->start_dato}}</p>
                        <p><strong>Start Dato</strong>: {{$project->slutt_dato}}</p>
                        <p><strong>Neste Milepel</strong>: Spise hamburger</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-8">
                        @if (count($currentProjectId) > 0)
                            @foreach($currentproject as $project)
                        <p><strong>Prosjekt Beskrivelse:</strong>: {{$project->body}}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-1">
                        
                        <div class = "btn-group">
                           <button type = "button" class = "btn btn-xs btn-primary dropdown-toggle" data-toggle = "dropdown">
                              Velg Prosjekt 
                              <span class = "caret"></span>
                           </button>
                           <ul class = "dropdown-menu" role = "menu">
                           <li>
                                <a href="{{ Request::url() }}"></a>
                           </li>
                                @foreach ($projects as $project)
                                <li>
                                    <a href = "{{ Request::url().'/?project='.$project->id}}">
                                            {{ $project->name }}
                                    </a>
                                </li>
                                @endforeach
                              
                              <li class = "divider"></li>
                              <li><a href = "#">Lag Nytt Prosjekt</a></li>
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>

	<div class="col-sm-12">
		<div style="position:relative" class="gantt" id="GanttChartDIV"></div>
	</div>
@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="/css/jsgantt.css" />
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script language="javascript" src="/js/jsgantt.js"></script>
    <script type="text/javascript">
      function go(){
        alert('hi');
      }
      var mylist = ['item1', 'item2', 'item3'];
        mylist.forEach(function(value, index) {
      }); 
      tasks = <?php echo json_encode($tasks) ?>;  
      var g = new JSGantt.GanttChart(document.getElementById('GanttChartDIV'), 'day');
         		if( g.getDivId() != null ) {
			g.setCaptionType('Complete');
			g.setQuarterColWidth(36);
			g.setDateTaskDisplayFormat('day dd month yyyy');
			g.setDayMajorDateDisplayFormat('mon yyyy - Week ww');
			g.setWeekMinorDateDisplayFormat('dd mon');
			g.setShowTaskInfoLink(1);
			g.setShowEndWeekDate(0);
			g.setUseSingleCell(10000);
			g.setFormatArr('Day', 'Week', 'Month', 'Quarter');
      g.setDateInputFormat("yyyy-mm-dd")


		//	 							   	pID, 	pName, 					pStart, 	pEnd, 			pColor, 		pLink, pMile, pRes, pComp, pGroup, pParent, pOpen, pDepend, pCaption, pNotes, pGantt
        for (var i=0; i < tasks.length; i++) {
          g.AddTaskItem(new JSGantt.TaskItem(tasks[i]['id'], tasks[i]['name'], tasks[i]['start_dato'],tasks[i]['slutt_dato'], tasks[i]['farge'],     '',       0, tasks[i]['user']['name'],    tasks[i]['ferdig'],  0, 12, 1, 121,     '',      tasks[i]['info'],      g));
        }


			g.Draw();
			}
			else
			{
			alert("Error, unable to create Gantt Chart");
			}
    </script>
@endpush


