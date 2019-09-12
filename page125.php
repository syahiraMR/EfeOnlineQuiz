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

$test = $_POST["test"];
$sql_question_list = "SELECT * FROM TEST WHERE TEST_ID=$test";
$sql_test_list="SELECT * FROM TESTID WHERE TEST_ID=$test";

$i = 1;

$question_list = mysqli_query($conn, $sql_question_list);
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
  <title>DELETE TEST</title>
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

<section class="header5 cid-r74JQpHTht mbr-fullscreen mbr-parallax-background" id="header5-3i">

    

    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(255,255,255);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mbr-black col-md-10">
                <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1"><br><strong> TEST QUESTIONS</strong></h1>
               
				<table id="quiz">
                <tr>
                    <td>ID</td>
                    <td>TYPE</td>
					<td>QUESTION</td>
                    <td>A</td>
					<td>TYPE</td>
                    <td>B</td>
                    <td>TYPE</td>
					<td>C</td>
                    <td>TYPE</td>
					<td>D</td>
					<td>TYPE</td>
                   
                </tr> 
                <?php
                   while ($row = mysqli_fetch_assoc($question_list))
                   { 
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['TYPE']."</td>";
						echo "<td>".$row['QUESTION']."</td>";
                        echo "<td>".$row['h1']."</td>";
						echo "<td>".$row['h2']."</td>";
                        echo "<td>".$row['h3']."</td>";
						echo "<td>".$row['h4']."</td>";
                        echo "<td>".$row['h5']."</td>";
						echo "<td>".$row['h6']."</td>";
						echo "<td>".$row['h7']."</td>";
                        echo "<td>".$row['h8']."</td>";
                        echo "</tr>";
                        $i++;
                   }
                 ?>
				 </table>
				 <br><br>
				 <form action="delete12.php" method="post">
				 <label for="action">Delete this test with id:</label>
					<select name="test">
				<?php
				
					
				$test_list = mysqli_query($conn,$sql_test_list);
				while($row = mysqli_fetch_assoc($test_list)){
					echo "<option value = ".$row['TEST_ID'].">".$row['NAME']."</option>";
				}
				?>
				</select>
				 <button type="delete" name="delete" id="delete" value="delete">Delete </button>
				</form>     
				 <br><br>
                <div class="mbr-section-btn align-center"><a class="btn btn-md btn-black display-4" href="page11.php">BACK</a></div>
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