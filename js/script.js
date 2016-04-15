$(document).ready(function() {
	$.get('/wordpress/', function(data){
		console.log(data);
	});
});