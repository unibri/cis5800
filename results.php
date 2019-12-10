<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link type="text/css" href="css/home.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/1c7203361e.js" crossorigin="anonymous"></script>
    <title>Immigreation</title>
  </head>
  <body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #00000;">
  <a class="navbar-brand" href="index.php">Immigreation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="whoweare.php"> Who We Are</a>
      </li>
		<?php require_once "navbar.php"; ?>
    </ul>
  </div>
</nav>
<!-- MAIN CONTENT USING BOOTSTRAP GRID TO ENSURE MOBILE RESPONSIVE-->
<div class = "padd"></div>
<div class="container">
	<div class="row">
		<div class = "col">
			<h2> Education </h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class = "col">		 
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, minAge, reqStatus, elink FROM
						(SELECT state, minAge, reqStatus, elink FROM education 
							LEFT JOIN states
								ON education.stateID = states.stateID
									WHERE education.resourceName = 'InStateTuition') AS results
										WHERE $age >=minAge AND state = '$state' AND reqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo '<h3> In State Tuition </h3>
							<div class="row">
								<div class="col">
									<img src= "images/yes.png">
								</div>
								<div class = "col">
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href="'. $data["elink"] . '" target="_blank">Learn more </a>
										<i class="far fa-bookmark">
										</i>
									</p>
								</div>
							</div>';
				} else {
					echo "<h3> In State Tuition </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
				}
			?>
		</div>
		<div class = "col">
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, minAge, reqStatus, elink FROM
						(SELECT state, minAge, reqStatus, elink FROM education 
							LEFT JOIN states
								ON education.stateID = states.stateID
									WHERE education.resourceName = 'FederalAid') AS results
										WHERE $age >=minAge AND state = '$state' AND reqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo "<h3> Federal Aid </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['elink'] . "' target='_blank'>Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
				} else {
					echo "<h3> Federal Aid </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class = "col">		 
			<?php
					require_once "db_connect.php";
					 
					// Define variables and initialize with empty values
					$age = $state = $status = "";
					$age=intval($_POST['age']);
					$state= $_POST['state'];
					$status = $_POST['status'];
					
					$sql = "SELECT state, minAge, reqStatus, elink FROM
							(SELECT state, minAge, reqStatus, elink FROM education 
								LEFT JOIN states
									ON education.stateID = states.stateID
										WHERE education.resourceName = 'StateAid') AS results
											WHERE $age >=minAge AND state = '$state' AND reqStatus = '$status'";
					$result = $mysqli->query($sql);
					$data = $result->fetch_assoc();
					if ($result->num_rows > 0) {
						echo "<br>
							<h3> State Aid </h3>
								<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['elink'] . "' target='_blank'>Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
					} else {
						echo "<br>
							<h3> State Aid </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
					}
	
				?>
		</div>
		<div class = "col">
		</div>
	</div>
</div>
<div class = "padd"></div>
<div class="container">
	<div class="row">
		<div class = "col">
			<h2> Healthcare </h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class = "col">
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, hMinAge, hReqStatus, hlink FROM
						(SELECT state, hMinAge, hReqStatus, hlink FROM healthcare 
							LEFT JOIN states
								ON healthcare.stateID = states.stateID
									WHERE healthcare.hResourceName = 'Healthcare') AS results
										WHERE $age >=hMinAge AND state = '$state' AND hReqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo "<h3> Healthcare </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['hlink'] . "' target ='_blank' >Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
				} else {
					echo "<h3>Healthcare </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
				}
			?>
		</div>
		<div class = "col">
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, hMinAge, hReqStatus, hlink FROM
						(SELECT state, hMinAge, hReqStatus, hlink FROM healthcare 
							LEFT JOIN states
								ON healthcare.stateID = states.stateID
									WHERE healthcare.hResourceName = 'EHealthcare') AS results
										WHERE $age >=hMinAge AND state = '$state' AND hReqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo "<h3> Emergency Healthcare </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['hlink'] . "' target='_blank'>Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
				} else {
					echo "<h3> Emergency Healthcare </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
					}
			?> 
		</div>
	</div>
</div>
<div class = "padd"></div>
<div class="container">
	<div class="row">
		<div class = "col">
			<h2> Public Services </h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class = "col">
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, pMinAge, pReqStatus, plink FROM
						(SELECT state, pMinAge, pReqStatus, plink FROM publicservices 
							LEFT JOIN states
								ON publicservices.stateID = states.stateID
									WHERE publicservices.pResourceName = 'DriversLicense') AS results
										WHERE $age >=pMinAge AND state = '$state' AND pReqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo "<h3> Driver's Lisence </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['plink'] . "' target='_blank'>Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
				} else {
					echo "<h3> Driver's Lisence </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
				}
			?> 
		</div>
		<div class = "col">
			<?php
				require_once "db_connect.php";
				 
				// Define variables and initialize with empty values
				$age = $state = $status = "";
				$age=intval($_POST['age']);
				$state= $_POST['state'];
				$status = $_POST['status'];
				
				$sql = "SELECT state, pMinAge, pReqStatus, plink FROM
						(SELECT state, pMinAge, pReqStatus, plink FROM publicservices 
							LEFT JOIN states
								ON publicservices.stateID = states.stateID
									WHERE publicservices.pResourceName = 'StateID') AS results
										WHERE $age >=pMinAge AND state = '$state' AND pReqStatus = '$status'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					echo "<h3> State ID </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/yes.png'>
								</div>
								<div class = 'col'>
									<h4>Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua. 
									<a href='". $data['plink'] . "' target='_blank'>Learn more </a>
										<i class='far fa-bookmark'>
										</i>
									</p>
								</div>
							</div>";
				} else {
					echo "<h3> State ID </h3>
							<div class='row'>
								<div class='col'>
									<img src= 'images/no.png'>
								</div>
								<div class = 'col'>
									<h4>Not Eligible </h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
									labore et dolore magna aliqua.</p>
								</div>
							</div>";
				}
			?> 
		</div>
	</div>
</div>
<div class="pad"></div>
<footer class="site-footer">
  <div class="container">
	<div class="row">
	  <div class="col-sm-12 col-md-6">
		<h6>Important</h6>
		<p class="text-justify">The legal information and materials on this website are intended to be used for general information. If you are looking for assistance with your personal immigration case, please consult a licensed attorney who is an expert in immigration law or a Board of Immigration Appeals accredited representative. Some sources of assistance can be found under the Community Resources section of this site. 
	  </div>

	  <div class="col-xs-6 col-md-3">
		<h6>Change Language</h6>
		<ul class="footer-links">
		  <li><div id="google_translate_element"></div></li>
		</ul>
	  </div>

	  <div class="col-xs-6 col-md-3">
		<h6>Quick Links</h6>
		<ul class="footer-links">
		  <li><a href="http://scanfcode.com/about/">COMING SOON</a></li>
		</ul>
	  </div>
	</div>
	<hr>
  </div>
  <div class="container">
	<div class="row">
	  <div class="col-md-8 col-sm-6 col-xs-12">
		<p class="copyright-text">Copyright &copy; 2019 All Rights Reserved by 
	 <a href="#">Immigreation</a>.
		</p>
	  </div>
	</div>
  </div>
</footer>
    <!-- Optional JavaScript -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
