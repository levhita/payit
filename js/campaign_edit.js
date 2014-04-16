$( document ).ready(function() {
	
	$('#campaign_preview').bind('click',function(){
		var data = getCampaignData();
		
		var preview_template = Handlebars.compile($("#preview-template").html());
		$('#preview').html(preview_template(data));
		
		if ( $('#save_bar').hasClass('hidden') ) {
			$('#save_bar').removeClass('hidden');
		}

	});
	
	$('#campaign_save').bind('click',function(){
		$.ajax({
			type: "POST",
			url: "/campaign/save",
			data: getCampaignData()
		}).done(function(data) {
			window.location.replace("/c/" + data.campaign.pretty_url );
		});
	
	});

	function getCampaignData(){
		return {
			'campaign_id': $('#campaign_id').val(),
			'name': $('#name').val(),
			'pretty_url': $('#pretty_url').val(),
			'description': $('#description').val(),
			'twit': $('#twit').val(),
			'thank_you': $('#thank_you').val()
		};
	}


	function nl2br(text) {
	    text = Handlebars.Utils.escapeExpression(text);
	    text = text.replace(/(\r\n|\n|\r)/gm, '<br/>');
	    return new Handlebars.SafeString(text);
	}
	Handlebars.registerHelper('nl2br', function(text) {
	    return nl2br(text);
	});
	
});