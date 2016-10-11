<?php
require_once("dbControl.php");
require_once("validateCookie.php");
$result["status"]="fail";
$un=$_COOKIE["userName"];
if ($vc->isValidCookie($un))
{
	$result=$db->getAllRegistrations();
	$result["status"]="success";
	echo json_encode($result);
}
else
{
	header("HTTP/1.0 403 Forbidden");
	echo("<title>403 - Forbidden</title><h1>403 - Forbidden</h1>");
}
?>
