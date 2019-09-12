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

$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c10=0;

$quiz = $_SESSION['QUIZ'];
$sql_ana_list = "SELECT * FROM QUESTION WHERE QUIZ_ID=$quiz";


$ana_list = mysqli_query($conn, $sql_ana_list);
$row = mysqli_fetch_assoc($ana_list);
$ans = $row['ANS'];


$sql_ana_list = "SELECT * FROM ANALYSIS WHERE QUIZ_ID=$quiz";


$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['1']== NULL) $c1++;
if ($row['1']== 'w') $c1++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['2']== NULL) $c2++;
if ($row['2']== 'w') $c2++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['3']== NULL) $c3++;
if ($row['3']== 'w') $c3++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['4']== NULL) $c4++;
if ($row['4']== 'w') $c4++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['5']== NULL) $c5++;
if ($row['5']== 'w') $c5++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['6']== NULL) $c6++;
if ($row['6']== 'w') $c6++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['7']== NULL) $c7++;
if ($row['7']== 'w') $c7++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['8']== NULL) $c8++;
if ($row['8']== 'w') $c8++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['9']== NULL) $c9++;
if ($row['9']== 'w') $c9++;
}
$ana_list = mysqli_query($conn, $sql_ana_list);
while ($row = mysqli_fetch_assoc($ana_list)){
if ($row['10']== NULL) $c10++;
if ($row['10']== 'w') $c10++;
}



$hardest = array($c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10); 
$hard=0;
$no=1;

for($i=0;$i<10;$i++){
if ($hardest[$i]>$hard){
$hard=$hardest[$i];
$no=$i+1;
}
}


$A=0;
$B=0;
$C=0;
$D=0;
$N=0;

$quiz = $_SESSION['QUIZ'];
$sql_ana_list = "SELECT * FROM ANA_ANS WHERE QUIZ_ID=$quiz";
$ana_list = mysqli_query($conn, $sql_ana_list);

while ($row = mysqli_fetch_assoc($ana_list)){
    
if($row[$no]=="A"){$A++;}
elseif($row[$no]=="B"){$B++;}
elseif($row[$no]=="C"){$C++;}
elseif($row[$no]=="D"){$D++;}
else {$N++;}
}


$ALL=$A+$B+$C+$D+$N;
$AA=$A/$ALL*100;
$BB=$B/$ALL*100;
$CC=$C/$ALL*100;
$DD=$D/$ALL*100;
$NN=$N/$ALL*100;

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
  <meta name="description" content="Web Page Generator Description">
  <title>QuizMark</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
  
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "PERCENTAGE OF ANSWERS"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php echo $AA ?>, label: "A"},
			{y: <?php echo $BB ?>, label: "B"},
			{y: <?php echo $CC ?>, label: "C"},
			{y: <?php echo $DD ?>, label: "D"},
			{y: <?php echo $NN ?>, label: "NULL"}
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
  <section class="menu cid-r9lF8OHc2I" once="menu" id="menu1-y">

    

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

<section class="engine"><a href="https://mobiri.se/r">free bootstrap template</a></section><section class="header12 cid-radiJVxXzH mbr-fullscreen" id="header12-z">

    

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(255, 255, 255);">
    </div>

    <div class="container  ">
            <div class="media-container">
                <div class="col-md-12 align-center">
                    <h1 class="mbr-section-title pb-3 mbr-white mbr-bold mbr-fonts-style display-1"><br>QUIZ ANALYSIS</h1>
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><br>THE HARDEST QUESTION: <?php echo $no?></p>
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">ANSWER : <?php echo $ans?></p>
                    <br>
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    
                    <br>
                    <div class="mbr-section-btn align-center py-2"><a class="btn btn-md btn-secondary display-4" href="ana_atime.php">NEXT</a></div>
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