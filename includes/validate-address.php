<?php require_once "class.php";
$address = new address;
$response = $address->validateAddress($_POST['address_line1'], $_POST['address_line2'], $_POST['state'], $_POST['city'], $_POST['zipcode']);

if(!empty($response)){
    echo json_encode($response);
}else{
    return json_encode(['status' => 'failed']);
}
