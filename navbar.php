<?php 
	if(!isset($_SESSION)){ 
        session_start(); 
    } 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<div class="dropdown">
			<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
			</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="changepassword.php">Change Password</a>
			<a class="dropdown-item" href="logout.php">Logout</a>
		</div>
		</div>';
	} else {
		echo '<li class="nav-item">
		<a class="nav-link" href="signup.php">Sign Up</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="login.php">Log In</a>
		</li> ';
	}

?>