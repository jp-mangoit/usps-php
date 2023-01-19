<?php require_once "db.php";
class address extends db
{
	public function insert($f, $l, $w, $c, $e)
	{
		$query = "INSERT INTO address(address_line1,address_line2,state_id,city_id,zipcode) VALUES(?,?,?,?,?) ";
		$stmt = $this->connect()->prepare($query);
		if ($stmt->execute([$f, $l, $w, $c, $e])) {
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

			$out .= "<option value=".$id.">$name</option>";
		}

		if ($stmt->rowCount() == 0) {
			$out = "";
		}
		return $out;
	}

	public function getCitiesByState($state_id)
	{	

		try{

			$query = "SELECT * FROM cities WHERE state_id = $state_id";
			$stmt = $this->connect()->prepare($query);
			$stmt->execute();
	
			$out = "";
			$out .= "<option value=''>Select cities</option>";
			
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$id = $row['id'];
				$name = $row['name'];
	
				$out .= "<option value=".$id.">$name</option>";
			}
	
			if ($stmt->rowCount() == 0) {
				$out = "";
			}

			return $out;

		}catch(\Exception $e){
			return $e->getMessage();
		}
	}

	// // update data
	public function update($f, $l, $w, $c, $e, $id)
	{
		// $query = "UPDATE users SET first = ?,last = ?,work = ?,city=?,email=? where id = ? ";
		// $stmt = $this->connect()->prepare($query);
		// if ($stmt->execute([$f, $l, $w, $c, $e, $id])) {
		// 	echo "Data updated! <a href='index.php'>view</a>";
		// }
	}
	//user search results
	public function search($text)
	{
		// $text = strtolower($text);
		// $query = "SELECT * FROM address WHERE first LIKE ? OR last LIKE ? OR work LIKE ? OR email LIKE ? or city LIKE ? ";
		// $stmt = $this->connect()->prepare($query);
		// $stmt->execute([$text, $text, $text, $text, $text]);
		// $out = "";
		// $out .= "<table style='font-size:14px;' class='table table-responsive table-hover'><tr class='bg-light'><th>ID</th><th>First Name</th><th>Last Name</th><th>Occupation</th><th>City</th><th>Email</th><th colspan='2'>Option</th></tr>";
		// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// 	$id = $row['id'];
		// 	$first = $row['first'];
		// 	$last = $row['last'];
		// 	$work = $row['work'];
		// 	$city = $row['city'];
		// 	$email = $row['email'];
		// 	$out .= "<tr><td>$id</td><td>$first</td><td>$last</td><td>$work</td><td>$city</td><td>$email</td>";
		// 	$out .= "<td><a href='edit.php?id=$id' class='edit btn btn-sm btn-success' title='edit'><i class='fa fa-fw fa-pencil'></i></a></td>";
		// 	$out .= "<td><span id='$id' class='del btn btn-sm btn-danger' title='delete'><i class='fa fa-fw fa-trash'></i></span></td>";
		// }
		// $out .= "</table>";
		// if ($stmt->rowCount() == 0) {
		// 	$out = "";
		// 	$out .= "<p class='alert alert-danger text-center col-sm-3 mx-auto'>Not Found.</p>";
		// }
		// return $out;
	}
	public function delete($id)
	{
		// $query = "DELETE FROM users WHERE id = ?";
		// $stmt = $this->connect()->prepare($query);
		// if ($stmt->execute([$id])) {
		// 	echo "1 record deleted.";
		// }
	}
	//end of class
}
