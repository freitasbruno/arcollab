<?php
$childTeams = $team->teams;
$users = $team->users;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="/deleteTeam/{{ $team->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
	    <a href="/team/{{ $team->id }}">
			<div class="uk-card-secondary uk-card-header uk-padding-small teamColor">
				<h4 class="uk-margin-remove-bottom">
				<span class="uk-margin-right" uk-icon="icon: users; ratio: 1.3"></span><span class="uk-text-bottom">{{ $team->name }}</span>
				</h4>
			</div>
		</a>
		<div class="uk-card-body uk-padding-remove">
			@if(count($childTeams) >= 1)
			<div class="uk-overflow-auto">
			    <table class="uk-table uk-table-hover uk-table-middle">
			        <tbody>
						@foreach ($childTeams as $childTeam)
				            <tr>
				                <td><span uk-icon="icon: users"></span></td>
				                <td class="uk-table-link uk-text-left"><a class="uk-link-reset" href="/group/{{ $childTeam->id }}">{!! $childTeam->name !!}</a></td>
				            </tr>
						@endforeach	            
				    </tbody>
				</table>
			</div>
			@endif
			
			@if(count($users) >= 1)
			<div class="uk-overflow-auto">
			    <table class="uk-table uk-table-hover uk-table-middle">
			        <tbody>
						@foreach ($users as $user)
				            <tr>
				                <td><span uk-icon="icon: user"></span></td>
				                <td class="uk-table-link">
				                    <a class="uk-link-reset" href="#">{!! $user->name !!}</a>
				                </td>
				            </tr>
						@endforeach	            
			        </tbody>
			    </table>
			</div>
			@endif
			@include('includes/formAddTeamUser')
		</div>
		<div class="uk-card-footer uk-padding-small">	
			<p class="uk-padding-remove-vertical">
				<span class="uk-badge uk-margin-right">{{ count($users) }}</span>Users
			</p>
		</div>
	</div>
</div>