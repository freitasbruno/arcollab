@extends('layouts.master')

@section('header')

@stop

@section('content')

	<form id="myForm" method="post" enctype="multipart/form-data" uk-form-custom> 
		<div class="test-upload uk-placeholder uk-text-center">
		    <span uk-icon="icon: cloud-upload"></span>
		    <span class="uk-text-middle">Attach binaries by dropping them here or</span>
		    
		        <input id="files" type="file" multiple>
		        <span class="uk-link">selecting one</span>
	    </div>
	    <input type="submit">
	</form>
	
	<div id="selectedFiles"></div>
	
	<progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>


    <script>
	    var selDiv = "";
	    
	    document.addEventListener("DOMContentLoaded", init, false);
	    
	    function init() {
	        document.querySelector('#files').addEventListener('change', handleFileSelect, false);
	        selDiv = document.querySelector("#selectedFiles");
	    }
	        
	    function handleFileSelect(e) {
	        
	        if(!e.target.files) return;
	        
	        selDiv.innerHTML = "";
	        
	        var files = e.target.files;
	        for(var i=0; i<files.length; i++) {
	            var f = files[i];
	            
	            selDiv.innerHTML += f.name + "<br/>";
	
	        }
	        
	    }
    </script>
    
	<script>
	
	(function ($) {
	
	    var bar = $("#progressbar")[0];
	
	    UIkit.upload('.test-upload', {
	
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
	
	            setTimeout(function () {
	                bar.setAttribute('hidden', 'hidden');
	            }, 1000);
	
	            alert($('#uploaded')[0].files[0]);
	        }
	    });
	
	})(jQuery);
	
	</script>
@stop