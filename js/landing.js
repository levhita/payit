$( document ).ready(function() {
	
	$('#openModalButton').bind('click', function(){
		$('#campaignModal').modal('show');
		$('#nameInput').focus();
	});

	$('#saveButton').bind('click',function(){
		$.ajax({
			type: "POST",
			url: "/campaign/create",
			data: {
				'name': $('#nameInput').val(),
				'template': $('#templateRadio > .btn.active > input').val()
			}
		}).done(function(data) {
			window.location.replace("/c/" + data.campaign.pretty_url );
		});
	
	});
});