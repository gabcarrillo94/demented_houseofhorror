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
