@extends('layouts.app')
@section('title', 'Subject - Teacher Combination')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Subject - Teacher
            <small>Combination</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Combination List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-message">
                <h4>
                  {{ Session::get('message') }}
                  <?php session()->forget('message'); ?>
                </h4>
            </div>
        @endif
        @if(empty($classRoom) || empty($classRoom->combinations))
            <div class="alert alert-info" id="alert-message">
                <h4>
                  No combinations available to show!
                </h4>
            </div>
        @else
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header"></div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="classname" class="col-sm-2 control-label"><b>Class : </b></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="classname" placeholder="Class" value="{{ $classRoom->standard->standard_name }} {{ $classRoom->division->division_name }}" readonly>
                                    </div>
                                    <label for="room_no" class="col-sm-2 control-label"><b>Room Number : </b></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="room_no" placeholder="Room Number" value="{{ $classRoom->room_id }}" readonly>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label for="classname" class="col-sm-2 control-label"><b>Class Incharge: </b></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="classname" placeholder="Class" value="{{ $classRoom->incharge->teacher_name }}" readonly>
                                    </div>
                                    <label for="room_no" class="col-sm-2 control-label"><b>Strength : </b></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="room_no" placeholder="Room Number" value="{{ $classRoom->strength }}" readonly>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">#</th>
                                                <th style="width: 45%;">Subject</th>
                                                <th style="width: 45%;">Teacher</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($classRoom->combinations as $index => $combination)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $combination->subject->subject_name }}</td>
                                                    <td>{{ $combination->teacher->teacher_name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix"> </div><br>
                                <div class="row">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-3">
                                        <form action="{{ route('class-room-edit', ['class_room_id' => $classRoom->id]) }}" method="get">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat submit-button">
                                                <i class="fa fa-edit"> Edit</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="{{ route('class-room-delete', ['class_room_id' => $classRoom->id]) }}" class="btn btn-primary btn-block btn-flat submit-button">Delete</a>
                                    </div>
                                    <!-- /.col -->
                                </div><br>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.boxy -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row (main row) -->
        @endif
    </section>
    <!-- /.content -->
</div>
@endsection