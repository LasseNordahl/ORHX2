<?php
	session_start();

	$db = mysqli_connect("localhost", "orhx_web_user1", "orhx_web_user1", "ORHX Sign Ups");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_POST['btn'])){
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);

		$email = mysqli_real_escape_string($db, $_POST['email']);

		$tshirt = mysqli_real_escape_string($db, $_POST['tshirt']);

		$gender = mysqli_real_escape_string($db, $_POST['gender']);

		$priorinfo = mysqli_real_escape_string($db, $_POST['priorinfo']);

		$diet = mysqli_real_escape_string($db, $_POST['diet']);

		$command = "INSERT INTO Data(fullname, email, tshirt, gender, priorinfo, diet) VALUES('$fullname','$email', '$tshirt', '$gender', '$priorinfo', '$diet')";

		if (!mysqli_query($db,$command)) {
  			die('Error: ' . mysqli_error($db));
		}
		echo "1 record added";

		mysqli_close($db);
		$_SESSION['message'] = "Thanks for the submission!";

	}
?>

<!doctype html>
<script src="https://use.fontawesome.com/11d46c1bf8.js"></script>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
		<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<link href="https://cdn.muicss.com/mui-0.9.9-rc2/css/mui.min.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.muicss.com/mui-0.9.9-rc2/js/mui.min.js"></script>


		<title>ORHX</title>
		<style>
		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			-webkit-animation-name: fadeIn; /* Fade in the background */
			-webkit-animation-duration: 0.4s;
			animation-name: fadeIn;
			animation-duration: 0.4s
		}

		/* Modal Content */
		.modal-content {
			position: fixed;
			bottom: 0;
			background-color: #fefefe;
			width: 100%;
			-webkit-animation-name: slideIn;
			-webkit-animation-duration: 0.4s;
			animation-name: slideIn;
			animation-duration: 0.4s
		}

		/* The Close Button */
		.close {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		.modal-header {
			padding: 2px 16px;
			background-color: #00abff;
			color: white;
		}

		.modal-body {padding: 2px 16px;}

		.modal-footer {
			padding: 2px 16px;
			background-color: #00abff;
			color: white;
		}

		/* Add Animation */
		@-webkit-keyframes slideIn {
			from {bottom: -300px; opacity: 0}
			to {bottom: 0; opacity: 1}
		}

		@keyframes slideIn {
			from {bottom: -300px; opacity: 0}
			to {bottom: 0; opacity: 1}
		}

		@-webkit-keyframes fadeIn {
			from {opacity: 0}
			to {opacity: 1}
		}

		@keyframes fadeIn {
			from {opacity: 0}
			to {opacity: 1}
		}
		</style>

	</head>
	<body class="submit">

		<div class="mui-row">
			<div class="mui-col-md-1">
				<a href="http://orhacks.com" style="text-decoration:none;">
					<button class="mui-btn mui-btn--fab mui-btn--primary button-footer-hover"	style="display:block; margin-top:15px !important; margin-left:1px !important;" onClick="goBack()">
						<i class="fa fa-arrow-left button-footer-hover fa-lg"  aria-hidden="true"></i>
					</button>
				</a>
			</div>
			<div class="mui-col-md-9"></div>
		</div>

		<form class="mui-form" method="post" action="signup.php">

			<div class="mui-col-md-3"></div>
			<div class="mui-col-md-6">
				<h1 style="text-align: center; font-family: Raleway; margin-bottom:3%;"> ORHX Sign Ups </h1>

					<div class="mui-textfield mui-textfield--float-label">
						<input class="dark-input" type="text" name = "fullname">
						<label class="dark-input">Name</label>
					</div>

					<div class="mui-textfield mui-textfield--float-label">
						<input class="dark-input" type="email" name="email">
						<label class="dark-input" >Email</label>
					</div>

					<div class="mui-select">
						<select class="dark-input" name="priorinfo">
							<option> </option>
							<option>Yes</option>
							<option>No</option>
						</select>
						<label class="dark-input input-size">Is this your first hackathon?</label>
					</div>

					<div class="mui-select">
						<select name="gender">
							<option> </option>
							<option>Male</option>
							<option>Female</option>
							<option>Prefer not to answer</option>
						</select>
						<label class="dark-input input-size">Gender</label>
					</div>

					<div class="mui-select">
						<select name="tshirt">
							<option> </option>
							<option>Small</option>
							<option>Medium</option>
							<option>Large</option>
							<option>X-Large</option>
						</select>
						<label class="dark-input input-size">T-Shirt Size</label>
					</div>

					<div class="mui-textfield mui-textfield--float-label">
						<textarea class="dark-input" name="diet"></textarea>
						<label class="dark-input input-size">Dietary Restrictions</label>
					</div>

					<button id="myBtn" class="mui-btn mui-btn--raised mui-btn--primary" style="align: center;" type="submit" name = "btn">Submit</button>

				</div>
		    <div class="mui-col-md-3"></div>
	  	</div


		</form>

		<!-- The Modal -->
		<div id="myModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>Thanks!</h2>
				</div>
					<div class="modal-body">
					<p>Thank you for submitting your application, we will get back to you as soon as possible</p>
				</div>
					<div class="modal-footer">
					<h3>-ORHX</h3>
				</div>
			</div>
		</div>

		<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal
			btn.onclick = function() {
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>

	</body>
</html>
