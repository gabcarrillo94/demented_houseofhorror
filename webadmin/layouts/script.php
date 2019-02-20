<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
  $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
  $("#menu span").css({"position":"absolute"});
  }
  else
  {
  $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
  setTimeout(function() {
    $("#menu span").css({"position":"relative"});
  }, 400);
  }

        toggle = !toggle;
      });
</script>
<!--js -->


<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/raphael-min.js"></script>
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/js/morris.js"></script>

<!--js -->
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/extras/timepicker/bootstrap-timepicker.min.js"></script>

<!-- DATATABLES JS -->
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/js/jquery.dataTables.min.js"></script>

<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/js/dataTables.fixedHeader.min.js"></script>

<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= "http://".$_SERVER['SERVER_NAME'] ?>/assets/datatables/js/responsive.bootstrap.min.js"></script>

<?php if ($_SERVER['PHP_SELF'] == '/reservations.php'): ?>
  <script type="text/javascript">
      $(document).ready(function() {
      var table = $('#table').DataTable( {
          responsive: true,
           "language": {
              "sProcessing":     "Processing...",
              "sLengthMenu":     "Show _MENU_ Reservations",
              "sZeroRecords":    "No reservations were found so far",
              "sEmptyTable":     "No reservations were found so far",
              "sInfo":           "Showing _START_ to _END_ reservations out of _TOTAL_ reservations",
              "sInfoEmpty":      "Showing 0 to 0 reservations out of 0 reservations",
              "sInfoFiltered":   "(filtered out of a total of _MAX_ reservations)",
              "sInfoPostFix":    "",
              "sSearch":         "Search:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Loading...",
              "oPaginate": {
                  "sFirst":    "First",
                  "sLast":     "Last",
                  "sNext":     "Next",
                  "sPrevious": "Back"
              },
              "oAria": {
                  "sSortAscending":  ": Activate to sort column up",
                  "sSortDescending": ": Activate to sort column in descending order"
              }
          }
      } );

      new $.fn.dataTable.FixedHeader( table );
  } );
  </script>
<?php endif; ?>

<?php if ($_SERVER['PHP_SELF'] == '/activities.php'): ?>
  <script type="text/javascript">
      $(document).ready(function() {
      var table = $('#table').DataTable( {
          responsive: true,
           "language": {
              "sProcessing":     "Processing...",
              "sLengthMenu":     "Show _MENU_ Activities",
              "sZeroRecords":    "No activities were found",
              "sEmptyTable":     "No activities were found",
              "sInfo":           "Showing _START_ to _END_ activities out of _TOTAL_ activities",
              "sInfoEmpty":      "Showing 0 to 0 activities out of 0 activities",
              "sInfoFiltered":   "(filtered out of a total of _MAX_ activities)",
              "sInfoPostFix":    "",
              "sSearch":         "Search:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Loading...",
              "oPaginate": {
                  "sFirst":    "First",
                  "sLast":     "Last",
                  "sNext":     "Next",
                  "sPrevious": "Back"
              },
              "oAria": {
                  "sSortAscending":  ": Activate to sort column up",
                  "sSortDescending": ": Activate to sort column in descending order"
              }
          }
      } );

      new $.fn.dataTable.FixedHeader( table );
  } );
  </script>
<?php endif; ?>



<script>
$(document).ready(function() {
//BOX BUTTON SHOW AND CLOSE
jQuery('.small-graph-box').hover(function() {
jQuery(this).find('.box-button').fadeIn('fast');
}, function() {
jQuery(this).find('.box-button').fadeOut('fast');
});
jQuery('.small-graph-box .box-close').click(function() {
jQuery(this).closest('.small-graph-box').fadeOut(200);
return false;
});

//CHARTS
function gd(year, day, month) {
return new Date(year, month - 1, day).getTime();
}

graphArea2 = Morris.Area({
element: 'hero-area',
padding: 10,
behaveLikeLine: true,
gridEnabled: false,
gridLineColor: '#dddddd',
axes: true,
resize: true,
smooth:true,
pointSize: 0,
lineWidth: 0,
fillOpacity:0.85,
data: [
{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
],
lineColors:['#ff4a43','#a2d200','#22beef'],
xkey: 'period',
redraw: true,
ykeys: ['iphone', 'ipad', 'itouch'],
labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
pointSize: 2,
hideHover: 'auto',
resize: true
});


});
</script>
