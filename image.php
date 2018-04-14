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

?>


<!---------------- Navigation Bar --------->
<body>

 <div id="Navigation_Bar">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">



  <!-- Links that are located on the Navagation Bar -->

	<!-- Left Nav Bar Elements -->

  <ul class="navbar-nav navbar-left">
	  <a class="navbar-brand" href="index.php">MeTube</a>
    <li class="nav-item">
      <a class="nav-link" href="https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/index.php">Image</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Video</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Audio</a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="browse.php">Browse</a>
    </li>
   </ul>


	  <!-- Right Nav Bar Elements -->
	<ul class="nav navbar-nav navbar-right">

		<!-- Search bar -->
		<form class="navbar-form navbar-right" action="#" style="padding-right: 20px; width: 450px">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
				 <i class="fas fa-search"></i>
       	 </button>
        </div>
      </div>
    </form>

<!---- if the user is not logged in display register and Login Links ---->
<?php if(!(isset($_SESSION['loggedIn']))): ?>
		<li class="nav-item">
		  <a class="nav-link" href="register.php"> Register</a>
	  </li>
	<li class="nav-item">
		  <a class="nav-link" href="login.php"> Login</a>
		</li>

<!----- else (the user is logged in) then display the account and register links ---->
<?php else: ?>
		<li class="nav-item">

			<div class="dropdown">
    			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
      			Account
    			</button>
    			<div class="dropdown-menu">
      			<a class="dropdown-item" href="accountSettings.php" name="accountSetting">Update Account</a>
      			<a class="dropdown-item" href="media_upload.php">Upload</a>
					<a class="dropdown-item" href="addContacts.php">Contacts</a>
      			<a class="dropdown-item" href="message.php">Message</a>
    			</div>
  			</div>
		</li>

		<li class="nav-item">
		  <a class="nav-link" href="logout.php" name="logout"> Logout</a>
		</li>

<?php endif; ?>

 </ul>

</div>
</nav>
</div>
<!------------- END OF NAVIGATION BAR ----------->

<?php
//session_start();
include_once "function.php";	

?>	
<br>

<!-------------------------- MIDDLE OF PHP------------------->
<?php
$id = $_GET['id'];
$query = "SELECT * FROM media WHERE mediaid='$id'";
//echo $query;

//increment the files number of views	
increment_view($id);
	
$result = mysql_query( $query );
if (!$result){
		die ("media query failed. Could not query the database: <br />". mysql_error());
	} else {
	
	$row = mysql_fetch_row($result);
	$mediaid = $row[3];
	$filename = $row[0];
	$filenpath = $row[4];
	$title = $row[5];
	$date = $row[6];
	$description = $row[7];
	$category = $row[8];
	$keywords = $row[9];
	$views = $row[10];
	
	?>
<div class="container">
	<h4> <?php echo $title ?> </h4>
	<div class="row text-center">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
							<div class="img-thumbnail"> <a href="<?php echo $filenpath;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "375" height="200"><onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</onclick></a></div>
						 </div>
					</div>
					<div class="col">
                    	<h6>views: <?php echo $views ?></h6>
                    	<h6>upload date: <?php echo $date ?> </h6>
							<h6>keywords: <?php echo $keywords ?></h6>
                    	<h6>description: <?php echo $description ?> </h6>
                    	<h6>category: <?php echo $category ?> </h6>
                  </div>
            	</div>
		</div>
<?php

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

