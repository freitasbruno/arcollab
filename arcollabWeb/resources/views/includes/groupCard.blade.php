<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/group/{{ $group->id }}">
			<div class="uk-card-secondary uk-card-header uk-text-center">
				<h3>{{ $group->name }}</h3>
			</div>
		</a>
		<div class="uk-card-body">
			<p>{{ $group->description }}</p>
	        <a href="/group/{{ $group->id }}" uk-icon="icon: pencil"></a>
	        <a href="/deleteGroup/{{ $group->id }}" uk-icon="icon: trash"></a>
		</div>
		<ul class="uk-list uk-list-divider">
		  	<li>
		    	<span class="uk-badge">14</span>
		    	PROJECT ISSUES
		  	</li>
		  	<li>
		    	<span class="uk-badge">5</span>
		    	PENDING ISSUES
		  	</li>
		</ul>
	</div>
</div>