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
	<script type="text/javascript" src="js/index.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="js/ga.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<title>Youthopia '16 | Register</title>
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
	<div class="animated slideInDown" id="registerBox">
		<div class="card">
        	<div class="card-content">
              	<span class="card-title"><b>Event Registration for Youthopia '16</b></span>
              	<br/><br/>
              	<p>Kindly fill the form very carefully since form edits are <b>NOT</b> allowed and these details will be used in <i>"Youthopia '16 Certificates"</i>
              	<br/><br/>
              	<b>Note:</b> In case of any query, please mail at <b><a href="mailto:info@youthopia16.in">info@youthopia16.in</a></b><i> Thank You!</i></p>
              	<br/><div id="countdown"></div>
            </div>
        </div>

		<div class="row z-depth-1">
	    	<form method="POST" id="register">
	    		<div class="col s12">
	    			<h5 class="center-align">Event Registration Form</h5>
					<div class="row">
						<div class="input-field col s12">
							<select id="event" name="ev">
								<option value="TEC-500-Combatderobo" selected>TECHNICAL - Combat-de-Robo - &#8377; 500/-per team</option>
								<option value="TEC-300-sherlocked">TECHNICAL - Sherlocked - &#8377; 300/- per team</option>								
								<option value="TEC-0-codingrampage">TECHNICAL - Coding Rampage - &#8377; 0/- per person</option>
								<option value="TEC-50-codebusters">TECHNICAL - Code Busters - &#8377; 50/- per person</option>
								<option value="TEC-400-wildsoccer">TECHNICAL - Wild Soccer - &#8377; 400/- per team</option>
								<option value="TEC-200-Line">TECHNICAL - Line Follower - &#8377; 200/- per team</option>
								<option value="TEC-150-MegaQuiz">TECHNICAL - Mega Quiz - &#8377; 150/- per team</option>
								<option value="TEC-100-BridgeTheGap">TECHNICAL - Bridge The Gap - &#8377; 100/- per team</option>
								<option value="TEC-400-fullthrottle">TECHNICAL - Full Throttle - &#8377; 400/- per team</option>
								<option value="TEC-50-Sketchomac">TECHNICAL - Sketch-O-Mac - &#8377; 50/- per person</option>
								<option value="TEC-100-RetailWar">TECHNICAL - Retail Wars - &#8377; 100/- per team</option>
								<option value="TEC-50-Businessplan">TECHNICAL - Business Plan - &#8377; 50/- per person</option>
								<option value="TEC-50-BeatTheClock">TECHNICAL - Beat The Clock - &#8377; 50/- per person</option>
								<option value="TEC-50-TrainTheBrain">TECHNICAL - Train The Brain - &#8377; 50/- per person</option>
								<option value="TEC-200-SkyFlyers">TECHNICAL - Sky Flyers - &#8377; 200/- per team</option>
								<option vale="CUL-1800-BattleOfBands">CULTURAL - Battle Of Bands - &#8377; 1800/- per team</option>\								<option value="GAM-0-Fashionista">CULTURAL - Fashionista - </option>
								<option value="GAM-250-CSMP">Gaming - Counter Strike - &#8377; 250/- per team</option>
								<option value="GAM-50-CSSP">Gaming - Counter Strike - &#8377; 50/- per person</option>
								<option value="GAM-50-FIFA">Gaming - FIFA - &#8377; 50/- per person</option>
								<option value="GAM-50-NFS">Gaming - Need For Speed - &#8377; 50/- per person</option>
								<option value="GAM-50-Tekken">Gaming - Tekken - &#8377; 50/- per person</option>
								<option value="GAM-50-COD">Gaming - Call Of Duty - &#8377; 250/- per team</option>
							</select>
							<label for="event">Event Category - Name - Fees<span class="red-text"> *</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="fname" name="fn" type="text" class="validate" placeholder="Nitin" length="50">
							<label for="fname">First Name<span class="red-text"> *</span></label>
						</div>
						<div class="input-field col s6">
							<input id="lname" name="ln" type="text" class="validate" placeholder="Pathak" length="50">
							<label for="lname">Last Name<span class="red-text"> *</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s3">
							<input id="age" name="dob" type="text" class="validate" placeholder="20" length="2">
							<label for="age">Age (in years)<span class="red-text"> *</span></label>
						</div>
						<div class="input-field col s3">
							<select id="gender" name="gn" class="icons">
								<option data-icon="img/male.png" class="left circle" value="Male" selected>Male</option>
								<option data-icon="img/female.png" class="left circle" value="Female">Female</option>
							</select>
							<label for="gender">Gender<span class="red-text"> *</span></label>
						</div>
						<div class="input-field col s6">
							<input id="contact" name="mob" type="tel" class="validate" length="10" placeholder="9997493355">
							<label for="contact">Mobile<span class="red-text"> *</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" name="eid" type="email" class="validate" length="30" placeholder="np1810@gmail.com">
							<label for="email">Email Id<span class="red-text"> *</span></label> 
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="college" name="clg" class="validate" type="text" placeholder="DIT University" length="50">
							<label for="college">College's Name<span class="red-text"> *</span></label>
						</div>
						<div class="input-field col s6">
							<input id="clgcity" name="city" class="validate" type="text" placeholder="Dehradun" length="50">
							<label for="clgcity">College's City<span class="red-text"> *</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="xtra" name="xtr" class="validate" type="text" placeholder="Extra Info can go here..." length="250">
							<label for="xtra">Notes</label> 
						</div>
					</div>
					<div class="g-recaptcha" data-sitekey="6LdRyhgTAAAAAH_ciGOM6hgsMVR-P3QtNiqT-5K8"></div>
		    		<a onclick='$("#register")[0].reset();grecaptcha.reset();' style="margin:20px 0px;" class="btn waves-effect waves-light blue left">Clear</a>
		    		<button class="btn waves-effect waves-light green right" type="submit" name="action" style="margin:20px 0px;">Register</button>
	    		</div>
    		</form>
  		</div>
	</div>
</div>
</body>
</html>
