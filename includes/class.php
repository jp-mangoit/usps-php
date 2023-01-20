<?php require_once "db.php";

class address extends db
{
	public function insert($address_line1, $address_line2, $state_id, $city, $zipcode)
	{
		$query = "INSERT INTO address(address_line1,address_line2,state_id,city,zipcode) VALUES(?,?,?,?,?) ";
		$stmt = $this->connect()->prepare($query);
		if ($stmt->execute([$address_line1, $address_line2, $state_id, $city, $zipcode])) {
			echo "Address saved Successfully!";
		}
	}
	public function get_row($id)
	{
		$query = "SELECT * FROM address WHERE id = ? ";
		$stmt = $this->connect()->prepare($query);
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
	}
	public function load()
	{
		$query = "SELECT * FROM address";
		$stmt = $this->connect()->prepare($query);
		$stmt->execute();
		$out = "";
		$out .= "<table style='font-size:14px;' class='table table-responsive table-hover'><tr class='bg-light'><th>ID</th><th>First Name</th><th>Last Name</th><th>Occupation</th><th>City</th><th>Email</th><th colspan='2'>Option</th></tr>";
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$first = $row['address_line1'];
			$last = $row['address_line2'];
			$work = $row['city'];
			$city = $row['state'];
			$email = $row['zipcode'];
			$out .= "<tr><td>$id</td><td>$first</td><td>$last</td><td>$work</td><td>$city</td><td>$email</td>";
			$out .= "<td><a href='edit.php?id=$id' class='edit btn btn-sm btn-success' title='edit'><i class='fa fa-fw fa-pencil'></i></a></td>";
			$out .= "<td><span id='$id' class='del btn btn-sm btn-danger' title='delete'><i class='fa fa-fw fa-trash'></i></span></td>";
		}
		$out .= "</table>";
		if ($stmt->rowCount() == 0) {
			$out = "";
			$out .= "<p class='alert alert-info text-center col-sm-5 mx-auto'>No records yet. its time to add new!</p>";
		}
		return $out;
	}


	public function getStates($country_id = 1)
	{
		$query = "SELECT * FROM states WHERE country_id = $country_id";
		$stmt = $this->connect()->prepare($query);
		$stmt->execute();

		$out = "";
		$out .= "<option value=''>Select State</option>";

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];

			$out .= "<option data-state=" . $name . " value=" . $id . ">$name</option>";
		}

		if ($stmt->rowCount() == 0) {
			$out = "";
		}
		return $out;
	}

	public function getCitiesByState($state_id)
	{

		try {

			$query = "SELECT * FROM cities WHERE state_id = $state_id";
			$stmt = $this->connect()->prepare($query);
			$stmt->execute();

			$out = "";
			$out .= "<option value=''>Select cities</option>";

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$id = $row['id'];
				$name = $row['name'];

				$out .= "<option data-city=" . $name . " value=" . $id . ">$name</option>";
			}

			if ($stmt->rowCount() == 0) {
				$out = "";
			}

			return $out;
		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}

	public function validateAddress($address_line1, $address_line2, $city, $state, $zipcode)
	{
		$request_doc_template = <<<EOT
		<?xml version="1.0"?>
		<AddressValidateRequest USERID="621BURTW1013">
			<Revision>1</Revision>
			<Address ID="0">
				<Address1>$address_line1</Address1>
				<Address2>$address_line2</Address2>
				<City>$city</City>
				<State>$state</State>
				<Zip5>$zipcode</Zip5>
				<Zip4/>
			</Address>
		</AddressValidateRequest>
		EOT;

		// prepare xml doc for query string
		$doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
		$doc_string = urlencode($doc_string);

		$url = "https://secure.shippingapis.com/ShippingAPI.dll?API=Verify&XML=" . $doc_string;

		// perform the get
		$response = file_get_contents($url);

		$xml = simplexml_load_string($response) or die("Error: Cannot create object");
	
		return [
			'address_line1' => $xml->Address->Address1 ?? "",
			'address_line2' => $xml->Address->Address2 ?? "",
			'state' => $xml->Address->City ?? "",
			'city' => $xml->Address->State ?? "",
			'zipcode' => $xml->Address->Zip5 ?? "",
		];

	}

}
