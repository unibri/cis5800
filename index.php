<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link type="text/css" href="css/home.css" rel="stylesheet">
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
<!--the folowing is for the main search tool -->
<div class="container">
<!--use homeSearch to style this section-->
	<div id = "homeSearch">
		<h1 id="title">IMMIGRATION RESOURCE SEARCH</h1>
			<form method= "post" action = "results.php">
				<div class="row" style="text-align:center;">
				<div class="form-group col">
					<label for="age">Age</label>
					<input type="text" class="form-control" id="age" name="age">
				</div>
				<div class="form-group col">
					<label for="status">Select Your Status</label>
					<select class="form-control" id="status" name="status">
					<option>Student F-1 Visa</option>
					<option>TPS</option>
					<option>Undocumented</option>
					<option>Undocumented with DACA</option>
					</select>
					<small id="statusHelp" class="form-text text-muted">Confused about your status? <a href="">Learn more</a></small>
				</div>
				<div class="form-group col">
					<label for="state">Select Your State</label>
					<select class="form-control" id="state" name="state">
					<option>AZ</option>
					<option>NY</option>
					</select>
				</div>
				<div class="col">
				  <button type="submit" class="btn btn-light search">Search</button>
				</div>
				</div>
			</form>			
	</div>
</div>
<!--hi-->
<!--next section, search by category-->  
<h1 id="byCategory">Search by Category </h1>
<div class="container">
	<div class="row">
		<div class="col"onclick="location.href='education.php';">
			<h2 class="category"> Education </h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
		</div>
		<div class="col"onclick="location.href='healthcare.php';">
			<h2 class="category"> Healthcare </h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
		</div>
	</div>
		<div class="row">
		<div class="col"onclick="location.href='publicservices.php';">
			<h2 class="category"> Public Services </h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
		</div>
		<div class="col">
			<h2 class="category"> DACA </h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
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