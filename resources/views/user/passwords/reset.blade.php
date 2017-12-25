@extends('layouts.master')
@section('bodyId', 'reset-pass')

@section('content')
    <div class="home-con">
        @include('partials.home-nav')
        <div class="home-page login-page">
            <div class="login-form-con" style="margin-bottom: 24px;">
                @if(!Session::get('alert'))
                    <h1 class="header text-center" style="font-size: 28px;">@lang('menu.ResetPassword')</h1>
                    <form action="{{ route('password.reset', [$token]) }}" method="POST" role="form">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password" class="control-label">@lang('menu.Password')</label>
                            <input name="password" id="password" type="password" class="form-control" required>
                            @if($errors->has('password'))
                                <p class="help-block has-error">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="password-confirm" class="control-label">@lang('menu.ConfirmPassword')</label>
                            <input name="password_confirmation" id="password-confirm" type="password" class="form-control" required>
                            @if($errors->has('password_confirmation'))
                                <p class="help-block has-error">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                        <div style="margin-top: 30px; margin-bottom: 10px;">
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="@lang('message.ResetPassword')">
                        </div>
                    </form>
                @else
                    <div class="media" style="color: #3c763d; font-size: 15px;">
                        <div class="media-left" style="padding-right: 20px;">
                            <i class="fa fa-send-o fa-3x"></i>
                        </div>
                        <div class="media-body">
                            <p>{{ Session::get('alert')  }}</p>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection()