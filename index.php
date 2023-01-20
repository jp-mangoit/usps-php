<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Ajax PHP CRUD System">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USPS Address Validation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="font-family:roboto,sans-serif;">
	<div class="container col-md-4">
		<div class="container bg-white py-3" id='regBox'>
			<h2 class="form-title">Address Form</h2>
			<p class="sub-title">Validate/Standardizes addresses using USPS</p>
			<div id='msgReg'></div>
			<form action="" id='addressForm' method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Address Line 1</label>
					<input type="text" id="address_line1" name="address_line1" placeholder="Address Line 1" class='form-control' required>
					<span class="text-danger" id=error_add1></span>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Address Line 2</label>
					<input type="text" id="address_line2" name="address_line2" placeholder="Address Line 2" class='form-control' required>
					<span class="text-danger" id=error_add2></span>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">City</label>
					<input type="text" id="city" name="city" placeholder="City" class='form-control' required>	
					<span class="text-danger" id=error_city></span>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">State</label>
					<select id="state-dropdown" name="state_id" class="form-control">
					</select>
					<span class="text-danger" id=error_state></span>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Zipcode</label>
					<input type="text" id="zipcode" name="zipcode" placeholder="zipcode" class='form-control' required>
					<span class="text-danger" id=error_zip></span>
				</div>

				<div class="text-center">
					<div class="alert alert-danger" id="err" role="alert">
					</div>
					<button type="button" id="validate" class="btn btn-primary">
						Validate
					</button>
				</div>
			</form>
			<br>
		</div>
	</div>

	<div class="modal" id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Save Address</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<p class="modal-subtitle">Which address format. Do you want to save?</p>

					<div class="bs-example">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#original" class="nav-link active" data-toggle="tab">ORIGINAL</a>
							</li>
							<li class="nav-item">
								<a href="#standardize" class="nav-link" data-toggle="tab">STANDARDIZE(USPS)</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="original">
								<div class="inner-content pt-3">
									<p>Address Line 1 : <span id="address_line1_tab"></span> </p>
									<p>Address Line 2 : <span id="address_line2_tab"></span> </p>
									<p>state : <span id="state_dropdown_tab"></span> </p>
									<p>city : <span id="city_tab"></span> </p>
									<p>Zip Code : <span id="zipcode_tab"></span> </p>
								</div>
							</div>
							<div class="tab-pane fade" id="standardize">
								<div class="inner-content pt-3">
									<p>Address Line 1 : <span id="address_line1_tab2"></span> </p>
									<p>Address Line 2 : <span id="address_line2_tab2"></span> </p>
									<p>state : <span id="state_dropdown_tab2"></span> </p>
									<p>city : <span id="city_tab2"></span> </p>
									<p>Zip Code : <span id="zipcode_tab2"></span> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="alert alert-success" id="msg" role="alert">
				</div>
				<div class="alert alert-danger" id="err1" role="alert">
				</div>
				<div class="modal-footer">
					<input type="button" id="submit-btn" value="Submit" class='btn btn-primary'>
				</div>

			</div>
		</div>
	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>

</html>