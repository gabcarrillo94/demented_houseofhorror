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

  include_once("Models/TimeTable.php");
  $obj_functions = new TimeTable();
  $functions = $obj_functions->getAllOfActivity($_GET['activity_id']);

 ?>

<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
     <?php require_once('layouts/header_main.php'); ?>

<div class="container">
    <ul class="list-group" style="background-color:white;">
      <?php $i = 1; ?>
      <?php foreach ($functions as $row_function): ?>
        <li class="list-group-item"><span style="font-size:2em; font-weight:700; margin-right:10%;"> Function <?= $i ?> </span> <?= $row_function['hour_in'] ?> - <?= $row_function['hour_out'] ?> </li>
        <?php $i++; ?>
      <?php endforeach; ?>
    </ul>
    <!-- <div class="col-md-12">
        <a href="create_function.php" class="btn btn-success pull-right">Add Other Function </a>
    </div> -->
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
