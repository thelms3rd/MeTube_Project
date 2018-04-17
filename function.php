<?php
include "mysqlClass.inc.php";


function user_exist_check ($username, $password){
	$query = "select * from account where username='$username'";
	$result = mysql_query( $query );
	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
			$query = "insert into account values ('$username','$password')";
			echo "insert query:" . $query;
			$insert = mysql_query( $query );
			if($insert)
				return 1;
			else
				die ("Could not insert into the database: <br />". mysql_error());
		}
		else{
			return 2;
		}
	}
}


function user_pass_check($username, $password)
{

	$query = "select * from account where username='$username'";
	echo  $query;
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("user_pass_check() failed. Could not query the database: <br />". mysql_error());
	}
	else{
		$row = mysql_fetch_row($result);
		if(strcmp($row[1],$password))
			return 2; //wrong password
		else
			return 0; //Checked.
	}
}

function updateMediaTime($mediaid)
{
	$query = "	update  media set lastaccesstime=NOW()
   						WHERE '$mediaid' = mediaid
					";
					 // Run the query created above on the database through the connection
    $result = mysql_query( $query );
	if (!$result)
	{
	   die ("updateMediaTime() failed. Could not query the database: <br />". mysql_error());
	}
}

function upload_error($result)
{
	//view erorr description in http://us2.php.net/manual/en/features.file-upload.errors.php
	switch ($result){
	case 1:
		return "UPLOAD_ERR_INI_SIZE";
	case 2:
		return "UPLOAD_ERR_FORM_SIZE";
	case 3:
		return "UPLOAD_ERR_PARTIAL";
	case 4:
		return "UPLOAD_ERR_NO_FILE";
	case 5:
		return "File has already been uploaded";
	case 6:
		return  "Failed to move file from temporary directory";
	case 7:
		return  "Upload file failed";
	}
}

function update_Account($username, $updatedPassword)
{
	$query = "UPDATE account SET password='$updatedPassword' WHERE username='$username'";
	echo  $query;
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("User_Update failed. Could not query the database: <br />". mysql_error());
	}
	else
	{

		echo "<br> <br> Your Account has been Updated!";
	}
}

function message_user($fromUsername, $toUsername, $message)
{
	$query = "select * from contact where username_fk='$fromUsername' AND mycontact='$toUsername'";
	$result = mysql_query( $query );
	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
		echo "<br> <br> No contanct Found! ALERT you user must be a contact to send message!";
		}
		else{
			$query2 = "INSERT INTO message (`username_fk`, `sentFrom`, `message_content`) VALUES ('$toUsername','$fromUsername','$message')";
			echo "insert query:" . $query2;
			$insert = mysql_query( $query2 );
			if($insert)
				echo "<br> <br> Message Sent!";
			else
				die ("Could not insert into the database: <br />". mysql_error());
		}
	}

}

function my_messages($username)
{
	$query = "select * from message where username_fk='$username'";
	$result = mysql_query( $query );

	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[2]"; ?>

				</td>
				<td>
					<?php echo "$row[3]"; ?>
				</td>
			<tr>

			<?php
		}

	}
}

function delete_messages($username)
{
	$query = "DELETE FROM message where username_fk='$username'";
	$result = mysql_query( $query );

	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		echo "Messages have been deleted!";
	}
}

function add_contact($fromUser, $contact, $organization)
{
	$query = "select * from account where username='$contact'";
	$query2 = "select * from contact where username_fk='$fromUser' AND mycontact='$contact'";
	$result = mysql_query( $query );
	$result2 = mysql_query( $query2 );

	if (!$result){
		die ("query1 failed. Could not query the database: <br />". mysql_error());
	}
	else if (!$result2){
		die ("query2 failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row_result = mysql_fetch_assoc($result);
		$row_result2 = mysql_fetch_assoc($result2);

		if($row_result == 0){
		echo "<br> <br> User does not Exist!";
		}
		else if (!empty($row_result2)){
				echo "<br> <br> User is already a contact!";
					}
		else{
			$query3 = "INSERT INTO contact (`username_fk`, `mycontact`, `organization`) VALUES ('$fromUser','$contact','$organization')";
			echo "insert query:" . $query3;
			$insert = mysql_query( $query3 );
			if($insert)
				echo "<br> <br> Contact Added!";
			else
				die ("Could not insert into the database: <br />". mysql_error());
		}
	}
}

function my_favorites($username)
{
	$query = "select * from contact where username_fk='$username' AND organization='Favorite'";
	$result = mysql_query( $query );

	if (!$result){
		die ("my_favorites query failed. Could not query the database: <br />". mysql_error());
	} else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[2]"; ?>

				</td>
			<tr>

			<?php
		}
	}
}

function my_family($username)
{
	$query = "select * from contact where username_fk='$username' AND organization='Family'";
	$result = mysql_query( $query );

	if (!$result){
		die ("my_family query failed. Could not query the database: <br />". mysql_error());
	} else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[2]"; ?>

				</td>
			<tr>

			<?php
		}
	}
}

function my_friends($username)
{
	$query = "select * from contact where username_fk='$username' AND organization='Friend'";
	$result = mysql_query( $query );

	if (!$result){
		die ("my_friends query failed. Could not query the database: <br />". mysql_error());
	} else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[2]"; ?>

				</td>
			<tr>

			<?php
		}
	}
}

function my_others($username)
{
	$query = "select * from contact where username_fk='$username' AND organization='Other'";
	$result = mysql_query( $query );

	if (!$result){
		die ("my_others query failed. Could not query the database: <br />". mysql_error());
	} else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[2]"; ?>

				</td>
			<tr>

			<?php
		}
	}
}

function delete_contact($logged_user, $delete_user)
{
	$query = "select * from contact where username_fk='$logged_user' AND mycontact='$delete_user'";
	$result = mysql_query( $query );
	if (!$result){
		die ("query1 failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row_result = mysql_fetch_assoc($result);

		if($row_result == 0){
		echo "<br> <br> Contact Not Found!";
		}
		else{
			$query2 = "DELETE FROM contact WHERE username_fk='$logged_user' AND mycontact='$delete_user'";
			$delete = mysql_query( $query2 );

			if($delete)
				echo "<br> <br> Contact Deleted!";
			else
				die ("Could not delete record in the database: <br />". mysql_error());


		}
	}
}

function increment_view($file_id)
{
	$query = "UPDATE media SET views = views + 1 WHERE mediaid='$file_id'";
	$result = mysql_query( $query );
}

function most_views()
{
	$query = "SELECT * FROM media ORDER BY views DESC";
	$result = mysql_query( $query );
	if (!$result){
		die ("query failed. Could not query the database: <br />". mysql_error());
	}
	else {

		$count = 0;

		?>
		<div class="container">
			<div class="row">
		<?php
		while ($count < 3)
		{
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

			$url = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;

			?>
					<div class="col">
						<div class = "panel panel-default">
							<h5> <?php echo $title ?> </h5>
							<div class="img-thumbnail"> <a href="<?php echo $url;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"></a></div>
                  </div>
            	</div>
			<?php
			$count++;
		}
	?>
			</div>
		</div>
	<?php
	}
}


function new_uploads()
{
	$query = "SELECT * FROM media ORDER BY date DESC";
	$result = mysql_query( $query );
	if (!$result){
		die ("query failed. Could not query the database: <br />". mysql_error());
	}
	else {

		$count = 0;

		?>
		<div class="container">
			<div class="row">
		<?php
		while ($count < 3)
		{
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

			$url = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;

			?>
					<div class="col">
						<div class = "panel panel-default">
							<h5> <?php echo $title ?> </h5>
							<div class="img-thumbnail"> <a href="<?php echo $url;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"></a></div>
                  </div>
            	</div>
			<?php
			$count++;
		}
	?>
			</div>
		</div>
	<?php
	}
}

function browse_files($category, $type)
{

	if (($category=='All') and ($type=='All'))
	{
		$query = "SELECT * FROM media";
		echo $query;
	}
	else if(($category=='All') or ($type=='All'))
	{
		if (($category=='All'))
		{
			$query = "SELECT * FROM media WHERE media_type='$type'";
			echo $query;
		}
		else {
			$query = "SELECT * FROM media WHERE category='$category'";
			echo $query;
		}
	}
	else {
		$query = "SELECT * FROM media WHERE category='$category' AND media_type='$type'";
		echo $query;
	}

	$result = mysql_query( $query );
	if (!$result){
		die ("query failed. Could not query the database: <br />". mysql_error());
	}
	else {

		?>
		<div class="container">

		<?php
		while ($row = mysql_fetch_row($result))
		{
			//$row = mysql_fetch_row($result);
			$mediaid = $row[3];
			$filename = $row[0];
			$filenpath = $row[4];
			$title = $row[5];
			$date = $row[6];
			$description = $row[7];
			$category = $row[8];
			$keywords = $row[9];
			$views = $row[10];

			$url = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;

			?>
			<div class="row text-center">

            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
						 <div class="img-thumbnail"> <a href="<?php echo $url;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"></a></div>
      			   <p> <?php echo $title ?> </p>
                    <h6>views: <?php echo $views ?></h6>
                    <h6>upload date: <?php echo $date ?> </h6>
							<h6>keywords: <?php echo $keywords ?></h6>
                    <h6>description: <?php echo $description ?> </h6>
                    <h6>category: <?php echo $category ?> </h6>
                  <br>
                  <br>
    		  </div>
           </div>
			</div>

			<?php
		}

	}
}

function search_files($search)
{
	$query = "SELECT * FROM media WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR keywords LIKE '%$search%'";
	$result = mysql_query( $query );

	if(!$result)
	{
		die ("query failed. Could not query the database: <br />". mysql_error());
	}
	else{

		?>
		<div class="container">

		<?php
		while ($row = mysql_fetch_row($result))
		{
			//$row = mysql_fetch_row($result);
			$mediaid = $row[3];
			$filename = $row[0];
			$filenpath = $row[4];
			$title = $row[5];
			$date = $row[6];
			$description = $row[7];
			$category = $row[8];
			$keywords = $row[9];
			$views = $row[10];

			$url = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;

			?>
			<div class="row text-center">

            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">
						 <div class="img-thumbnail"> <a href="<?php echo $url;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"></a></div>
      			   <p> <?php echo $title ?> </p>
                    <h6>views: <?php echo $views ?></h6>
                    <h6>upload date: <?php echo $date ?> </h6>
							<h6>keywords: <?php echo $keywords ?></h6>
                    <h6>description: <?php echo $description ?> </h6>
                    <h6>category: <?php echo $category ?> </h6>
                  <br>
                  <br>
    		  </div>
           </div>
			</div>

			<?php
		}

	}

}

function nav_bar()
{
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
      <a class="nav-link" href="index.php">Home</a>
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
					<a class="dropdown-item" href="channel.php">Channel</a>
					<a class="dropdown-item" href="playlist.php">Playlist</a>
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
}



function send_comment($username, $fileid, $comment)
{
	$query = "INSERT INTO comment (`file_id`, `comment_content`, `username_fk`) VALUES ('$fileid','$comment','$username')";
	$result = mysql_query( $query );
	if (!$result){
		die ("send_comment failed. Could not query the database: <br />". mysql_error());
	}
}

function file_comments($fileid)
{
	$query = "select * from comment where file_id='$fileid'";
	$result = mysql_query( $query );

	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			?>
			<tr>
				<td>
					<?php echo "$row[3]"; ?>

				</td>
				<td>
					<?php echo "$row[2]"; ?>
				</td>
			<tr>

			<?php
		}

	}
}

function my_uploads($username, $category, $type)
{

	if (($category=='All') and ($type=='All'))
	{
		$query = "SELECT * FROM media WHERE username='$username'";
		echo $query;
	}
	else if(($category=='All') or ($type=='All'))
	{
		if (($category=='All'))
		{
			$query = "SELECT * FROM media WHERE media_type='$type' AND username='$username'";
			echo $query;
		}
		else {
			$query = "SELECT * FROM media WHERE category='$category' AND username='$username'";
			echo $query;
		}
	}
	else {
		$query = "SELECT * FROM media WHERE category='$category' AND media_type='$type' AND username='$username'";
		echo $query;
	}

	$result = mysql_query( $query );
	if (!$result){
		die ("query failed. Could not query the database: <br />". mysql_error());
	}
	else {

		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="container">

		<?php
		while ($row = mysql_fetch_row($result))
		{
			//$row = mysql_fetch_row($result);
			$mediaid = $row[3];
			$filename = $row[0];
			$filenpath = $row[4];
			$title = $row[5];
			$date = $row[6];
			$description = $row[7];
			$category = $row[8];
			$keywords = $row[9];
			$views = $row[10];

			$url = 'https://webapp.cs.clemson.edu/~jlhelms/MeTube_Project/image.php?id='.$mediaid;

			?>
			<div class="row text-center">

            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
                <div class = "panel panel-default">

						 <h6> <?php echo $title ?> </h6>
						 <div class="img-thumbnail"> <a href="<?php echo $url;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"></a></div>
                  <br>
                  <br>
    		  </div>
           </div>
			</div>
			</div>
			</form>

			<?php
		}
	}
}

function file_owner($username, $fileid)
{
	$query = "select username from media where mediaid='$fileid'";
	$result = mysql_query( $query );

	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		$row=mysql_fetch_row($result);

		//return true if loggedin user equals username on file
		if($username == $row[0])
		{
			return true;
		}
		else {
			return false;
		}
	}
}

function delete_file($fileid)
{
	//delete comments related to file
	$query1 = "DELETE FROM comment where file_id='$fileid'";
	$result1 = mysql_query( $query1 );
	echo $query1;

	if (!$result1){
		die ("delete_file() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		echo "Comments have been deleted!";


	//delete file
	$query = "DELETE FROM media where mediaid='$fileid'";
	$result = mysql_query( $query );
	echo $query;

	if (!$result){
		die ("delete_file() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		echo "File has been deleted!";
	}
}
}

function update_file($fileid)
{

	//delete file
	$query = "UPDATE media SET title='updatetesting' where mediaid='$fileid'";
	$result = mysql_query( $query );
	echo $query;

	if (!$result){
		die ("delete_file() failed. Could not query the database: <br />". mysql_error());
	}
	else {

		echo "File has been updated!";
	}

}







?>
