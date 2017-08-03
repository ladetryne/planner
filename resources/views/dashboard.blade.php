@extends('layouts.admin')

@section('content-header')
      <h1>
        Maskinbestillinger
        <small>oversikt</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Hjem</a></li>
        <li class="active">Dashboard</li>
      </ol>
@endsection

@section('maincontent')
    <div class="row">
        
        <!-- /.col -->
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

    </div>
@endsection