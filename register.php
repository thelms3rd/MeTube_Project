<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Font_Awesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	
    <title>METUBE</title>
</head>

<!---------------------------------- BEGINNING OF THE BODY ------------------------------->
<body>


	
	
<!------------------ PHP Code ----------------------->
<?php
session_start();
include_once "function.php";
nav_bar();
if(isset($_GET['search']))
	{
		$searchValue = $_GET['search'];
		header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);
	}		


if(isset($_POST['submit'])) {
	if( $_POST['password1'] != $_POST['password2']) {
		$register_error = "Passwords don't match. Try again?";
	}
	else {
		$check = user_exist_check($_POST['username'], $_POST['password1']);	
		if($check == 1){
			//echo "Rigister succeeds";
			$_SESSION['username']=$_POST['username'];
			header('Location: browse.php');
		}
		else if($check == 2){
			$register_error = "Username already exists. Please user a different username.";
		}
	}
}
?>
	
<!------------------ HTML Code ----------------------->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
<div class="container"> 
<br>
<br>
<br>
<h4 class="text-center">Create MeTube Account</h4>

<!------- This is the style of the shadowed box containing username and password ---->	
<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

<!---- Username Form Group ---->
<div class="form-group">
  <label>Username:</label>
  <input type="text" class="form-control" name="username" required>
</div>

<!---- Password Form Group --->
<div class="form-group">
  <label>Password:</label>
  <input type="password" class="form-control" name="password1" required>
	</div>

<!----- Confirm Password --->
<div class="form-group">
  <label>Confirm Password:</label>
  <input type="password" class="form-control" name="password2" required>
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
  if(isset($register_error))
   {  echo "<div id='passwd_result'> register_error:".$register_error."</div>";}
	
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
