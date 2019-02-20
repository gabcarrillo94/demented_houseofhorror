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
  $activities = $obj_activities->getAll();

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
    <div class="col-md-12" style="margin:3% 0;">
        <a href="<?= "http://".$_SERVER['SERVER_NAME'] . "/activity_create.php" ?>" type="button" class="btn btn-danger btn-add"> Add Terror Game Activity</a>
    </div>
    <div class="hidden message-status"></div>
    <table id="table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Opening</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php if(count($activities) > 0) ?>
        <tbody>
            <?php foreach ($activities as $row_activity): ?>

              <tr>
                  <td>
                      <?php echo $row_activity['name']; ?>
                  </td>
                  <td>
                      <?php if ($row_activity['open_work'] == 'only_weekends'): ?>
                          Only Weekends
                      <?php endif; ?>

                      <?php if ($row_activity['open_work'] == 'all_week'): ?>
                           All Week
                      <?php endif; ?>

                      <?php if ($row_activity['open_work'] == 'only_on_weekdays'): ?>
                          Only On Weekdays
                      <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($row_activity['status'] == 1): ?>
                        Active
                    <?php endif; ?>

                    <?php if ($row_activity['status'] == 0): ?>c
                         Desactive
                    <?php endif; ?>

                  </td>
                  <td>
                    <a href="function_list.php?activity_id=<?= $row_activity['id'] ?>">View Showtime </a>
                    <!-- <a class="btn btn-xs btn-primary edit_diplomado" href="{{ url('editar_diplomado', $row_activity->id) }}"><i class="glyphicon glyphicon-edit"></i></a> -->

                                  <!-- <a data-id="{{ $row_activity->id }}" class="btn btn-xs btn-danger" data-toggle="modal" accesskey="" data-target="#ModalDelete"><i class="glyphicon glyphicon-trash"></i></a> -->
                  </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
