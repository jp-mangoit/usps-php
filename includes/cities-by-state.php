<?php require_once "class.php";
if (!empty($_POST)) {
    $state_id = $_POST["state_id"];

    $address = new address;
    $address->getCitiesByState($state_id);
}
