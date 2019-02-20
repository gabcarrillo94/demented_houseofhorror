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

   include_once("Models/Activity.php");
   $obj_activities = new Activity();
  //
   include_once("Models/TimeTable.php");
  //
   $activities = $obj_activities->getAll();
  if(isset($_POST['name'])  && isset($_POST['open_work']) ){
      $response = $obj_activities->save(['name' => $_POST['name'], 'open_work' => $_POST['open_work']]);
      if($response){
          $last_resgister_activities = $obj_activities->lastItem();
      }
  }
  else {
      $last_resgister_activities = $obj_activities->lastItem();
  }
  if(isset($_POST['number_functions']) && $_POST['number_functions']!='')
  {
    if($_POST['number_functions'] > 1)
    {
        for($i = 1; $i <= $_POST['number_functions']; $i++){
              $array_save = array();
              $obj_functions = new TimeTable();
              $array_save['activity_id'] = $_POST['activity_id'];
              $array_save['hour_in'] = $_POST['hour_in_'.$i];
              $array_save['price'] = $_POST['price_'.$i];
              $obj_functions->save($array_save);
        }
        $_SESSION['msg_functions'] = 'Correct information saved';
        //header('Location:activities.php');
        $_SESSION['color_msg'] = 'success';
    }
    else
    {
      $array_save = array();
      $obj_functions = new TimeTable();
      $array_save['activity_id'] = $_POST['activity_id'];
      $array_save['hour_in'] = $_POST['hour_in_1'];
      $array_save['price'] = $_POST['price_1'];
      header('Location:activities.php');
      if($obj_functions->save($array_save)){
        $_SESSION['msg_functions'] = 'Correct information saved';
        $_SESSION['color_msg'] = 'success';
      }else {
        $_SESSION['msg_functions'] = 'Failed to save information correctly';
        $_SESSION['color_msg'] = 'danger';
      }
    }
  }
  else{
    if(isset($_SESSION['color_msg']) && $_SESSION['color_msg']!=''){
        $_SESSION['color_msg'] = '';
        $_SESSION['msg_functions'] = '';
    }
  }


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
          <?php if (isset($_SESSION['color_msg']) && isset($_SESSION['msg_functions'])): ?>
            <div class="alert alert-<?= $_SESSION['color_msg'] ?> alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <?= $_SESSION['msg_functions'];  ?>
            </div>

          <?php endif; ?>

            <div class="panel panel-default" style="background-color:white;">
                <h2 class="title-panel text-center" style="margin-top: 50px; margin-bottom: 10px!important;">Add Showtime </h2>
                <hr>
                <div class="panel-body panel-modulo" style="margin-left: 50px;">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" accept-charset="UTF-8">

                    <input name="number_functions" type="hidden" value="1" class="number_functions">
                    <input name="activity_id" type="hidden" value="<?= $last_resgister_activities[0]['id']; ?>">

                    <div class="row cn-function" style="margin-bottom:2%;">
                      <h2 class="col-md-12" style="color:#d21919; margin-bottom:5%;"> Showtime 1 </h2>

                      <div class="col-md-10">
                            <label for="hour_in_1">Start Time</label> <span class="required"> * </span>
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                  <input name="hour_in_1" type="text" id="hour_in_1" class="form-control timepicker">
                                  <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                  </div>
                                </div>
                            </div>
                      </div>


                      <div class="col-md-10" style="margin-top:2%;">
                          <label for="price_1">Price</label> <span class="required"> * </span>
                          <input name="price_1" type="number" id="price_1" class="form-control">
                      </div>

                      <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            Add Another Showtime: <strong>  </strong> <i class="fa fa-plus-circle btn-add" style="color:blue; cursor:pointer;" aria-hidden="true" style="cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="row" style="margin-top:2%;">
                        <input type="submit" value="Save Showtime" class="btn btn-success">
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
         <script type="text/javascript">
             $('.timepicker').timepicker({
               showInputs: false
             });

             $('.btn-add').click(function () {
               var number_functions = parseFloat($('.number_functions').val());
               number_functions = number_functions + 1;
               $('.number_functions').val(number_functions);

               html = '<h2 class="col-md-12" style="color:#d21919; margin-bottom:5%;"> Shotime '+ number_functions +' </h2>';

               html += '<div class="col-md-10" style="padding-right:0;">';
               html +=  '<label for="hour_in_'+number_functions+'">Start Time</label> <span class="required"> * </span>';
               html +=  '<div class="bootstrap-timepicker">';
               html +=    '<div class="input-group">';
               html +=      '<input class="form-control timepicker" name="hour_in_'+number_functions+'" type="text" id="hour_in_'+number_functions+'">';
               html +=      '<div class="input-group-addon">';
               html +=          '<i class="fa fa-clock-o"></i>';
               html +=        '</div>';
               html +=        '</div>';
               html +=    '</div>';

               html +=  '</div>';


               html +=  '</div>';
               html +=   '<div class="col-md-10" style="margin-top:2%;">';
               html +=    '<label for="price_'+number_functions+'">Price</label> <span class="required"> * </span>';
               html +=    '<input class="form-control" name="price_'+number_functions+'" type="number" id="price_'+number_functions+'">';

               html +=  '</div>';

               html +=  '<hr>';

               $('.cn-function').append(html);
               $('.timepicker').timepicker({
                 showInputs: false
               });
             });
         </script>
</body>
</html>
