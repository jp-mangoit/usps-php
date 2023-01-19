<?php require_once "class.php";
if(empty($_POST['id'])){
	echo "Not found";
	die();
} else {
	$address = new address;
	$address->delete($_POST['id']);	
}