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
					<div class="bs-example">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#home" class="nav-link active" data-toggle="tab">Home</a>
							</li>
							<li class="nav-item">
								<a href="#profile" class="nav-link" data-toggle="tab">Profile</a>
							</li>
							<li class="nav-item">
								<a href="#messages" class="nav-link" data-toggle="tab">Messages</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="home">
								<h4 class="mt-2">Home tab content</h4>
								<p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
							</div>
							<div class="tab-pane fade" id="profile">
								<h4 class="mt-2">Profile tab content</h4>
								<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
							</div>
							<div class="tab-pane fade" id="messages">
								<h4 class="mt-2">Messages tab content</h4>
								<p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
							</div>
						</div>
					</div>
					<!-- <div class="btn-group">
						<button type="button" class="btn btn-primary">Apple</button>
						<button type="button" class="btn btn-primary">Samsung</button>
					</div> -->
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