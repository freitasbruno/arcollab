<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/team/{{ $team->id }}">
			<div class="uk-card-secondary uk-card-header uk-text-center">
				<h3><span class="uk-margin-right" uk-icon="icon: users; ratio: 1.5"></span>{{ $team->name }}</h3>
			</div>
		</a>
		<div class="uk-card-body">
			<p>{{ $team->description }}</p>
	        <a href="/team/{{ $team->id }}" uk-icon="icon: pencil"></a>
	        <a href="/deleteTeam/{{ $team->id }}" uk-icon="icon: trash"></a>
		</div>
		<div class="uk-card-footer">
			<ul class="uk-list uk-list-divider">
			  	<li><span class="uk-badge">14</span>USERS</li>
			</ul>
		</div>
	</div>
</div>