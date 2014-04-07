$( document ).ready(function() {
	$('#campaign_save').bind('click',function(){
		$.ajax({
			type: "POST",
			url: "/campaign/save",
			data: {
				name: "John",
				location: "Boston"
			}
		}).done(function(data) {
			alert( "Data Saved: " + msg );
		});
	});
});