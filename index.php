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



<!---------------------------------- BEGINNING OF THE BODY ------------------------------->
<body>

<!--------------------------- Navigation Bar -------------------------------------------->
  <div id="Navigation_Bar">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">



  <!-- Links that are located on the Navagation Bar -->

	<!-- Left Nav Bar Elements -->

  <ul class="navbar-nav navbar-left">
	  <a class="navbar-brand" href="index.php">MeTube</a>
    <li class="nav-item">
      <a class="nav-link" href="#">Image</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Video</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Audio</a>
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

		<li class="nav-item">
		  <a class="nav-link" href="register.php"> Register</a>
	  </li>
	  <li class="nav-item">
		  <a class="nav-link" href="login.php"> Login</a>
		</li>
 </ul>

</div>
</nav>
</div>

<!----------------------------MIDDLE SECTION ----------------------->

<?php
session_start();
include_once "function.php";
?>

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
  ?>



<!---  Display the Most Viewed Media --->
<br>
<h5> MOST VIEWED: </h5>

<?php
  while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path
  {
    $mediaid = $result_row[3];
    $filename = $result_row[0];
    $filenpath = $result_row[4];
    $title = $result_row[5];
    $date = $result_row[6];
?>

<!-- Display uploads -->

<div class="row text-center">

            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
      			   <div class="img-thumbnail"> <a href="<?php echo $filenpath;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "400" height="200"><onclick="javascript:saveDownload(<?php echo $result_row[4];?>);">Download</a></div>
      			   <p> <?php echo $title ?> </p>
                    <h6>views: </h6>
                    <h6>upload date: <?php echo $date ?> </h6>
                  <br>
                  <br>
    		  </div>
            </div>
</div>

<?php
}
?>

<hr>

<!--- Display the New Uploads ---->
<br>
<h5>  NEW UPLOADS: </h5>

</div>


<!---------------------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
