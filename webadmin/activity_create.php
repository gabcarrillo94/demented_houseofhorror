<?php
require_once('Models/Session98128.php');

$session = new Session98128();
$session->demen_session_start();

if (!isset($_SESSION['email'],
                        $_SESSION['login_string']))
                        {
                            header('Location:login658_panel.php');
                        }

  require_once('layouts/headerHtml.php');
  //echo "http://".$_SERVER['SERVER_NAME'] . "/demented/admin6874_master69/Models/Activity.php";

  include_once("Models/Activity.php");
  $obj_activities = new Activity();
  //$activities = $obj_activities->getAll();
  // if(isset($_POST['name'])  && isset($_POST['open_work']) ){
  //     $response = $obj_activities->insert(['name' => $_POST['name'], 'open_work' => $_POST['open_work']]);
  //     if($response){
  //         header('Location:')
  //     }
  // }

 ?>

<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<?php require_once('layouts/header_main.php') ?>
<!--heder end here-->

<!--four-grids here-->
<div class="container">
    <a href="activities.php" class="btn btn-default" style="margin-bottom: 50px;"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Back My Games</a>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default" style="background-color:white!important;">
                <h1 class="title-panel text-center" style="margin-top: 50px; margin-bottom: 10px!important;">Game</h1>

                <div class="panel-body panel-modulo" style="margin-left: 50px;">
                    <form action="create_functions.php" method="POST" accept-charset="UTF-8">
                      <div class="row" style="margin-bottom:2%;">
                          <div class="col-md-3" style="padding-right:0;">
                            <label for="name">Game of Name</label> <span class="required"> * </span>
                          </div>
                          <div class="col-md-7">
                                <input name="name" type="text" id="name" class="form-control">
                          </div>
                      </div>

                    <div class="row" style="margin-bottom:2%;">
                        <div class="col-md-3" style="padding-right:0;">
                          <label for="open_work" >Reservation Shift </label> <span class="required"> * </span>
                        </div>
                        <div class="col-md-7">
                          <select class="form-control" id="open_work" name="open_work">
                              <option value="all_week">All Week </option>
                              <option value="only_weekends">Only Weekends</option>
                              <option value="only_on_weekdays">Only On Weekdays</option>
                          </select>
                        </div>
                    </div>

                    <div class="row" style="margin-top:2%;">
                        <input type="submit" value="Save Game" class="btn btn-success">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--//four-grids here-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<?php
  require_once('layouts/copy_right.php');
 ?>
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<?php
            require_once('layouts/sidebar.php');
         ?>
				</div>
				<?php
          require_once('layouts/script.php');
         ?>
</body>
</html>
