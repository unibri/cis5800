<?php
// Include config file
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["accountEmail"]))){
        $username_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["accountEmail"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> This email is already registered. Already have an account? <a href='login.php'>Log In </a>";
                } else{
                    $username = trim($_POST["accountEmail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST["accountPassword"]))){
        $password_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> Please enter your password.";     
    } elseif(strlen(trim($_POST["accountPassword"])) < 6){
        $password_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["accountPassword"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirmPassword"]))){
        $confirm_password_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirmPassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<span style='color:red;'><i class='fas fa-exclamation-circle'></i></span> Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
	
}
?>

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
	<div class = "pad"></div>
	<div class="container">
		<div class="row">
			<div class="col">
			<p style="padding-top:50px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
			</div>
			<div class="col">
			<h3 style="text-align:center">Become a part of the family </h3>
			<p> Create a free account with Immigreation to bookmark resources. Your information is valuable to us and will not be shared. </p>
			<form action= '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
				<div class="form-group createAccountInput <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="email" class="form-control" id="accountEmail" name="accountEmail" aria-describedby="emailHelp" placeholder="Email Address">
					<span class="help-block" style="font-weight:bold"><?php echo $username_err; ?></span>
				</div>
				<div class="form-group createAccountInput <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"">
					<input type="password" class="form-control" id="accountPassword"  name="accountPassword" placeholder="Password">
					<span class="help-block" style="font-weight:bold"><?php echo $password_err; ?></span>
				</div>
					<div class="form-group createAccountInput <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<input type="password" class="form-control" id="confirmPassword" name= "confirmPassword" placeholder="Confirm Password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Get Started</button>
					<small id="terms" class="text-muted"> By clicking this button, you agree to Immigreation's <a href="">Terms of Use </a> </small>
				</div>
			</form>
			</div>
		</div>
	</div>
<footer>
	<div id="google_translate_element"></div>
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
