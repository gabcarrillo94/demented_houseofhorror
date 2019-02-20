<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Reservations;
use App\Models\TimeTables;
use Carbon\Carbon;
use Session;
use Validator;

class ReservationController extends Controller
{
    protected $omnipay;


   public function setup($gateway = 'PayPal_Express') {
       // Get PayPal credentials from payment_gateway table
       $this->omnipay = Omnipay::create($gateway);

       $this->omnipay->setUsername('dementedhaunt_api1.aol.com');
       $this->omnipay->setPassword('P88AVGZRMYYVFY6A');
       $this->omnipay->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31A2oHCupAfwM-.I.CnVkzaMDgvVbe');
       $this->omnipay->setTestMode(('Live' == 'sandbox') ? true : false);
       if ($gateway == 'PayPal_Express')
           $this->omnipay->setLandingPage('Login');
   }


    public function index () {
        $date_tomorrow = new Carbon('tomorrow');

        $tomorrow = $date_tomorrow->month . '-' . $date_tomorrow->day . '-' . $date_tomorrow->year;

        $data['tomorrow'] = $tomorrow;

        $data['functions'] = TimeTables::with(['reservations'])->get();

        return view('front.booking', $data);

    }

    public function change_date (Request $request) {
        $functions = TimeTables::with(['reservations'])->get();

        return json_encode($functions);
    }

    public function create_booking (Request $request) {
      // Add Admin User Validation Rules
      $rules = array(
          'email_user'  => 'required',
          'full_name_user'         => 'required',
          'phone_number_user'   => 'required',
          'type_payment' => 'required:in:0,1',
      );

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails())
      {
          //dd($validator->errors());
          return back()->withErrors($validator)->withInput(); // Form calling with Errors and Input values
      }
      else
      {

          $date_tomorrow = new Carbon('tomorrow');

          $tomorrow = $date_tomorrow->month . '-' . $date_tomorrow->day . '-' . $date_tomorrow->year;


          Session::put('function_id', $request->function_id);
          Session::put('date', ($request->date_booking=='') ? $tomorrow : $request->date_booking);
          Session::put('number_people_adult', (int) $request->number_people_adult);
          Session::put('number_people_children',  (int) $request->number_people_children);
          Session::put('number_total', (int) $request->number_total);
          Session::put('email_user', $request->email_user);
          Session::put('full_name_user', $request->full_name_user);
          Session::put('phone_number_user', $request->phone_number_user);
          Session::put('type_payment', $request->type_payment);
          Session::put('price_total', $request->price_total);

          $number_total =  floatval($request->number_total);

          if($request->type_payment == 0){
            $amount_total = $number_total * $request->price_total;
            $amount_total = (string) number_format($amount_total, 2, '.', '');;

              $purchaseData = [
                  'testMode' => ('Live' == 'sandbox') ? true : false,
                  'amount' => $amount_total,
                  'currency' => 'USD',
                  'returnUrl' => url('reservation/success'),
                  'cancelUrl' => url('reservation/cancel')
              ];
          }
          else if($request->type_payment == 1) {
            $amount_total = $request->price_total;
              $purchaseData = [
                  'testMode' => ('Live' == 'sandbox') ? true : false,
                  'amount' => $amount_total,
                  'currency' => 'USD',
                  'returnUrl' => url('reservation/success'),
                  'cancelUrl' => url('reservation/cancel')
              ];
          }
          Session::put('amount_total', $amount_total);
          Session::save();
          $this->setup();

          $response = $this->omnipay->purchase($purchaseData)->send();

           if ($response->isSuccessful()) {
                //Payment was successful
               $result = $response->getData();

                $data = [
                  'function_id' => $request->function_id,
                  'date' => ($request->date_booking=='') ? $tomorrow : $request->date_booking,
                  'number_people_adult' => (int) $request->number_people_adult,
                  'number_people_children' =>  (int) $request->number_people_children,
                  'number_total' => (int) $request->number_total,
                  'price_total' => $amount_total,
                  'email_user' => $request->email_user,
                  'full_name_user' => $request->full_name_user,
                  'phone_number_user' => $request->phone_number_user,
                  'transaction_id' => $result['TRANSACTIONID'],
                  'paymode' => 'Credit Card',
                ];

                    $this->store($data);

                    $para = Session::get('email_user');
                    $subject = "Data of Reservation";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $logo_url = "http://dementedhaunt.com/assets/img/logo.png";
                    $email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
                          <div style="margin: 30px 0">
                              <div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
                                     <img src="'.$logo_url.'">
                                 </div>
                               <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Reservation Details </h2>
                           </div>
                        <div style="background-color: white; margin: 50px auto;padding:3% 5%;">
                            <h1 style="margin:2em 0; text-align:center;"> Dear '.Session::get('full_name_user').' </h1>';

                              $email_body.= '<div>
                                              <p style="color:red;font-size:2em;">
                                                    Your reservation has been accepted for our Escape Room show for the day :
                                                    <span>
                                                        '. Session::get('date') .'
                                                     </span>
                                              </p>
                                              <p style="font-size:1.5em;">
                                                    Your Booking Reference is your Phone Number: <span> '.Session::get('phone_number_user').' </span>
                                              </p>

                                              <p style="font-size:1.5em;">
                                                    Reservation valid for : <span> '.Session::get('number_total').' </span> people.
                                              </p>

                                              <p style="font-size:1.5em;">
                                                Total Paid : <span> '.Session::get('amount_total').' </span>.
                                              </p>

                                              <p style="font-size:1.5em;">
                                                    If you want to cancel this reservation do not hesitate to call us and give us your booking reference
                                              </p>
                                            </div>';

                         $email_body.= '<div style="margin-top:120px; text-align:center;">
                                             <p style="margin-top:20px;">
                                              (954) 465-0666
                                             </p>
                                             <p style="margin-top:20px;">
                                             dementedhaunt@gmail.com
                                             </p>
                                             <p style="margin-top:20px;">
                                              Location:
                                             </p>
                                             <p style="margin-top:20px;">
                                              2515 N State RD 7
                                             </p>
                                             <p style="margin-top:20px;">
                                                Margate, FL.
                                             </p>
                                          </div>';


                    $email_body.= '</div> </div>';

                    $send_mail_uno = @mail($para,$subject,$email_body,$headers);

                    $myemail = 'josuebohorquezc@gmail.com, dementedhaunt@gmail.com'; //

                    $name = Session::get('full_name_user');
                    $email_address = Session::get('email_user');
                    $date = Session::get('date');

                    $to = $myemail;
                    $email_subject = "Reservation Data";

                    //------------------------------------------------
                              $email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
                              <div style="margin: 30px 0">
                                  <div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
                                         <img src="'.$logo_url.'">
                                     </div>
                                   <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Reservation Details </h2>
                               </div>
                            <div style="background-color: white; margin: 20px auto;padding:3% 5%;">
                                  <h3 style="margin:1.5em 0; text-align:center;">FULL NAME: <strong> '. Session::get('full_name') .  ' </strong></h3>';
                    $email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> E-MAIL: <strong> '. Session::get('email_user') .  ' </strong> </h3>';
                    $email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> PHONE NUMBER: <strong> '. Session::get('phone_number_user') .  ' </strong> </h3>';
                    $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> DATE RESERVATION: <strong> '. Session::get('date') .  ' </strong> </h3>';
                    $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> NUMBER PEOPLE: <strong> '.  Session::get('number_total') .  ' </strong> </h3>';
                    $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> TOTAL A PAYMENT: <strong> $'. Session::get('amount_total') .' </strong> </h3>';

                    $email_body.= '</div> </div>';
                    //-----------------------------------------

                    $send_mail = @mail($to,$email_subject,$email_body,$headers);

                  return redirect('thanks');

                //$this->helper->flash_message('success', trans('messages.payments.payment_success')); // Call flash message function
           } elseif ($response->isRedirect()) {
                //Redirect to offsite payment gateway
               $response->redirect();
           } else {
                //Payment failed
                //$this->helper->flash_message('error', $response->getMessage()); // Call flash message function
                //return redirect('payments/book/' . $request->room_id);
                Session::put('error', $response->getMessage());
                return redirect('booking');
            }
          }
    }

    public function store ($data) {
      $reservation = new Reservations;
      $reservation->function_id = $data['function_id'];
      $reservation->date = $data['date'];
      $reservation->number_people_adult = $data['number_people_adult'];
      $reservation->number_people_children = $data['number_people_children'];
      $reservation->number_total = $data['number_total'];

      $reservation->price_total = $data['price_total'];
      $reservation->email_user = $data['email_user'];
      $reservation->full_name_user = $data['full_name_user'];

      $reservation->phone_number_user = $data['phone_number_user'];
      $reservation->type_payment = Session::get('type_payment');

      return $reservation->save();


    }

    public function success(Request $request) {
        $this->setup();

        if(Session::get('type_payment') == 0){
          //$amount_total = floatval(Session::get('number_total')) * 0.10;
          //$amount_total = (string) number_format($amount_total, 2, '.', '');
          $amount_total = Session::get('amount_total');

          $transaction = $this->omnipay->completePurchase(array(
              'payer_id' => $request->PayerID,
              'transactionReference' => $request->token,
              'amount' => $amount_total,
              'currency' => 'USD'
          ));

        }
        else if(Session::get('type_payment') == 1) {
          $amount_total = Session::get('amount_total');

          $transaction = $this->omnipay->completePurchase(array(
              'payer_id' => $request->PayerID,
              'transactionReference' => $request->token,
              'amount' => $amount_total,
              'currency' => 'USD'
          ));
        }

        $response = $transaction->send();

        $result = $response->getData();

        if (@$result['ACK'] == 'Success') {

            $data = [

                'function_id' => Session::get('function_id'),
                'date' => Session::get('date'),
                'number_people_adult' => Session::get('number_people_adult'),
                'number_people_children' =>  Session::get('number_people_children'),
                'number_total' => Session::get('number_total'),
                'price_total' => Session::get('amount_total'),
                'email_user' => Session::get('email_user'),
                'full_name_user' => Session::get('full_name_user'),
                'phone_number_user' => Session::get('phone_number_user'),
                'transaction_id' => @$result['PAYMENTINFO_0_TRANSACTIONID'],
                'paymode' => 'PayPal'
            ];

            $this->store($data);

              $para = Session::get('email_user');
              $subject = "Data of Reservation";
              $headers = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
              $logo_url = "http://dementedhaunt.com/assets/img/logo.png";
              $email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
                    <div style="margin: 30px 0">
                        <div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
                               <img src="'.$logo_url.'">
                           </div>
                         <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Reservation Details </h2>
                     </div>
                  <div style="background-color: white; margin: 50px auto;padding:3% 5%;">
                      <h1 style="margin:2em 0; text-align:center;"> Dear '.Session::get('full_name_user').' </h1>';

                        $email_body.= '<div>
                                        <p style="color:red;font-size:2em;">
                                              Your reservation has been accepted for our Escape Room show for the day :
                                              <span>
                                                  '. Session::get('date') .'
                                               </span>
                                        </p>
                                        <p style="font-size:1.5em;">
                                              Your Booking Reference is your Phone Number: <span> '.Session::get('phone_number_user').' </span>
                                        </p>

                                        <p style="font-size:1.5em;">
                                              Reservation valid for : <span> '.Session::get('number_total').' </span> people.
                                        </p>
                                        <p style="font-size:1.5em;">
                                          Total Paid : <span> '.Session::get('amount_total').' </span>.
                                        </p>
                                        <p style="font-size:1.5em;">
                                              If you want to cancel this reservation do not hesitate to call us and give us your booking reference
                                        </p>
                                      </div>';

                   $email_body.= '<div style="margin-top:120px; text-align:center;">
                                       <p style="margin-top:20px;">
                                        (954) 465-0666
                                       </p>
                                       <p style="margin-top:20px;">
                                       dementedhaunt@gmail.com
                                       </p>
                                       <p style="margin-top:20px;">
                                        Location:
                                       </p>
                                       <p style="margin-top:20px;">
                                        2515 N State RD 7
                                       </p>
                                       <p style="margin-top:20px;">
                                          Margate, FL.
                                       </p>
                                    </div>';


              $email_body.= '</div> </div>';

              $send_mail_uno = @mail($para,$subject,$email_body,$headers);

              $myemail = 'josuebohorquezc@gmail.com, dementedhaunt@gmail.com'; //

              $name = Session::get('full_name_user');
              $email_address = Session::get('email_user');
              $date = Session::get('date');

              $to = $myemail;
              $email_subject = "Reservation Data";

              //------------------------------------------------
                        $email_body = '<div style="background-color: rgb(234, 234, 234);padding:3% 10%;">
                        <div style="margin: 30px 0">
                            <div style="text-align:center; marging: 0 auto; margin-bottom:10px;">
                                   <img src="'.$logo_url.'">
                               </div>
                             <h2 style="text-shadow:2px 2px #ccc;letter-spacing: 2px; text-align:center;color:#c90005;font-weight:600;font-size:2em;"> Reservation Details </h2>
                         </div>
                      <div style="background-color: white; margin: 20px auto;padding:3% 5%;">
                            <h3 style="margin:1.5em 0; text-align:center;">FULL NAME: <strong> '. Session::get('full_name') .  ' </strong></h3>';
              $email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> E-MAIL: <strong> '. Session::get('email_user') .  ' </strong> </h3>';
              $email_body.= '<h3 style="margin:1.5em 0; text-align:center;"> PHONE NUMBER: <strong> '. Session::get('phone_number_user') .  ' </strong> </h3>';
              $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> DATE RESERVATION: <strong> '. Session::get('date') .  ' </strong> </h3>';
              $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> NUMBER PEOPLE: <strong> '.  Session::get('number_total') .  ' </strong> </h3>';
              $email_body.= '<h3 style="margin:1.5em 0;text-align:center;"> TOTAL A PAYMENT: <strong> $'.Session::get('amount_total').' </strong> </h3>';

              $email_body.= '</div> </div>';
              //-----------------------------------------


              $send_mail = @mail($to,$email_subject,$email_body,$headers);

              return redirect('thanks');
        } else {
            //dd($result);
            // Payment failed
            //$this->helper->flash_message('error', $result['L_SHORTMESSAGE0']); // Call flash message function
            Session::put('error', $result['L_SHORTMESSAGE0']);
            return redirect('error');
        }
    }
    public function cancel(Request $request) {
        // Payment failed
        Session::put('error', 'The payment process was cancelled.');
        //$this->helper->flash_message('error', 'The payment process was cancelled.'); // Call flash message function
        return redirect('error');
    }
}
