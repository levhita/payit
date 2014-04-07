<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form role="form">
				<h1>New Campaign</h1>
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

				<button id="campaign_save" type="button" class="btn btn-default btn-primary pull-right">Preview »</button>
			</form>
		</div>
		<div class="col-md-6">
			<h1>Cool Event</h1>
			<div>
				Cool event is the coolest event in the ZMG, and you should really really go.<br/>
				<br/>
				We'll have clowns, drinks and assorted nuts, because you are worth it<br/>
 				<br/>
 				The only thing you have to do is to PayIt with a twit :D<br/>
 				<br/>
 				Easypeacy... ¡We are expecting you!<br/>
 				<br/>
				Day:<br/>
				24 Feb 2014 7:00pm<br/>
				Place:<br/>
				HackerGarage<br/>
				Vidrio #2184<br/>
				Col. Americana<br/>
				Guadalajara, Jal.<br/>
			</div>
			
			<h3>Twitt</h3>
			<img class="pull-left" src="http://placekitten.com/48/48" style="width:48px; height:48px; margin:5px" title="avatar"/>
			<h2 style="margin-top:32px;">@Username</h2>
			<div style="clear:both">this is a very cool twit.</div>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/campaign_edit.js"></script>