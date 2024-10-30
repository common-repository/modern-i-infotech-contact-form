<?php

/*

  add setting page

*/





add_shortcode('modern_contact','modern_short');



function modern_short()

{
echo '<script language="javascript" src="'.plugins_url("modern-i-infotech-contact-form/include/validate.js").'" type="text/javascript"></script>';
echo '<link rel="stylesheet" type="text/css" href="'.plugins_url('modern-i-infotech-contact-form/include/style.css').'">';

$read_captch = get_option('modern_check_captch');

global $current_user;

get_currentuserinfo();



if('1' == get_option('email_radio')){ $to = $current_user->user_email; }

if('2' == get_option('email_radio')){  $to = get_option('email_used');}



$name = $_POST['yourname'];

$from = $_POST['youremail'];

$subject = $_POST['subject'];

$body = $_POST['message'];

$headers = "From: $from.in\r\n" ."Name: $name.in\r\n" .

     "X-Mailer: php";

?>



<head> 

<script type="text/javascript">

 var RecaptchaOptions = {

    theme : 'white'

 };

 </script></head>

<body>

<div>

<form method="post" class="formstyle"> 

    



<table>

<tr><td><label>Your Name:</label></td><td><input  class="wrong inp" id="fullname" name="yourname" type="text" value="" required/></td></tr>

<tr><td><label>Subject:</label></td><td><input  class="wrong inp" id="lname" name="subject" type="text" value="" required/></td></tr>

<tr><td><label>Your Email:</label></td><td><input  id="email" class="wrong inp" name="youremail" type="email" value="" required/></td></tr>

<tr><td style="border-bottom :none !important;"><label>Message:</label></td></tr></table>

<div><textarea  style="width:440px;" name="message" rows="5" cols="20" class="wrong" id="about" required></textarea></div>

<?php

if('on' == $read_captch)

    

{        

require_once('recaptchalib.php');



// Get a key from http://recaptcha.net/api/getkey

//6Lcpns4SAAAAAFco6jEEdmmUiVps8jRjmZ-GE5ZV

//6Lcpns4SAAAAADpvbrR2eAf14ERt4gbcmYme9DGa

$publickey = get_option('modern_privatekey');

$privatekey = get_option('modern_publickey');



# was there a reCAPTCHA response?

?>

<div><?php echo recaptcha_get_html($publickey, $error); ?></div>

<tr><td><input class="sendlink" type="submit" value="Send" name="submit" class="send"/></td></tr>





<?php 



if (isset ($_REQUEST['submit'])) {

    $response = recaptcha_check_answer($privatekey,

	    $_SERVER["REMOTE_ADDR"],

	    $_POST["recaptcha_challenge_field"],

	    $_POST["recaptcha_response_field"]);



          if ($response->is_valid)

     {

            if (mail($to, $subject, $body, $headers))

           {

            echo("<p>Message successfully sent!</p>");

           }      

          else 

            {

            echo("<p>Message delivery failed...</p>");

            }

     } 

        else {

                # set the error code so that we can display it

		echo ("<p>Please, Try Again.</p>");



        }

   }

}

 else

{?>

<tr align="center"><td colspan="2"><input class="sendlink"  type="submit" name="send" value="Send"/></td></tr>

<?php 

if(isset ($_REQUEST['send']))

{

 

 if (mail($to, $subject, $body, $headers)) {

   echo("<p>Message successfully sent!</p>");

  } else {

   echo("<p>Message delivery failed...</p>");

  }



}

}

echo '</table>';

echo '</form>';

echo '</div>';

echo '</body>';

} 

?>