@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Modify Calendar
@endsection
@section('contentheader_title')
    Modify Calendar
@endsection

@section('main-content')
    @if(session()->has('error'))
        <div class="alert alert-error">
            {{ session()->get('error') }}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ url('tickets/create') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class='col-sm-2'></div>
        <div class='col-sm-4'>
            <div class="form-group" style="width: 90%;">
              <label for="functionsSelect">Functions</label>
              <select name="function" class="form-control" id="functionsSelect">
                
                    @foreach($timetables as $timetable)
                        <option>
                            {{ $timetable->id }}
                            -
                            {{ $timetable->activities->name }}
                            -
                            {{ $timetable->hour_in }}
                        </option>
                    @endforeach
                    
              </select>
           </div>
        </div>
        <div class='col-sm-6'>
            <div class="row">
                <div class="form-group" style="width: 50%;">
                <label for="date">Date</label>
                <input placeholder="mm-dd-yyyy" required="true" name="date" type="text" class="form-control date-format-cc" id="date">
                </div>
            </div>
            <div class="row">
                <div class="form-group" style="width: 50%;">
                <label for="tickets">Tickets Availables</label>
                <input required="true" name="tickets" type="number" class="form-control" id="tickets" value="10">
                </div>
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
