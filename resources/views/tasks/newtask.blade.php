@extends('layouts.admin')
@section('content-header')
      <h1>
        Valemon Prosjektet
        <small>Ny Oppgave: </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-calendar"></i> Dashboard</a></li>
        <li><a href="/home"><i class="fa fa-calendar"></i> Alle Oppgaver</a></li>
        <li class="active">Ny Oppgave</li>
      </ol>
@endsection
@section('maincontent')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ny Oppgave
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Skjema for ny oppgave -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Oppgave navn -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Oppgave Navn:</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        
                         <!--   Viktighet -->
                        <div class="form-group">
                            <label for="task-viktighet" class="col-sm-3 control-label">Prioritet:</label>
                                <select name="viktighet" id="task-viktighet" class="col-sm-2">
                                    <option value="Høy"><strong>Høy</strong></option>
                                    <option value="Middels"><strong>Middels</strong></option>
                                    <option value="Lav"><strong>Lav</strong></option>
                                </select> 
                        </div>

                        <!-- ekstra info -->
                        <div class="form-group">
                            <label for="task-kommentar" class="col-sm-3 control-label">Ekstra Info:</label>
                            <div class="col-sm-6">
                                <input type="text" name="info" id="task-info" class="form-control" value="{{ old('info') }}">
                            </div>
                        </div>

                        <!-- Knapp for lagring av oppgaver -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Lagre Ny Oppgave
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection