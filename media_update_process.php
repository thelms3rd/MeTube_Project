<?php
session_start();
include_once "function.php";

/******************************************************
*
* upload document from user
*
*******************************************************/

$username=$_SESSION['username'];





					//update media table
					$insert = "UPDATE media SET title="testingUpdate" WHERE ";
					$queryresult = mysql_query($insert)
						  or die("Insert into Media error in media_upload_process.php " .mysql_error());
					$result="0";
					chmod($upfile, 644);



?>

<meta http-equiv="refresh" content="0;url=browse.php?result=<?php echo $result;?>">
