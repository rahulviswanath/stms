@extends('layouts.app')
@section('title', 'Student List')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Student
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student List</li>
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
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Students</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">#</th>
                                            <th style="width: 20%;">Name</th>
                                            <th style="width: 16%;">Class</th>
                                            <th style="width: 7%;"></th>
                                            <th style="width: 7%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($students))
                                            @foreach($students as $index => $student)
                                                <tr>
                                                    <td>{{ $index + $students->firstItem() }}</td>
                                                    <td>{{ $student->student_name }}</td>
                                                    <td>{{ $student->getClassRoom()->getName() }}</td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <form action="{{ route('student-edit', ['student_id' => $student->id]) }}" method="get">
                                                                <button type="submit" class="btn btn-block btn-default btn-flat ">
                                                                    <i class="fa fa-edit"> Edit</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <form action="{{route('student-delete', ['student_id' =>$student->id])}}" method="post">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <button type="submit" class="btn btn-block btn-default btn-flat">
                                                                    <i class="fa fa-trash"> Delete</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row  no-print">
                            <div class="col-md-12">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="pull-right">
                                        @if(!empty($students))
                                            {{ $students->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.boxy -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
@endsection