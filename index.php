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
?>




<!----------------------------MIDDLE SECTION ----------------------->

<div id="Middle" class="container-fluid">
  <?php

  	$query = "SELECT * from media";
  	$result = mysql_query( $query );
  	if (!$result){
  	   die ("Could not query the media table in the database: <br />". mysql_error());
  	}
  ?>

  <?php
  	if(isset($_REQUEST['result']) && $_REQUEST['result']!=0)
  	{
  		echo upload_error($_REQUEST['result']);
  	}

	if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/index.php');
		echo $_SESSION['username'];
	}
	
	if(isset($_GET['search']))
	{
		$searchValue = $_GET['search'];
		header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);
	}
  ?>



<!---  Display the Most Viewed Media --->
<br>
<h5> MOST VIEWED: </h5>

<?php
	most_views();	
?>
<hr>

<!--- Display the New Uploads ---->
<br>
<h5>  NEW UPLOADS: </h5>
<?php
	new_uploads();	
?>
</div>


<!---------------------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
