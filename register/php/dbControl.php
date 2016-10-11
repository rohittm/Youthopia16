<?php 
class dbControl{
	private $host="mysql.hostinger.in";
	/*private $host="localhost";*/
	private $user="u277933620_y2016";
	private $password="DIT2k16#81";
	private $database="u277933620_youth";
	private $conn;
	function __construct() {
		error_reporting(0);
		$this->conn=new mysqli($this->host,$this->user,$this->password,$this->database);
		if ($this->conn->connect_error)
    		die($conn->connect_error);
	}
	function __destruct() {
		$this->conn->close();
	}
	function newRegister($ev, $fn, $ln, $dob, $gn, $eid, $mob, $clg, $city, $xtr)
	{
		date_default_timezone_set('Asia/Kolkata');
		$ev=strtoupper(mysqli_real_escape_string($this->conn,htmlspecialchars($ev)));
		$cQuery="SELECT * from counters";
		$rQuery=$this->conn->query($cQuery);
		if(!$rQuery)
			return "FAILED";
		$rQ=$rQuery->fetch_assoc();
		$count1=intval($rQ["counter1"]);
		$reg=explode("-", $ev)[0] . $count1;
		$pay=explode("-", $ev)[1];
		$fn=ucwords(mysqli_real_escape_string($this->conn,htmlspecialchars($fn)));
		$ln=ucwords(mysqli_real_escape_string($this->conn,htmlspecialchars($ln)));
		$dob=mysqli_real_escape_string($this->conn,htmlspecialchars($dob));
		$gn=strtoupper(mysqli_real_escape_string($this->conn,htmlspecialchars($gn)));
		$eid=mysqli_real_escape_string($this->conn,htmlspecialchars($eid));
		$mob=mysqli_real_escape_string($this->conn,htmlspecialchars($mob));
		$clg=ucwords(mysqli_real_escape_string($this->conn,htmlspecialchars($clg)));
		$city=ucwords(mysqli_real_escape_string($this->conn,htmlspecialchars($city)));
		$xtr=mysqli_real_escape_string($this->conn,htmlspecialchars($xtr));
		$query="INSERT INTO registers(registration_id, event_id, first_name, last_name, age, gender, email, mobile, college_name, college_city, notes, 			payment) VALUES('$reg', '$ev', '$fn', '$ln', '$dob', '$gn', '$eid', '$mob', '$clg', '$city', '$xtr', $pay)";
		$result=$this->conn->query($query);
		$cQuery="UPDATE counters SET counter1 =" . ($count1+1);
		$rQuery=$this->conn->query($cQuery);
		if($result && $rQuery)
			return $reg;
		else
			return "FAILED";
	}
	function hasPaymentDone($regId)
	{
		$query="SELECT * FROM registers WHERE registration_id='$regId'";
		$result=$this->conn->query($query);
		$res=$result->fetch_assoc();
		if($result->num_rows>0)
			return intval($res["payment"]);
		else
			return 99999;
	}
	function updatePayment($regId)
	{
		$query="UPDATE registers SET payment=0 WHERE registration_id='$regId'";
		$result=$this->conn->query($query);
		if($result)
			return true;
		else
			return false;
	}
	function getAllRegistrations()
	{
		$query="SELECT * FROM registers ORDER BY serial_no DESC";
		$result=$this->conn->query($query);
		if(!$result)
			return;
		while($row=$result->fetch_array(MYSQLI_ASSOC))
		{
			unset($row["serial_no"]);
			$rows[]=$row;
		}
		return array('regtrns' => $rows);
	}
}
$db=new dbControl();
?>
