<?php
    include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
	session_start();
			$quiz= $_SESSION["SESSION_QUIZ_ID"] ;
			$ques_id=$_SESSION["SESSION_QUES_NO"] ;
			$ques_no= $_SESSION["SESSION_QUES"]; 
			$login= $_SESSION["login_id"];
			$ana_id=$_SESSION["SESSION_ANA_ID"];
			$time=$_SESSION["time"];
			
			
            $now = new DateTime();

            $diff = $now->getTimestamp() - $time->getTimestamp();
			$_SESSION["totaltime"]=$_SESSION["totaltime"]+$diff;
			$totaltime=$_SESSION["totaltime"];
		   
			
			$sql=  "UPDATE `ANALYSIS` SET `$ques_no` = 't' WHERE `ANALYSIS`.`ANA_ID` = $ana_id; " ;
			$sql1= "UPDATE `ANA_ANS` SET `$ques_no` = 'B' WHERE `ANA_ANS`.`ANA_ID` = $ana_id; " ;
			$sql2= "SELECT * FROM QUESTION WHERE QUES_ID= '$ques_id';";
			$sql5= "UPDATE `ANALYSIS` SET `$ques_no` = 'w' WHERE `ANALYSIS`.`ANA_ID` = $ana_id; " ;
			$sql6= "UPDATE `ANA_TIME` SET `$ques_no` = '$diff' WHERE `ANA_TIME`.`ANA_ID` = $ana_id;";
			$sql7= "UPDATE `ANA_TIME` SET T_TIME = '$totaltime' WHERE `ANA_TIME`.`ANA_ID` = $ana_id;";
			
			echo $diff;
			echo $sql6;
			echo $sql7;
			
			
            mysqli_select_db($conn,'id7501905_host');
            $ana_id=0;
		
            
			$ret = mysqli_query( $conn, $sql1 );
			$rets = mysqli_query( $conn, $sql6 );
			$reta = mysqli_query( $conn, $sql7);
			$result = mysqli_query( $conn, $sql2 );
			$row = $result->fetch_assoc();
			if ($row['ANS']=='B'){
			    $retval = mysqli_query( $conn, $sql );
				$_SESSION["SESSION_MARK"]++;
				$mark=$_SESSION["SESSION_MARK"] ;
			    $ana_id=$_SESSION["SESSION_ANA_ID"];
			    $sql3= "UPDATE `ANALYSIS` SET MARK = '$mark' WHERE `ANALYSIS`.`ANA_ID` = $ana_id; " ;
			    $retv = mysqli_query( $conn, $sql3 );
			}
			
			else{
			    $retval = mysqli_query( $conn, $sql5 );
			}
			
			
			$_SESSION["SESSION_QUES_NO"]++;
			$_SESSION["SESSION_QUES"]++;
			$ques_id1=$_SESSION["SESSION_QUES_NO"] ;
			$sql4= "SELECT * FROM QUESTION WHERE QUES_ID= '$ques_id1';";
			$row = $result->fetch_assoc();
			$result = mysqli_query( $conn, $sql4 );
			$row = $result->fetch_assoc();
			
			if ($row['QUIZ_ID']==$quiz){
				header("Location: http://icasquiz.online/page30.php");
			}
			else
			{
				
				header("Location: http://icasquiz.online/page42.php");
				exit;
			}
			
            
            mysqli_close($conn);
			
?>