@extends('layouts.app')

@section('content')
	

	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					Welcome {{ Auth::user()->name }}
				</div>
				<div class="panel-body">
					@include('common.errors')
						
					<form action="{{url('/tasks')}}" method="POST">
					{{ csrf_field() }}
						
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Oppgaver
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection