@extends('layouts.admin')

@section('content-header')
      <h1>
        Timeline
        <small>Prosjekt: </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-calendar"></i> Dashboard</a></li>
        <li class="active">Timeline</li>
      </ol>
@endsection

@section('maincontent')
	<div class="container">
		<div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (count($currentProjectId) > 0)
                        @foreach($currentproject as $ppp)
                    <h1>{{ $ppp->name }}</h1>
                        @endforeach
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        @if (count($currentProjectId) > 0)
                            @foreach($currentproject as $ppp)
                        <p><strong>Start Dato</strong>: {{$ppp->start_dato}}</p>
                        <p><strong>Start Dato</strong>: {{$ppp->slutt_dato}}</p>
                        <p><strong>Neste Milepel</strong>: Spise hamburger</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-8">
                        @if (count($currentProjectId) > 0)
                            @foreach($currentproject as $ppp)
                        <p><strong>Prosjekt Beskrivelse:</strong>: {{$ppp->body}}</p>
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


			// Method definition: TaskItem(pID, pName, pStart, pEnd, pColor, pLink, pMile, pRes, pComp, pGroup, pParent, pOpen, pDepend, pCaption, pNotes, pGantt)

			// pID:	(required) a unique numeric ID used to identify each row
			// pName:	(required) the task Label
			// pStart:	(required) the task start date, can enter empty date ('') for groups. You can also enter specific time (2016-02-20 12:00) for additional precision.
			// pEnd:	(required) the task end date, can enter empty date ('') for groups
			// pClass:	(required) the css class for this task
			// pLink:	(optional) any http link to be displayed in tool tip as the "More information" link.
			// pMile:	(optional) indicates whether this is a milestone task - Numeric; 1 = milestone, 0 = not milestone
			// pRes:	(optional) resource name
			// pComp:	(required) completion percent, numeric
			// pGroup:	(optional) indicates whether this is a group task (parent) - Numeric; 0 = normal task, 1 = standard group task, 2 = combined group task*
			// pParent:	(required) identifies a parent pID, this causes this task to be a child of identified task. Numeric, top level tasks should have pParent set to 0
			// pOpen:	(required) indicates whether a standard group task is open when chart is first drawn. Value must be set for all items but is only used by standard group tasks. Numeric, 1 = open, 0 = closed
			// pDepend:	(optional) comma separated list of id's this task is dependent on. A line will be drawn from each listed task to this item
			// Each id can optionally be followed by a dependency type suffix. Valid values are:
			// 'FS' - Finish to Start (default if suffix is omitted)
			// 'SF' - Start to Finish
			// 'SS' - Start to Start
			// 'FF' - Finish to Finish
			// If present the suffix must be added directly to the id e.g. '123SS'
			// pCaption:	(optional) caption that will be added after task bar if CaptionType set to "Caption"
			// pNotes:	(optional) Detailed task information that will be displayed in tool tip for this task
			// pGantt:	(required) javascript JSGantt.GanttChart object from which to take settings. Defaults to "g" for backwards compatibility
			// * Combined group tasks show all sub-tasks on one row. The information displayed in the task list and row caption are taken from the parent task. Tool tips are generated individually for each sub-task from its own information. Milestones are not valid as sub-tasks of a combined group task and will not be displayed. No bounds checking of start and end dates of sub-tasks is performed therefore it is possible for these task bars to overlap. Dependencies can be set to and from sub-tasks only.

		//	 							   	pID, 	pName, 					pStart, 	pEnd, 			pColor, 		pLink, pMile, pRes, pComp, pGroup, pParent, pOpen, pDepend, pCaption, pNotes, pGantt
			g.AddTaskItem(new JSGantt.TaskItem(1,   'DelProsjekt 1',     '',           '',          'ggroupblack',  '',       0, 'Brian',    0,   1, 0,  1, '',      '',      'Some Notes text', g ));

			g.Draw();
			}
			else
			{
			alert("Error, unable to create Gantt Chart");
			}
    </script>
@endpush
