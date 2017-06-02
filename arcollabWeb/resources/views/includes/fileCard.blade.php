<div class="uk-margin-top">
	<div class="uk-card uk-card-default uk-margin-remove uk-margin-top" uk-grid>
	    <div class="uk-card-media-left uk-cover-container uk-width-1-4 uk-padding-remove">
			<a class="uk-link-muted" href="#modal-center" uk-toggle>
		        <img src="/uploads/{!! $file->filename !!}" alt="{!! $file->filename !!}" uk-cover>
		        <canvas width="300" height="150"></canvas>
			</a>
			<div id="modal-center" uk-modal="center: true">
			    <div class="uk-modal-dialog">
			        <button class="uk-modal-close-outside" type="button" uk-close></button>
			        <img src="/uploads/{!! $file->filename !!}" alt="{!! $file->filename !!}">
			    </div>
			</div>
	    </div>
		<div class="uk-card-body">
            <h4>{!! $file->originalName !!}</h4>
            <p><a class="uk-link-muted" href="/uploads/{!! $file->filename !!}" target="_blank">Download</a></p>
        </div>
	</div>
</div>
