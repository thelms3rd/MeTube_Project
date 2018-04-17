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

    <style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
		  text-align: center;
    }
    </style>

</head>
	
<!---------------- Body -------------->	
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
    <li class="page-item"><a class="page-link" href="playlist.php" style="width: 300px">My Playlist</a></li>
    <li class="page-item"><a class="page-link" href="createPlaylist.php" style="width: 300px">Create Playlist</a></li>
  </ul>
	</div>
<br>
<h4 class="text-center">Your Playlist </h4>
<div class="container">
<div class = "card" style="width: 600px;">
	<div class = "card-body">
		<div class="row">
			<div class="col">
				<div class = "card" style="width: 500px;">
					<div class = "card-body">
						<div class="col">
						<h5 style="margin-bottom:0px; margin-top: 20px;">Choose</h5>
						</div>
						<div class="col">
						<select name="select_playlist"class="form-control" style="width: 175px;"> 
							<option>All</option>
							<option>Comedy</option>
							<option>Music</option>
							<option>Sports</option>
							<option>Educational</option>
							<option>Other</option>
						</select>
						</div>
					</div>
				</div>
			</div>
			<div class = "col">
			<!--- Button Form Group -->
			<div class="form-group">
				<button name="filter" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Filter</button>
			</div>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</form>
	
			
			
			
			
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
	