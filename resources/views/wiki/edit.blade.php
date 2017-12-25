@extends('layouts.master')

@section('content')
<div class="aside-content create-wiki-aside">

	<div class="col-md-12">

		<div class="page-header">
			<i class="fa fa-book fa-fw fa-lg icon"></i> @lang('function.EditWiki')
		</div>

		<form action="{{ route('wikis.update', [$team->slug, $wiki->space->slug, $wiki->slug ]) }}" method="POST" role="form" class="create-wiki-form">
			{{ method_field('patch') }}

			<!-- Markdown Area -->
			<div class="row" id="markdown-area">

				<div class="col-xs-6 full-height">
					<div class="demo-control">
						<a href="#" class="source-clear">clear</a>
					</div>
					<textarea name="description" class="source full-height" rows="15">{{ $wiki->description }}</textarea>
				</div>

				<section class="col-xs-6 full-height markdown-body">
					<div class="demo-control">
						<a href="#" data-result-as="html">html</a>
						<a href="#" data-result-as="src">source</a>
						<a href="#" data-result-as="debug">debug</a>
					</div>
					<div class="result-html full-height"></div>
					<pre class="hljs result-src full-height"><code class="result-src-content full-height"></code></pre>
					<pre class="hljs result-debug full-height"><code class="result-debug-content full-height"></code></pre>
				</section>
			
			</div>
			<!-- /Markdown Area -->

			<div class="row no-container" style="margin-top: 15px;">
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<div class="form-group form-inline edit-wiki-tags" style="position: relative; top: -5.1px;">
						<label class="control-label" for="tags" style="margin-right: 15px;">@lang('function.Tags') : </label>
						<select class="form-control" name="tags[]" id="tags" multiple="multiple" style="width: 90%;">
							@foreach($wikiTags as $tag)
							<option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
							@endforeach
						</select>
					</div>  
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<button type="submit" class="btn btn-success pull-right" style="margin-right: 17px;">@lang('function.Update')</button>
					<button type="submit" class="btn btn-link pull-right" style="margin-right: 10px;">@lang('function.Close')</button>
				</div>
			</div>
			
		</form>
	</div><!-- /.col-md-12 -->
</div><!-- /.a-side content -->
@endsection

@section('js')
<script src="/js/markdown.js"></script>
@endsection