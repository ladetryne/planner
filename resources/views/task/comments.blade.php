@extends('layouts.app')

@section('content')


	<!-- sjema for å lage en comment -->

		<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-heading">

				<div class="panel-heading">
					<strong>Ny Kommentar:</strong>
				</div>
				<div class="panel-body">
					@include('common.errors')

					<!--- Sjema for Comments -->
					<form method="post" class="form-horizontal">
					{{ csrf_field() }}

					<!-- Oppgave navn -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Kommentar:</label>
                        <div class="col-sm-6">
                            <input type="text" name="kommentar" id="task-kommentar" class="form-control" value="">
                        </div>
                    </div>
                    <!-- Knapp for lagring av oppgaver -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Lagre Kommentar
                            </button>
                        </div>
                    </div>
					</form>
					
				</div>
			</div>
		</div>
	</div>

	<!-- sjema for aktive kommentarer -->

	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-heading">

				<div class="panel-heading">
					<b>Kommentarer:</b>
				</div>
				<div class="panel-body">
					@include('common.errors')

					<!--- Sjema for Comments -->
					<form method="GET" class="form-horizontal">

					<!-- kommentar 1 -->
					<div class="form-group">
						<label for="comment-body" class="col-sm-3 control-label">Kommentar 1:</label>
						<div class="col-sm-8">
							Dette er en kommentar nummer 1
						</div>					
					</div>
					
					<!-- kommentar 2 -->
					<div class="form-group">
						<label for="comment-body" class="col-sm-3 control-label">Kommentar 2:</label>
						<div class="col-sm-8">
							Dette er en kommentar nummer 2
						</div>					
					</div>

					<!-- KNAPP FOR Å RETURNERE TIL TASKS VIEW -->
					
					</form>
					<td class="table-text">
                        <a href="/tasks"><strong>Tilbake til oppgaver</strong></a>
                    </td>
				</div>
			</div>
		</div>
	</div>	


@endsection