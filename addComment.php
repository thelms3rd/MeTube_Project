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
	
<?php if(isset($_SESSION['loggedIn'])) { ?>
	<div class="container">
  		<ul class="pagination"  class="text-center">
    		<li class="page-item"><a class="page-link" href="<?php echo $imageurl ?>" style="width: 300px">Current File</a></li>
    		<li class="page-item"><a class="page-link" href="<?php echo $addCommenturl ?>" style="width: 300px">Add Comment</a></li>
  		
			<!------ if user owns file ----->
			<?php 
			if (file_owner($_SESSION['username'], $mediaid))
			{ ?>
				
				<li class="page-item"><a class="page-link" href="<?php echo $ownedFile ?>" style="width: 300px">Update/Delete File</a></li>
			<?php } ?>
		</ul>
	</div>

<?php } ?>
	
	<br>
	<br>
	<div class="row">
		
		<!---- Add Comment ----->
		<div class="col">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h4 class="text-center">Add comment/Add to Playlist</h4>

			<!------- This is the style of the shadowed box containing username and password ---->	
			<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

				<!---- Add Comment Form Group --->
				<div class="form-group">
					<textarea class="form-control" rows="5" name="comment" required></textarea>
				</div>

				<!--- Button Form Group -->
				<div class="form-group">
					<button name="submit_comment" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Submit</button>
					<button name="reset" type="reset" class="btn btn-danger btn-md" style="width: 125px">Reset</button>
				</div>
			</div>
			</form>
		</div>
		
		
			<!---- Add File to playlist ----->
		<div class="col">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h4 class="text-center">Add File to Playlist</h4>

			<!------- This is the style of the shadowed box containing username and password ---->	
			<div style="width: 300px; height: 320px; padding: 15px; background-color: #f1f1f1; box-shadow: 1px 1px 1px 1px grey; margin: auto;">

				<select name="select_playlist"class="form-control" style="width: 175px;"> 
							
							<?php 
							
							select_playlist($_SESSION['username']);
							?>
							
					</select>
				<br>
				
				<!--- Button Form Group -->
				<div class="form-group">
					<button name="submit_playlist" type="submit" class="btn btn-primary btn-md" style="width: 265px; margin-right: 15px">Submit</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

		
<!------------------ PHP Code ----------------------->
<?php

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['submit_comment'])) {
			//call the add_contact function
			echo "Add Contact: $_POST[comment]";
	
		
			send_comment($_SESSION['username'], $_SESSION['mediaid'], $_POST['comment']);
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
	