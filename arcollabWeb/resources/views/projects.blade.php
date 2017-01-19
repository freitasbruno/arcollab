@extends('layouts.master')

@section('header')

@stop

@section('content')
	<div class="uk-section">
	    <div class="uk-container uk-container-large">
	    	<h3 class="uk-heading-line"><span>MY PROJECTS</span></h3>
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/projectCard', $projects, 'project')
				@include('includes/formNewProject')
			</div>
			<h3 class="uk-heading-line"><span>SHARED PROJECTS</span></h3>
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/projectCard', $sharedProjects, 'project')
			</div>
		</div>
	</div>
	
	
	<script>
		(function ($) {
		
		    var bar = $("#progressbar")[0];
		
		    UIkit.upload('#newProjectForm', {
		
		        url: '',
		        multiple: true,
		
		        beforeSend: function() { console.log('beforeSend', arguments); },
		        beforeAll: function() { console.log('beforeAll', arguments); },
		        load: function() { console.log('load', arguments); },
		        error: function() { console.log('error', arguments); },
		        complete: function() { console.log('complete', arguments); },
		
		        loadStart: function (e) {
		            console.log('loadStart', arguments);
		
		            bar.removeAttribute('hidden');
		            bar.max =  e.total;
		            bar.value =  e.loaded;
		        },
		
		        progress: function (e) {
		            console.log('progress', arguments);
		
		            bar.max =  e.total;
		            bar.value =  e.loaded;
		
		        },
		
		        loadEnd(e) {
		            console.log('loadEnd', arguments);
		
		            bar.max =  e.total;
		            bar.value =  e.loaded;
		            
		        },
		
		        completeAll: function () {
		            console.log('completeAll', arguments);
					
				    $("#imageName").val("Upload complete");
				    
		            setTimeout(function () {
		                bar.setAttribute('hidden', 'hidden');
		            }, 1000);
		
					
		        }
		    });
		
		})(jQuery);
	</script>
@stop

