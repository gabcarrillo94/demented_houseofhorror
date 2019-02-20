@extends('adminlte::layouts.app')

@section('htmlheader_title')
    New Reservation
@endsection
@section('contentheader_title')
    New Reservation
@endsection

@section('main-content')
    @if(session()->has('error'))
        <div class="alert alert-error">
            {{ session()->get('error') }}
        </div>
    @endif
    <form action="{{ url('booking/createAdmin') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="functionAvailability" name="functionAvailability" value="10">
    <div class="row">
        <div class='col-sm-2'></div>
        <div class='col-sm-4'>
            <div class="form-group" style="width: 90%;">
              <label for="functionsSelect">Functions</label>
              <select name="function" class="form-control" id="functionsSelect"
              onchange="document.getElementById('functionAvailability').value = ((this.options[this.selectedIndex].innerHTML).split(' - '))[2];">
                
                    @foreach($timetables as $timetable)
                        <option value="{{ $timetable->id }}">
                            {{ $timetable->activities->name }} - {{ $timetable->hour_in }} - {{ $timetable->availability }}
                        </option>
                    @endforeach
                    
              </select>
           </div>
        </div>
        <div class='col-sm-6'>
            <div class="form-group" style="width: 50%;">
            <label for="date">Date</label>
            <input placeholder="mm-dd-yyyy" required="true" name="date" type="text" class="form-control date-format-cc" id="date">
            </div>
        </div>
    </div>
    <div class="row">
      <div class='col-sm-2'></div>
        <div class='col-sm-4'>
            <div class="form-group" style="width: 90%;">
        <label for="tickets">Adults</label>
        <select class="form-control" name="adult"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="width: 50%;">
        <label for="tickets">Full Name</label>
        <input required="true" name="name" type="text" class="form-control" id="name">
        </div>
      </div>
    </div>
      <div class="row">
      <div class='col-sm-2'></div>
        <div class='col-sm-4'>
            <div class="form-group" style="width: 90%;">
        <label for="tickets">Childrens</label>
        <select class="form-control form-children" name="children" style="margin-bottom:20px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
        </div>
      </div>
    </div>
    <div class="row" style="text-align:  center;">
        <input style="margin-top:  2%;width: 10%;" type="submit" class="btn btn-primary" name="save" value="Save">
    </div>
  </form>
    
@endsection

@section('push-script')
@endsection
