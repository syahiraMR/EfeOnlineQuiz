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

$id=$_SESSION['SESSION_QUIZ_ID'];
$no=$_SESSION['SESSION_QUES_NO'];
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
  <title>QUIZ INSERTION</title>
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

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255,255,255);"></div>

    <div class="container align-left">
     <form class="mbr-form" action="insertques.php" method="post">   
<div class="row">
    <div class="mbr-blue col-lg-7 col-md-7 content-container">
		
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><br>Question <?php echo $no ?></h1>
        <div class="form-group" data-for="question">
                    <textarea type="text" class="form-control px-3" name="question" rows="7" placeholder="Please insert the question" data-form-field="Question" id="question-header15-8"style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;"></textarea>
                </div>
        <br><br>
            <div data-for="time">
                    <div class="form-group">
					<p class="mbr-text pb-3 mbr-fonts-style display-5"> Choose Time        :
					<select name="time">
						<option value="30">30 seconds</option>
						<option value="60">1 minutes</option>
						<option value="90">1mins 30secs</option>
						<option value="120">2 minutes</option>
					</select>
            </div>
    </div>
    <div data-for="answer">
                    <div class="form-group">
					<p class="mbr-text pb-3 mbr-fonts-style display-5">  Choose Correct Answer:
					<select name="answer">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
                    </div>
                </div>
    </div>
    <div class="col-lg-5 col-md-5">
     
    <div class="form-container">
        <br><br><br><p class="mbr-text pb-3 mbr-fonts-style display-5"><br>Insert Answer:</p><div class="media-container-column" data-form-type="formoid"> 
                <div class="form-group" data-for="A">
                    <textarea type="text" class="form-control px-3" name="A" rows="2" placeholder="Insert Option A" data-form-field="A" id="question-header15-8"style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;"></textarea>
                </div>
                
                <div class="form-group" data-for="B">
                    <textarea type="text" class="form-control px-3" name="B" rows="2" placeholder="Insert Option B" data-form-field="B" id="question-header15-8"style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;"></textarea>
                </div>
                
				<div class="form-group" data-for="C">
                    <textarea type="text" class="form-control px-3" name="C" rows="2" placeholder="Insert Option C" data-form-field="C" id="question-header15-8"style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;"></textarea>
                </div>
				<div class="form-group" data-for="D">
                    <textarea type="text" class="form-control px-3" name="D" rows="2" placeholder="Insert Option D" data-form-field="D" id="question-header15-8"style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;"></textarea>
                </div>
				
				
				
				
        </div>
		
    </div>
	
    </div>

</div>
    <br><br>
     <span class="input-group-btn"><button href="" type="submit" class="btn btn-secondary btn-form display-4">ADD</button></span>
	</form>	
	
					
				<br><br><br><br>
				 <p align="center">
                    <a href="page41.php" type="button" style="background-color:blue;color: yellow; padding: 14px 100px;
                     font-size: 16px;"> Done </a>
                 </p>
				 
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