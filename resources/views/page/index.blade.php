@extends('layouts.master')

@section('content')
@include('wiki.partials.menu')
<div class="aside-content">
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div style="border: 1px solid #eee; border-radius: 3px; margin-bottom: 20px; box-shadow: 0 1px 1px rgba(0,0,0,.05);">
				<div class="wiki-nav">
					<nav>
						<ul class="list-unstyled list-inline pull-left">
							<li>
								<a href="#" style="padding: 5px 6px;"><i class="fa fa-tasks fa-lg icon"></i> @lang('function.MakeShortcut')</a>
							</li>
							<li>
								@if(empty($isPageInReadList)) 
								<a href="{{ route('pages.readlater.create', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;"><i class="fa fa-check-square-o icon"></i> @lang('function.ReadLater')</a>
								@else
								<a href="{{ route('pages.readlater.destroy', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" data-method="delete" style="padding: 5px 6px;"><i class="fa fa-check-square-o icon"></i> @lang('function.AddedReadLater')</a>
								@endif
							</li>
						</ul>
						<ul class="list-unstyled list-inline pull-right">
							<li>
								<a href="{{ route('pages.edit', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;"><i class="fa fa-pencil fa-lg icon"></i> @lang('function.Edit')</a>
							</li>
							<li>
								<a href="{{ route('pages.destroy', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;" data-method="delete" data-confirm="@lang('message.AreYouSure')"><i class="fa fa-trash-o icon"></i> @lang('function.Delete')</a>
							</li>
							<!--                                
															<li>
																<a href="{{ route('pages.word', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;"><i class="fa fa-file-word-o icon"></i> Export to Word</a>
															</li>
															<li>
																<a href="{{ route('pages.pdf', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;"><i class="fa fa-file-pdf-o icon"></i> Export to PDF</a>
															</li>
							-->
							<li>
								<a href="{{ route('pages.settings', [$team->slug, $space->slug, $wiki->slug, $page->slug]) }}" style="padding: 5px 6px;"><i class="fa fa-cog icon"></i> @lang('menu.Settings')</a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</nav>
				</div>
				<div class="markdown-body" style="padding: 0px 25px;">
					@if($page->description)
					<!-- markdown 本体 -->
					<div class="markdown-body" style="padding: 0px 25px;"></div>
					@else 
					<span style="font-size: 22px; font-weight: 700; line-height: 0px;">...</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div style="border: 1px solid #eee; border-radius: 3px; margin-bottom: 20px; box-shadow: 0 1px 1px rgba(0,0,0,.05); padding: 12px 15px;">
				<div class="media">
					<div class="pull-left" style="padding-right: 12px;">
						<p class="media-object"><i class="fa fa-tag fa-fw"></i> @lang('function.Tags') : </p>
					</div>
					<div class="media-body" style="line-height: 26px;">
						@if($pageTags->count() > 0)
						<ul class="list-unstyled list-inline page-tags pull-left">                                
							@foreach($pageTags as $tag)
							<li>
								<a href="{{ route('tags.wikis', [$team->slug, $tag->slug ]) }}">{{ $tag->name }}</a>
							</li>
							@endforeach
						</ul>
						@else
						<h1 class="nothing-found" style="margin: 0px; line-height: 20px;"><i class="fa fa-exclamation-triangle fa-fw icon"></i> @lang('message.Nothingfound')</h1>
						@endif  
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row no-container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@include('page.partials.comment')
		</div>
	</div>
</div>
@endsection

@section('js')
@include('parts.md-render', ['body' => $page->description])
@endsection