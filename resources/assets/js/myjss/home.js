

var path = window.location.pathname;

if(path =='/home'){
    $('#dash-link').hide();
}else{
    $('#dash-link').show();
}

if(path == '/'){
	$('#loggedin-link').hide();
}else{
	$('#loggedin-link').show();
}


//flash
$('.flash-alert .close').click(function(){
	console.log('animating');
   $('.flash-alert').addClass('close-flash');
});
setTimeout(function(){
   $('.flash-alert').addClass('close-flash');
}, 5000);