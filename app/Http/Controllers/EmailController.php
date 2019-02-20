<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = array(
          'name'  => 'required',
          'email'         => 'required',
          'message'   => 'required',
      );

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails())
      {
          //dd($validator->errors());
          return back()->withErrors($validator)->withInput(); // Form calling with Errors and Input values
      }
      else
      {

          $myemail = 'josuebohorquezc@gmail.com, dementedhaunt@gmail.com'; //

          $name = $request->name;
          $email_address = $request->email;
          $message = $request->message;

          $to = $myemail;
          $email_subject = "You have recieved a message from: $request->name";

          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

          $logo_url = "http://dementedhaunt.com/assets/img/logo.png";

          //------------------------------------------------
                    $email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
                    <div style="margin: 30px 0">
                        <div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
                               <img src="'.$logo_url.'">
                           </div>
                         <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Contact Form </h2>
                     </div>
                  <div style="background-color: white; margin: 20px auto;padding:3% 5%;">
                        <h3 style="margin:1.5em 0; text-align:center;">FULL NAME: <strong> '. $name .  ' </strong></h3>';

          $email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> E-MAIL: <strong> '. $email_address .  ' </strong> </h3>';
          $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> MESSAGE: <strong> '. $message .  ' </strong> </h3>';

          $email_body.= '</div> </div>';
          //-----------------------------------------


          $response = @mail($to,$email_subject,$email_body,$headers);

          if($response){
              return redirect('thanks');
          }
          else {
            return redirect('error');
          }
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
