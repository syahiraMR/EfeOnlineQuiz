<?php
session_start();
if($_SESSION['login_id'] == null)
{
    header("Location: http://icasquiz.online/page22.html");
    exit;
}
include("connect.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




			$role = $_SESSION["session_role"];
				if($role == 1)
			        {
			            header("Location: http://www.efequizonline.tk/page5.php");
	                    exit;
			        }
			        else if($role == 2)
					{
			            header("Location: http://www.efequizonline.tk/page6.php");
	                    exit;
			        }
					else if($role == 3)
					{
			            header("Location: http://www.efequizonline.tk/page15.php");
	                    exit;
			        }
					else {
						header("Location: http://www.efequizonline.tk/page22.html");
						exit;
					}
?>
					
