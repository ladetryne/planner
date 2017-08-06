@extends('layouts.admin')
@section('content-header')
      <h1>
        Ladeprosjektet
        <small>Mine Oppgaver: </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-calendar"></i> Dashboard</a></li>
        <li class="active">Mine Oppgaver</li>
      </ol>
@endsection
@section('maincontent')
    <div class="container">
        <div class="col-sm-12">
            <!-- aktive oppgaver -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Ladeprosjektet</h1>
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <p><strong>Start Dato</strong>: 21.02.2017</p>
                        <p><strong>Start Dato</strong>: 11.12.2019</p>
                        <p><strong>Neste Milepel</strong>: Spise hamburger</p>
                    </div>
                    <div class="col-sm-8">
                        <p><strong>Prosjekt Beskrivelse:</strong></p>
                    </div>
                    <div class="col-sm-1">
                        
                        <div class = "btn-group">
                           <button type = "button" class = "btn btn-xs btn-primary dropdown-toggle" data-toggle = "dropdown">
                              Velg Prosjekt 
                              <span class = "caret"></span>
                           </button>
                           <ul class = "dropdown-menu" role = "menu">
                                @foreach ($projects as $project)
                                <li>
                                    <a href = "#">
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
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mine Oppgaver
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
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <td class="table-text">
                                                    <div><strong>Navn: </strong>{{ $task->name }} &nbsp;
                                                    <strong>Eier: </strong>{{ $task->user->name }} &nbsp;
                                                    <strong>Prioritet: </strong>{{ $task->viktighet }} &nbsp;
                                                    <strong>Arbeidstimer: </strong>{{ $task->arbeidstimer }} &nbsp;
                                                    <strong>Start Dato: </strong>{{ $task->start_dato }} &nbsp;
                                                    <strong>Slutt Dato: </strong>{{ $task->slutt_dato }}</div>   
                                                    <div><strong>Info: </strong>{{ $task->info }}</div>
                                                    <div><strong>Prosjekt: </strong>{{ $task->project_id }}</div>
                                                    <div><strong>Ferdig: </strong>{{ $task->ferdig }}%</div>
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <div class="progress xs">
                                                                <!-- Change the css width attribute to simulate progress -->
                                                                <div class="progress-bar progress-bar-aqua" style="width: {{ $task->ferdig }}%" role="progressbar">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </div>
                                            <div class="col-sm-1">
                                                <td class="table-text">
                                                    <div><a href="/task/{{$task->id}}/edit"><strong>Rediger</strong></a></div>
                                                    <div><a href="/task/{{$task->id}}/comments"><strong>Kommentarer</strong></a></div>
                                                    <div>
                                                        <form action="{{url('task/' . $task->id)}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            
                                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-xs btn-danger">
                                                                <i class="fa fa-btn fa-trash"></i>Slett Oppgave
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </div>

                                        </div>

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