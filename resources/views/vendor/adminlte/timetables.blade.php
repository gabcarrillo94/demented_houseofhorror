@extends('adminlte::layouts.app')

@section('htmlheader_title')
Activities
@endsection
@section('contentheader_title')
    Activities
@endsection

@section('main-content')
<div class="message-content"></div>
<table id="table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
  <tr>
      <th>Name</th>
      <th>Hour In</th>
      <th>Status</th>
  </tr>
  @foreach($timestables as $timetable)
    <tr>
        <td>{{ $timetable->activities->name }}</td>
        <td>{{ $timetable->hour_in }}</td>
        <td>
          Active
        </td>
    </tr>
  @endForeach
</table>
{!! $timestables->render() !!}

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
