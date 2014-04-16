<div class="container">
	<div class="row">
		  <h1><?php echo htmlentities($campaign->name) ?></h1>
	<div><?php echo nl2br(htmlentities($campaign->description))?></div>
			
	<h3>Twitt</h3>
	<img class="pull-left" src="http://placekitten.com/48/48" style="width:48px; height:48px; margin:5px" title="avatar"/>
	<h2 style="margin-top:32px;">@Username</h2>
	<div style="clear:both"><?php echo htmlentities($campaign->twit) ?></div>

	<h3>Thank you text</h3>
	<div><?php echo nl2br(htmlentities($campaign->thank_you))?></div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/campaign_view.js"></script>