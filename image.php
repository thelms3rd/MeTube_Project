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
<br>

<!-------------------------- MIDDLE OF PHP------------------->
<?php
$id = $_GET['id'];
	
$_SESSION['mediaid'] = $id;
	
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
	
	$imageurl = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;
	$addCommenturl = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/addComment.php?id='.$mediaid;
	
	?>
<div class="container">
<?php if(isset($_SESSION['loggedIn'])) { ?>
	<div class="container">
  		<ul class="pagination"  class="text-center">
    		<li class="page-item"><a class="page-link" href="<?php echo $imageurl ?>" style="width: 300px">Current File</a></li>
    		<li class="page-item"><a class="page-link" href="<?php echo $addCommenturl ?>" style="width: 300px">Add Comment</a></li>
  		</ul>
	</div>
<?php } ?>	
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
		
		<!---------- Second Row (Comments) -------->
		<br>
		<div class="row text-center">	
			<div class="col">
		
				<div class="container">
			  	<h5 class="text-center">Comments:</h5>          
			  	<table class="table">
				 <thead>
					<tr>
					  <th>Username</th>
					  <th>Comment</th>
					</tr>
				 </thead>
				 <tbody>
					<?php file_comments($id);	?>
				  </tbody>
				</table>
			  </div>	
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

