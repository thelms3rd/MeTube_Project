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
			
			?> 
					<div class="col">
						<div class = "panel panel-default">
							<div class="img-thumbnail"> <a href="<?php echo $filenpath;?>"><img src="<?php echo $filenpath;?>" class="img-responsive" width = "250" height="200"><onclick="javascript:saveDownload(<?php echo $result_row[4];?>);"><br>Download</onclick></a></div>
							<p> <?php echo $title ?> </p>
                    	<h6>views: <?php echo $views ?></h6>
                    	<h6>upload date: <?php echo $date ?> </h6>
							<h6>keywords: <?php echo $keywords ?></h6>
                    	<h6>description: <?php echo $description ?> </h6>
                    	<h6>category: <?php echo $category ?> </h6>
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
	
	
?>
