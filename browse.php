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
    }
    </style>

</head>

<!---------------- Navigation Bar --------->
<body>

 <div id="Navigation_Bar">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">



  <!-- Links that are located on the Navagation Bar -->

	<!-- Left Nav Bar Elements -->

  <ul class="navbar-nav navbar-left">
	  <a class="navbar-brand" href="#">METUBE</a>
    <li class="nav-item">
      <a class="nav-link" href="#">IMAGE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">VIDEO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">AUDIO</a>
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

		<!--<li class="nav-item">
		  <a class="nav-link" href="register.php"> Register</a>
	  </li>-->
	  <li class="nav-item">
		  <a class="nav-link" href="index.php"> Logout</a>
		</li>
 </ul>

</div>
</nav>
</div>


<!--nav bar ends-->
<?php
session_start();
include_once "function.php";
?>
<body>
<p>Welcome <?php echo $_SESSION['username'];?></p>
<a href='media_upload.php'  style="color:#FF9900;">Upload File</a>
<div id='upload_result'>
<?php
	if(isset($_REQUEST['result']) && $_REQUEST['result']!=0)
	{
		echo upload_error($_REQUEST['result']);
	}
?>
</div>
<br/><br/>
<?php

	$query = "SELECT * from media";
	$result = mysql_query( $query );
	if (!$result){
	   die ("Could not query the media table in the database: <br />". mysql_error());
	}
?>

    <div style="background:#339900;color:#FFFFFF; width:150px;">Uploaded Media</div>

		<?php
			while ($result_row = mysql_fetch_row($result)) //filename, username, type, mediaid, path, title
			{
				$mediaid = $result_row[3];
				$filename = $result_row[0];
				$filenpath = $result_row[4];
        $title = $result_row[5];
        $date = $result_row[6];
		?>



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


   </div>
</body>

</html>
