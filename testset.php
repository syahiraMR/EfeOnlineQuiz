<?php

    include("connect.php");
	session_start();
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
			
			$_SESSION['testing_id'] = $_POST['testing_id'];
			$testing_id=$_POST['testing_id'];
			$sql41="SELECT * FROM TESTING WHERE ID=$testing_id";
			echo $sql41;
			$result = mysqli_query( $conn, $sql41 );
			$row = mysqli_fetch_assoc($result);
			$test = $row['TEST_ID'];
			$login=$_SESSION["login_id"];
			$sql411="SELECT * FROM LOGIN WHERE LOGIN_ID=$login";
			$result = mysqli_query( $conn, $sql411 );
			$row1 = mysqli_fetch_assoc($result);
			$class =$row1['CLASS_ID'];
			$uni =$row1['UNI_ID'];
		    $_SESSION['start']=new DateTime();
			$_SESSION['TEST_ID']=$test;
			
			
            $sql = "SELECT * FROM TEST WHERE TEST_ID= $test";
            $sql1 = "INSERT INTO TEST_ANA (TEST_ID,LOGIN_ID,UNI_ID,CLASS_ID) VALUES ('$test','$login','$uni','$class');" ;

			$sql4 = "SELECT * FROM TEST_ANA WHERE TEST_ID= $test AND LOGIN_ID= $login";
            
            mysqli_select_db($conn,'id7501905_host');
			
			$result = mysqli_query( $conn, $sql4 );
		    if (mysqli_num_rows($result)==0){
		        $retval = mysqli_query( $conn, $sql1 );
		    }
		    					$no=0;
			$result = mysqli_query( $conn, $sql4 );
				while($row = mysqli_fetch_assoc($result)){
					if ($row['ID']>$no){
						$no=$row['ID'];
					}
				}
			
			$_SESSION["SESSION_ANA_ID"]=$no;
		    
			$ques=99999999999;
			$result = mysqli_query( $conn, $sql );
				while($row = mysqli_fetch_assoc($result)){
					if ($row['QUES_ID']<$ques){
						$ques=$row['QUES_ID'];
					}
				}
			$_SESSION["SESSION_TEST_ID"] = $test;
			$_SESSION["SESSION_QUES_NO"] = $ques;
			$_SESSION["SESSION_QUES"] = 1;
			
			
		
		
			$sql2 = "SELECT * FROM TEST WHERE TEST_ID=$test";
			$sql3 = "INSERT INTO TEST_ANS (ID,TEST_ID,LOGIN_ID,UNI_ID, CLASS_ID) VALUES ('$no','$test','$login','$uni','$class');" ;
			
			$retv = mysqli_query( $conn, $sql3 );
            
            if(! $result ) {
               die('Could not add data: ' . mysqli_error($conn));
            }
            
			
			else
			{
			$result1 = mysqli_query( $conn, $sql2 );
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
			
            mysqli_close($conn);
			
?>