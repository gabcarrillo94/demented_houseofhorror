<script src="assets/js/minicart.js"></script>

<script>

    // Mini Cart
    paypal.minicart.render({
        //action: 'https://www.sandbox.paypal.com/cgi-bin/webscr'
    });

    if (~window.location.search.indexOf('reset=true')) {
        //paypal.minicart.reset();
    }


</script>


<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>

@yield('push-script')

<!-- Datepicker JS -->
<!-- <script src="assets/extras/datepicker/bootstrap-datepicker.js"></script>
<script >
$('#date_picker').datepicker({ 'format': 'dd-mm-yyyy'});

$('.btn-plus').click( function (){
    var number_people = parseFloat($('.number-people').html());
    var number_people_new = number_people + 1;
    var $total_result = number_people_new * 25;
    $('.number-people').html(number_people_new);
    $('#number_people').val(number_people_new);

    $('.total-result').html($total_result);
    $('#total').val($total_result)
});
</script> -->

<!-- WOW JS plugin for animation -->
<script src="assets/js/wow.js"></script>
<!-- All JS plugin Triggers -->
<script src="assets/js/main.js"></script>
<!-- Smooth scroll -->
<script src="assets/js/smooth-scroll.js"></script>
<!--  -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!-- Counterup -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.min.js"></script>
<!-- circle progress -->
<script src="assets/js/circle-progress.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.js"></script>
<!-- lightbox -->
<script src="assets/js/lightbox.min.js"></script>



</body>
</html>
