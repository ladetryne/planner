@extends('layouts.app')

@section('content')
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

            <!-- aktive oppgaver -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Aktive Oppgaver
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>{{ Auth::user()->name }} sine oppgaver</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                
                            <!-- knapp for lagring av endringer 
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-btn fa-plus"></i>Lagre Endringer
                                        </button>
                                    </div>
                                </div> -->
                                @foreach ($tasks as $task)
                                    
                                    <tr>
                                        <td class="table-text">
                                            <div><strong>Navn: </strong>{{ $task->name }}</div>
                                            <div><strong>Prioritet: </strong>{{ $task->viktighet }}</div>
                                            <div><strong>Eier: </strong>{{ $task->user->name }}</div>
                                            <div><strong>Info: </strong>{{ $task->info }}</div>
                                            <div><strong>Opprettet: </strong>{{ $task->created_at }}</div>
                                        </td>

                                        <td class="table-text">
                                            <a href="/task/{{$task->id}}/edit"><strong>Rediger</strong></a>
                                        </td>

                                        <td class="table-text">
                                            <a href="/task/{{$task->id}}/comments"><strong>Comments</strong></a>
                                        </td>

                                        <!--slett oppgave knapp -->
                                        <td>
                                            <form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Slett Oppgave
                                                </button>
                                            </form>
                                        </td>
                                        

                                       <!-- lagre endringer knapp 
                                        <td>
                                            <form action="{{url('/task/{id}/update')}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}  
                                                <button type="submit" id="update-task-{{ $task->id }}" class="btn btn-default">
                                                    <i class="fa fa-btn fa-plus"></i>Lagre endringer
                                                </button>
                                            </form>
                                        </td>
                                         -->

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection