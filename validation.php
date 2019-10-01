<?php 
	include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}

	$login_id = $_POST["name"];
	$name = "";
	$password = $_POST["password"];
	$role = "";
	$uni_id = "";
	$class_id = "";
	
	$sql = "SELECT NAME,ROLE,UNI_ID,CLASS_ID FROM `login` WHERE LOGIN_ID = '".$login_id."' AND PASSWORD = '".$password."' ";

	$user_data = mysqli_query($conn, $sql);

		if (mysqli_num_rows($user_data) > 0) 
		{
	    session_start();
		
			    while($row = $user_data->fetch_assoc())
			    {
	 				
			       //set session varibles
			        $_SESSION["login_id"] = $login_id ; 
			        $_SESSION["password"] = $password ;
			        $_SESSION["session_name"] = $name = $row['NAME'];
			        $_SESSION["session_role"] = $role=$row['ROLE'];
			        $_SESSION["session_uni_id"] = $uni_id=$row['UNI_ID'];
			        $_SESSION["session_class_id"] = $class_id=$row['CLASS_ID'];

			       
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
					else if($role == 4)
					{
			            header("Location: http://www.efequizonline.tk/page4.php");
	                    exit;
			        }
					
			    }
		}	
				
		else
		{
			header("Location: http://www.efequizonline.tk/page22.html");
			exit;
		}
	
mysqli_close($conn);
?>

