@extends('layouts.master')

@section('content')
<div class="create-category-form-con">
	<h1 class="header">@lang('function.Createspace')</h1>
	<form action="{{ route('spaces.store', [ $team->slug ]) }}" method="POST" role="form">

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="control-label">@lang('function.SpaceName') <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" id="name" autocomplete="off" required>
			@if($errors->has('name'))
			<p class="help-block has-error">{{ $errors->first('name') }}</p>
			@endif
		</div>

		<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
			<label for="slug" class="control-label">@lang('function.Slug') <span class="text-danger">*</span></label>
			<input type="text" name="slug" class="form-control" id="slug" autocomplete="off" required>
			@if($errors->has('slug'))
			<p class="help-block has-error">{{ $errors->first('slug') }}</p>
			@endif
		</div>

		<div class="form-group">
			<label class="control-label" for="description">@lang('function.Description')</label>
			<textarea name="description" id="description" class="form-control" rows="2"></textarea>
		</div>

		<div style="margin-top: 15px;">
			<input type="submit" class="btn btn-success" value="@lang('function.Save')">
		</div>
	</form>
</div>
@endsection