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

  include_once("Models/Reservation.php");
  $obj_reservations = new Reservation();
  $reservations = $obj_reservations->getAll();

 ?>

<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<?php require_once('layouts/header_main.php') ?>
<!--heder end here-->
<h2>
  <?php
      $date = date('m-d-Y');
      $time = strtotime($date);
   ?>

 </h2>
 <div class="message-content" >

 </div>
<!--four-grids here-->
<table id="table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Amount of People</th>
            <th>Game Time</th>
            <th>Payment</th>
            <th>Money Received</th>
             <th>Actions</th>
            <!-- <th>Actions</th> -->
        </tr>
    </thead>
    <tbody>
      <?php if (count($reservations) > 0): ?>
        <?php foreach ($reservations as $row_reservation): ?>
          <tr>
              <td>
                  <?= $row_reservation['full_name_user'] ?>
              </td>
              <td>
                  <?= $row_reservation['date'] ?>
              </td>
              <td>
                <?= $row_reservation['email_user'] ?>
              </td>
              <td>
                  <?= '+ ' .$row_reservation['phone_number_user'] ?>
              </td>
              <td>
                  <?= $row_reservation['number_total'] ?>
              </td>
              <td>
                  <?= $row_reservation['hour_in'] ?>
              </td>
              <td>
                <?php if ($row_reservation['type_payment'] == 0): ?>
                    <span style="color:blue;font-size:1.5em;"> Full </span>
                <?php elseif($row_reservation['type_payment'] == 1): ?>
                  <span style="color:red;font-size:1.5em;"> Deposited </span>
                <?php endif; ?>
              </td>

              <td>
                  <?= '$'.$row_reservation['price_total'] ?>
              </td>
              <td>
                  <span class="fa fa-trash delete" data-id="<?php echo $row_reservation['id_reservation'] ?>" style="color:red;font-size:2em;cursor:pointer;" data-toggle="modal" data-target="#modalDelete" ></span>
              </td>
              <!-- <td>
                <?php if ($time < strtotime($row_reservation['date'])): ?>
                    <span style="color:#de1d19; font-weight:700;"> Reserved </span>
                <?php endif; ?>
                <?php if ($time >= strtotime($row_reservation['date'])): ?>
                    <span style="color:#de1d19; font-weight:700;"> Passed Event</span>
                <?php endif; ?>
              </td> -->
              <!-- <td>
                <?php if ($time < strtotime($row_reservation['date'])): ?>
                    <a href="#">Send Pre-Warning Mail </a>
                <?php endif; ?>
                <?php if ($time >= strtotime($row_reservation['date'])): ?>
                    <a href="#">Invite a book of new </a>
                <?php endif; ?>

              </td> -->
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
</table>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this reservation?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger btn-delete">Delete</button>
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
       $('.delete').click(function(e){
          e.preventDefault();
          var data_id = $(this).attr('data-id');
          console.log(data_id);
          $('.btn-delete').click(function (e){
            e.preventDefault();
            $.ajax({
              url: 'delete_reservation.php',
              data: {
                'id':data_id,
              },
              type: 'post',

              success: function (result) {
                console.log(result);
                $('#modalDelete').modal('hide');
                if(result == 1){
                    $('.message-content').html('<div class="alert alert-success"> <strong>Success!</strong> the reservation was successfully deleted.</div>');
                }
                 setTimeout(function(){ location.reload(); }, 5000);
              },
              error: function (request, error) {
                console.log(error);
              }
            });
          });
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
