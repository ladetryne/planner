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
	<div class="col-sm-12">
		<div style="position:relative" class="gantt" id="GanttChartDIV"></div>
	</div>

	<div class="container">
		<div class="col-sm-12">
			<div class="col-sm-12">
				<div style="position:relative" class="gantt" id="GanttChartDIV"></div>
			</div>
		</div>	
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
																																			//	 ! pGroup
			g.AddTaskItem(new JSGantt.TaskItem(11,  'Milestein',         '2016-02-20','2016-02-20', 'gmilestone',   '',       1, 'Shlomy',   100, 0, 1,  1, '',      '',      '',      g));
																																				//	    ! pParent	
			g.AddTaskItem(new JSGantt.TaskItem(12,  'Task Objects',         '',           '',          'ggroupblack',  '',       0, 'Shlomy',   40,  1, 1,  1, '',      '',      '',      g));
																																				//			! pOpen
			g.AddTaskItem(new JSGantt.TaskItem(121, 'Constructor Proc',     '2016-02-21','2016-03-09', 'gtaskblue',    '',       0, 'Brian T.', 60,  0, 12, 1, '',      '',      '',      g));
																																				//				! pDepend
			g.AddTaskItem(new JSGantt.TaskItem(123, 'Task by Minute/Hour',  '2016-03-09','2016-03-14 12:00', 'gtaskyellow', '',  0, 'Ilan',     60,  0, 12, 1, '',      '',      '',      g));
																																				//						! pCaption
			g.AddTaskItem(new JSGantt.TaskItem(122, 'Task Variables',       '2016-03-06','2016-03-11', 'gtaskred',     '',       0, 'Brian',    60,  0, 12, 1, 121,     '',      '',      g));
																																				//								  ! pNotes 
			g.AddTaskItem(new JSGantt.TaskItem(2,   'Create HTML Shell',    '2016-03-24','2016-03-24', 'gtaskyellow',  '',       0, 'Brian',    20,  0, 0,  1, 122,     '',      '',      g));
																																				//										  ! pGantt		
			g.AddTaskItem(new JSGantt.TaskItem(3,   'Code Javascript',      '',           '',          'ggroupblack',  '',       0, 'Brian',    0,   1, 0,  1, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(124, 'Task Functions',       '2016-03-09','2016-03-29', 'gtaskred',     '',       0, 'Anyone',   60,  0, 12, 1, '123SS', 'This is a caption', null, g));
			g.AddTaskItem(new JSGantt.TaskItem(31,  'Define Variables',     '2016-02-25','2016-03-17', 'gtaskpurple',  '',       0, 'Brian',    30,  0, 3,  1, '',      'Caption 1','',   g));
			g.AddTaskItem(new JSGantt.TaskItem(32,  'Calculate Chart Size', '2016-03-15','2016-03-24', 'gtaskgreen',   '',       0, 'Shlomy',   40,  0, 3,  1, '',      '',      '',      g));


			g.AddTaskItem(new JSGantt.TaskItem(33,  'Draw Task Items',      '',           '',          'ggroupblack',  '',       0, 'Someone',  40,  1, 3,  1, '',      '',      '',      g));
			
			g.AddTaskItem(new JSGantt.TaskItem(332, 'Task Label Table',     '2016-03-06','2016-03-09', 'gtaskblue',    '',       0, 'Brian',    60,  0, 33, 1, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(333, 'Task Scrolling Grid',  '2016-03-11','2016-03-20', 'gtaskblue',    '',       0, 'Brian',    0,   0, 33, 1, '332',   '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(34,  'Draw Task Bars',       '',           '',          'ggroupblack',  '',       0, 'Anybody',  60,  1, 3,  0, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(341, 'Loop each Task',       '2016-03-26','2016-04-11', 'gtaskred',     '',       0, 'Brian',    60,  0, 34, 1, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(342, 'Calculate Start/Stop', '2016-04-12','2016-05-18', 'gtaskpink',    '',       0, 'Brian',    60,  0, 34, 1, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(343, 'Draw Task Div',        '2016-05-13','2016-05-17', 'gtaskred',     '',       0, 'Brian',    60,  0, 34, 1, '',      '',      '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(344, 'Draw Completion Div',  '2016-05-17','2016-06-04', 'gtaskred',     '',       0, 'Brian',    60,  0, 34, 1, "342,343",'',     '',      g));
			g.AddTaskItem(new JSGantt.TaskItem(35,  'Make Updates',         '2016-07-17','2017-09-04', 'gtaskpurple',  '',       0, 'Brian',    30,  0, 3,  1, '333',   '',      '',      g));




			g.Draw();
			}
			else
			{
			alert("Error, unable to create Gantt Chart");
			}
    </script>
@endpush