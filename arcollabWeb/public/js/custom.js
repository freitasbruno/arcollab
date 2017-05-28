$(document).ready(function(){

	//$('.notification').hide();
	
    var msgSuccess = $('#msgSuccess').html();
    var msgWarning = $('#msgWarning').html();
    var msgError = $('#msgError').html();
    var msgInformation = $('#msgInformation').html();
    
    if (msgSuccess.strlen > 1){
	    UIkit.notification({
	        message: msgSuccess,
	        status: 'success',
	        pos: 'top-center',
	        timeout: 5000
	    });	
    }
    
    if (msgWarning.strlen > 1){
    	alert();
	    UIkit.notification({
	        message: $('#msgWarning').html(),
	        status: 'warning',
	        pos: 'top-center',
	        timeout: 5000
	    });	
    }
    
    if (msgError.strlen > 1){
	    UIkit.notification({
	        message: msgError,
	        status: 'danger',
	        pos: 'top-center'
	    });	
    }
    
    if (msgInformation.strlen > 1){
	    UIkit.notification({
	        message: msgInformation,
	        status: 'primary',
	        pos: 'top-center',
	        timeout: 5000
	    });	
    }
    

});


