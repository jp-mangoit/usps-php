<?php require_once "class.php";
$address = new address;

$country_id = 231;
echo $address->getStates($country_id);
?>
