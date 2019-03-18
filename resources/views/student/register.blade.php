@extends('layouts.app')
@section('title', 'Student Registration')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Student
            <small>Registartion</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Registration</li>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="float: left;">Student Registration</h3>
                            <p>&nbsp&nbsp&nbsp(Fields marked with <b style="color: red;">* </b>are mandatory.)</p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('student-register-action')}}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="student_name" class="col-sm-2 control-label"><b style="color: red;">* </b> Student Name : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('student_name')) ? 'has-error' : '' }}">
                                            <input type="text" name="student_name" class="form-control" id="student_name" placeholder="Student name" value="{{ old('student_name') }}" tabindex="1">
                                            @if(!empty($errors->first('student_name')))
                                                <p style="color: red;" >{{$errors->first('student_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><b style="color: red;">* </b>Class   : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('class_room_id')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="class_room_id" id="class_room_id" tabindex="3" style="width: 100%">
                                                <option value="">Select class</option>
                                                @if(!empty($classRooms) && (count($classRooms) > 0))
                                                    @foreach($classRooms as $classRoom)
                                                        <option value="{{ $classRoom->id }}" {{ ((old('class_room_id') == $classRoom->id )) ? 'selected' : '' }}>{{ $classRoom->standard->standard_name }} - {{ $classRoom->division->division_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if(!empty($errors->first('class_room_id')))
                                                <p style="color: red;" >{{$errors->first('class_room_id')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="user_name" class="col-sm-2 control-label"><b style="color: red;">* </b> User Name : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('user_name')) ? 'has-error' : '' }}">
                                            <input type="text" name="user_name" class="form-control" placeholder="User Name" value="{{ old('user_name') }}" tabindex="2" >
                                            @if(!empty($errors->first('user_name')))
                                                <p style="color: red;" >{{$errors->first('user_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-mail : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('email')) ? 'has-error' : '' }}">
                                            <input type="email" name="email" class="form-control" placeholder="E-Mail" value="{{ !empty(old('email')) ? old('email') : '' }}" tabindex="3">
                                            @if(!empty($errors->first('email')))
                                                <p style="color: red;" >{{$errors->first('email')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label"><b style="color: red;">* </b> Password : </label>
                                        <div class="col-sm-10 {{ count($errors) > 0 ? 'has-error' : '' }}">
                                            <input type="password" name="password" class="form-control" placeholder="Password"  tabindex="8">
                                            @if(!empty($errors->first('password')))
                                                <p style="color: red;" >{{$errors->first('password')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="col-sm-2 control-label"><b style="color: red;">* </b> Confirm Password : </label>
                                        <div class="col-sm-10 {{ count($errors) > 0 ? 'has-error' : '' }}">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="9">
                                            @if(!empty($errors->first('password')))
                                                <p style="color: red;" >{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="clearfix"> </div><br>
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-3">
                                    <button type="reset" class="btn btn-default btn-block btn-flat" tabindex="8">Clear</button>
                                </div>
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat submit-button" tabindex="7">Submit</button>
                                </div>
                                <!-- /.col -->
                            </div><br>
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