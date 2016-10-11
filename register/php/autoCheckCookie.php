<?php
require_once("validateCookie.php");
$result["status"]="fail";
$un=$_COOKIE["userName"];
if($vc->isValidCookie($un))
{
	$result["status"]="success";
} 
else
{
	$result["status"]="fail";
}
echo json_encode($result);
?>
