@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reservations
@endsection
@section('contentheader_title')
    Reservations
@endsection

@section('main-content')
<div class="message-content"></div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form class="filter" action="{{ url('reservations/filter') }}" method="post">
  {{ csrf_field() }}
    <div class="all">
        <a class="btn btn-primary" href="{{ url('reservations') }}" > View All </a>
          <!--<a class="btn btn-success" href="{{ url('bookingAdmin') }}">New Reservation</a>-->
    </div>
    <div class="pull-right" style="margin-bottom:20px;">
        <div class="col-md-6">
          <input type="text" class="form-control" name="full_name_user" placeholder="Filter By Name" value="">
        </div>
        <div class="col-md-6">
          <input type="submit" class="btn btn-primary" name="search" value="Search">
        
        </div>
    </div>
</form>
<table id="table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
  <tr>
    <th>Date</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Amount of People</th>
    <th>Game Time</th>
    <th>Payment</th>
    <th>Money Received</th>
     <th>Actions</th>

  </tr>
  @foreach($reservations as $reservation)
    <tr>
        <td>{{ $reservation->date }}</td>
        <td>{{ $reservation->full_name_user }}</td>
        <td>{{ $reservation->email_user }}</td>
        <td>{{ $reservation->phone_number_user }}</td>
        <td>{{ $reservation->number_total }}</td>
        <td>{{ $reservation->functions->hour_in }}</td>
        <td>
            @if(@$reservation->price_total != 25)
                @if($reservation->type_payment == 0)
                    <span style="color:blue;font-size:1.5em;"> Full </span>
                @elseif($reservation->type_payment == 1)
                    <span style="color:red;font-size:1.5em;"> Deposited </span>
                @endif
            @else
                <span style="color:red;font-size:1.5em;"> None </span>
            @endif
        </td>
        <td>
          @if(@$reservation->price_total == 25)
              $0
          @else
            ${{ $reservation->price_total }}
          @endif
        </td>
        <td>
           <span class="fa fa-trash delete" data-id="{{ $reservation->id_reservation }}" style="color:red;font-size:2em;cursor:pointer;" data-toggle="modal" data-target="#modalDelete" ></span>
        </td>
    </tr>
  @endForeach
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


{!! $reservations->appends(['full_name_user'])->render() !!}

@endsection
@section('push-script')
<script>
$(document).ready(function() {
   $('.delete').click(function(e){
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      console.log(data_id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('.btn-delete').click(function (e){
        e.preventDefault();
        $.ajax({
          url: '{{ url("delete-reservation") }}',
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
@endsection
