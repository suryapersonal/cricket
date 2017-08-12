<?php 
	define('BASE_URL', 'http://localhost/cricket/');
	session_start();
	if(isset($_COOKIE['login_user']) && $_COOKIE['login_user'] == 'admin') {
		$privateLinks = 'enable-links';
	} else {
		$privateLinks = 'disable-links';
	}
?> 
<!DOCTYPE html>
<html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link re='stylesheet' type='text/css' href='<?php echo BASE_URL ?>assets/css/bootstrap-responsive.min.css'>
        <link rel="stylesheet" href='<?php echo BASE_URL ?>assets/css/bootstrap.min.css'>
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/jquery.timepicker.css">
        <link rel='stylesheet' type='text/css' href='<?php echo BASE_URL ?>assets/css/style.css'>
        <script type='text/javascript' src='<?php echo BASE_URL ?>assets/js/jquery-2.2.4.min.js'></script>
    	<script src="<?php echo BASE_URL ?>assets/js/jquery-ui.min.js"></script>
    	<script src="<?php echo BASE_URL ?>assets/js/jquery.timepicker.js"></script>
        <script type='text/javascript' src='<?php echo BASE_URL ?>assets/js/script.js'></script>
        <script src='<?php echo BASE_URL ?>assets/js/bootstrap.min.js' integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
		<header>
        	<div class='header-wrapper'>
            	<img src='<?php echo BASE_URL ?>assets/images/logo.jpg' alt='logo' class='logo'>
                <h1 class='main-head'>mocc</h1>
                <h2 class='logo-subhead'>merchant navy officers cricket club</h1>
            </div>
        </header>
        <nav class="navbar menu-bar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">      
                    <label for="menu-toggle" class="navbar-toggle collapsed">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </label>
                </div>
                <input type="checkbox" id="menu-toggle" class="hidden"/>
                <ul class="nav navbar-nav navbar-right">
                	<li>
                    	<a href="<?php echo BASE_URL ?>" class="nav-item home-link">Home</a>
                    </li>
                    <li>
                    	<a href="<?php echo BASE_URL ?>views/add-player.php" class="nav-item add-player-link <?php echo $privateLinks?>">Add Player</a>
                    </li>
                    <li>
                    	<a href="<?php echo BASE_URL ?>views/add-player-type.php" class="nav-item add-player-type-link <?php echo $privateLinks?>">Add Player Type</a>
                    </li>                  
                    <li class="add-match-li">
                    	<a href="<?php echo BASE_URL ?>views/matches.php" class="nav-item match-link <?php echo $privateLinks?>">Matches</a>
                    	<ul class="sub-menu">
                        	<li>
                            	<a href="<?php echo BASE_URL ?>views/match-details-view.php?match_type=super_saturday">Super Saturday</a>
                            </li>
                            <li>
                            	<a href="<?php echo BASE_URL ?>views/match-details-view.php?match_type=friendly">Friendly</a>
                            </li>
                            <li>
                            	<a href="<?php echo BASE_URL ?>views/match-details-view.php?match_type=tournament">Tournament</a>
                            </li>
                            <li>
                            	<a href="<?php echo BASE_URL ?>views/match-details-view.php?match_type=big_bash">Big Bash</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                    	<a href="<?php //echo BASE_URL ?>views/activities.php" class="nav-item activity-link">Activities</a>
                    </li> -->
                    <li>
                    	<a href="<?php echo BASE_URL ?>views/search-player.php" class="nav-item search-player-link">Search Player</a>
                    </li>
                    <li>
                    	<a href="<?php echo BASE_URL ?>views/contact.php" class="nav-item contact-link">Contact</a>
                    </li>
                <ul>
            </div>
        </nav>
        