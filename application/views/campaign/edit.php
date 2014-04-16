<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form role="form" id="new_campaign_form">
				<h1>New Campaign</h1>
				<div class="form-group">
					<label for="name">Campaign Name</label>
					<input type="text" class="form-control" id="name" placeholder="Cool Campaign Name">
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
				<input type="hidden" id="campaign_id" value="0"/>
			</form>
			<button id="campaign_preview" type="button" class="btn btn-default btn-primary">Preview <i class="fa fa-angle-double-right"></i></button>	
		</div>
		<br/>
		<div class="col-md-6">
			<div id="preview"></div>
			<div id="save_bar" class="hidden">
				<br/>
				<button id="campaign_save" type="button" class="btn btn-default btn-primary"><i class="fa fa-upload"></i> Publish</button>	
			</div>
		</div>

	</div>
</div>

<script id="preview-template" type="text/x-handlebars-template">
  <h1>{{name}}</h1>
	<div>{{nl2br description}}</div>
			
	<h3>Twitt</h3>
	<img class="pull-left" src="http://placekitten.com/48/48" style="width:48px; height:48px; margin:5px" title="avatar"/>
	<h2 style="margin-top:32px;">@Username</h2>
	<div style="clear:both">{{twit}}</div>

	<h3>Thank you text</h3>
	<div>{{nl2br thank_you}}</div>
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/campaign_edit.js"></script>