<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="msapplication-tap-highlight" content="no" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="author" content="Nitin Pathak, http://nitinpathak.com"/>
    <link rel="shortcut icon" href="favicon.ico?" type="image/x-icon">
	<link rel="icon" href="favicon.ico?" type="image/x-icon">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/ga.js"></script>
	<title>Youthopia '16 | Admin</title>
</head>
<body style="min-width:375px; overflow: hidden;">
	<div id="overlay">
		<img id="loading" src="img/loading.gif">
	</div>
	<nav id="topmenu" style="z-index: 998;" class="purple">
		<div class="nav-wrapper">
		  	<img src="img/ditlogo.png" class="hide-on-small-only" style="padding:12px 10px 0px 10px; width:75px;">
		  	<a href="#" class="brand-logo tooltipped" style="z-index:100" data-delay="1000" data-tooltip="v0.1 Beta ;)" data-position="bottom">Youthopia '16</a>
		  	<a href="#" data-activates="mobile-demo" class="button-collapse">
		  		<img src="img/menu.png" width="55px">
		  	</a>
		  	<ul class="right hide-on-med-and-down">
		    	<li><a href="index.php">Register</a></li>
		    	<li><a href="status.php">Payment Status</a></li>
		    	<li><a href="admin.php">Admin Login</a></li>
		  	</ul>
		  	<ul class="side-nav" id="mobile-demo">
		    	<li><a href="index.php">Register</a></li>
		    	<li><a href="status.php">Payment Status</a></li>
		    	<li><a href="admin.php">Admin Login</a></li>
			</ul>
		</div>
	</nav>
	<div class="container" id="main" style="width:95%;">
		<div class="center-align animated zoomIn z-depth-3" style="margin-top:80px;" id="loginBox">
			<div style="margin-bottom:20px; padding:40px;">
				<form method="POST" id="login">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">&#xE851;</i>
							<input id="user" name="un" type="text" placeholder="Username" required>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">&#xE0DA;</i>
							<input id="pass" name="ps" type="password" placeholder="Password" required>
						</div>
					</div>
					<button style="margin-top:20px;" class="btn waves-effect waves-light green" type="submit" name="action" id="formSubmit">Login<i class="material-icons right">&#xE163;</i></button>
				</form>
			</div>
		</div>
		<div class="z-depth-3" style="margin-top:80px; margin-bottom:20px; display:none;" id="registersBox">
			<nav style="background-color: #0095da;">
				<div class="nav-wrapper">
					<ul class="right">
						<li><a href="#" onclick='getApplns();'><i class="material-icons">&#xE5D5;</i></a></li>
						<li><a href="#" onclick='logOut();showToast("LogOut - Successful");'><i class="material-icons">&#xE8AC;</i></a></li>
						<li id="searchBar" style="width: 200px;"><form>
					        <div class="input-field">
					          <input id="search" type="search" required>
					          <label for="search"><i class="material-icons">&#xE8B6;</i></label>
					        </div>
					    </form></li>
					</ul>
				</div>
			</nav>
			<div style="margin:20px 10px;" id="cont">
				<div class="row z-depth-1">
				    <div id="stage" class="col s12"></div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/admin.js"></script>
</body>
</html>
