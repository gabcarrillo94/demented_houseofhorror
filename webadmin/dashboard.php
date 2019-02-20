<?php

  require_once('Models/Session98128.php');
  require_once('Models/Reservation.php');

  $session = new Session98128();
  $session->demen_session_start();
  $ob_reservations = new Reservation();

  $number_reservations = $ob_reservations->getAll();

  if (!isset($_SESSION['email'],
                          $_SESSION['login_string']))
                          {
                              header('Location:login658_panel.php');
                          }

                          require_once('layouts/headerHtml.php');

 ?>

<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<?php require_once('layouts/header_main.php') ?>

	<div class="container">
    <div class="container">
        <div class="col-md-10 four-grid text-center" style="margin: 5% 10%!important;">
          <div class="four-agileits">
            <div class="icon">
              <i class="glyphicon glyphicon-reservations" aria-hidden="true"></i>
            </div>
            <div class="four-text">
              <h3>Total Of Reservations</h3>
              <h4 style="color:white"> <?php echo count($number_reservations); ?>  </h4>

            </div>

          </div>
        </div>
    </div>
  </div>
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
