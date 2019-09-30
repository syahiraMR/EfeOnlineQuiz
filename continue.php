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
						header("Location: http://www.efequizonline.tk/TF.php");
						exit;
					}
					elseif ($row['TYPE']== "MA"){
						header("Location: http://www.efequizonline.tk/MA.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']==''){
						header("Location: http://www.efequizonline.tk/q4.php");
						exit;
					}	
					elseif ($row['TYPE']== "MC" && $row['h9']!=='' && $row['h11']==''){
						header("Location: http://www.efequizonline.tk/q5.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h11']!=='' && $row['h13']==''){
						header("Location: http://www.efequizonline.tk/q6.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h13']!=='' && $row['h15']==''){
						header("Location: http://www.efequizonline.tk/q7.php");
						exit;
					}
					elseif ($row['TYPE']== "MC" && $row['h15']!=='' && $row['h17']==''){
						header("Location: http://www.efequizonline.tk/q8.php");
						exit;
					}
					else{}
				}
			}
			else
			{
				
				header("Location: http://www.efequizonline.tk/last.php");
				exit;
			}
			
            
            mysqli_close($conn);
			
?>
