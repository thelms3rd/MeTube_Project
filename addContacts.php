<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Font_Awesome-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <title>METUBE</title>

<style>
center{

text-align: center;

}
</style>

</head>

	
<!------------------ Beginning of Body ---------->
<?php
session_start();
include_once "function.php";
nav_bar();
if(isset($_GET['search']))
{
	$searchValue = $_GET['search'];
	header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);	
}
?>
	

	
<!------------------ HTML Code ----------------------->
	
<div class="container"> 
	<br>
	<div class="container">
  		<ul class="pagination"  class="text-center">
    		<li class="page-item"><a class="page-link" href="addContacts.php" style="width: 300px">Add Contact/Delete Contact</a></li>
    		<li class="page-item"><a class="page-link" href="myContacts.php" style="width: 300px">My Contacts</a></li>
  		</ul>
	</div>
	<br>
	<br>
	<div class="row">
		
		<!---- Add a contact ----->
		<div class="col">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h4 class="text-center">Add a Contact</h4>

			<!------- This is the style of the shadowed box containing username and password ---->	
			<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

				<!---- Add Contact Form Group --->
				<div class="form-group">
					<label>Add Contact:</label>
					<input type="username" class="form-control" name="username" required>
				</div>

				<!----- Contact Organization --->
				<div class="form-group">
					<label>Contact Organization (select one):</label>
					<select class="form-control" name="contact_organization">
						<option>Favorite</option>
						<option>Family</option>
						<option>Friend</option>
						<option>Other</option>
					</select>
				</div>
				<br>

				<!--- Button Form Group -->
				<div class="form-group">
					<button name="submit_contact" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Submit</button>
					<button name="reset" type="reset" class="btn btn-danger btn-md" style="width: 125px">Reset</button>
				</div>
			</div>
			</form>
		</div>
		
		<!------------- Delete a contact ------------->
		<div class="col">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h4 class="text-center">Delete a Contact</h4>

			<!------- This is the style of the shadowed box containing username and password ---->	
			<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

				<!---- Delete contact Form Group --->
				<div class="form-group">
					<label>Delete Contact:</label>
					<input type="username" class="form-control" name="user_delete" required>
				</div>

				<br>

				<!--- Button Form Group -->
				<div class="form-group">
					<button name="submit_delete" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Submit</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

		
<!------------------ PHP Code ----------------------->
<?php

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['submit_contact'])) {
			//call the add_contact function
			echo "Add Contact: $_POST[username]";
			echo "<br>";
			echo "Organization: $_POST[contact_organization]";
		
			add_contact($_SESSION['username'],$_POST['username'], $_POST['contact_organization']);
		}
		if(isset($_POST['submit_delete'])) {
			
			delete_contact($_SESSION['username'],$_POST['user_delete']);
		}
		if(isset($_GET['search']))
		{
			$searchValue = $_GET['search'];
			header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);
		}
	}
	

?>
	
<!---------------------------------------------------------------------->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
	
