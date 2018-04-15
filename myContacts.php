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
?>
	

	
<!------------------ HTML Code ----------------------->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
<div class="container"> 
<br>
<div class="container">
  <ul class="pagination"  class="text-center">
    <li class="page-item"><a class="page-link" href="addContacts.php" style="width: 300px">Add Contact</a></li>
    <li class="page-item"><a class="page-link" href="myContacts.php" style="width: 300px">My Contacts</a></li>
  </ul>
	</div>
<br>
<h4 class="text-center">Your Contacts </h4>
<br>
	
<!------- This is the Table that contains Favorite ---->	
<div class="container">
	<div class="row">
		<div class="col">
  			<h5 class="text-center">Favorites:</h5>          
				<table class="table">
    				<thead>
						<tr>
							<th>Username</th>
      				</tr>
					</thead>
					<tbody>
						<?php  my_favorites($_SESSION['username']);	?>
					</tbody>
				</table>
		</div>
		<div class="col">
  			<h5 class="text-center">Family:</h5>          
				<table class="table">
    				<thead>
						<tr>
							<th>Username</th>
      				</tr>
					</thead>
					<tbody>
						<?php my_family($_SESSION['username']);	?>
					</tbody>
				</table>
		</div>
		<div class="col">
  			<h5 class="text-center">Friend:</h5>          
				<table class="table">
    				<thead>
						<tr>
							<th>Username</th>
      				</tr>
					</thead>
					<tbody>
						<?php my_friends($_SESSION['username']);	?>
					</tbody>
				</table>
		</div>
		<div class="col">
  			<h5 class="text-center">Other:</h5>          
				<table class="table">
    				<thead>
						<tr>
							<th>Username</th>
      				</tr>
					</thead>
					<tbody>
						<?php my_others($_SESSION['username']);	?>
					</tbody>
				</table>
		</div>
	</div>
</div>


</div>
</form>
	
<?php
if(isset($_GET['search']))
	{
		$searchValue = $_GET['search'];
		header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);
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
	
