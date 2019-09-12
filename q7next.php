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
		   
			
			$h2=$_POST["h2"];
			$h4=$_POST["h4"];
			$h6=$_POST["h6"];
			$h8=$_POST["h8"];
			$h10=$_POST["h10"];
			$h12=$_POST["h12"];
			$h14=$_POST["h14"];
			
			
			$sql2= "SELECT * FROM TEST WHERE QUES_ID= '$ques_id';";
			$result = mysqli_query( $conn, $sql2 );
			$row = $result->fetch_assoc();
			
			if ($row['h2']=='correct' && $_POST["h2"]==0){$ans=0;}
			elseif ($row['h2']=='incorrect' && $_POST["h2"]==1){$ans=0;}
			elseif ($row['h4']=='correct' && $_POST["h4"]==0){$ans=0;}
			elseif ($row['h4']=='incorrect' && $_POST["h4"]==2){$ans=0;}
			elseif ($row['h6']=='correct' && $_POST["h6"]==0){$ans=0;}
			elseif ($row['h6']=='incorrect' && $_POST["h6"]==3){$ans=0;}
			elseif ($row['h8']=='correct' && $_POST["h8"]==0){$ans=0;}
			elseif ($row['h8']=='incorrect' && $_POST["h8"]==4){$ans=0;}
			elseif ($row['h10']=='correct' && $_POST["h10"]==0){$ans=0;}
			elseif ($row['h10']=='incorrect' && $_POST["h10"]==5){$ans=0;}
			elseif ($row['h12']=='correct' && $_POST["h12"]==0){$ans=0;}
			elseif ($row['h12']=='incorrect' && $_POST["h12"]==6){$ans=0;}
			elseif ($row['h14']=='correct' && $_POST["h14"]==0){$ans=0;}
			elseif ($row['h14']=='incorrect' && $_POST["h14"]==7){$ans=0;}
			else {$ans=1;}
			
			$array = array("$h2", "$h4", "$h6", "$h8","$h10","$h12","$h14");
			$array_data = implode(",", $array);
	
			$sql=  "UPDATE `TEST_ANA` SET `$ques_no` = '$ans' WHERE `TEST_ANA`.`ID` = $ana_id; " ;
			$sql1= "UPDATE `TEST_ANS` SET `$ques_no` = '" . $array_data . "' WHERE `TEST_ANS`.`ID` = $ana_id; " ;
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
						header("Location: http://icasquiz.online/TF.php");
						exit;
					}
					elseif ($row['TYPE']== "MA"){
						header("Location: http://icasquiz.online/MA.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']==''){
						header("Location: http://icasquiz.online/q4.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']!=='' && $row['h11']==''){
						header("Location: http://icasquiz.online/q5.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h11']!=='' && $row['h13']==''){
						header("Location: http://icasquiz.online/q6.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h13']!=='' && $row['h15']==''){
						header("Location: http://icasquiz.online/q7.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h15']!=='' && $row['h17']==''){
						header("Location: http://icasquiz.online/q8.php");
						exit;
					}
					else{}
				}
			}
			else
			{
				
				header("Location: http://icasquiz.online/last.php");
				exit;
			}
			
            
            mysqli_close($conn);
			
?>