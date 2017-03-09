@extends('layouts.app')

@section('content')
	

	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					Rediger Oppgave
				</div>
				<div class="panel-body">
					@include('common.errors')
						
						<!-- sjema for redigering av oppgave -->
					<form action="{{url('/task/'.$task->id.'/update')}}" method="POST" class="form-horizontal">
				<!--	<form action="{{url('/task/{id}/update')}}" method="POST">	-->
					{{ csrf_field() }}
						
						<!-- endre oppgave navn -->
						<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Oppgave Navn:</label>

                            <div class="col-sm-8">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>

                        <!-- Endre Kommentar -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ekstra Info :</label>

                            <div class="col-sm-8">
                                <input type="text" name="info" id="task-info" class="form-control" value="{{ $task->info }}">
                            </div>
                        </div>

                        <!-- Knapp for lagring av oppgaver -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Lagre Endringer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



