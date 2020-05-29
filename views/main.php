<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shareboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<div class="container">
		    <a class="navbar-brand" href="#">Shareboard</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarCollapse">
		        <ul class="navbar-nav mr-auto">
			        <li class="nav-item">
			          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo ROOT_URL ?>shares">Shares</a>
			        </li>
		        </ul>
		        <ul class="navbar-nav navbar-right">
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">
			          	<?php if(isset($_SESSION['username'])): ?>
			          		<?php echo "Welcome ".$_SESSION['username']; ?>
			          		<?php else: ?>
			          			Login
			          	<?php endif; ?>
			          	<span class="sr-only"></span></a>
			        </li>
			        <?php if(! isset($_SESSION['username'])): ?>
			        <li class="nav-item">
			            <a class="nav-link" href="<?php echo ROOT_URL ?>users/register">Register</a>
			        </li>
			        <?php else: ?>
			        	<a class="nav-link" href="<?php echo ROOT_URL ?>users/logout">Logout</a>
			        <?php endif; ?>
		        </ul>
		    </div>
	    </div>
	</nav>
	
	<div class="container">
		<?php require($view); ?>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script type="text/javascript" src="<?php echo ROOT_URL; ?>/assets/js/script.js"></script>
</body>
</html>