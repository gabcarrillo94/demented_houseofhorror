
<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- <script src="{{ asset('/plugins/jQuery/jquery-3.3.1.min.js') }}"></script> -->
<script src="{{ asset('/assets/js/jquery.mask.min.js') }}"></script>

<script src="{{ asset('/assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/datatables/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/datatables/js/dataTables.fixedHeader.min.js') }}"></script>

<script src="{{ asset('/assets/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/datatables/js/responsive.bootstrap.min.js') }}"></script>
<script type="text/javascript">
$.noConflict();
jQuery( document ).ready(function( $ ) {
  if($('.date-format-cc').length)$('.date-format-cc').mask("00-00-0000", {placeholder: "mm-dd-yyyy"});
  
  if ($('#elemId').length) {
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
  }
});
</script>


<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
      <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
