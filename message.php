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
<body>
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
<div class="container"> 
<br>
<div class="container">
  <ul class="pagination"  class="text-center">
    <li class="page-item"><a class="page-link" href="message.php" style="width: 300px">Send Message</a></li>
    <li class="page-item"><a class="page-link" href="myMessages.php" style="width: 300px">My Messages</a></li>
  </ul>
	</div>
<br>
<br>
<h4 class="text-center">Message another User</h4>

<!------- This is the style of the shadowed box containing username and password ---->	
<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

<!---- Password Form Group --->
<div class="form-group">
  <label>Send to (Username):</label>
  <input type="username" class="form-control" name="username" required>
	</div>

<!----- Confirm Password --->
<div class="form-group">
  <label> Enter the Message: </label>
  <input type="message" class="form-control" name="message" required>
</div>
	
<!--- Button Form Group -->
<div class="form-group">
	<button name="submit" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Submit</button>
	<button name="reset" type="reset" class="btn btn-danger btn-md" style="width: 125px">Reset</button>
</div>
</div>
</div>
</form> 
	
	
<!------------------ PHP Code ----------------------->
<?php

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	
		//call the message function
		echo "From User: $_SESSION[username]";
		echo "<br>";
		echo "To User: $_POST[username]";
		
		message_user($_SESSION['username'],$_POST['username'], $_POST['message']);
		
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
	
