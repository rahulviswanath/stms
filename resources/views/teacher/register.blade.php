@extends('layouts.app')
@section('title', 'Teacher Registration')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Teacher
            <small>Registartion</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teacher Registration</li>
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
                        <h3 class="box-title" style="float: left;">Teacher Registration</h3>
                            <p>&nbsp&nbsp&nbsp(Fields marked with <b style="color: red;">* </b>are mandatory.)</p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('teacher-register-action')}}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="teacher_name" class="col-sm-2 control-label"><b style="color: red;">* </b> Teacher Name : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('teacher_name')) ? 'has-error' : '' }}">
                                            <input type="text" name="teacher_name" class="form-control" id="teacher_name" placeholder="Teacher name" value="{{ old('teacher_name') }}" tabindex="1">
                                            @if(!empty($errors->first('teacher_name')))
                                                <p style="color: red;" >{{$errors->first('teacher_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label"><b style="color: red;">* </b>Teaching Category : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('category_id')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="category_id" id="category_id" tabindex="2" style="width: 100%;">
                                                <option value="" {{ empty(old('category_id')) ? 'selected' : '' }}>Select teaching category</option>
                                                <option value="1" {{ old('category_id')==1 ? 'selected' : '' }}>Language</option>
                                                <option value="2" {{ old('category_id')==2 ? 'selected' : '' }}>Science</option>
                                                <option value="6" {{ old('category_id')==6 ? 'selected' : '' }}>Extra Curricular</option>
                                                <option value="7" {{ old('category_id')==7 ? 'selected' : '' }}>Moral</option>
                                            </select>
                                            @if(!empty($errors->first('category_id')))
                                                <p style="color: red;" >{{$errors->first('category_id')}}</p>
                                            @endif
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('description')) ? 'has-error' : '' }}">
                                            @if(!empty(old('description')))
                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" style="resize: none;" tabindex="3">{{ old('description') }}</textarea>
                                            @else
                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" style="resize: none;" tabindex="4"></textarea>
                                            @endif
                                            @if(!empty($errors->first('description')))
                                                <p style="color: red;" >{{$errors->first('description')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label"><b style="color: red;">* </b> No of Session per Week : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('no_of_session_per_week')) ? 'has-error' : '' }}">
                                            <input type="text" name="no_of_session_per_week" class="form-control" id="no_of_session_per_week" placeholder="Number of sessions per week" value="{{ old('no_of_session_per_week') }}" tabindex="5">
                                            @if(!empty($errors->first('no_of_session_per_week')))
                                                <p style="color: red;" >{{$errors->first('no_of_session_per_week')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label"><b style="color: red;">* </b>Teaching Level   : </label>
                                        <div class="col-sm-10 {{ !empty($errors->first('teacher_level')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="teacher_level" id="teacher_level" tabindex="6">
                                                <option value="" {{ empty(old('teacher_level')) ? 'selected' : '' }}>Select teaching level</option>
                                                <option value="1" {{ old('teacher_level')==1 ? 'selected' : '' }}>Pre Primary</option>
                                                <option value="2" {{ old('teacher_level')==2 ? 'selected' : '' }}>Lower Primary</option>
                                                <option value="3" {{ old('teacher_level')==3 ? 'selected' : '' }}>Upper Primary</option>
                                                <option value="4" {{ old('teacher_level')==4 ? 'selected' : '' }}>High School</option>
                                                <option value="5" {{ old('teacher_level')==5 ? 'selected' : '' }}>Higher Secondary</option>
                                                <option value="6" {{ old('teacher_level')==6 ? 'selected' : '' }}>All</option>
                                            </select>
                                            @if(!empty($errors->first('teacher_level')))
                                                <p style="color: red;" >{{$errors->first('teacher_level')}}</p>
                                            @endif
                                        </div>
                                    </div> -->
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