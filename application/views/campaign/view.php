
<?php if($is_owner): ?>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php if($campaign->status =='new'): ?>
							<div class="navbar-brand">New Campaign</div>
						<?php else: ?>
							<div class="navbar-brand">Campaign Administration<!--<span style="font-size: .6em"> Subscribers don't see this</span>--></div>
						<?php endif;?>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form class="navbar-form navbar-right text-right" style="text-align:right">
							<?php if($campaign->status =='new'): ?>
								<a class="btn btn-default btn-primary" href="#"><i class="fa fa-share"></i> Publish</a>
							<?php else: ?>
								<div class="form-group">
									<a class="btn btn-default" href="#"><i class="fa fa-users"></i> Subscribers List</a>
									<a class="btn btn-default" href="#"><i class="fa fa-edit"></i> Edit Campaign</a>
								</div>
								<div class="form-group">
									<div class="btn-group btn-toggle"> 
										<button type="button" class="btn btn-primary active">Published</button>
										<button type="button" class="btn btn-default">Archived</button>
									</div>
									<!--<a class="btn btn-default btn-success" href="#"><i class="fa fa-angle-double-up"></i> Upgrade</a>-->
								</div>
							<?php endif; ?>
						</form> 	
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		<h1><a class="editable" href="#" id="name" data-type="text" data-title="Campaign Name"><?php echo htmlentities($campaign->name) ?></a> <a href="#" class="edit_button" data-for="name" id="edit_name"><i class="fa fa-pencil"></i></a></h1>
		<div><a class="editable" href="#" id="description" data-type="textarea" data-title="Campaign Description"><?php echo nl2br(htmlentities($campaign->description))?> <a href="#" class="edit_button" data-for="description" id="edit_description"><i class="fa fa-pencil"></i></a></div>

		<h3>Twitt</h3>
		<p>As payment for going to this event, we will send a twit with this text when you register.</p>
		<div class="well">
			<img class="pull-left" src="http://placekitten.com/48/48" style="width:48px; height:48px; margin:5px" title="avatar"/>
			<h2 style="margin-top:32px;">@Username</h2>
			<div style="clear:both"><a class="editable" href="#" id="twit" data-type="textarea" data-title="Twit to be sent by the user"><?php echo htmlentities($campaign->twit) ?></a>
				<a href="#" class="edit_button" data-for="twit" id="edit_twit"><i class="fa fa-pencil"></i></a></div>
		</div>
		<div class="text-center">
			<a id="subscribe_text" href="<?php echo (!$_is_logged_in_)?'/signin/subscribe/'.$campaign->campaign_id:'campaign/subscribe/'.$campaign->campaign_id;?>"
			class="btn btn-block btn-primary btn-lg" role="button"><?php echo htmlentities($campaign->subscribe_text)?></a> <a href="#" class="edit_button" data-for="subscribe_text" id="edit_subscribe_text"><i class="fa fa-pencil"></i></a>
		</div>
	</div>
	<div class="row">
		<div><a class="editable" href="#" id="thank_you" data-type="textarea" data-title="Thank You Text"><?php echo nl2br(htmlentities($campaign->thank_you))?></a>
			<a href="#" class="edit_button" data-for="thank_you" id="edit_thank_you"><i class="fa fa-pencil"></i></a></div>
	</div>
</div>

<script src="/js/campaign_view.js"></script>
<?php if($is_owner): ?>
	<link href="/x-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="/x-editable/js/bootstrap-editable.min.js"></script>
	<script src="/js/campaign_view_edit.js"></script>
<?php endif; ?>