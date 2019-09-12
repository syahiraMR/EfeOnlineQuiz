<?php
    include("connect.php");
    session_start();
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
			$name=$_POST["name"];	
            
            $sql = "INSERT INTO QUIZ (NAME) VALUES ('$name');" ;
            
			
            mysqli_select_db($conn,'id7501905_host');
            $retval = mysqli_query( $conn, $sql );
			$sql1= "SELECT QUIZ_ID FROM QUIZ WHERE NAME= '$name';";
			$result = mysqli_query( $conn, $sql1 );
			$row = $result->fetch_assoc();
			$quiz_id = $row['QUIZ_ID'];
			$ques_no = 1;
			$_SESSION["SESSION_QUIZ_ID"] = $quiz_id;
			$_SESSION["SESSION_QUES_NO"] = $ques_no;
			
            if(! $retval ) {
               die('Could not add data: ' . mysqli_error($conn));
            }
            
			
			else
			{
				header("Location: http://icasquiz.online/page26.php");
				exit;
			}
            
            mysqli_close($conn);
			
?>