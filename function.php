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
	$query = "select * from account where username='$toUsername'";
	$result = mysql_query( $query );
	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}	
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
		echo "<br> <br> User does not Exist!";
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
	echo $query;
	if (!$result){
		die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
	}	
	else {
		
		//cycle through the rows to print
		while ($row=mysql_fetch_row($result))
		{
			echo "Sent from: $row[2]";
			echo "Message: $row[3]";
			
			
		}
		
	}
}
	
	
?>
