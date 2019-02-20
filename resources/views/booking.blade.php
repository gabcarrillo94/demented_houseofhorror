<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THE DEMENTED HAUNT - The Escape Room</title>
    <meta name="description" content="Visit our haunted house in Palm Beach halloween parties. Come and defeat the awaken cemeteries, the bio-hazard hazmat, the nursery, the insanity hospital, the gory bathrooms, the headless men’s, the murder scene, clowns of fears, the butcher room, the escape prisoner.">
    <meta name="keywords" content="demented,haunt,house,halloween,lil haunt,miami,haunted house,palm beach">
    <meta name="author" content="Demented Haunt">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jasny-bootstrap.min.css">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <link rel="shortcut icon" href="http://dementedhaunt.com/favicon.png"/>
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/calendar.css">

  <!--Fonts-->
  <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css">

  <!-- Extras -->
  <link rel="stylesheet" type="text/css" href="assets/extras/datepicker/datepicker3.css">

  <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">
  <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.transitions.css">
     <!-- jQuery Load -->
  <script src="assets/js/jquery-min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
              <![endif]-->

    <script type="text/javascript">
$(document).ready(function(){
$("#prompt").mouseover(function(){
                           $("#pop-up").show();
                         });
$("#prompt").mouseout(function(){
                           $("#pop-up").hide();
                         });
                                                 });
</script>

    <script>

var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
	"mp3": "audio/mpeg",

}

function createsoundbite(sound){
	var html5audio=document.createElement('audio')
	if (html5audio.canPlayType){ //check support for HTML5 audio
		for (var i=0; i<arguments.length; i++){
			var sourceel=document.createElement('source')
			sourceel.setAttribute('src', arguments[i])
			if (arguments[i].match(/\.(\w+)$/i))
				sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
			html5audio.appendChild(sourceel)
		}
		html5audio.load()
		html5audio.playclip=function(){
			html5audio.pause()
			html5audio.currentTime=0
			html5audio.play()
		}
		return html5audio
	}
	else{
		return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
	}
}

//Initialize two sound clips with 1 fallback file each:

var mouseoversound=createsoundbite("http://dementedhaunt.com/sound-scream2.mp3")

</script>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76961207-1', 'auto');
  ga('send', 'pageview');

</script>


</head>
<body>
    <span id="pop-up" style="position: fixed; display:none; width: 100%; top:0; z-index:9999;"
><img src="assets/extras/img-scream.png"/></span>


<section id="blog">

<div class="container">
  <div class="row row-main">
      <h1 class="section-title red wow fadeInLeft animated" data-wow-delay=".6s">Book Now</h1>
      <h3 class="red wow fadeInLeft animated"> Call for Group Discount </h3>
      <hr style="width: 100%; color: black; height: 1px; background-color:black; margin:0!important;" /><br><br>
      <div class="col-md-12" style="padding-bottom:50px;">
          <div class="col-md-4" style="margin: 0 5%;">
            <h2>Adults </h2>
            <select class="form-control form-adults" name="adults"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
          </div>
          <div class="col-md-4" style="margin: 0 5%;">
            <h2> Children +10 </h2>
            <select class="form-control form-children" name="children" style="margin-bottom:20px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
            <span class="red" style="font-size:1em;"> Children under ten are not admitted to the Escape Room </span>
          </div>
        </div>
      <br><br>
      <hr style="width: 100%; color: black; height: 1px; background-color:black;marging-top:10%;" />
      <h1 class="section-title-min black wow fadeInLeft animated" data-wow-delay=".6s">Date and Time</h1>
      <div class="col-md-12">
        <?php
            date_default_timezone_set('America/Caracas');
            $hour_actual = date('h:i A');
         ?>
        <p class="col-md-5" style="font-size:1.5em;"><span class="date-view"> Tomorrow </span> </p>

        <div class="col-md-3" style="padding-bottom:30px;">
            <!-- <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>-->
                    <!-- <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form> -->
        </div>
        <div class="col-md-4">
            <input class="date_booking" name="date_booking" type="text" placeholder="mm-dd-yyyy">
            <!-- <button class="btn btn-default " type="button"> Next Day <i class="fa fa-chevron-right" aria-hidden="true"></i> </button> -->
        </div>
      </div>
      <br>
  <div class="col-md-12">
     <table class="table table-list-search">
                  <thead>
                      <tr>

                          <th class="th-title">Game Time</th>
                          <th class="th-title">Activity</th>
                          <th class="th-title"> Total Price</th>
                          <th class="th-title"> Availability</th>
                          <th class="th-title">Actions</th>
                      </tr>
                  </thead>
                  <?php $contador = 0; ?>
                  <tbody class="body_table">
                      @foreach($functions as $function)
                        <?php
                            $number_total = 0;
                            $sub_total =0;
                            $total = 0;
                        ?>

                        @foreach($function->reservations as $reservation)
                          @if($tomorrow == $reservation->date)
                              <?php $total = $total + $reservation->number_total; ?>
                          @endif
                        @endforeach
		
		<? $availability = {{ $function->availability }} ?>
        
		@foreach(SpecialAvailability::where('function_id', $function->id) as $specialAvl)
		    @if($specialAvl->date == $reservation->date)
		        $availability = $specialAvl->availability;
		    @endif
		@endforeach

                          <tr>
                              <td class="hourin" data-hourin="{{ @$function->hour_in }}">{{ @$function->hour_in }} </td>
                              <td> Room Escape </td>
                              <td>${{ @$function->price }}</td>
                              <td class="availability"><?= $availability - $total ?></td>
                              <td>
                                  <button  type="button" data-toggle="modal" data-target="#book_now" data-availability="<?= 10 - $total ?>" data-id="{{@$function->id}}" class="btn btn-success book-now"> Book now </button>
                                  <button  type="button" data-toggle="modal" data-target="#pay_now"  data-availability="<?= 10 - $total ?>" data-id="{{@$function->id}}" class="btn btn-primary pay-now"> Payment now </button>
                              </td>

                          </tr>
                        @endforeach
                  </tbody>
              </table>
  </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="book_now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="form-book" action="{{ url('booking/create') }}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">RESERVATION </h3>
        <h4 class="modal-title" style="color:#ca0106;">
          The cost of the reservation regardless of the amount of tickets to buy is $ 50.00 on the same site you must cancel the cost of each ticket that is $ 25.00
          IMPORTANT! If you do not attend the day of your reservation there will be no refund of the $ 50.00.
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="input-group col-md-12">
                <label for="full_name_user"> Full Name* </label>
                <input type="text"  name="full_name_user" id="full_name_user" class="form-control" value="" required>
              </div>
              <br>
              <div class="input-group col-md-12">
                <label for="email_user"> E-Mail* </label>
                <input type="text"  name="email_user" id="email_user" class="form-control" value="" required>
              </div>
              <br>
              <div class="input-group col-md-12">
                <label for="phone_number_user"> Phone Number* </label>
                <input type="text"  name="phone_number_user" id="phone_number_user" class="form-control" value="" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-proccess confirm-book">Confirm Book</button>
        </div>
    </div>
  </form>
  </div>
</div>

</section>

  <!-- Footer section Start -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
          <div class="copyright wow fadeInUp animated" data-wow-delay=".8s">
            <p>Copyright &copy; 2017 The Demented Haunt | All rights reserved.</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <div class="scroll-top text-center wow fadeInUp animated" data-wow-delay=".6s">
            <a href="#header"><i class="fa fa-chevron-circle-up fa-2x"></i></a>
          </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
          <p class="text-center wow fadeInUp animated" data-wow-delay=".8s">Developed by: <a href="http://herdzdesign.com" target="_blank">Herdz Design</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section End -->

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

  <!-- Datepicker JS -->
  <script src="assets/extras/datepicker/bootstrap-datepicker.js"></script>
  <script >
  $('.date_booking').datepicker({ 'format': 'mm-dd-yyyy'});
      $(document).ready(function() {
        var bandera = false;
        $('.book-now').click(function (e){
            var function_id = $(this).attr('data-id');
            var availability = parseFloat($(this).attr('data-availability'));
            var date_booking = $('.date_booking').val();
            var form_adults = $('.form-adults').val();
            var form_children = $('.form-children').val();
            var number_total = parseFloat(form_adults) + parseFloat(form_children);
            if(!bandera){
              $('.form-book').prepend('<input type="hidden>" class="function_id" name="function_id" value="'+function_id+'" style="display:none;">');
              $('.form-book').prepend('<input type="hidden>" class="date_booking" name="date_booking" value="'+date_booking+'" style="display:none;">');
              $('.form-book').prepend('<input type="hidden>" class="form_adults" name="number_people_adult" value="'+form_adults+'" style="display:none;">');
              $('.form-book').prepend('<input type="hidden>" class="form_children" name="number_people_children" value="'+form_children+'" style="display:none;">');
              $('.form-book').prepend('<input type="hidden>" class="number_total" name="number_total" value="'+number_total+'" style="display:none;">');
              bandera =true;
            }
            else {
              $('.function_id').attr('value', function_id);
              $('.date_booking').attr('value', date_booking);
              $('.form_adults').attr('value',form_adults);
              $('.form_children').attr('value',form_children);
              $('.number_total').attr('value',number_total);
            }
            if((number_total >= 4) && (availability >= number_total)){
              if($('.modal-body').hasClass('msg-validation')){

                  var html = '<div class="input-group col-md-12">';
                  html += '<label for="full_name_user"> Full Name* </label>';
                  html += '<input type="text"  name="full_name_user" id="full_name_user" class="form-control" value="" required>';
                  html += '</div>;'
                  html += '<br>';
                  html += '<div class="input-group col-md-12">';
                  html += '<label for="email_user"> E-Mail* </label>';
                  html += '<input type="text"  name="email_user" id="email_user" class="form-control" value="" required>';
                  html += '</div>';
                  html += '<br>'
                  html += '<div class="input-group col-md-12">';
                  html += '<label for="phone_number_user"> Phone Number* </label>';
                  html += '<input type="text"  name="phone_number_user" id="phone_number_user" class="form-control" value="" required>';
                  html += '</div>';
                  $('.modal-body').html(html);
                  $('.modal-footer').append('<button type="submit" class="btn btn-proccess confirm-book">Confirm Book</button>');
                  $('.modal-body').removeClass('msg-validation');
              }
            }
            else{
              if(number_total >= 4){
                $('.modal-body').html('<h2> The number of people, exceeds the number of availability. </h2>');
                $('.modal-body').addClass('msg-validation');
                $('.confirm-book').remove();
              }
              else{
                $('.modal-body').html('<h2> The reservation has to be for more than 4 people or less than 10. </h2>');
                $('.modal-body').addClass('msg-validation');
                $('.confirm-book').remove();
              }
            }

        });
      });
      
    var date_select = '';
    $('.date_booking').change(function (e){
      e.preventDefault();
      var date_booking = $(this);
      console.log('date_select ' + date_select);
      if(date_select != '' ){
          if(date_select == date_booking.val()){
            console.log('COPIADO ESTE DATE');
              return 0;
          }
          else{
              date_select = date_booking.val();
              $('.availability').html(10);
          }
      }
      else{
        console.log('NO ESTA COPIADO');
        date_select = date_booking.val();
        $('.availability').html(10);
      }

      var nextDay = new Date();
      nextDay.setDate(nextDay.getDate());

      var month = nextDay.getMonth() + 1;
      var day = nextDay.getDate();
      var year = nextDay.getFullYear();

      if (month < 10) { month = "0" + month }
      if (day < 10) { day = "0" + day }

      var date_tomorrow =  month +'-'+ day +'-'+ year;

      if(validate_fechaMayorQue(date_tomorrow, date_booking.val()))
      {
          $.ajax({
              url: '{{url("reservation/change_date") }}',
              type: 'get',

              success: function (result) {

                  $('.body_table').html('');
                  var parsed = JSON.parse(result);
	      
	      console.log(parsed);

                  var sub_total = 0;
                  var total = 0;
                  var html_body = '';
                  for(var i=0; i < parsed.length; i++){
                    for(var y=0; y < parsed[i].reservations.length; y++){
                      console.log('date_tomorrow == parsed[i].reservations.date' + date_tomorrow +' = ' + parsed[i].reservations[y].date);
                      if(date_booking.val() == parsed[i].reservations[y].date)
                      {
                        sub_total = sub_total + parseFloat(parsed[i].reservations[y].number_total);
                      }
                    }
                    console.log('sub_total ' + sub_total);
                    total = 10 - sub_total;
                    console.log('total ' + total);
	        
                    if(total <=0){
                      message = '<span style="color:red;font-size:1.5em;"> Exhausted </span> ';
                    }else{
                      message = total;
                    }
                    html_body += '<tr>';
                    html_body += '<td class="hourin" data-hourin="'+ parsed[i].hour_in +'">'+parsed[i].hour_in+' </td>';
                    html_body += '<td> Room Escape </td>';
                    html_body += '<td> '+parsed[i].price+' </td>';
                    html_body += '<td class="availability">'+ message  +'</td>';
                    html_body += '<td><button type="button" data-toggle="modal" data-target="#book_now"  data-availability="'+ total +'" data-id="'+parsed[i].id+'" class="btn btn-success book-now"> Book now </button></td>';
                    html_body += '</tr>';

                    sub_total = 0;
                    total = 0;
                  }
                  $('.body_table').html(html_body);

                  var bandera = false;
                  $('.book-now').click(function (e){
                      var function_id = $(this).attr('data-id');
                      var availability = parseFloat($(this).attr('data-availability'));
                      var date_booking = $('.date_booking').val();
                      var form_adults = $('.form-adults').val();
                      var form_children = $('.form-children').val();
                      var number_total = parseFloat(form_adults) + parseFloat(form_children);
                      console.log(number_total);
                      console.log($('.funcion_id'));
                      if(!bandera){
                        $('.form-book').prepend('<input type="hidden>" class="function_id" name="function_id" value="'+function_id+'" style="display:none;">');
                        $('.form-book').prepend('<input type="hidden>" class="date_booking" name="date_booking" value="'+date_booking+'" style="display:none;">');
                        $('.form-book').prepend('<input type="hidden>" class="form_adults" name="number_people_adult" value="'+form_adults+'" style="display:none;">');
                        $('.form-book').prepend('<input type="hidden>" class="form_children" name="number_people_children" value="'+form_children+'" style="display:none;">');
                        $('.form-book').prepend('<input type="hidden>" class="number_total" name="number_total" value="'+number_total+'" style="display:none;">');
                        bandera =true;
                      }
                      else {
                        $('.function_id').attr('value', function_id);
                        $('.date_booking').attr('value', date_booking);
                        $('.form_adults').attr('value',form_adults);
                        $('.form_children').attr('value',form_children);
                        $('.number_total').attr('value',number_total);
                      }
                      console.log('availabilityyyyyyy ' + availability);
                      if((number_total >= 4) && (availability >= number_total)){
                        console.log('jbjkcbdsjcds');
                        if($('.modal-body').hasClass('msg-validation')){

                            var html = '<div class="input-group col-md-12">';
                            html += '<label for="full_name_user"> Full Name* </label>';
                            html += '<input type="text"  name="full_name_user" id="full_name_user" class="form-control" value="" required>';
                            html += '</div>;'
                            html += '<br>';
                            html += '<div class="input-group col-md-12">';
                            html += '<label for="email_user"> E-Mail* </label>';
                            html += '<input type="text"  name="email_user" id="email_user" class="form-control" value="" required>';
                            html += '</div>';
                            html += '<br>'
                            html += '<div class="input-group col-md-12">';
                            html += '<label for="phone_number_user"> Phone Number* </label>';
                            html += '<input type="text"  name="phone_number_user" id="phone_number_user" class="form-control" value="" required>';
                            html += '</div>';
                            $('.modal-body').html(html);
                            $('.modal-footer').append('<button type="submit" class="btn btn-proccess confirm-book">Confirm Book</button>');
                            $('.modal-body').removeClass('msg-validation');
                        }
                      }
                      else{
                        if(number_total >= 4){
                          $('.modal-body').html('<h2> The number of people, exceeds the number of availability. </h2>');
                          $('.modal-body').addClass('msg-validation');
                          $('.confirm-book').remove();
                        }
                        else{
                          $('.modal-body').html('<h2> The reservation has to be for more than 4 people or less than 10. </h2>');
                          $('.modal-body').addClass('msg-validation');
                          $('.confirm-book').remove();
                        }
                      }

                  });

              },
              error: function (request, error) {
              }
          });

          $('.date-view').html(date_booking.val());
          var attr = $('.book-now').attr('disabled');

          if (typeof attr !== typeof undefined && attr !== false) {
            $('.book-now').removeAttr('disabled');
          }
      }else{
          $('.date-view').html('Can not reserve dates before tomorrow');
          $('.book-now').attr('disabled','disabled');
      }

    });
    function validate_fechaMayorQue(fechaInicial,fechaFinal)
      {
        console.log('fechaInicial' + fechaInicial);
        console.log('fechaFinal' + fechaFinal);

          valuesStart=fechaInicial.split("-");
          valuesEnd=fechaFinal.split("-");

          // Verificamos que la fecha no sea posterior a la actual
          var dateStart=new Date(valuesStart[2],(valuesStart[0]-1),valuesStart[1]);
          var dateEnd=new Date(valuesEnd[2],(valuesEnd[0]-1),valuesEnd[1]);
          if(dateStart>=dateEnd)
          {
              return 0;
          }
          return 1;
      }
  //});
  </script>

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
