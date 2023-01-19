<?php require_once "class.php";
if(!empty($_POST)){
	$address = new address;
	echo $address->insert($_POST['address_line1'],$_POST['address_line2'],$_POST['city'],$_POST['state'],$_POST['zipcode']);
}
