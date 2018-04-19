<!DOCTYPE html>
<html lang="en">

<!--------- HEAD Section ------------->
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

<body>
<?php
session_start();

include_once "function.php";
nav_bar();

?>






<form method="post" action="media_upload_process.php" enctype="multipart/form-data" >

  <p style="margin:0; padding:0">
	  <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
   Add a Media: <label style="color:#663399"><em> (Each file limit 10M)</em></label><br>
   <input  name="file" type="file" size="50">

<h4 style="margin-bottom:0px; margin-top: 20px;">Title</h4><input maxlength="40" id="title" name="title" type="text" class="form-control" style="width: 550px;">
<br>
	<select name="mediaType"class="form-control" style="width: 175px;">
			<option>Image</option>
			<option>Audio</option>
			<option>Video</option>
		</select>

	<h4 style="margin-bottom:0px; margin-top: 20px;">Keywords</h4><input maxlength="40" id="keywords" name="keywords" type="text" class="form-control" style="width: 550px;">
<br>

	<h4 style="margin-bottom:0px; margin-top: 20px;">Description (500 character max)</h4><input maxlength="500" id="description" name="description" type="text" class="form-control" rows="5" style="resize: none; width: 550px;">
<br>

<h5 style="margin-bottom:0px; margin-top: 20px;">Category</h5>
		<select name="category"class="form-control" style="width: 175px;">
			<option>Comedy</option>
			<option>Music</option>
			<option>Sports</option>
			<option>Educational</option>
			<option>Other</option>
		</select>

	<!--<input value="Upload" name="submit" type="submit">->
	
	
	<!--- Button Form Group -->
		<div class="form-group">
			<button value="Upload" name="submit" type="submit" class="btn btn-primary btn-md" style="width: 125px; margin-right: 15px">Upload</button>
		</div>
	</form>

	
<?php
		if(isset($_GET['search']))
		{
			//$searchValue = $_GET['search'];
			//header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php?search='.$searchValue);
		}
}
	?>

	</body>
<!---------------------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
