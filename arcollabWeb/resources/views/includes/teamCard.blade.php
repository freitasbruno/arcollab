<div>
	<div class="panel panel-default panel-profile">
		<a href="/team/{{ $team->id }}">
		<div class="panel-heading project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
		</a>
		<div class="panel-body">
			<h3>{{ $team->name }}</h3>
            <a href="/team/{{ $team->id }}">
            	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
            <a href="/deleteTeam/{{ $team->id }}">
            	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
		</div>
	</div>
</div>