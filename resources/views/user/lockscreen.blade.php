@extends('layouts.lockscreen')
@section('title', 'Lockscreen')
@section('content')
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <b>ATG</b>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">{{ $user->name }}</div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="/images/user/default_user.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form action="{{ route('login-action') }}" class="lockscreen-credentials" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="user_name" value="{{ !empty($user) ? $user->user_name : '' }}">
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your password to continue..
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center"></div>
    </div>
    <!-- /.center -->
@endsection