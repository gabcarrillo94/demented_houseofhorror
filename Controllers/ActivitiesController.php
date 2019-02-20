<?php

/**
 *
 */
require_once('./Models/Activity.php');

class ActivitiesController
{

  function __construct()
  {
    # code...
  }
  public function index () {
      $data['activities'] = Activity::orderBy('created_at', 'desc')->get();
      return view('adminlte::activities.view', $data);

  }

  public function create () {
      return view('adminlte::activities.create');
  }

  public function save (Request $request) {
      $rules = array(
            'name' => 'required',
          );

      // Add Validation Custom Names

      $niceNames = array(
            'name' => 'Name',
      );

      $messages = [
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      $validator->setAttributeNames($niceNames);

      if ($validator->fails())
      {
          return back()->withErrors($validator)->withInput(); // Form calling with Errors and Input values
      }
      else
      {

        $activity = new Activity;
        $activity->name = $request->name;
        $activity->open_work = $request->open_work;

        $response = $activity->save();

        $activity_last = Activity::all();
        $activity_id = $activity_last->last()->id;

        if($response){
            return redirect('games/functions/'. (string)$activity_id);
        }
      }
  }

  public function edit () {
      return view('adminlte::activities.edit');
  }

  public function update (Request $request) {

  }

  public function calendar () {
      return view('adminlte::activities.calendar');
  }

  public function update_calendar (Request $request) {

  }

  public function create_function ($id) {
    $activity = Activity::where('id', '=', $id)->get();
    $data['activity'] = $activity[0];
    return view('adminlte::activities.functions.create', $data);
  }

  public function save_function (Request $request) {
      if($request->number_functions > 1)
      {
          for($i = 1; $i <= $request->number_functions; $i++){
                $function = new Place;
                $function->activity_id = $request->activity_id;
                $function->hour_in = $request->hour_in[$i];
                $function->hour_out = $request->hour_out[$i];
                $function->price = $request->price[$i];
                $function->save();
          }
          return redirect('my_games');
      }
      else
      {
        $function = new Place;
        $function->activity_id = $request->activity_id;
        $function->hour_in = $request->hour_in[1];
        $function->hour_out = $request->hour_out[1];
        $function->price = $request->price[1];
        $function->save();
        return redirect('my_games');
      }
  }

  public function list_functions ($id)
  {
      $functions = Place::where('activity_id', '=', $id)->get();
      if(empty($functions))
      {
        return redirect('games/functions/'. (string)$id);
      }
      else
      {
          $data['functions'] = $functions;
          $data['activity_id'] = $id;
         return view('adminlte::activities.functions.list', $data);
      }
  }
}
