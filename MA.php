<?php
session_start();
if($_SESSION['login_id'] == null)
{
    header("Location: page22.html");
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
$testing_id=$_SESSION['testing_id'];
$sql= "SELECT * FROM TEST WHERE QUES_ID= $ques";
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
    window.location.href = "timeout1.php";
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

<section class="header1 cid-rb4zLHVRKO mbr-fullscreen mbr-parallax-background" id="header1-1b">

    

    

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-black col-md-10">
                <br><strong><p class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2" id="demo"></strong></p>
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    QUESTION &nbsp; &nbsp;<?php echo $id ?><br>
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
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="hidden" name="MA" value="0"><input type="radio" name="MA" value="1" <?php if($row1[$id]!==NULL){if($data=='1') {echo 'checked';}}?> > <?php echo $row['h1']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="radio" name="MA" value="2" <?php if($row1[$id]!==NULL){if($data=='2') {echo 'checked';}}?>>  <?php echo $row['h3']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="radio" name="MA" value="3" <?php if($row1[$id]!==NULL){if($data=='3') {echo 'checked';}}?>> <?php echo $row['h5']?><br></p>
				  <p class="mbr-text align-left pb-3 mbr-fonts-style display-5"><input type="radio" name="MA" value="4" <?php if($row1[$id]!==NULL){if($data=='4') {echo 'checked';}}?>> <?php echo $row['h7']?><br></p>
				 <div class="mbr-section-btn align-center"><button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="MAprevious.php"> PREVIOUS </button>
			  
               <button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="MAnext.php"> &nbsp; &nbsp;NEXT  &nbsp; &nbsp;</button></div><br><br>
               
               <div class="mbr-section-btn align-center"><button class="btn btn-md btn-primary display-4" type="submit" name="submit" id="submit" value="submit" formaction="done.php"> &nbsp; &nbsp;DONE  &nbsp; &nbsp;</button></div>
                </form>   
                
                
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
