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

<!---------------- Navigation Bar --------->
<body>
	
<?php
session_start();
include_once "function.php";

?>
	

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



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>
<div class="container">
<div class = "card" style="width: 700px;">
	<div class = "card-body">
		<div class="row">
			<div class="col">
				<div class = "card" style="width: 225px;">
					<div class = "card-body">
						<h5 style="margin-bottom:0px; margin-top: 20px;">Category</h5>
						<select name="category"class="form-control" style="width: 175px;">
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
			<div class = "card" style="width: 225px;">
				<div class="col">
					<div class = "card-body">
						<h5 style="margin-bottom:0px; margin-top: 20px;">Media File Type</h5>
						<select name="fileType"class="form-control" style="width: 175px;">
							<option>All</option>
							<option>Image</option>
							<option>Audio</option>
							<option>Video</option>
						</select>
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
</form>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {	
		if(isset($_POST['filter'])) {
			//call the add_contact function
			echo "Category:" .$_POST['category'];
			echo "<br>";
			echo "fileType:" .$_POST['fileType'];
			
			//add_contact($_SESSION['username'],$_POST['username'], $_POST['contact_organization']);
			
			browse_files($_POST['category'], $_POST['fileType']);
			//header('Location: https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/browse.php');
		}
}
if(isset($_GET['search']))
{
 	
	search_files($_GET['search']);

?>	
<!---------------------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

