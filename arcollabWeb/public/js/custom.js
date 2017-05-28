$(document).ready(function(){

    var msgSuccess = $('#msgSuccess').html();
    var msgWarning = $('#msgWarning').html();
    var msgError = $('#msgError').html();
    var msgInformation = $('#msgInformation').html();

    if (typeof msgSuccess !== 'undefined' && msgSuccess.length > 1){
		notify('success', msgSuccess);
    }
	if (typeof msgWarning !== 'undefined' && msgWarning.length > 1){
    	notify('warning', msgWarning);
    }
	if (typeof msgError !== 'undefined' && msgError.length > 1){
	    notify('danger', msgError, 20000);
    }
	if (typeof msgInformation !== 'undefined' && msgInformation.length > 1){
	    notify('primary', msgInformation);
    }

    $(".uk-checkbox").change(function() {

        if(this.checked) {
            $(this).closest("li").next("ul").each(function () {
                $(this).find(".uk-checkbox").attr('checked', true);
            });
        }else{
            $(this).closest("li").next("ul").each(function () {
                $(this).find(".uk-checkbox").attr('checked', false);
            });
        }
    });

});

function notify(type, message, timeout = 5000) {
	UIkit.notification({
		message: message,
		status: type,
		pos: 'top-center',
		timeout: timeout
	});
}
