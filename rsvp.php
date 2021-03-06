<!DOCTYPE html>
<html>
	<head>
		<title>RSVP</title>
		
		<meta name="Matt and Leah's Wedding - RSVP" content="This is the RVSP of our website.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Google Fonts Integrator https://google.com/fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

		<!-- necolis.github.io/normalize.css/ -->
		<link rel="stylesheet" href="css/normalize.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		
		<!-- Modernizr allows HTML5 elements to work in older browsers: http://modernizr.com/ -->
		<script src="js/modernizr.js"></script>
		<script src="js/jquery-3.5.1.min.js"></script>
		<?php
		//If the user is coming to the Wedding, open up the second part of the form
		if (isset($_POST['confirm']) && $_POST['confirm'] == "Yes") {
			$confirmcomm = 1;
		}elseif (isset($_POST['confirm']) && $_POST['confirm'] == "No"){
			$confirmcomm = 2;
		} else {
			$confirmcomm = 0;
		}
		//Assign a null value to the first and last names so that the placeholder can be triggered 
		if (isset($_POST['firstname'])) {
			$first = $_POST['firstname'][0];
		}else {
			$first = NULL;
		}
		if (isset($_POST['lastname'])) {
			$last = $_POST['lastname'][0];
		}else {
			$last = NULL;
		}
		?>
	</head>
	<body>
	
		<div class="panel">
			<div class="container">
				
				<header class="main">
					<nav>
						<ul>
							<li><a href="rsvp.php">RSVP</a></li>
							<li><a href="location.html">Location</a></li>
							<li id="logo"><a href="index.html">Wedding Logo</a></li>
							<li><a href="FAQ.html">FAQ</a></li>
							<!-- <li><a href="contact-us.html">Contact Us</a></li> -->
							<li><div class="dropdown">
							  <button onclick="myFunction()" class="dropbtn">More &#709;</button>
							  <div id="myDropdown" class="dropdown-content">
							    <a href="about_bride_and_groom.html">About the Bride and Groom</a>
							    <a href="image-gallery.html">Gallery</a>
							    <a href="contact-us.html">Contact Us</a>
							  </div>
							</div></li>
						</ul>
					</nav>
				</header>

				<script src="js/dropdown.js"></script>


			</div> <!-- End Container -->
		</div>

		<div class="wrapper">
	 	<div class="container">
			<div id="rsvp" class="content-block">
				<h1 class="top_header">RSVP</h1>
				<p id="rsvp-p">We are looking forward to seeing you!</p>

				<form action="http://localhost:8080/weddingsql/rsvp.php" method="post">

					<?php
					if ($confirmcomm == 0){
					?>	

					<label for="firstname">Your First Name</label>
					<input type="text" id="firstname" value="<?=$first?>" placeholder="Enter first name here" name="firstname[]" required>
					
					<label for="lastname">Your Last Name</label>
					<input type="text" id="lastname" value="<?=$last?>" placeholder="Enter last name here" name="lastname[]" required>
					
					<label for="confirm">Will you be attending the Wedding on July 2, 2022?</label>
					<select type="text" id="confirm" name="confirm" required>
						<option selected hidden value="">Select One</option>
						<option value ="Yes">Yes</option>
						<option value="No">No</option>
					</select>
					<input type="submit" value="Submit">
					<?php
					}
					?>	
				</form>

				<?php
				if ($confirmcomm == 1){
				?>
					
					<form action="http://localhost:8080/weddingsql/insert.php" method="post">
						<div id="dynamic_field">

							<label for="firstname">Your First Name</label>
							<input type="text" id="firstname" value="<?=$first?>" placeholder="Enter first name here" name="firstname[]" required>
							
							<label for="lastname">Your Last Name</label>
							<input type="text" id="lastname" value="<?=$last?>" placeholder="Enter last name here" name="lastname[]" required>

							<input type="hidden" id="confirm2" value="<?=$_POST['confirm']?>" name="confirm" required>

							<label for="food">Please selection food your meal option?</label>
							<select type="text" id="food" name="food[]" required>
								<option selected hidden value="">Select One</option>
								<option value ="Steak">Steak</option>
								<option value="Chicken">Chicken</option>
								<option value="Salmon">Salmon</option>
								<option value="Kids Meal">Kids Meal</option>
							</select>

							<label for="allergies">Please note any allergies/restrictions</label>
							<textarea type="text" id="allergies" placeholder="Type here" name="allergies[]"></textarea>
							
							<div class="center mainadd">
								<button type="button" name="add" id="add" class="btn btn-success">(+) Add more family members/plus ones</button>
							</div>
						</div>

						<label for="email" clas>Your Email</label>
						<input type="email" id="email" placeholder="your@email.com" name="email" required>

						<label>Will you be booking a hotel? (Note: Cost is $140/night)</label>
						<input class="radio" type="radio" id="hotel-option1" name="hotel" required value="Yes"><label class="radio" for="hotel-option1">Yes</label><br>
						<input class="radio" type="radio" id="hotel-option2" name="hotel" value="No"><label class="radio" for="hotel-option2">No</label>



						<label for="comments">Comments</label>
						<textarea type="text" id="comments" placeholder="Type here" name="comments"></textarea>

						<input type="submit" value="Submit">
					</form>
				<?php
				;} elseif ($confirmcomm == 2){
					include("insert1.php");
				}
				?>
			</div>


			</div> <!-- End container -->
		</div> <!-- End wrapper -->
		<script src="js/addmore.js"></script>

				
		

		<footer class="main">
			<div class="container">
					
				<div id="Copyright">
					<p>Copyright &copy; 2020 <strong>Matthew Saturno</strong></p>
				</div> <!-- End copyright -->

				<div id="credits">
					<p>Coded by <a href="https://www.linkedin.com/in/matthewsaturno/">Matthew Saturno</a></p>
			</div>

		</footer>	


	</body>
</html>
