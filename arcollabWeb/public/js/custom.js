$(document).ready(function(){

    var msg = $('#message');
    $(msg).hide();

    UIkit.notification({
        message: $(msg).html(),
        status: 'success',
        pos: 'top-center',
        timeout: 5000
    });

});
