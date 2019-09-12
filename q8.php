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

$ques=$_SESSION['SESSION_QUES_NO'];
$id=$_SESSION['SESSION_QUES'];
$test_id=$_SESSION['TEST_ID'];
$login= $_SESSION["login_id"];
$ana_id=$_SESSION["SESSION_ANA_ID"];
$sql= "SELECT * FROM TEST WHERE QUES_ID= $ques";
$testing_id=$_SESSION['testing_id'];
$sql1= "SELECT * FROM TESTING WHERE ID= $testing_id";
$result = mysqli_query( $conn, $sql1 );
$row = $result->fetch_assoc();
$sql2="SELECT * FROM TEST_ANS WHERE ID= $ana_id";
$id=$_SESSION['SESSION_QUES'];
$end = $row['T_END'];
$end1=new DateTime($end);
$resul = mysqli_query( $conn, $sql2 );
$row1 = $resul->fetch_assoc();
if($row1[$id]!==NULL){
$data=$row1[$id];
$array = explode(",", $data);
$h2=$array[0];
$h4=$array[1];
$h6=$array[2];
$h8=$array[3];
$h10=$array[4];
$h12=$array[5];
$h14=$array[6];
$h16=$array[7];
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
  <title>QUESTION</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo date_format($end1, 'M d, Y H:i:s');?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    window.location.href = "http://icasquiz.online/timeout1.php";
  }
}, 1000);
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

<section class="header1 cid-rb4zLHVRKO mbr-fullscreen mbr-parallax-background" id="header1-1b">

    

    

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-black col-md-10">
                <br><strong><p class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2" id="demo"></strong></p>
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    <br>QUESTION &nbsp; &nbsp;<?php echo $id ?><br>
                </h1>
                <p class="mbr-text align-left pb-3 mbr-fonts-style display-5">
                    <?php
					$result = mysqli_query( $conn, $sql );
					$row = $result->fetch_assoc();
					echo $row['QUESTION'];
					?>
                </p>
				<form method="post">
				
				<input type="hidden" name="id" value="<?php echo $id ?>" />
				<input type="hidden" name="ques" value="<?php echo $ques ?>" />
				<input type="hidden" name="login" value="<?php echo $login ?>" />
				<input type="hidden" name="ana_id" value="<?php echo $ana_id ?>" />
				<input type="hidden" name="test_id" value="<?php echo $test_id ?>" />
				
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h2" value="0"><input type="checkbox" name="h2" value="1" <?php if($row1[$id]!==NULL){if($h2 !=='0') {echo 'checked';}}?>> <?php echo $row['h1']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h4" value="0"><input type="checkbox" name="h4" value="2"<?php if($row1[$id]!==NULL){if($h4 !=='0') {echo 'checked';}}?>>  <?php echo $row['h3']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h6" value="0"><input type="checkbox" name="h6" value="3" <?php if($row1[$id]!==NULL){if($h6 !=='0') {echo 'checked';}}?>> <?php echo $row['h5']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h8" value="0"><input type="checkbox" name="h8" value="4"<?php if($row1[$id]!==NULL){if($h8 !=='0') {echo 'checked';}}?>> <?php echo $row['h7']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h10" value="0"><input type="checkbox" name="h10" value="5" <?php if($row1[$id]!==NULL){if($h10 !=='0') {echo 'checked';}}?>>  <?php echo $row['h9']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h12" value="0"><input type="checkbox" name="h12" value="6" <?php if($row1[$id]!==NULL){if($h12 !=='0') {echo 'checked';}}?>> <?php echo $row['h11']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h14" value="0"><input type="checkbox" name="h14" value="7" <?php if($row1[$id]!==NULL){if($h14 !=='0') {echo 'checked';}}?>> <?php echo $row['h13']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="h16" value="0"><input type="checkbox" name="h16" value="8" <?php if($row1[$id]!==NULL){if($h16 !=='0') {echo 'checked';}}?>> <?php echo $row['h15']?><br></p>
				 <div class="mbr-section-btn align-center"><button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="q8previous.php"> PREVIOUS </button>
			  
               <button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="q8next.php"> &nbsp; &nbsp;NEXT  &nbsp; &nbsp;</button></div><br><br>
               
               <div class="mbr-section-btn align-center"><button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="done.php"> &nbsp; &nbsp;DONE  &nbsp; &nbsp;</button></div>
                </form> 
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