<?php
session_start();
if($_SESSION['login_id'] == null)
{
    header("Location: http://icasquiz.online/page22.html");
    exit;
}
include("connect.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$_SESSION['time']=new DateTime();

$ques=$_SESSION['SESSION_QUES_NO'];
$id=$_SESSION['SESSION_QUES'];
$sql= "SELECT * FROM QUESTION WHERE QUES_ID= $ques";
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
  <meta name="description" content="Web Site Generator Description">
  <title>QUESTION</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
  
  
</head>
<body>

<section class="menu cid-r9lF8OHc2I" once="menu" id="menu1-j">

    

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
    <section class="cid-r9cFw0Bzci mbr-fullscreen mbr-parallax-background" id="header15-8">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);"></div>
    
    
    <div class="container align-right">
	<div class="row">

    <div class="mbr-blue col-lg-8 col-md-7 content-container">
	
		
        <h1 class="mbr-section-title align-left mbr-bold pb-3 mbr-fonts-style display-1"><br>Question <?php echo $id ?></h1>


		<p class="mbr-text align-left display-5 pb-3 mbr-fonts-style">
		<?php
			$result = mysqli_query( $conn, $sql );
			$row = $result->fetch_assoc();
			echo $row['QUES'];
			?>
				
		</p><br><br<br>
		
<p id=timer></p>
<script type="text/javascript">
    var timeoutHandle;
    function countdown(minutes, seconds) {
        function tick() {
            var counter = document.getElementById("timer");
            counter.innerHTML =
                minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            seconds--;
            if (seconds >= 0) {
                timeoutHandle = setTimeout(tick, 1000);
            } else {
                if (minutes >= 1) {
                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                    setTimeout(function () {
                        countdown(minutes - 1, 59);
                    }, 1000);
                }
            }
        }
        tick();
    }
    <?php 
	$result = mysqli_query( $conn, $sql );
			$row = $result->fetch_assoc();
			$time = $row['TIME'];
			$min =$time/60;
			$sec =$time%60;
    ?>
    var min=Math.floor(<?php echo $min ?>);
    var sec=<?php echo $sec ?>;
    countdown(min, sec);
    
    setTimeout(function(){
        window.location.href = "http://icasquiz.online/timeout.php";
    },<?php 
    $result = mysqli_query( $conn, $sql );
			$row = $result->fetch_assoc();
			$time = $row['TIME']*1000;
			echo $time?>);
</script>
<p class="mbr-text align-middle display-5 pb-3 mbr-fonts-style">seconds left!</p>
	</div>	
	<div class="col-lg-4 col-md-5">
    <div class="form-container">
        <br><br>
        <div class="media-container-column" data-form-type="formoid">
	<form action="A.php" method="post">
				 <p >
                    <button type="submit" name="submit" id="submit" value="submit" style="background-color:white;color: black;  border: 10px solid #009FFF;width: 300px; height: 100px;;
                     font-size: 18px;"> A.
					<?php
						$result = mysqli_query( $conn, $sql );
						$row = mysqli_fetch_assoc($result);
						echo $row['A'];
					?>
					</button>
                 </p>
				</form>
	<form action="B.php" method="post">
				 <p align="right">
                    <button type="submit" name="submit" id="submit" value="submit" style="background-color:white;color: black;border:10px solid #0000FF; width: 300px; height: 100px;;
                     font-size: 18px;"> B.
					<?php
						$result = mysqli_query( $conn, $sql );
						$row = $result->fetch_assoc();
						echo $row['B'];
					?>
					 </button>
                 </p>
				</form>
	<form action="C.php" method="post">
				 <p align="left">
                    <button type="submit" name="submit" id="submit" value="submit" style="background-color:white;color: black;border:10px solid #009FFF; width: 300px; height: 100px;;
                     font-size: 18px;"> C.
					<?php
						$result = mysqli_query( $conn, $sql );
						$row = $result->fetch_assoc();
						echo $row['C'];
					?>
					 </button>
                 </p>
				</form>
	
		<form action="D.php" method="post">
				 <p align="right">
                    <button type="submit" name="submit" id="submit" value="submit" style="background-color:white;color: black;border:10px solid #0000FF; width: 300px; height: 100px;;
                     font-size: 18px;"> D 
					 <?php
						$result = mysqli_query( $conn, $sql );
						$row = $result->fetch_assoc();
						echo $row['D'];
						?>
					 </button>
                 </p>
				</form>
	

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