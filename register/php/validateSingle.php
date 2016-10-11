<?php
require_once("formValidator.php");
$res=$fv->validateData($_POST["nm"],$_POST["val"]);
header("Content-Type: application/json");
echo json_encode($res);
?>