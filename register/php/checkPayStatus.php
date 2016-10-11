<?php
require_once("dbControl.php");

$res["sta"]="fail";
$res["msg"]="Unknown Error!";

$db->hasPaymentDone($_POST["rg"]);

if(isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"]) && isset($_POST["rg"]) && !empty($_POST["rg"])) {
    $secret="6LdRyhgTAAAAAHa5rFiB-19FSGR4Xj2v4sM0gAjt";
    $verifyResponse=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST["g-recaptcha-response"]);
    $responseData=json_decode($verifyResponse);
    if($responseData->success) {
    	$result=$db->hasPaymentDone($_POST["rg"]);
    	if ($result==99999) {
            $res["sta"]="fail";
            $res["msg"]="Registration Id Not Found!";
    	} else if ($result==0) {
    		$res["sta"]="done";
    		$res["msg"]="Payment Complete!";
    	} else {
            $res["sta"]="fail";
            $res["msg"]="Rs. ". $result . " Payment To Be Done!";
        }
    } else {
    	$res["sta"]="fail";
		$res["msg"]="Check Captcha Code OR Registration Id!";
		header("Content-Type: application/json");
		echo json_encode($res);
		exit;
    }
} else {
	$res["sta"]="fail";
	$res["msg"]="Check Captcha Code OR Registration Id!";
	header("Content-Type: application/json");
	echo json_encode($res);
	exit;
}

header("Content-Type: application/json");
echo json_encode($res);
?>