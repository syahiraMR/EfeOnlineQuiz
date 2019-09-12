<?php
    include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}
	session_start();
	

  //INSERT INTO SYS_CONTROL VALUES('TEST', '2018-09-18 13:44:00', '2018-09-19 22:44:00', 'SCHEDULED')
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  $id = $_POST['quiz'];
  $class = $_POST['class'];
  $start = str_replace("T"," ",$_POST['start']);
  
  
   $date = new DateTime($start);
  $date->modify('-8 hours');
  $sys_start = $date->format('Y-m-d H:i:s');
  $end = str_replace("T"," ",$_POST['end']);
  $date1 = new DateTime($end);
  $date1->modify('-8 hours');
  $sys_end = $date1->format('Y-m-d H:i:s');
  $uni=$_SESSION['session_uni_id'];
  $sql1 = "SELECT * FROM QUIZ WHERE QUIZ_ID= $id " ;
  $result = mysqli_query( $conn, $sql1 );
  $row = $result->fetch_assoc();
  $name=$row['NAME'];
  $insert_sql = "INSERT INTO QUIZZING (QUIZ_ID, NAME,START,SYS_START,T_END,SYS_END,UNI,CLASS) VALUES('".$id."','".$name."','".$start."','".$sys_start."','".$end."','".$sys_end."','".$uni."','".$class."')";
  $insert_success = mysqli_query($conn, $insert_sql);
  
  if($insert_success)
  {
     echo "<script>alert('SUCCESS: Quiz ".$id." is added into ICAS system to START at: ".$start." & END at : ".$end."')</script>";
	 //header("Location: http://icasquiz.online/page16.php");
  }
  else
  {
     echo "<script>alert('ERROR: Quiz ".$id." is NOT ADDED into ICAS system.')</script>";
	 //header("Location: http://icasquiz.online/page16.php");
  }
?>

<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.2, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets2/images/logo4.png" type="image/x-icon">
  <meta name="description" content="Website Builder Description">
  <title>INFO ADDED</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-radCrocgP3" once="menu" id="menu1-17">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="page2.html" target="_blank">
                        ICAS QUIZ SYSTEM</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                     <a class="nav-link link text-white display-4" href="index.php" target="_blank">
                        
                        About Us
                    </a>
                </li></ul>
            
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobiri.se/g">how to build a site for free</a></section><section class="header12 cid-radCxPc9oS mbr-fullscreen" id="header12-18">

    

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(255, 255, 255);">
    </div>

    <div class="container  ">
            <div class="media-container">
                <div class="col-md-12 align-center">
                    <h1 class="mbr-section-title pb-3 mbr-white mbr-bold mbr-fonts-style display-1"><br><br>QUIZ HAS BEEN SET.</h1>
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">Thank you</p>
                    <div class="mbr-section-btn align-center py-2"><a class="btn btn-md btn-secondary display-4" href="page18.php">ACTIVE QUIZ LIST</a> <a class="btn btn-md btn-secondary display-4" href="page15.php">HOMEPAGE</a></div>

                    <div class="icons-media-container mbr-white">
                        <div class="card col-12 col-md-6">
                            
                            <h5 class="mbr-fonts-style display-5">&nbsp;</h5>
                        </div>

                        <div class="card col-12 col-md-6">
                            
                            <h5 class="mbr-fonts-style display-5">&nbsp;</h5>
                        </div>

                        

                        
                    </div>
                </div>
            </div>
    </div>

    
</section>

<section class="features4 cid-radnylQtWb" id="features4-11">
    
         

    
    <div class="container">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7"><strong>
                            ICAS QUIZ SYSTEM</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">Final Year Project,<br>Networking.<br><br>2018 © Copyright, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>All Right Reserved.<br></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7"><strong>
                            Developer</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">LEE JUN KIT&nbsp;<br><br>Bachelor Computer <br>Science Networking,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>FSKTM, UPM.</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7"><strong>Supervisor</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">Mr. Mohd. Noor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Derahman,<br><br>Lecturer FSKTM, <br>UPM<br></p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-3">
                <div class="card-wrapper media-container-row">
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7"><strong>
                            Contact</strong></h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Phone: &nbsp; &nbsp;0185727077<br><br>Visit us at University <br>Putra Malaysia, 43400 &nbsp;&nbsp;&nbsp;<br>Serdang, Selangor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <script src="assets2/web/assets/jquery/jquery.min.js"></script>
  <script src="assets2/popper/popper.min.js"></script>
  <script src="assets2/tether/tether.min.js"></script>
  <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets2/smoothscroll/smooth-scroll.js"></script>
  <script src="assets2/dropdown/js/script.min.js"></script>
  <script src="assets2/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets2/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets2/theme/js/script.js"></script>
  
  
</body>
</html>
