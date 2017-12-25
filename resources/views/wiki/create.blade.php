@extends('layouts.master')

@section('content')
<div class="aside-content create-wiki-aside">
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="page-header">
				<i class="fa fa-book fa-fw fa-lg icon"></i> @lang('function.CreateWiki')
			</div>
			<form action="{{ route('wikis.store', [$team->slug, ]) }}" method="POST" role="form" class="create-wiki-form">

				<div class="row">
					<div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
						<label class="control-label" for="name">@lang('function.Name') <span class="text-danger">*</span></label>
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

					<div class="form-group col-md-6{{ $errors->has('space') ? ' has-error' : '' }}">
						<label for="space" class="control-label">@lang('function.Space') <span class="text-danger">*</span></label>
						{!! Form::select('space', $spaces, '', ['class' => 'form-control', 'placeholder' => 'スペースを選択', 'required']) !!}
						@if($errors->has('space'))
						<p class="help-block has-error">{{ $errors->first('space') }}</p>
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
						<select class="form-control" name="tags[]" id="tags" multiple="multiple" value=""></select>
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
</div><!-- /.aside-content -->

</body>
@endsection

@section('js')
<script src="/js/markdown.js"></script>
@endsection