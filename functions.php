<?php

    include("connect.php");
	session_start();
	//connection string
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
	//retrive file name
	$name=$_POST["name"];
	$sql1= "INSERT INTO TESTID (NAME) VALUES ('$name')";
	$result1 = mysqli_query($conn, $sql1);
	$sql2= "SELECT TEST_ID FROM TESTID WHERE NAME= '$name';";
	$result2 = mysqli_query( $conn, $sql2 );
	$row = $result2->fetch_assoc();
	$test_id = $row['TEST_ID'];
	
	
	 if(isset($_POST["Import"])){
		//temparary file name to store file
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");

	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {

				$temp_array = array();
				//$temp_array = array_fill(0, 18, NULL);
				for($i=0;$i<19;$i++){
				    if($i<sizeof($getData))
				    array_push($temp_array, $getData[$i]);
				    else
				    array_push($temp_array,'');
				}

				print_r($temp_array);
				//sql query to insert into database
	            $sql = "INSERT into TEST (TEST_ID,TYPE,QUESTION,h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h15,h16) 
                   values ('$test_id','".$temp_array[0]."','".$temp_array[1]."','".$temp_array[2]."','".$temp_array[3]."','".$temp_array[4]."','".$temp_array[5]."','".$temp_array[6]."','".$temp_array[7]."','".$temp_array[8]."','".$temp_array[9]."','".$temp_array[10]."','".$temp_array[11]."','".$temp_array[12]."','".$temp_array[13]."','".$temp_array[14]."','".$temp_array[15]."','".$temp_array[16]."','".$temp_array[17]."')";
				echo $sql;
                   $result = mysqli_query($conn, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
						    
						  </script>";
				   // header("Location: http://www.efequizonline.tk/file.php");
	                    exit;
				}
			//header("Location: http://www.efequizonline.tk/page106.php");	
	         }
			 
	         fclose($file);
	        
	                    
		 }
	}	 
			?>
