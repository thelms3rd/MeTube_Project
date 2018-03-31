<link rel="stylesheet" type="text/css" href="css/default.css" />
<?php
session_start();

include_once "function.php";

if(isset($_POST['submit'])) {
		if($_POST['username'] == "" || $_POST['password'] == "") {
			$login_error = "One or more fields are missing.";
		}
		else {
			$check = user_pass_check($_POST['username'],$_POST['password']); // Call functions from function.php
			if($check == 1) {
				$login_error = "User ".$_POST['username']." not found.";
			}
			elseif($check==2) {
				$login_error = "Incorrect password.";
			}
			else if($check==0){
				$_SESSION['username']=$_POST['username']; //Set the $_SESSION['username']
				header('Location: browse.php');
			}		
		}
}


 
?>
	<form method="post" action="<?php echo "login.php"; ?>">

<!-----Previous HTML that is commented currently ---->

	<!---<table width="100%">
		<tr>
			<td  width="20%">Username:</td>
			<td width="80%"><input class="text"  type="text" name="username"><br /></td>
		</tr>
		<tr>
			<td  width="20%">Password:</td>
			<td width="80%"><input class="text"  type="password" name="password"><br /></td>
		</tr>
		<tr>
        
			<td><input name="submit" type="submit" value="Login"><input name="reset" type="reset" value="Reset"><br /></td>
		</tr>
	</table>
	</form>--->


<!---------------- Navigation Bar --------->	

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

<?php
  if(isset($login_error))
   {  echo "<div id='passwd_result'>".$login_error."</div>";}
?>
