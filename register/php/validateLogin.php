<?php
$res["status"]="fail";
if(isset($_POST["un"]) && isset($_POST["ps"]) && !empty($_POST["un"]) && !empty($_POST["ps"]))
{
	if ($_POST["un"] == "tidyouth" && $_POST["ps"] == "Y0u1117@")
		$id=1;
	else
		$id=-1;
	$un=htmlspecialchars($_POST["un"]);
	if ($id>0)
	{
		$code=sha1(strrev("npks" . $un . "Y0u1117@"));
		setcookie("authCode", $code, time() + (5 * 365 * 24 * 60 * 60), "/");
		setcookie("userName", $un, time() + (5 * 365 * 24 * 60 * 60), "/");
		$res["status"]="success";
	}
}
else
{
	$res["status"]="fail";
}
echo json_encode($res);
?>
