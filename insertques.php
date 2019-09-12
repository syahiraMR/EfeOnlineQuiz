<?php

    include("connect.php");
	session_start();
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
			$question=$_POST["question"];	
            $time = $_POST["time"];
			$A = $_POST["A"];
            $B = $_POST["B"];	
            $C = $_POST["C"];
			$D = $_POST["D"];
			$answer = $_POST["answer"];	
			$id = $_SESSION['SESSION_QUIZ_ID'];
			
            $sql = "INSERT INTO QUESTION (QUIZ_ID,QUES,A,B,C,D,ANS,TIME) VALUES ('$id','$question','$A','$B','$C','$D','$answer','$time');" ;
            
			
            mysqli_select_db($conn,'id7501905_host');
			
			
            $retval = mysqli_query( $conn, $sql );
  
			if ($_SESSION['SESSION_QUES_NO']< 10){
				$_SESSION['SESSION_QUES_NO']++;
				header("Location: http://icasquiz.online/page26.php");
			}
			else
			{
				header("Location: http://icasquiz.online/page41.php");
			}
            mysqli_close($conn);
			
?>