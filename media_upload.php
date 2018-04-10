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
		  <div class="dropdown">
    			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
      			Account
    			</button>
    			<div class="dropdown-menu">
      			<a class="dropdown-item" href="accountSettings.php" name="accountSetting">Update Account</a>
      			<a class="dropdown-item" href="media_upload.php">Upload</a>
      			<a class="dropdown-item" href="message.php">Message</a>
    			</div>
  			</div>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="logout.php" name="logout"> Logout</a>
		</li>


			
 </ul>
	
</div>
</nav>
</div>
<!------------- END OF NAVIGATION BAR ----------->





<form method="post" action="media_upload_process.php" enctype="multipart/form-data" >

  <p style="margin:0; padding:0">
  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
   Add a Media: <label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
   <input  name="file" type="file" size="50" />
<h4 style="margin-bottom:0px; margin-top: 20px;">Title</h4><input maxlength="40" id="title" name="title" type="text" class="form-control" style="width: 550px;">
<br>
<h4 style="margin-bottom:0px; margin-top: 20px;">Description (500 character max)</h5><input maxlength="500" id="description" name="description" type="text" class="form-control" style="width: 550px;">
<br>
  <input value="Upload" name="submit" type="submit" />
  </p>


</form>
	
<!---------------------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
