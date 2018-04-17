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

//$mediaid = $_GET['id'];
$mediaid = $_SESSION['mediaid'];
$imageurl = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;
$addCommenturl = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/addComment.php?id='.$mediaid;
$ownedFile = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/ownedFile.php?id='.$mediaid;
?>

<!------------------ HTML Code ----------------------->

<div class="container">
	<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php if(isset($_SESSION['loggedIn'])) { ?>
	<div class="container">
  		<ul class="pagination"  class="text-center">
    		<li class="page-item"><a class="page-link" href="<?php echo $imageurl ?>" style="width: 300px">Current File</a></li>
    		<li class="page-item"><a class="page-link" href="<?php echo $addCommenturl ?>" style="width: 300px">Add Comment/Add to Playlist</a></li>

			<!------ if user owns file ----->
			<?php
			if (file_owner($_SESSION['username'], $mediaid))
			{ ?>

				<li class="page-item"><a class="page-link" href="<?php echo $ownedFile ?>" style="width: 300px">Update/Delete File</a></li>
			<?php } ?>
		<?php } ?>
		</ul>
		</div>
		<br>

		<button name="deleteFile" type="submit" class="btn btn-lg btn-outline-danger">DELETE FILE</button>
	</form>
	</div>

  <?php
  	if(isset($_POST['deleteFile']))
  	{
  		echo $mediaid;
  		delete_file($mediaid);

  	}
  ?>


<!-- Update section -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<button name="updateFile" type="submit" class="btn btn-lg btn-outline-danger">UPDATE (test) FILE</button>
    <h4 style="margin-bottom:0px; margin-top: 20px;">Title</h4><input maxlength="40" id="title" name="title" type="text" class="form-control" style="width: 550px;">

	</form>

  <?php
  	if(isset($_POST['updateFile']))
  	{
  		echo $mediaid;
  		update_file($mediaid);

  	}
  ?>
