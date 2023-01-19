<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Ajax PHP CRUD System">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USPS Address Validation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="font-family:roboto,sans-serif;">
	<div class="container-fluid py-4" style="background:linear-gradient(to right, rgb(111, 207, 242), rgb(4, 147, 135));">
		<h1 class='text-center'>USPS Address Validation</h1>
	</div>
	<br>
	<div class="container col-md-4">
		<div class="container bg-light py-3" id='regBox'>
			<h2 class='text-center'>Address Form</h2><br>
			<div id='msgReg'></div>
			<form action="" id='addressForm' method="post">
				<div class="form-group">
					<input type="text" id="address_line1" name="address_line1" placeholder="Address Line 1" class='form-control' required>
				</div>
				<div class="form-group">
					<input type="text" id="address_line2" name="address_line2" placeholder="Address Line 2" class='form-control' required>
				</div>
				<div class="form-group">
					<select id="state" name="state_id" class="form-control">
						<option></option>
					</select>
					<!-- <input type="text" id="state" name="state" placeholder="state" class='form-control' required> -->
				</div>
				<div class="form-group">
					<select id="city" name="city_id" class="form-control">
						<option></option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" id="zipcode" name="zipcode" placeholder="zipcode" class='form-control' required>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					Open modal
				</button>
				<!-- <input type="button" id="btnPost" value="Submit" class='btn btn-info'> -->
			</form>
			<br>
		</div>
	</div>

	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Modal Heading</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					Modal body..
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</html>