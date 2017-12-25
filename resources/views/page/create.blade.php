@extends('layouts.master')

@section('content')
<div class="aside-content create-wiki-aside">
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">
				<i class="fa fa-file-text-o fa-fw fa-lg icon"></i> @lang('function.CreatePage')
			</div>
			<form action="{{ route('pages.store', [$team->slug, $space->slug, $wiki->slug ]) }}" method="POST" role="form" class="create-wiki-form">
				<div class="row">
					<div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
						<label class="control-label" for="name">@lang('function.Name')</label>
						<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
						@if($errors->has('name'))
						<p class="help-block has-error">{{ $errors->first('name') }}</p>
						@endif
					</div>
				</div><!-- /.row -->

				<div class="row">
					<div class="form-group col-md-6{{ $errors->has('slug') ? ' has-error' : '' }}">
						<label class="control-label" for="slug">@lang('function.Slug') <span class="text-danger">*</span></label>
						<input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control" required>
						@if($errors->has('slug'))
						<p class="help-block has-error">{{ $errors->first('slug') }}</p>
						@endif
					</div>

					<div class="form-group col-md-6{{ $errors->has('page_parent') ? ' has-error' : '' }}">
						<label for="page-parent" class="control-label">@lang('function.PageParent')</label>
						{!! Form::select('page_parent', $pages, '', ['class' => 'form-control', 'placeholder' => 'オプションを選択']) !!}
						@if($errors->has('page_parent'))
						<p class="help-block has-error">{{ $errors->first('page_parent') }}</p>
						@endif
					</div>
				</div><!-- /.row -->

				<div class="row">

					<div class="form-group col-md-6">
						<label class="control-label" for="outline">@lang('function.Outline')</label>
						<input type="text" name="outline" id="outline" value="{{ old('outline') }}" class="form-control">
					</div>


					<div class="form-group col-md-6">
						<label class="control-label" for="tags">@lang('function.Tags')</label>
						<select class="form-control" name="tags[]" id="tags" multiple="multiple"></select>
					</div>
				</div><!-- /.row -->

				<!-- Markdown Area -->
				<div class="row" id="markdown-area">
					<div class="col-xs-6 full-height">

						<div class="demo-control">
							<a href="#" class="source-clear" tabindex="-1">clear</a>
						</div>
						<textarea name="description" class="source full-height" rows="15" required>{{ old('description') }}</textarea>
					</div>

					<section class="col-xs-6 full-height markdown-body">
						<div class="demo-control">
							<a href="#" data-result-as="html" tabindex="-1">html</a>
							<a href="#" data-result-as="src" tabindex="-1">source</a>
							<a href="#" data-result-as="debug" tabindex="-1">debug</a>
						</div>
						<div class="result-html full-height"></div>
						<pre class="hljs result-src full-height"><code class="result-src-content full-height"></code></pre>
						<pre class="hljs result-debug full-height"><code class="result-debug-content full-height"></code></pre>
					</section>
				
				</div><!-- /.row -->
				<!-- /Markdown Area -->
				
				<hr>
				
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-lg">@lang('function.Save')</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="/js/markdown.js"></script>
@endsection