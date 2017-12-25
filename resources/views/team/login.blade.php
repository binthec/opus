@extends('layouts.master')
@section('bodyId', 'login')

@section('content')
	<div class="home-con">
		@include('partials.home-nav')
		<div class="home-page login-page">
			<div class="login-form-con" style="margin-bottom: 24px;">
		        <h1 class="header text-center" style="font-size: 28px;">@lang('menu.Login')</h1>
                @if($errors->has('wrong_credential'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $errors->first('wrong_credential') }}
                    </div>
                @endif
                <form action="{{ route('team.postlogin') }}" method="POST" role="form">
		            <div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
                        <label for="team-id" class="control-label">@lang('menu.TeamName')</label>
                        {!! Form::select('team_id', App\Models\Team::getAllTeams(), '',['id' => 'team-id', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('team_id'))
                            <p class="help-block has-error">{{ $errors->first('team_id') }}</p>
                        @endif
                    </div>
		            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                <label for="email" class="control-label">@lang('function.Email')</label>
		                <input name="email" id="email" value="{{ old('email') }}" type="email" class="form-control" required>
                        @if($errors->has('email'))
                            <p class="help-block has-error">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
		            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="control-label">@lang('menu.Password')</label>
                        <input name="password" id="password" type="password" class="form-control" required>
                        @if($errors->has('password'))
                            <p class="help-block has-error">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
		            <div class="checkbox" style="margin-top: 20px; margin-bottom: 20px;">
		                <label>
		                    <input type="checkbox" name="remember">
		                    @lang('function.RememberMe')
		                </label>
		            </div>
		            <div style="margin-top: 15px; margin-bottom: 10px;">
			            <input type="submit" class="btn btn-success btn-block btn-lg" value="@lang('menu.Login')">
		            </div>
		        </form>
                <div style="margin-top: 15px; margin-bottom: 10px;">
                    <a href="{{ route('password.request') }}" class="text-muted pull-right" style="font-size: 14px;" tabindex="-1">@lang('message.ForgotPassword')</a>
                </div>
			</div>
			{{--<p class="text-center" style="font-size: 14px;"><span class="text-muted" style="margin-left: 15px;">Don't have a team?</span> <a href="{{ route('team.create') }}">Create now</a>.</p>--}}
		</div>
	</div>
@endsection()