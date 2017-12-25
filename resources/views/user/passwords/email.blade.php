@extends('layouts.master')
@section('bodyId', 'reset-pass')

@section('content')
	<div class="home-con">
		@include('partials.home-nav')
		<div class="home-page login-page">
			<div class="login-form-con" style="margin-bottom: 24px;">
                @if(!Session::get('alert'))
                    <h1 class="header text-center" style="font-size: 28px;">@lang('menu.ResetPassword')</h1>
                    <form action="{{ route('password.email') }}" method="POST" role="form">
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
                        <div style="margin-top: 30px; margin-bottom: 10px;">
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="@lang('message.SendPasswordResetLink')">
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