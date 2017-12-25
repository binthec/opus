@extends('layouts.master')

@section('content')
<div class="aside-content create-wiki-aside">
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">
				<i class="fa fa-file-text-o fa-fw fa-lg icon"></i> @lang('function.UpdatePage')
			</div>
			<form action="{{ route('pages.update', [$team->slug, $wiki->space->slug, $wiki->slug, $page->slug ]) }}" method="POST" role="form">
				{{ method_field('patch') }}

				<!-- Markdown Area -->
				<div class="row" id="markdown-area">

					<div class="col-xs-6 full-height">
						<div class="demo-control">
							<a href="#" class="source-clear">clear</a>
						</div>
						<textarea name="description" class="source full-height" rows="15">{{ $page->description }}</textarea>
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
					<div class="col-md-10">
						<div class="form-group form-inline edit-wiki-tags" style="position: relative; top: -5.1px;">
							<label class="control-label" for="tags" style="margin-right: 15px;">@lang('function.Tags') : </label>
							<select class="form-control" name="tags[]" id="tags" multiple="multiple" style="width: 90%;">
								@foreach($pageTags as $tag)
								<option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
								@endforeach
							</select>
						</div>  
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-success pull-right" style="margin-right: 17px;">@lang('function.Update')</button>
						<button type="submit" class="btn btn-link pull-right" style="margin-right: 10px;">@lang('function.Close')</button>
					</div>
				</div>
								
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="/js/markdown.js"></script>
@endsection