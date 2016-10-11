<?php
require_once("formValidator.php");
require_once("dbControl.php");

$res["sta"]="fail";
$res["msg"]="Unknown Error!";

if(isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
    $secret="6LdRyhgTAAAAAHa5rFiB-19FSGR4Xj2v4sM0gAjt";
    $verifyResponse=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST["g-recaptcha-response"]);
    $responseData=json_decode($verifyResponse);
    if($responseData->success) {
    	$res["sta"]="done";
    	foreach ($_POST as $k => $v) {
			if ($k != "g-recaptcha-response")
				$res=$fv->validateData($k, $v);
		}
    } else {
    	$res["sta"]="fail";
		$res["msg"]="Please prove you're NOT a BOT!";
		header("Content-Type: application/json");
		echo json_encode($res);
		exit;
    }
} else {
	$res["sta"]="fail";
	$res["msg"]="Please prove you're NOT a BOT!";
	header("Content-Type: application/json");
	echo json_encode($res);
	exit;
}

if($res["sta"]=="done") {
	$result=$db->newRegister($_POST["ev"], $_POST["fn"], $_POST["ln"], $_POST["dob"], $_POST["gn"], $_POST["eid"], $_POST["mob"], $_POST["clg"], $_POST["city"], $_POST["xtr"]);
	if ($result!="FAILED") {
		$res["sta"]="done";
		$res["msg"]=$_POST["ev"] . "," . $result;
		$to=$_POST["eid"];
		$subject=$result . " - Youthopia '16 Registration";
		$txt="Hello ". $_POST["fn"] . ",\n\nCongrats! You have successfully registered for Event Id: ". $_POST["ev"] . " and your Unique Registration Id is " . $result . "\n\nHave a nice day ahead! :)";
		$txt=wordwrap($txt, 70);
		$headers="From: info@youthopia16.in" . "\r\n" ."CC: info@youthopia16.in";
		mail($to,$subject,$txt,$headers);
	} else {
		$res["sta"]="fail";
		$res["msg"]="Database Entry Failed!";
	}
} else {
	$res["sta"]="fail";
	$res["msg"]="Invalid Form Data!";
}
header("Content-Type: application/json");
echo json_encode($res);
?>