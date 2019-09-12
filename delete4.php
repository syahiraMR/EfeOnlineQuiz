<?php
    include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
				
            $login = $_POST["login"];
            
            $sql = "DELETE FROM LOGIN WHERE LOGIN_ID = $login" ;
            $sql1 = "DELETE FROM ANALYSIS WHERE LOGIN_ID = $login";
			$sql2= "DELETE FROM ANA_TIME WHERE LOGIN_ID = $login" ;
          
            mysqli_select_db($conn,'id7501905_host');
            $retval = mysqli_query( $conn, $sql );
            $del= mysqli_query( $conn, $sql1 );
			$retval1 = mysqli_query( $conn, $sq2 );
           
            
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