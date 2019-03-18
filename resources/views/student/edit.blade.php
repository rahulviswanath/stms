@extends('layouts.app')
@section('title', 'Update Student Info')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Student
            <small>Info Updation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Info Updation</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-message">
                <h4>
                  {{ Session::get('message') }}
                </h4>
            </div>
        @endif
        <!-- Main row -->
        <div class="row  no-print">
            <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row no-print">
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            <h4>
                                <i class="fa fa-warning">&emsp;Warning!</i>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="float: left;">Student Info Updation</h3>
                            <p>&nbsp&nbsp&nbsp(Fields marked with <b style="color: red;">* </b>are mandatory.)</p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('student-edit-action')}}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="teacher_name" class="col-sm-2 control-label"><b style="color: red;">* </b> Student Name : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('student_name')) ? 'has-error' : '' }}">
                                            <input type="text" name="student_name" class="form-control" id="student_name" placeholder="Student name" value="{{ !empty(old('student_name')) ? old('student_name') : $student->student_name }}" tabindex="1">
                                            @if(!empty($errors->first('student_name')))
                                                <p style="color: red;" >{{$errors->first('student_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b style="color: red;">* </b>Class   : </label>
                                <div class="col-sm-10 {{ !empty($errors->first('class_room_id')) ? 'has-error' : '' }}">
                                    <select class="form-control select_2" name="class_room_id" id="class_room_id" tabindex="3" style="width: 100%">
                                        <option value="">Select class</option>
                                        @if(!empty($classRooms) && (count($classRooms) > 0))
                                            @foreach($classRooms as $classRoom)
                                                <option value="{{ $classRoom->id }}" {{ (($student->class_room_id == $classRoom->id )) ? 'selected' : '' }}>{{ $classRoom->standard->standard_name }} - {{ $classRoom->division->division_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if(!empty($errors->first('class_room_id')))
                                        <p style="color: red;" >{{$errors->first('class_room_id')}}</p>
                                    @endif
                                </div>
                            </div>    
                            <div class="clearfix"> </div><br>
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-3">
                                    <button type="reset" class="btn btn-default btn-block btn-flat" tabindex="8">Clear</button>
                                </div>
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat submit-button" tabindex="7">Update</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
                <!-- /.box primary -->
            </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@endsection