<?php
session_start();
if($_SESSION['login_id'] == null)
{
    header("Location:page22.html");
    exit;
}
include("connect.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




$quiz = $_SESSION['QUIZ'];
$sql_uni="SELECT * FROM UNIVERSITY";
$uni_list = mysqli_query($conn, $sql_uni);
$r=mysqli_num_rows($uni_list);
$u=array(0,0,0,0,0,0,0,0,0,0);
$name=array(" "," "," "," "," "," "," "," "," "," ");
$mark=array(0,0,0,0,0,0,0,0,0,0);
$c=0;
while ($row = mysqli_fetch_assoc($uni_list)){
$u[$c]=$row['UNI_ID'];
$name[$c]=$row['UNI_NAME'];
$c++;
}
$i=0;
$mar=0;
while($i<$r){
$sql_mark_list = "SELECT * FROM ANALYSIS WHERE UNI_ID=$u[$i] AND QUIZ_ID=$quiz";

$mark_list = mysqli_query($conn, $sql_mark_list);
$rc=0;

	while ($row = mysqli_fetch_assoc($mark_list)){
		$mar=$mar+$row['MARK'];
		
		$rc++;
	}
	
if($rc!==0){
$mar=$mar/$rc;}
$mark[$i]=$mar;
$mar=0;
$i++;
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
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "AVERAGE MARK OF UNIVERSITIES ON QUIZ"
	},
	axisY: {
		title: "Average Mark"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Universities",
		dataPoints: [      
			{ y: <?php echo $mark[0];?>, label: "<?php echo $name[0];?>" },
			{ y: <?php echo $mark[1];?>, label: "<?php echo $name[1];?>" },
			{ y: <?php echo $mark[2];?>, label: "<?php echo $name[2];?>" },
			{ y: <?php echo $mark[3];?>, label: "<?php echo $name[3];?>" },
			{ y: <?php echo $mark[4];?>, label: "<?php echo $name[4];?>" },
			{ y: <?php echo $mark[5];?>, label: "<?php echo $name[5];?>" },
			{ y: <?php echo $mark[6];?>, label: "<?php echo $name[6];?>" },
			
		
		
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
                         QUIZ SYSTEM</a></span>
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
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><br></p>
                    
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    
                    <br><br>
                    <div class="mbr-section-btn align-center py-2"><a class="btn btn-md btn-secondary display-4" href="timeave.php">NEXT</a></div>
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
