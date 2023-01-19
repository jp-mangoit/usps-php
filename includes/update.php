<?php require_once "class.php";
if(empty($_POST['id'])){
	echo "Not found";
	die();
} else {
	$address = new address;
	$address->update($_POST['address_line1'],$_POST['address_line2'],$_POST['city_id'],$_POST['state_id'],$_POST['zipcode'],$_POST['id']);
}
