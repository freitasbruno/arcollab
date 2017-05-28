<div class="uk-margin-top">
	<div class="uk-card uk-card-default uk-margin-remove uk-margin-top" uk-grid>
	    <div class="uk-card-media-left uk-cover-container uk-width-1-4 uk-padding-remove">
			<a class="uk-link-muted" href="/uploads/{!! $file->filename !!}" target="_blank">
		        <img src="/uploads/{!! $file->filename !!}" alt="{!! $file->filename !!}" uk-cover>
		        <canvas width="300" height="150"></canvas>
			</a>
	    </div>
		<div class="uk-card-body">
            <h4>{!! $file->originalName !!}</h4>
            <p><a class="uk-link-muted" href="/uploads/{!! $file->filename !!}" target="_blank">Download</a></p>
        </div>
	</div>
</div>
