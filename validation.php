<?php 
	include("connect.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed with Error:".mysqli_connect_error());
	}

	$login_id = $_POST["name"];
	$name = "";
	$password = $_POST["password"];
	$role = "";
	$uni_id = "";
	$class_id = "";
	
	$sql = "SELECT NAME,ROLE,UNI_ID,CLASS_ID FROM `LOGIN` WHERE LOGIN_ID = '".$login_id."' AND PASSWORD = '".$password."' ";

	$user_data = mysqli_query($conn, $sql);

		if (mysqli_num_rows($user_data) > 0) 
		{
	    session_start();
		
			    while($row = $user_data->fetch_assoc())
			    {
	 				
			       //set session varibles
			        $_SESSION["login_id"] = $login_id ; 
			        $_SESSION["password"] = $password ;
			        $_SESSION["session_name"] = $name = $row['NAME'];
			        $_SESSION["session_role"] = $role=$row['ROLE'];
			        $_SESSION["session_uni_id"] = $uni_id=$row['UNI_ID'];
			        $_SESSION["session_class_id"] = $class_id=$row['CLASS_ID'];

			       
			        if($role == 1)
			        {
			            header("Location: http://www.efequizonline.tk/page5.php");
	                    exit;
			        }
			        else if($role == 2)
					{
			            header("Location: http://www.efequizonline.tk/page6.php");
	                    exit;
			        }
					else if($role == 3)
					{
			            header("Location: http://www.efequizonline.tk/page15.php");
	                    exit;
			        }
					else if($role == 4)
					{
			            header("Location:http://www.efequizonline.tk/page4.php");
	                    exit;
			        }
					
			    }
		}	
				
		else
		{
			header("Location: http://www.efequizonline.tk/page22.html");
			exit;
		}
	
mysqli_close($conn);
?>
<section class="header12" group="Headers" data-bg-video="{{bg.type == 'video' && bg.value.url}}" plugins="VimeoPlayer" mbr-class="{'mbr-fullscreen': fullScreen,'mbr-parallax-background' :bg.parallax}">

    <mbr-parameters>
    <!-- Block parameters controls (Blue "Gear" panel) -->
        <input type="checkbox" title="Full Screen" name="fullScreen" checked>
        <input type="range" inline title="Top" name="paddingTop" min="0" max="8" step="1" value="6" condition="fullScreen == false">
        <input type="range" inline title="Bottom" name="paddingBottom" min="0" max="8" step="1" value="6" condition="fullScreen == false">

        <input type="checkbox" title="Show Title" name="showTitle" checked>
        <input type="checkbox" title="Show Text" name="showText" checked>
        <input type="checkbox" title="Show Buttons" name="showButtons">
        <input type="checkbox" title="Show Icons" name="showIcons">
        <input type="checkbox" title="Show Arrow" name="showArrow">

        <select title="Columns" name="cardsCount">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4" selected>4</option>
        </select>

        <fieldset type="background" name="bg" parallax>
            <input type="image" title="Background Image" value="file:///C:/Users/user/Desktop/cas2//assets/images/mbr-1920x1316.jpg" selected parallax>
            <input type="color" title="Background Color" value="#0f7699">
            <input type="video" title="Background Video" value="http://www.youtube.com/watch?v=uNCr7NdOJgw">
        </fieldset>
        <input type="checkbox" title="Overlay" name="overlay" condition="bg.type !== 'color'">
        <input type="color" title="Overlay Color" name="overlayColor" value="#efefef" condition="overlay && bg.type !== 'color'">
        <input type="range" inline title="Opacity" name="overlayOpacity" min="0" max="1" step="0.1" value="0.9" condition="overlay && bg.type !== 'color'">
    <!-- End block parameters -->
    </mbr-parameters>

    <div class="mbr-overlay" mbr-if="overlay && bg.type!== 'color'" mbr-style="{'opacity': overlayOpacity, 'background-color': overlayColor}">
    </div>

    <div class="container  ">
            <div class="media-container">
                <div class="col-md-12 align-center">
                    <h1 class="mbr-section-title pb-3 mbr-white mbr-bold mbr-fonts-style" mbr-theme-style="display-1" mbr-if="showTitle"><p><br></p><p><i>I-CAS</i></p></h1>
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style" mbr-theme-style="display-5" mbr-if="showText" data-app-selector=".mbr-text, .mbr-section-btn">Interactive Classroom-based Assessment System<br></p>
                    <div class="mbr-section-btn align-center py-2" mbr-if="showButtons" data-toolbar="-mbrBtnMove" mbr-buttons mbr-theme-style="display-4">
                        <a class="btn btn-md btn-secondary" href="https://mobirise.com">MORE</a>
                    </div>

                    <div class="icons-media-container mbr-white">
                        <div class="card col-12 col-md-6" mbr-class="{'col-lg-3':cardsCount=='4', 'col-lg-4':cardsCount=='3'}">
                            <div mbr-if="showIcons" class="icon-block">
                            <a href="https://mobirise.com/">
                                <span mbr-icon class="mbri-layers mbr-iconfont"></span>
                            </a>
                            </div>
                            <h5 mbr-theme-style="display-5" mbr-if="showTitle" class="mbr-fonts-style"><a href="page2.html#form1-2k"><b>
                                ADMIN LOGIN</b></a></h5>
                        </div>

                        <div class="card col-12 col-md-6" mbr-class="{'col-lg-3':cardsCount=='4', 'col-lg-4':cardsCount=='3'}">
                            <div mbr-if="showIcons" class="icon-block">
                                <a href="https://mobirise.com/">
                                    <span mbr-icon class="mbri-sun mbr-iconfont"></span>
                                </a>
                            </div>
                            <h5 mbr-theme-style="display-5" mbr-if="showTitle" class="mbr-fonts-style"><a href="page2.html#form1-19"><b>UNIVERSITY LOGIN</b></a></h5>
                        </div>

                        <div class="card col-12 col-md-6" mbr-class="{'col-lg-3':cardsCount=='4', 'col-lg-4':cardsCount=='3'}" mbr-if="cardsCount>2">
                            <div mbr-if="showIcons" class="icon-block">
                                <a href="https://mobirise.com/">
                                    <span mbr-icon class="mbri-cash mbr-iconfont"></span>
                                </a>
                            </div>
                            <h5 mbr-theme-style="display-5" mbr-if="showTitle" class="mbr-fonts-style"><b><a></a><a href="page2.html#form1-1a"><b>LECTURER&nbsp;</b></a><a href="page2.html#form1-1b"></a><a href="page2.html#form1-1a"><b>LOGIN</b></a></b></h5>
                        </div>

                        <div class="card col-12 col-md-6" mbr-class="{'col-lg-3':cardsCount=='4', 'col-lg-4':cardsCount=='3'}" mbr-if="cardsCount>3">
                            <div mbr-if="showIcons" class="icon-block">
                                <a href="https://mobirise.com/">
                                    <span mbr-icon class="mbri-mobirise mbr-iconfont"></span>
                                </a>
                            </div>
                            <h5 mbr-theme-style="display-5" mbr-if="showTitle" class="mbr-fonts-style"><a href="page2.html#form1-1b"><b>
                                STUDENT LOGIN</b></a></h5>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div mbr-if="showArrow" class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>
