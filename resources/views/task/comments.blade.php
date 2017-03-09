@extends('layouts.app')

@section('content')

 <!-- "{{url('/task/'.$task->id.'/update')}}"   -->
	<!-- sjema for å lage en comment -->
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-heading">
				<div class="card">
					<div class="card-block"></div>
						<form action="{{url('/task/'.$task->id.'/comments')}}" method="POST" class="form-horizontal">
							{{ csrf_field() }} 
							<div class="form-group">
								<h2><center>Oppgave: {{ $task->name }}</center></h2>
								<hr>
								<label for="comment-body" class="col-sm-3 control-label">
									<p>Ny Kommentar:</p>
								</label>

								<div>
									<input type="text" name="body" id="comments-body" class="col-sm-8">
								</div>

							</div>
						
							<!-- knapp for lagring av oppgaver -->
							<div class="form-group">
							<div class="cols-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-plus"></i>Lagre kommentar
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
				<hr>
				<div class="panel-body">
					@include('common.errors')

					<!--- Sjema for Comments -->
					<form method="GET" class="form-horizontal">

							
						<div class="comments">
							<ul class="list-group">		
							@foreach ($task->comments as $comment)
								<article>
									<strong> {{ $comment->created_at->diffForHumans() }}: &nbsp; </strong>
									{{ $comment->body }}
								</article>
						</div>
							@endforeach
							</ul>
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