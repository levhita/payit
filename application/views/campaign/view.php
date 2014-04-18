
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
      <div class="navbar-brand">Manage Campaign<!--<span style="font-size: .6em"> Subscribers don't see this</span>--></div>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-right text-right" style="text-align:right">
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
			</form> 	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		  <h1><?php echo htmlentities($campaign->name) ?></h1>
		<div><?php echo nl2br(htmlentities($campaign->description))?></div>
				
		<h3>Twitt</h3>
		<p>As payment for going to this event, we will send a twit with this text when you register.</p>
		<div class="well">
			<img class="pull-left" src="http://placekitten.com/48/48" style="width:48px; height:48px; margin:5px" title="avatar"/>
			<h2 style="margin-top:32px;">@Username</h2>
			<div style="clear:both"><?php echo htmlentities($campaign->twit) ?></div>
		</div>
		<div class="text-center">
			<a href="<?php echo (!$_is_logged_in_)?'/signin/subscribe/'.$campaign->campaign_id:'campaign/subscribe/'.$campaign->campaign_id;?>"
			class="btn btn-block btn-primary btn-lg" role="button">Register Now!</a>
		</div>
	</div>
</div>

<script src="/js/campaign_view.js"></script>