@extends('layouts.master')

@section('content')
@include('wiki.partials.menu')
<div class="aside-content">
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="wiki-setting">
				<div class="row no-container">
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="wiki-info" style="border-bottom: 0px;">
							<h2>@lang('menu.PageOverview')</h2>
							<hr>
							<form action="{{ route('pages.overview.update', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" method="POST" role="form">
								{{ method_field('patch') }}
								<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label for="name" class="control-label">@lang('function.Name') <span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control" id="name" value="{{ $page->name }}" required>
									@if($errors->has('name'))
									<p class="help-block has-error">{{ $errors->first('name') }}</p>
									@endif
								</div>

								<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
									<label for="slug" class="control-label">@lang('function.Slug') <span class="text-danger">*</span></label>
									<input type="text" name="slug" class="form-control" id="slug" value="{{ $page->slug }}" required>
									@if($errors->has('slug'))
									<p class="help-block has-error">{{ $errors->first('slug') }}</p>
									@endif
								</div>

								<div class="form-group {{ $errors->has('page_parent') ? 'has-error' : '' }}">
									<label for="page-parent" class="control-label">@lang('function.PageParent')</label>
									{!! Form::select('page_parent', $pages, $page->parent_id, ['class' => 'form-control', 'placeholder' => 'オプションを選択']) !!}
									@if($errors->has('page_parent'))
									<p class="help-block has-error">{{ $errors->first('page_parent') }}</p>
									@endif
								</div>	

								<div class="form-group">
									<label for="description">@lang('function.Description')</label>
									<input type="text" name="outline" class="form-control" id="description" value="{{ $page->outline }}">
								</div>

								<div class="form-group">
									<label class="control-label" for="tags">@lang('function.Tags')</label>
									<select class="form-control" name="tags[]" id="tags" multiple="multiple">
										@foreach($pageTags as $tag)
										<option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
										@endforeach
									</select>
								</div>

								<button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw" style="font-size: 14px;"></i> @lang('function.Update')</button>
							</form>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="panel panel-default" style="margin-top: 40px;">
							<div class="panel-body">
								<div class="wiki-overview">
									<div style="margin-bottom: 4px;">
										<label style="margin-bottom: 0;">@lang('function.CreatedBy')</label>
										<p><a href="#">{{ $page->user->name }}</a></p>
									</div>
									<div style="margin-bottom: 4px;">
										<label style="margin-bottom: 0;">@lang('function.CreatedAt')</label>
										<p>{{ $page->created_at->timezone(Auth::user()->timezone)->toDayDateTimeString() }}</p>
									</div>
									<div>
										<label style="margin-bottom: 0;">@lang('function.LastUpdated')</label>
										<p>{{ $pageLastUpdated }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr style="border-top: 1px solid #eee; margin: 0px 15px 0px 15px;">
				<div class="row no-container">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="delete-team" style="border-bottom: 0px;">
							<h2>@lang('menu.DeletePage')</h2>
							<p class="text-muted action-info">
								@lang('message.PageDeleteCaution')
							</p>
							<a href="{{ route('pages.destroy', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" class="btn btn-danger" data-method="delete" data-confirm="@lang('message.AreYouSure')" style="padding: 5px 6px;"><i class="fa fa-trash fa-fw"></i> @lang('message.PageDeleteAgree')</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection