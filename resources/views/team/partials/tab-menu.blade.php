<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="{{ (Route::currentRouteName() == 'teams.settings.general' ? 'active' : '') }}">
		<a href="{{ route('teams.settings.general', [$team->slug,]) }}">@lang('menu.General')</a>
	</li>
	<li role="presentation" class="{{ (Route::currentRouteName() == 'teams.settings.members' ? 'active' : '') }}">
		<a href="{{ route('teams.settings.members', [$team->slug,]) }}">@lang('menu.Members')</a>
	</li>
	<li role="presentation" class="{{ (Route::currentRouteName() == 'roles.index' || Route::currentRouteName() == 'roles.create' || Route::currentRouteName() == 'roles.edit') ? 'active' : '' }}">
		<a href="{{ route('roles.index', [$team->slug,]) }}">@lang('menu.Roles')</a>
	</li>
	<li role="presentation" class="{{ (Route::currentRouteName() == 'teams.integration' || Route::currentRouteName() == 'integration.slack') ? 'active' : '' }}">
		<a href="{{ route('teams.integration', [$team->slug,]) }}">Slack</a>
	</li>
</ul>