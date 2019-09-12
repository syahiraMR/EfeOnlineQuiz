<?php
    include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
				
            $class = $_POST["class"];
            
            $sql = "DELETE FROM CLASS WHERE CLASS_ID = $class" ;
            $sql1 = "DELETE FROM LOGIN WHERE CLASS_ID = $class";

            mysqli_select_db($conn,'id7501905_host');
            $retval = mysqli_query( $conn, $sql );
            $del= mysqli_query( $conn, $sql1 );
			
            
            if(! $retval ) {
               die('Could not delete data: ' . mysqli_error());
            }
            
			
			else
			{
				header("Location: http://icasquiz.online/page7.php");
				exit;
			}
            
            mysqli_close($conn);
			
?>