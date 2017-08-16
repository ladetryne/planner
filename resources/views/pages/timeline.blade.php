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


	<div style="position:relative" class="gantt" id="GanttChartDIV"></div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="/css/jsgantt.css" />
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script language="javascript" src="/js/jsgantt.js"></script>
    <script type="text/javascript">
      tasks = <?php echo json_encode($tasks) ?>;  
      projects = <?php echo json_encode($projects) ?>;  
      rand = <?php echo json_encode($randomgroup) ?>;  
      function randomInt(min,max)
      {
          return Math.floor(Math.random() * 201) - 100;
      }


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
        
        g.AddTaskItem(new JSGantt.TaskItem(999,   'Erobre Mars',     '',           '',          'ggroupblack',  '',       0, 'N/A',    0,   1, 0,  '', '',      '',      'test', g ));
        g.AddTaskItem(new JSGantt.TaskItem(998,   'Valemon',     '',           '',          'ggroupblack',  '',       0, 'N/A',    0,   1, 0,  '', '',      '',      'test', g ));
        g.AddTaskItem(new JSGantt.TaskItem(997,   'Lag en Ku',     '',           '',          'ggroupblack',  '',       0, 'N/A',    0,   1, 0,  '', '',      '',      'test', g ));
        

        for (var i=0; i < tasks.length; i++) {
          g.AddTaskItem(new JSGantt.TaskItem(tasks[i]['id'], tasks[i]['name'], tasks[i]['start_dato'],tasks[i]['slutt_dato'], tasks[i]['farge'], '',  0, tasks[i]['user']['name'],    tasks[i]['ferdig'],  '', tasks[i]['group'], 1, '',     '',      tasks[i]['info'],      g));
        }

			g.Draw();
			}
			else
			{
			alert("Error, unable to create Gantt Chart");
			}
    </script>
@endpush


