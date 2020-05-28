<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shareboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>
<body>
    <header>

	  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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
	          <a class="nav-link" href="<?php echo ROOT_URL ?>share">Shares</a>
	        </li>
	      </ul>
	      <form class="form-inline mt-2 mt-md-0">
	        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	      </form>
	    </div>
	  </nav>
	</header>

	<main class="text-center">
		
		<h2>Welcome to shareboard</h2>
		<h3>Go to shares</h3>
		<a href="/share" class="btn btn-info">shares</a>

	</main>

</body>
</html>