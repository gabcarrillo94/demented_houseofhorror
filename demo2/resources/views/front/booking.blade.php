@extends('front.app')

@section('main')

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
      <h3>
        <?php
            if (session()->has('error')) {
              echo session()->get('error');
            }
        ?>
       </h3>
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
      @if($errors->first('type_payment') !== '')
          <div style="font-size:1.5em;">Your reservation could not be processed because: <span class="text-danger"> {{ $errors->first('type_payment') }} </span> </div>
      @endif
  <div class="col-md-12">
     <table class="table table-list-search">
                  <thead>
                      <tr>

                          <th class="th-title">Game Time</th>
                          <th class="th-title">Activity</th>
                          <th class="th-title"> Price Per Ticket</th>
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

                          <tr>
                              <td class="hourin" data-hourin="{{ @$function->hour_in }}">{{ @$function->hour_in }} </td>
                              <td> Escape Room </td>
                              <td>${{ @$function->price }}</td>
                              <td class="availability"> <?php echo (10 - $total<0)?'<span style="color:red"> Sold Out </span>':10 - $total ?> </td>
                              <td>
                                  <button  type="button" data-toggle="modal" data-target="#book_now" data-price="{{ @$function->price }}" data-availability="<?= 10 - $total ?>" data-id="{{@$function->id}}" class="btn btn-success book-now"> Book now </button>
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
        <h4 class="modal-title" style="color:#ca0106;margin-top:5px;">
          The cost of the reservation regardless of the amount of tickets to buy is $ 50.00
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
              <div class="input-group col-md-12">
                <label for="full_name_user"> Full Name* </label>
                <input type="text"  name="full_name_user" id="full_name_user" class="form-control" value="" required>
                <span class="text-danger">{{ $errors->first('full_name_user') }}</span>
              </div>
              <br>
              <div class="input-group col-md-12">
                <label for="email_user"> E-Mail* </label>
                <input type="text"  name="email_user" id="email_user" class="form-control" value="" required>
                <span class="text-danger">{{ $errors->first('email_user') }}</span>
              </div>
              <br>
              <div class="input-group col-md-12">
                <label for="phone_number_user"> Phone Number* </label>
                <input type="text"  name="phone_number_user" id="phone_number_user" class="form-control" value="" required>
                <span class="text-danger">{{ $errors->first('phone_number_user') }}</span>
              </div>
              <div class="col-md-12" style="margin-top:10px;">
                  <h3> Select one option </h3>
              </div>
              <div class="input-group col-md-12" style="margin-top:10px;">
                <div class="col-md-6">
                  <label>
                    <input type="radio" name="type_payment" value="0"> Full Payment
                  </label>
                </div>
                <div class="col-md-6">
                  <label>
                    <input type="radio" name="type_payment" value="1"> Reservation ( $50.00 )
                  </label>
                </div>

              </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-proccess confirm-book">Next </button>
        </div>
    </div>
  </form>
  </div>
</div>

</section>


@endsection
@section('push-script')
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
          var price_total = $(this).attr('data-price');

          var number_total = parseFloat(form_adults) + parseFloat(form_children);
          if(!bandera){
            $('.form-book').prepend('<input type="hidden>" class="function_id" name="function_id" value="'+function_id+'" style="display:none;">');
            $('.form-book').prepend('<input type="hidden>" class="date_booking" name="date_booking" value="'+date_booking+'" style="display:none;">');
            $('.form-book').prepend('<input type="hidden>" class="form_adults" name="number_people_adult" value="'+form_adults+'" style="display:none;">');
            $('.form-book').prepend('<input type="hidden>" class="form_children" name="number_people_children" value="'+form_children+'" style="display:none;">');
            $('.form-book').prepend('<input type="hidden>" class="number_total" name="number_total" value="'+number_total+'" style="display:none;">');
            $('.form-book').prepend('<input type="hidden>" class="price_total" name="price_total" value="'+price_total+'" style="display:none;">');
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
                html += '<div class="col-md-12" style="margin-top:10px;">';
                html +='<h3> Select one option </h3>';
                html +='</div>';
                html += '<div class="input-group col-md-12" style="margin-top:10px;">';
                html +='<div class="col-md-6">';
                html +='<label>';
                html +='<input type="radio" name="type_payment" value="0"> Full Payment ';
                html +='</label>';
                html +='</div>';
                html +='<div class="col-md-6">';
                html +='<label>';
                html +='<input type="radio" name="type_payment" value="1"> Reservation ( $50.00 )';
                html +='</label>';
                html +='</div>';
                html +='</div>';

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

    // console.log('date_tomorrow' + date_tomorrow);
    //
    // var time_obtenido = new Date(date_booking.val()).getTime();
    //
    // var time_tomorrow = new Date(date_tomorrow).getTime();

    if(validate_fechaMayorQue(date_tomorrow, date_booking.val()))
    {
        $.ajax({
            url: '{{url("reservation/change_date") }}',
            type: 'get',

            success: function (result) {

                $('.body_table').html('');
                var parsed = JSON.parse(result);

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
                  console.log('sub_total' + sub_total);
                  total = 10 - sub_total;
                  console.log('tota' + total);
                  if(total <=0){
                    message = '<span style="color:red;font-size:1.5em;"> Sold Out </span> ';
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
                    var price_total = $(this).attr('data-price');
                    var number_total = parseFloat(form_adults) + parseFloat(form_children);
                    console.log(number_total);
                    console.log($('.funcion_id'));
                    if(!bandera){
                      $('.form-book').prepend('<input type="hidden>" class="function_id" name="function_id" value="'+function_id+'" style="display:none;">');
                      $('.form-book').prepend('<input type="hidden>" class="date_booking" name="date_booking" value="'+date_booking+'" style="display:none;">');
                      $('.form-book').prepend('<input type="hidden>" class="form_adults" name="number_people_adult" value="'+form_adults+'" style="display:none;">');
                      $('.form-book').prepend('<input type="hidden>" class="form_children" name="number_people_children" value="'+form_children+'" style="display:none;">');
                      $('.form-book').prepend('<input type="hidden>" class="number_total" name="number_total" value="'+number_total+'" style="display:none;">');
                      $('.form-book').prepend('<input type="hidden>" class="price_total" name="price_total" value="'+price_total+'" style="display:none;">');
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
                          html += '<div class="col-md-12" style="margin-top:10px;">';
                          html +='<h3> Select one option </h3>';
                          html +='</div>';
                          html += '<div class="input-group col-md-12" style="margin-top:10px;">';
                          html +='<div class="col-md-6">';
                          html +='<label>';
                          html +='<input type="radio" name="type_payment" value="0"> Full Payment ';
                          html +='</label>';
                          html +='</div>';
                          html +='<div class="col-md-6">';
                          html +='<label>';
                          html +='<input type="radio" name="type_payment" value="1"> Reservation ( $50.00 )';
                          html +='</label>';
                          html +='</div>';
                          html +='</div>';

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

@endsection
