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

$id=$_SESSION['session_uni_id'];
$sql_class_list = "SELECT * FROM CLASS WHERE UNI_ID= $id ";

$j=1;


$class_list = mysqli_query($conn, $sql_class_list);
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
  <title>ADD MEMBER</title>
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

<section class="cid-r9cvzo5WmH mbr-parallax-background" id="header15-5">

    
<br><br><br><br><br><br>
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255,255,255);"></div>

    <div class="container align-right">
<div class="row">
    <div class="mbr-black col-lg-8 col-md-7 content-container">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">ADD LECTURER</h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5">Insert the information of the lecturers.</p>
    </div>
    <div class="col-lg-4 col-md-5">
    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
            
            <form class="mbr-form" action="inlect.php" method="post">
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="name" data-form-field="Name" placeholder="Name" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;" required="" id="name-header15-5">
                    </div>
                </div>
                
                <div data-for="password">
                    <div class="form-group">
                        <input type="tel" class="form-control px-3" name="password" data-form-field="Password" placeholder="Password"  style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;" id="password-header15-5">
                    </div>
                </div>
                
                <span class="input-group-btn"><button href="" type="submit" class="btn btn-secondary btn-form display-4">ADD</button></span>
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
    <br><br>
    
</section>

<section class="engine"><a href="https://mobiri.se/a">online website builder</a></section><section class="cid-r9cvZ3QbQm" id="header15-7">

    

    <br><br>
 <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0,0,0);"></div>
    <div class="container align-right">
<div class="row">
    <div class="mbr-white col-lg-8 col-md-7 content-container">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">ADD CLASS</h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5">Insert the information of the class.</p>
    </div>
    <div class="col-lg-4 col-md-5">
    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
            
            <form class="mbr-form" action="inclass.php" method="post">
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="name" data-form-field="Name" placeholder="Class Name" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;" required="" id="name-header15-7">
                    </div>
                </div>
                
                
                
                <span class="input-group-btn"><button href="" type="submit" class="btn btn-secondary btn-form display-4">ADD</button></span>
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
    <br><br>
</section>

<section class="cid-r9cvNaUY9l mbr-parallax-background" id="header15-6">

    <br><br>

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255,255,255);"></div>

    <div class="container align-right">
<div class="row">
    <div class="mbr-black col-lg-8 col-md-7 content-container">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">ADD STUDENT</h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5">Insert the information of the student.</p>
    </div>
    <div class="col-lg-4 col-md-5">
    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
            
            <form class="mbr-form" action="instud.php" method="post">
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="name" data-form-field="Name" placeholder="Name" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;" required="" id="name-header15-6">
                    </div>
                </div>
                
                <div data-for="password">
                    <div class="form-group">
                        <input type="tel" class="form-control px-3" name="password" data-form-field="Password" placeholder="Password" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #0000FF;" id="phone-header15-6">
                    </div>
                </div>
				
				<div data-for="class">
				    <div class="mbr-black   ">
                    <p class="mbr-text pb-3 mbr-fonts-style display-5"> >>>> Choose A Class:  
                        <select name="class">
						<?php
						$class_list = mysqli_query($conn,$sql_class_list);
						while($row = mysqli_fetch_assoc($class_list)){
							echo "<option value = ".$row['CLASS_ID'].">".$row['CLASS_NAME']."</option>";
						}
						?>
					</select>
                    </p>
                    </div>
                </div>
                
                <span class="input-group-btn"><button href="" type="submit" class="btn btn-secondary btn-form display-4">ADD</button></span>
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
    <br><br>
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