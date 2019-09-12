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

$uni_id=$_SESSION['session_uni_id'];
$cid=$_SESSION['session_class_id'];

$sql_class_list = "SELECT * FROM CLASS WHERE UNI_ID= $uni_id " ;
$sql_test_list = "SELECT * FROM TESTID" ;

$i=1;

$class_list = mysqli_query($conn, $sql_class_list);
$test_list = mysqli_query($conn, $sql_test_list);

$now= GETDATE();

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
  <title>TESTSTART</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
<style>
#quiz {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 120%;
}

#quiz td, #lecturer th {
    border: 1px solid #ddd;
    padding: 8px;
}

#quiz tr:nth-child(even){background-color: #FFFFFF;}
#quiz tr:nth-child(odd){background-color: #FFFFFF;}

#quiz tr:hover {background-color: #D7C9E6;}
#quiz tr:first-child {background-color: #F4A460	;}

#quiz th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: black;
 select{
  background:transparent;
   width: 220px;
   padding: 2px;
   font-family:Arial, Helvetica, sans-serif;
   font-size:16px;
   font-weight:300;
   color:#FF0000;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 25px;
  -webkit-appearance: none;
 
  }

.select-div{
  width: 220px;
  height: 55px;
  overflow: hidden;
  background: url(arrowhead.png) no-repeat right #f1f1f1;
  border-top:#575757 0px solid;
  -webkit-border-radius: 4px 4px 4px 4px;
   -moz-border-radius: 4px 4px 4px 4px;
      border-radius: 4px 4px 4px 4px;
  -webkit-box-shadow: inset 0 2px 4px rgba(107, 105, 105, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
   -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
      -moz-box-shadow:    0px 8px 3px -9px #000000;
      -webkit-box-shadow: 0px 8px 3px -9px #000000;
      box-shadow:         0px 8px 3px -9px #000000;
}

select > option {
  background: #f1f1f1;
}

 </style>   
  
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


  <section class="header5 cid-r7a4piDlnm mbr-parallax-background" id="header5-3n">

    

    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(255,255,255);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mbr-black col-md-10">
                <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1"><br><strong><br>TEST LIST</strong> </h1>
                <p class="mbr-text align-center display-5 pb-3 mbr-fonts-style">Select the test that you want to test the class.
				<table id="quiz">
                <tr>
                    <td>No.</td>
                    <td>Test ID</td>
                    <td>Test Name</td>
				
                </tr> 
                <?php
                   while ($row = mysqli_fetch_assoc($test_list))
                   { 
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['TEST_ID']."</td>";
                        echo "<td>".$row['NAME']."</td>";
						
                        echo "</tr>";
                        $i++;
                   }
                 ?>
				 </table>
			  <br><br></p>
                
            </div>
        </div>
    </div>

    
</section>

<section class="mbr-section form1 cid-raczsuDfS5" id="form1-n">

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <br><br>
            
                    <form class="mbr-form" action="teststart.php" method="post">
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="test">
                                <div class="form-group">
                                    <p >Test:
                                    <select name="test">
										<?php
										$test_list = mysqli_query($conn,$sql_test_list);
										while($row = mysqli_fetch_assoc($test_list)){
											echo "<option value = ".$row['TEST_ID'].">".$row['NAME']."</option>";
										}
										?>
                                	</select>
                                	</p>
                                </div>
                            </div>
							
							
							
							<div class="col-md-4 multi-horizontal" data-for="start">
                                <div class="form-group">
                                    <p >Start Time:
                                    <input type="datetime-local" id="start"
                                    name="start" value="<?php echo GETDATE() ?>" 
                                    min="<?php echo date("Y-j-F/T/g:i") ?>" max="2099-06-14T00:00"></p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 multi-horizontal" data-for="class">
                                <div class="form-group">
                                    <p >Class :
								<select name="class">
										<?php
										$class_list = mysqli_query($conn,$sql_class_list);
										while($row = mysqli_fetch_assoc($class_list)){
											echo "<option value = ".$row['CLASS_ID'].">".$row['CLASS_NAME']."</option>";
										}
										?>
								</select></p>
                                    
                                </div>
                            </div>
                            
                            <div class="col-md-4 multi-horizontal" data-for="end">
                                <div class="form-group">
                                    <p >End Time  :
                                    <input type="datetime-local" id="end"
									name="end" value="<?php echo GETDATE() ?>" 
                                    min="2018-11-21T00:00" max="2099-06-14T00:00"></p>
                                </div>
                            </div>
                        </div>
                        
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">START TEST</button>
                        </span>
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
  <script src="assets2/theme/js/script.js"></script>
  
  
</body>
</html>