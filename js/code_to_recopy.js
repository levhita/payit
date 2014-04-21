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






<?php if($_is_new_user_): ?>
	<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="newUserModalLabel">New User</h4>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="form-group">
							<label for="firstNameInput">First Name</label>
							<input type="text" class="form-control" id="firstNameInput" placeholder="John">
						</div>
						<div class="form-group">
							<label for="lastNameInput">Last Name</label>
							<input type="text" class="form-control" id="lastNameInput" placeholder="Doe">
						</div>
						<div class="form-group">
							<label for="emailInput">Email address</label>
							<input type="email" class="form-control" id="emailInput" placeholder="example@example.org">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="registerUserButton" type="button" class="btn btn-primary">Register</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	$(document).ready(function() {
		$('#newUserModal').modal({
			keyboard: false,  // THERE IS NO
			backdrop:'static' // ESCAPE MUAHAHA!!!
		});
		$('#newUserModal').modal('show');

		$('#registerUserButton').bind('click', function(){
			//TODO Validation
			$.ajax({
				type: "POST",
				url: "/account/register",
				data: {
					firstname: $('#firstNameInput').val(),
					lastname: $('#lastNameInput').val(),
					email: $('#emailInput').val(),
				}
			}).done(function(data) {
				$('#newUserModal').modal('hide');	
			});
		});
	});
	</script>		
	<?php endif; ?>