@extends('layouts.master')

@section('content')
<div class="team-setting">
	<div class="team-setting-header">
		@lang('menu.UserSettings')
	</div>
	<div role="tabpanel">
		@include('user.partials.tab-menu')
		<div class="tab-content">
			<div class="team-info">
				<h2>@lang('menu.ChangePassword')</h2>
				<p class="text-muted action-info">
					@lang('message.AfterChangePass')
				</p>
				<form action="{{ route('users.password', [$team->slug, Auth::user()->slug]) }}" method="POST" role="form">
					{{ method_field('patch') }}
					<div class="form-group">  
						<label for="password">@lang('function.CurrentPassword')</label>
						<input type="password" id="password" name="password" class="form-control input" autocomplete="off">
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="new-password">@lang('function.NewPassword')</label>
								<input type="password" name="new_password" class="form-control input" id="new-password" autocomplete="off">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="password-confirmation">@lang('function.PasswordConfirmation')</label>
								<input type="password" name="password_confirmation" class="form-control input" id="password-confirmation" autocomplete="off">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">@lang('function.Update')</button> 
				</form>
			</div>
			<div class="delete-team">
				<h2>@lang('function.LeaveOrganization')</h2>
				<p class="text-muted action-info">
					@lang('message.DeleteAccountBeCertain')
				</p>
				<a href="#" style="color: #fff;" class="btn btn-danger" onclick="if (confirm('本当に削除してよろしいですか？')) {
                            event.preventDefault();
                            document.getElementById('delete-user-account').submit();
                        }" id="delete-account"><i class="fa fa-trash-o fa-fw"></i> @lang('function.DeleteAccount')</a>
				<form action="{{ route('users.destroy', [$team->slug, Auth::user()->slug]) }}" id="delete-user-account" method="POST">
					{{ method_field('delete') }}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection