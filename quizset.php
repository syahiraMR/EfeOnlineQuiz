<?php

    include("connect.php");
	session_start();
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
			$quiz=$_POST["quiz"];	
			$login=$_SESSION["login_id"];
		
			$sql411="SELECT * FROM LOGIN WHERE LOGIN_ID=$login";
			$result = mysqli_query( $conn, $sql411 );
			$row1 = mysqli_fetch_assoc($result);
			$class =$row1['CLASS_ID'];
			$uni =$row1['UNI_ID'];
			$_SESSION['totaltime']=0;
			
			
            $sql = "SELECT * FROM QUESTION WHERE QUIZ_ID= $quiz";
            $sql1 = "INSERT INTO ANALYSIS (QUIZ_ID,LOGIN_ID,UNI_ID,CLASS_ID) VALUES ('$quiz','$login','$uni','$class');" ;

			$sql4 = "SELECT * FROM ANALYSIS WHERE QUIZ_ID= $quiz AND LOGIN_ID= $login";
            
            mysqli_select_db($conn,'id7501905_host');
			
			$result = mysqli_query( $conn, $sql4 );
		
			if (mysqli_num_rows($result)>0 ){
			
				header("Location: http://icasquiz.online/page63.php");
				exit;
			}
			
			$ques=99999999999;
			$result = mysqli_query( $conn, $sql );
				while($row = mysqli_fetch_assoc($result)){
					if ($row['QUES_ID']<$ques){
						$ques=$row['QUES_ID'];
					}
				}
			$_SESSION["SESSION_QUIZ_ID"] = $quiz;
			$_SESSION["SESSION_QUES_NO"] = $ques;
			$_SESSION["SESSION_QUES"] = 1;
			$_SESSION["SESSION_MARK"] = 0;
			
			$retval = mysqli_query( $conn, $sql1 );
							$no=0;
			$result = mysqli_query( $conn, $sql4 );
				while($row = mysqli_fetch_assoc($result)){
					if ($row['ANA_ID']>$no){
						$no=$row['ANA_ID'];
					}
				}
			
			$_SESSION["SESSION_ANA_ID"]=$no;
			$sql2 = "INSERT INTO ANA_TIME(ANA_ID,QUIZ_ID,LOGIN_ID,UNI_ID,CLASS_ID) VALUES ('$no','$quiz','$login','$uni','$class');" ;
			$sql3 = "INSERT INTO ANA_ANS (ANA_ID,QUIZ_ID,LOGIN_ID,UNI_ID,CLASS_ID) VALUES ('$no','$quiz','$login','$uni','$class');" ;
			$ret = mysqli_query( $conn, $sql2 );
			$retv = mysqli_query( $conn, $sql3 );
            
            if(! $result ) {
               die('Could not add data: ' . mysqli_error($conn));
            }
            
			
			else
			{
				header("Location: http://icasquiz.online/page30.php");
				exit;
			}
			
            mysqli_close($conn);
			
?>