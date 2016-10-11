<?php
require_once("dbControl.php");
require_once("validateCookie.php");
$result=false;
$unCookie=$_COOKIE["userName"];
if ($vc->isValidCookie($unCookie))
{
	if(isset($_POST["rg"]) && !empty($_POST["rg"])) {
		$rg=htmlspecialchars($_POST["rg"]);
		$result=$db->updatePayment($rg);
	}
	if($result)
		$res["status"]="success";
	else
		$res["status"]="fail";
	echo json_encode($res);
}
else
{
	header("HTTP/1.0 403 Forbidden");
	echo("<title>403 - Forbidden</title><h1>403 - Forbidden</h1>");
}
?>
