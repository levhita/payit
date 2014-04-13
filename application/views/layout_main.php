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
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/handlebars.js"></script>
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
				<li><a href="/account/"><i class="fa fa-user fa-lg"></i>
					<?php echo htmlentities($this->session->userdata('user')->username); ?>
				</a></li>
				<li><a href="/signout"><i class="fa fa-sign-out fa-lg"></i>
					Sign out
				</a></li>
				<?php else: ?>
				<li><a href="/signin"><i class="fa fa-twitter fa-lg"></i>
					Sign in with Twitter
				</a></li>
				<?php endif;?>
			</ul>
		</div>
	</div>
</div><!--/.nav-collapse -->

<?php if($_flash_):?>
<div class="container">
	<div class="alert <?php echo $_flash_['class']?> alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong><?php echo $_flash_['label']?></strong> <?php echo htmlentities($_flash_['message'])?>
	</div>
</div>
<?php endif; ?>

<?php echo $_content_for_layout_ ?>

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
</body>
</html>