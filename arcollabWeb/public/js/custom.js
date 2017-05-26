var msg = $('#msg');
$(msg).hide();

if ($(msg).empty()) {
    //alert ("hello");
}else{
    alert ("goodby");
}

UIkit.notification({
    message: "dfdlld",
    status: 'success',
    pos: 'top-center',
    timeout: 5000
});
