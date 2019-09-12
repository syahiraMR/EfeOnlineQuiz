<?php
    include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
	session_start();
			$test=$_POST["test_id"] ;
			$ques_id=$_POST["ques"] ;
			$ques_no= $_POST["id"]; 
			$login= $_POST["login"];
			$ana_id=$_POST["ana_id"];
		

			$testing_id=$_SESSION['testing_id'];
            
            $sql15="SELECT * FROM TESTING WHERE ID= $testing_id";
			$resul = mysqli_query( $conn, $sql15 );
			$row5 = $resul->fetch_assoc();
			$date = DateTime::createFromFormat('Y-m-d H:i:s', "$row5[SYS_START]");
			//$time=$_SESSION["start"];
			
			
            $now = new DateTime();

            $diff = $now->getTimestamp() - $date->getTimestamp();
			$diff1=$diff/1000;
		
			$sql12="SELECT * FROM TEST_ANA WHERE ID= $ana_id";
			
		
		
			
			$mark=0;
			$resul = mysqli_query( $conn, $sql12 );
			$row1 = $resul->fetch_assoc();
			for ($i=1;$i<101;$i++){
			if($row1[$i]==1){
			$mark++;}
			}

	
			$sql20=  "UPDATE `TEST_ANA` SET `MARK` = '$mark' WHERE `TEST_ANA`.`ID` = $ana_id; " ;
			$sql11=  "UPDATE `TEST_ANA` SET `TIME` = '$diff' WHERE `TEST_ANA`.`ID` = $ana_id; " ;
		
            $resu = mysqli_query( $conn, $sql20 );
            $resultt = mysqli_query( $conn, $sql11 );
				
				header("Location: http://icasquiz.online/page4.php");
				exit;
			
			
            
            mysqli_close($conn);
			
?>