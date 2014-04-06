<div class="container">
	<form action="/campaign/save" role="form">
		<h3>Your Information <small class="text-muted">(Only for new users)</small></h3>
		<div class="form-group">
			<label for="first_name">First Name</label>
			<input type="text" class="form-control" id="first_name" placeholder="John">
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>
			<input type="text" class="form-control" id="last_name" placeholder="Doe">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" placeholder="example@example.org">
		</div>
		<hr/>
		<h3>Your Campaign</h3>
		<div class="form-group">
			<label for="campaign_name">Campaign Name</label>
			<input type="text" class="form-control" id="campaign_name" placeholder="Cool Campaign Name">
		</div>
		<div class="form-group">
			<label for="pretty_url">Pretty URL</label>
			<input type="text" class="form-control" id="pretty_url" placeholder="cool_campaign_name">
		</div>
		<div class="form-group">
			<label for="description">Description <small class="text-muted">(We support <a href="http://stackoverflow.com/editing-help" target="markdown">Markdown</a>)</small></label>
			<textarea class="form-control" rows="5" id="description"></textarea>
		</div>
		<div class="form-group">
			<label for="twit">Twit</label>
			<textarea class="form-control" rows="2" id="twit"></textarea>
		</div>
		<div class="form-group">
			<label for="thank_you">Thank you text <small class="text-muted">(We support <a href="http://stackoverflow.com/editing-help" target="markdown">Markdown</a>)</small></label>
			<textarea class="form-control" rows="5" id="thank_you"></textarea>
			<small class="text-muted">
				Include links and instructions, this information will be
				presented to the user when once the twit is sent.
			</small>
		</div>


		<button type="submit" class="btn btn-default btn-primary pull-right">Preview</button>
	</form>
</div>