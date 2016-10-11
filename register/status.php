<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="format-detection" content="telephone=no"/>
	<meta name="msapplication-tap-highlight" content="no"/>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="author" content="Nitin Pathak, www.nitinpathak.com ;" />
	<link rel="shortcut icon" href="favicon.ico?" type="image/x-icon">
	<link rel="icon" href="favicon.ico?" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
	<link rel="stylesheet" type="text/css" href="css/custom.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/status.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="js/ga.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<title>Youthopia '16 | Payment Status</title>
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
<div class="container" id="main">
	<div class="animated slideInDown" id="statusBox">
		<div class="card">
        	<div class="card-content">
              	<span class="card-title"><b>Payment Status for Youthopia '16</b></span>
              	<br/><br/>
              	<p>Enter your <b>Unique Registration Id</b> to check payment status! For Payment, goto <i>Youthopia '16 Payment Help Desk near Cafeteria.</i>
              	<br/><br/>
              	<b>Note:</b> In case of any query, please mail at <b><a href="mailto:info@youthopia16.in">info@youthopia16.in</a></b><i> Thank You!</i></p>
              	<br/><div id="countdown"></div>
            </div>
        </div>

		<div class="row z-depth-1">
	    	<form method="POST" id="status">
	    		<div class="col s12">
	    			<h5 class="center-align">Check Payment Status</h5>
					<div class="row">
						<div class="input-field col s3"></div>
						<div class="input-field col s6">
							<input id="regID" name="rg" class="validate" type="text" placeholder="TEC11115" length="10">
							<label for="regID" data-success="Payment Complete!" data-error="Payment Not Done Yet!">Unique Registration Id<span class="red-text"> *</span></label>
						</div>
						<div class="input-field col s3"></div>
					</div>
					
		    		<a onclick='$("#status")[0].reset();grecaptcha.reset();' style="margin:20px 0px;" class="btn waves-effect waves-light blue left">Clear</a>
		    		<button class="btn waves-effect waves-light green right" type="submit" name="action" style="margin:20px 0px;">Check</button>
	    		</div>
    		</form>
  		</div>
	</div>
</div>
</body>
</html>
