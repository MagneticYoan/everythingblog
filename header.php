<!DOCTYPE html>
<html>
	<head>
		<title>Everything Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- CSS Vendor -->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" />
		<!-- CSS Perso -->
		<link rel="stylesheet" type="text/css" href="css/base.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	</head>
	<body>
		<!--HEADER-->
		<header>
			<h1>AnimBlog</h1>
			<p>~ Votre référence animé ~</p>
			<nav>
				<a href="main_home.php">Home</a>
				 <?php //show the connexion or not
    		        if(empty($_SESSION)) {
				 echo '<a href="inscription.php">Inscription</a>
				<a href="connexion.php">Connection</a>';}
				else {
					echo '<a href="main.php">New Article</a>
				<a href="admin_request.php?parameter=articles">Admin</a>';} ?>
			</nav>
		</header>