<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		{{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
		<link rel="shortcut icon" type="image/png" href="/img/favicon.png">
		<title>OPUS</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/font-awesome.css">
		<link rel="stylesheet" href="/plugins/jcrop/Jcrop.min.css">
		<link rel="stylesheet" href="/css/toastr.min.css">
		<link href="/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/github.css" rel="stylesheet">
		<link href="/plugins/vakata-jstree/dist/themes/default/style.css" rel="stylesheet">
		<link href="/plugins/atjs/jquery.atwho.min.css" rel="stylesheet">
		<link href="/plugins/select2/select2.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/markdown.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/9.1.0/styles/github.min.css">

		<!--<script type="text/javascript" src="/js/jquery.js"></script>-->
		<!--<script type="text/javascript" src="/js/bootstrap.min.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.5/es5-shim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/lodash/2.4.1/lodash.js"></script>
		<script src="https://cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/8.3.1/markdown-it.min.js"></script>
		<script src="https://twemoji.maxcdn.com/twemoji.min.js"></script>
	</head>
	<body @if(isset($editWiki) && $editWiki === true) style="overflow: hidden;" @endif id="@yield('bodyId')">
		   <div class="modal fade" id="team-logo-modal" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Crop Image</h4>
					</div>
					<div class="modal-body" style="display: table; margin: 0 auto;">
						<img id="team-logo-crop" class="crop" src="#" alt="Crop Image" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="$('#avatar-upload-form').submit();">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<div id="app">
			@if(Auth::user())

			@include('partials.menu')
			<div class="container">
				@yield('content')
			</div>

			@else
			@yield('content')
			@endif
		</div>

		<script type="text/javascript" src="/js/list.min.js"></script>
		<script type="text/javascript" src="/js/laroute.js"></script>
		<script type="text/javascript" src="/plugins/jcrop/Jcrop.min.js"></script>
		<script type="text/javascript" src="/plugins/jquery-infinitescroll/jquery.infinitescroll.min.js"></script>
		<script type="text/javascript" src="/js/app.js"></script>
		<script type="text/javascript" src="/js/toastr.min.js"></script>
		<script type="text/javascript" src="/plugins/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="/js/moment.min.js"></script>
		<script type="text/javascript" src="/js/color-hash.js"></script>
		<script type="text/javascript" src="/js/laravel-delete-req.js"></script>
		<script src="/plugins/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
		<script src="/plugins/vakata-jstree/dist/jstree.min.js"></script>
		<script src="/plugins/atjs/jquery.caret.min.js"></script>
		<script src="/plugins/atjs/jquery.atwho.min.js"></script>
		<script src="/plugins/select2/select2.full.min.js"></script>
		<script>
(function () {
    hljs.initHighlightingOnLoad();
})();
		</script>
		@include('partials.toastr')

		@yield('js')
	</body>
</html>