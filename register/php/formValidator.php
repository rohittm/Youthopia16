<?php
class formValidator{
	public static $regexes = Array(
		"not_empty" => "/^[a-z0-9A-Z]+$/",
		"anything" 	=> "/^[\d\D]{1,}$/",
		"ev" 		=> "/^(TEC-400-Robowar)$/",
		"fn" 		=> "/^[A-Za-z. ]{1,50}$/",
		"ln" 		=> "/^[A-Za-z. ]{1,50}$/",
		"dob" 		=> "/^[1,2][0-9]$/",
		"gn" 		=> "/^(Male|Female)$/",
		"eid"		=> "/^\w+([-+.']\w+)*@\w+([-.]\w+)*[.]\w+([-.]\w+)*$/",
		"mob"		=> "/^[\d]{10}$/",
		"clg" 		=> "/^[A-Za-z. ]{2,50}$/",
		"city" 		=> "/^[A-Za-z,()\- ]{2,50}$/",
		"xtr" 		=> "/^[\d\D]{0,250}$/"
    );
    public static $mandatoryArr = array (
    	"ev", "fn", "ln", "dob", "gn", "eid", "mob", "clg", "city"
    );
	function cleanData($data) {
  		$data=trim($data);
  		$data=stripslashes($data);
  		$data=strip_tags($data);
  		$data=htmlspecialchars($data);
  		$data=htmlentities($data);
  		return $data;
	}
	function notValidData($data) {
		if (is_null($data) || !isset($data) || $data === "undefined") return true;
		else return false;
	}
	function validateData($nm, $val) {
		//sleep(5);
		$result["sta"]="fail";
    	$result["msg"]="Unknown Error";

		if ($this->notValidData($nm) || $this->notValidData($val)) {
			$result["sta"]="fail";
    		$result["msg"]="Invalid Data";
			return $result;
		}

		$nm=$this->cleanData($nm);
		$val=$this->cleanData($val);

		if (in_array($nm, self::$mandatoryArr)) $mandatory = true;
		else $mandatory = false;

		if ($mandatory && empty($val)) {
			$result["sta"]="fail";
    		$result["msg"]="Required Field";
    		return $result;
		}

		if(preg_match(self::$regexes[$nm], $val) || (!$mandatory && empty($val))) {
			$result["sta"]="done";
    		$result["msg"]="Accepted";
		} else {
			$result["sta"]="fail";
    		$result["msg"]="Incorrect Format";
    		return $result;
		}

   		return $result;

	}
}
if (is_null($fv))
	$fv=new formValidator();
?>
