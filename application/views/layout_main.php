<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo (!empty($_title_for_layout_))?htmlentities($_title_for_layout_)." - ":'';?>PayIt</title>

	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Pay It</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($_is_logged_in_): ?>
					<li><a href="/account/"><i class="fa fa-user fa-lg"></i> <?php echo $this->session->userdata['twitter_screen_name']?></a></li>
					<li><a href="/signout"><i class="fa fa-sign-out fa-lg"></i> Sign out</a></li>
					<?php else: ?>
					<li><a href="/signin"><i class="fa fa-twitter fa-lg"></i> Sign in with Twitter</a></li>
					<?php endif;?>
				</ul>

			</div><!--/.nav-collapse -->
		</div>
	</div>

	<?php echo $_content_for_layout_ ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>