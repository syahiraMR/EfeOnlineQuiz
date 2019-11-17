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
		

			
			//$time=$_SESSION["time"];
			
			
            //$now = new DateTime();

            //$diff = $now->getTimestamp() - $time->getTimestamp();
			//$_SESSION["totaltime"]=$_SESSION["totaltime"]+$diff;
			//$totaltime=$_SESSION["totaltime"];	
			$MA=$_POST["MA"];
			$sql2= "SELECT * FROM TEST WHERE QUES_ID= '$ques_id';";
			$result = mysqli_query( $conn, $sql2 );
			$row = $result->fetch_assoc();
			
			if ($row['h2']=='correct' && $_POST["MA"]=="1"){$ans=1;}
			elseif ($row['h4']=='correct' && $_POST["MA"]=="2"){$ans=1;}
			elseif ($row['h6']=='correct' && $_POST["MA"]=="3"){$ans=1;}
			elseif ($row['h8']=='correct' && $_POST["MA"]=="4"){$ans=1;}
			
			else {$ans=0;}
	
			$sql=  "UPDATE `TEST_ANA` SET `$ques_no` = '$ans' WHERE `TEST_ANA`.`ID` = $ana_id; " ;
			$sql1= "UPDATE `TEST_ANS` SET `$ques_no` = '$MA' WHERE `TEST_ANS`.`ID` = $ana_id; " ;
            $resul = mysqli_query( $conn, $sql );
            $resu = mysqli_query( $conn, $sql1 );
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
			$ques_id++;
			$ques_no++;
			
			$sql4= "SELECT * FROM TEST WHERE QUES_ID= '$ques_id';";
			
						
			$_SESSION['SESSION_QUES_NO']=$ques_id;
			$_SESSION['SESSION_QUES']=$ques_no;
			$_SESSION["login_id"]=$login;
			$_SESSION["SESSION_ANA_ID"]=$ana_id;
			$_SESSION['TEST_ID']=$test;
			
			$result = mysqli_query( $conn, $sql4 );
			$row = $result->fetch_assoc();
			echo  $ques_id;
			if ($row['TEST_ID']==$test){
				$sql5 = "SELECT * FROM TEST WHERE QUES_ID=$ques_id";
					$result1 = mysqli_query( $conn, $sql5 );
				while($row = mysqli_fetch_assoc($result1)){
					if ($row['TYPE']== "TF"){
						header("Location: TF.php");
						exit;
					}
					elseif ($row['TYPE']== "MA"){
						header("Location: MA.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']==''){
						header("Location: q4.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']!=='' && $row['h11']==''){
						header("Location: /q5.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h11']!=='' && $row['h13']==''){
						header("Location: q6.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h13']!=='' && $row['h15']==''){
						header("Location: q7.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h15']!=='' && $row['h17']==''){
						header("Location: q8.php");
						exit;
					}
					else{}
				}
			}
			else
			{
					header("Location: last.php");
				exit;
				
			}
			
            
            mysqli_close($conn);
			
?>
