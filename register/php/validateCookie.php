<?php
class validateCookie{
	function isValidCookie($un)
	{
		$un=htmlspecialchars($un);
		$code=sha1(strrev("npks" . $un . "Y0u1117@"));
		$auth=$_COOKIE["authCode"];
		if ($code == $auth)
		{
			return true;
		}
		return false;
	}
}
$vc=new validateCookie();
?>
