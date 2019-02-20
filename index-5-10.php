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
  <link rel="shortcut icon" href="favicon.png"/>
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

var mouseoversound=createsoundbite("sound-scream2.mp3")

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


  <!-- Header Section Start -->
  <div id="header">
    <div class="container">

</div>

      <div class="col-md-12 top-header">

        <div style="padding-left:20px;" class="logo-menu">
          <div class="logo pull-left wow fadeInDown animated" data-wow-delay=".2s">
            <a href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
          </div>
            <div style="float:left; position: fixed; z-index:9999;" id="prompt"><a href="" onmouseover="mouseoversound.playclip()"><img src="assets/extras/bulb.gif" border="none"/></a></div>
          <div class="pull-right wow fadeInDown animated" data-wow-delay=".2">
            <div id="menu" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
              <span>menu</span>
            </div>
          </div>
        </div>
        <div class="sidebar-nav">
          <!-- navigation start -->
          <div class="navmenu navmenu-default navmenu-fixed-right offcanvas" style="" id="navigation">
            <a href="index.html"><img class="logo" src="assets/img/logo.png" alt="logo demented haunt"></a>
            <ul class="nav navmenu-nav">
              <li class="active"><a href="#header">Home</a></li>
                <li><a href="#clients">Start</a></li>
              <li><a href="#works">Escape Room</a></li>
              <li><a href="#blog">Pricing</a></li>
                <li><a href="#testimonial">Calendar</a></li>
                <li><a href="#blog">Buy tickets</a></li>
              <li><a href="#feedback">Contact</a></li>
            </ul>
          </div>
          <!-- navigation End -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="banner text-center">
            <h1 class="wow fadeInDown animated" data-wow-delay=".6s">ESCAPE ROOM </h1>
            <h2 class="wow fadeInDown animated" data-wow-delay="1.0s">OCTOBER 2017 - IN MARGATE</h2>
            <a href="#testimonial" class="btn btn-border lg wow fadeInDown animated" data-wow-delay="1.4s">CALENDAR</a>
            <a href="#blog" class="btn btn-common lg wow fadeInDown animated" data-wow-delay="1.4s">TICKETS</a>

            <div class="scroll">
              <a href="#clients"><i class="fa fa-angle-down wow fadeInDown animated" data-wow-delay="2.0s"></i></a>

          </div>
        </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Header Section End -->
 <!-- Clients Section Start -->
  <section id="clients">
    <div class="container">
        <div class="row">
      <div class="col-sm-6 col-md-6">
        <h1 class="section-title black wow fadeInLeft animated" data-wow-delay=".5s">WELCOME TO<br><span>THE DEMENTED HAUNT</span>
          <b style="font-size: 0.5em; color:#fff !important; font-weight:400 !important;">THE ESCAPE ROOM </b>
          </h1>
        <div style="text-align:justify;">
          <h2 class="wow fadeInLeft animated" data-wow-delay=".8s">This will not be your typical escape room. Be ready for the unexpected. Not only will you have to try to escape but will have to work together as a team to find clues and solve problems, but be careful because one wrong turn will put everyone's life in danger. </h2>

        </div>
      </div>

        <div class="col-sm-6 col-md-6 wow fadeInRight animated" data-wow-delay="1.2s">

            <div style="text-align:justify; margin-left:40px; max-width:400px;">
            <h2>Be prepared to be challenged and solve all the clues at your own risk, and don't worry we have you on video.</h2>

            <h2 style="color:#111 !important; font-size:3em;">You will have 60 minutes to get the formula and get out!</h2>
            <div style="text-align:right; margin-top:20px;"><img src="assets/img/logo-small.png" alt="logo demented haunt"></div>
            </div>
        </div>
            <div class="clearfix">
        </div>

            <div class="col-sm-12 col-md-12 wow fadeInRight animated" data-wow-delay="1.4s">
            <div style="text-align:center; margin-top:30px;">
            </div>
        </div>

      </div>
        </div>
    </div>
  </section>
  <!-- Clients Section End -->
  <!-- Work Section Start -->
  <section id="works">
    <div class="container">
      <div class="row">
        <h1 class="section-title red wow fadeInLeft animated" data-wow-delay=".6s">THE ESCAPE ROOM</h1>
        <div class="col-md-7 col-lg-7 grid-left wow fadeInLeft animated" data-wow-delay="1.2s">
         <div style="text-align:justify;">
          <h2 class="wow fadeInLeft animated" data-wow-delay=".8s">There is a demented scientist that created a bio hazard chemical that would deteriorate your body inside out, but just enough to keep you alive !!! What you need to do is find out where he put the formula that would reverse the chemical reaction and destroy the work he did so that no one else can get there hands on it.  <br><br> Beware of your footsteps and toxic airborne.  </h2>

        </div>
        </div>
        <div class="col-md-5 grid-right wow fadeInRight animated" data-wow-delay="1.6s">
          <div class="grid-box large">
            <img src="assets/img/work/img4.jpg" alt="the demente house lil haunt house for kids">
            <div class="overlay">
               <a href="assets/img/work/img44.jpg" data-lightbox="img4"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="grid-box">
            <img src="assets/img/work/img5.jpg" alt="creepy house in palm beach demented house">
            <div class="overlay">
               <a href="assets/img/work/img55.jpg" data-lightbox="img5"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="browse-box">
            <div class="more">
              <a href="#blog"><i class="fa fa-arrow-circle-right"></i>BUY TICKETS</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Work Section End  -->

  <!-- Testimonial Section Start-->
  <section id="testimonial">
      <div class="testimonial">

          <h1 class="wow red fadeInDown animated" data-wow-delay=".6s">2017 CALENDAR</h1>
    <div class="cal wow fadeInDown animated" data-wow-delay=".9s">
      <table class="cal-table" >
        <caption class="cal-caption">
          <?php echo date("F j, Y"); ?>
        </caption>
        <tbody class="cal-body">
            <tr>
            <td class="cal-off">SUN</td>
            <td class="cal-off">MON</td>
            <td class="cal-off">TUE</td>
            <td class="cal-off">WED</td>
            <td class="cal-off">THU</td>
            <td class="cal-off">FRI</td>
            <td class="cal-off">SAT</td>
          </tr>
          <tr>
            <td><a>1</a></td>
            <td><a>2</a></td>
            <td><a>3</a></td>
            <td><a>4</a></td>
            <td><a>5</a></td>
            <td><a>6</a></td>
            <td><a>7</a></td>
          </tr>
          <tr>
            <td><a>8</a></td>
            <td><a>9</a></td>
            <td><a>10</a></td>
            <td><a>11</a></td>
            <td><a>12</a></td>
            <td><a>13</a></td>
            <td><a>14</a></td>
          </tr>
          <tr>
            <td><a>15</a></td>
            <td><a>16</a></td>
            <td><a>17</a></td>
            <td><a>18</a></td>
            <td><a>19</a></td>
            <td><a>20</a></td>
            <td><a>21</a></td>
          </tr>
          <tr>
            <td><a>22</a></td>
            <td><a>23</a></td>
            <td><a>24</a></td>
            <td><a>25</a></td>
            <td><a>26</a></td>
            <td><a>27</a></td>
            <td><a>28</a></td>
          </tr>
          <tr>
            <td><a>29</a></td>
            <td><a>30</a></td>
            <td><a>31</a></td>
            <td class="cal-off"><a>1</a></td>
            <td class="cal-off"><a>2</a></td>
            <td class="cal-off"><a>3</a></td>
            <td class="cal-off"><a>4</a></td>
          </tr>
        </tbody>
      </table>
    </div>
          <h2 class="wow fadeInDown animated" data-wow-delay=".8s">Groups between 4 - 10 people</h2>
          <br>
          <h3 class="wow fadeInDown animated" data-wow-delay=".8s"><span class="red">Get Your Tickets</span></a></h3>
          </div>
  </section>
  <!-- Skills Section End -->

  <!-- Blog Section Start-->
  <section id="blog">
    <div class="container">
      <div class="row">
        <h1 class="section-title red wow fadeInLeft animated" data-wow-delay=".6s">Check our Prices<br><span>AND PURCHASE NOW</span></h1>
        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
          <div class="blog-large wow fadeInLeft animated"  data-wow-delay="1.2s">
            <img src="assets/img/blog/img1.jpg" alt="lil haunt house for kids visit in miami palm beach">

          </div>
        </div>
        <div  class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight animated" data-wow-delay="1.6s">



          <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="paypal">
                <fieldset>
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="add" value="1">
                <input type="hidden" name="business" value="willu69r@aol.com">
                <input type="hidden" name="item_name" value="Adult TICKET - Demented Haunt">
                <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="amount" value="25">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="return" value="http://www.minicartjs.com/?success">
                <input type="hidden" name="cancel_return" value="http://www.minicartjs.com/?cancel">
                </fieldset>

              <div style="margin-top:45px;" class="blog-item">
                <img src="assets/img/blog/img-ticket.png" alt="Buy tickets online demented house">
                <div class="content">
                  <a class="title">Adults / Children +10 <span style="font-size:25px; color:#ca0106;"><br>Price: $25</span></a><br><br>

                    <div class="buy">
                    <button class="buy-now" type="submit">Buy Now</button>
                    </div>
                </div>
              </div>
          </form>


        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight animated cn-clear" data-wow-delay="1.8s">
          <div class="buytext">
              <h3><span style="font-size:1.55em; color:#ca0106;"> Dare to Enter!</span><br><br>
                This October in Margate FL.
            </h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Section Start
<section id="clients">
    <div class="container">
        <h1 style="text-align:center !important;" class="wow fadeInDown animated" data-wow-delay=".6s"><br><br>DEMENTED HAUNT DARE YOU TO TRY THIS GAMES...</h1>
        <div style="padding-top:20px !important;" class="row">
      <div class="col-sm-6 col-md-6 wow fadeInLeft animated" data-wow-delay="0.8s">


          <a href="http://lockboxescaperoom.com/" target="_blank"><img src="assets/img/friend1.jpg"></a>

      </div>

        <div class="col-sm-6 col-md-6 wow fadeInRight animated" data-wow-delay="1.2s">
<a href="http://lockboxescaperoom.com/" target="_blank"><img src="assets/img/friend2.jpg"></a>
        </div>
      </div>
        <h1 class="section-title wow fadeInLeft animated whitefull" data-wow-delay=".6s">Get a 10% Promo Discount by using <span style="font-size:1.1em;">#DEMENTEDHAUNT16</span> coupon!</h1>
        </div>
    </div>
  </section>
  <!-- Feedback Section Start -->
  <section id="feedback">
    <div class="container">
      <div class="row">
        <h1 class="section-title wow fadeInLeft animated" data-wow-delay=".6s"><span>Contact us</span></h1>
        <div class="col-sm-6 col-md-6 wow fadeInLeft animated" data-wow-delay="1.4s">
          <form action="contact-mail.php" method="post" name="contact">
              <?php
                $publicKey = rand()%9;
                $privateKey = 12484623298651774;
                $token = sha1( $publicKey * $privateKey + $privateKey );
              ?>
               <input type="hidden" name="_token" id="_token" value="<?= $token; ?>">
              <div style="display:none;">
              <input type="text" name="publicKey" id="publicKey" value="<?= $publicKey; ?>" required="required">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="name" id="name" class="form-control" placeholder="Your name" required="required">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
            </div>

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-comments"></i></span>
              <textarea name="message" id="message" class="form-control large" placeholder="Message" required="required"></textarea>
            </div>

            <button type="submit" class="btn btn-green"><i class="fa fa-envelope-o"></i>Send</button>
          </form>
        </div>
        <div class="col-sm-4 col-md-4 col-md-offset-2 wow fadeInRight animated" data-wow-delay="1.4s">
          <div class="address">
            <h2>Contact Info</h2>
            <ul class="contact-info">
              <li><i class="fa fa-mobile"></i> (954) 465-0666</li>
              <li><i class="fa fa-envelope-o"></i> dementedhaunt@gmail.com</li><br>
                <li>Location: <br> 2515 N State RD 7 <br>
Margate, FL.</li>
            </ul>
              <h2 style="color:#ffd600 !important;">If interested in acting please call or email for a fun opportunity!!</h2>
            <ul class="social-icon">
              <li><a href="https://m.facebook.com/Demented-haunt-1595093810766796" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/dementedhaunt" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Feedback Section End -->

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
