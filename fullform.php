<?php
ob_start();
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
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
<form method="post" class="jform"> 
    <fieldset>
			<legend>Contact form</legend>

<table>
<tr><td><label>Your Name:</label></td><td><input class="wrong inp" id="fullname" name="yourname" type="text" value="" required/></td></tr>
<tr><td><label>Subject:</label></td><td><input class="wrong inp" id="lname" name="subject" type="text" value="" required/></td></tr>
<tr><td><label>Your Email:</label></td><td><input id="email" class="wrong inp" name="youremail" type="email" value="" required/></td></tr>
<tr><td style="border-bottom :none !important;"><label>Message:</label></td></tr></table>
<div><textarea style="width:440px;" name="message" rows="5" cols="20" class="wrong" id="about" required></textarea></div>
<?php
if('on' == $read_captch)
    
{        
require_once('recaptchalib.php');

$publickey = get_option('modern_privatekey');
$privatekey = get_option('modern_publickey');

?>
<div><?php echo recaptcha_get_html($publickey, $error); ?></div>
<tr><td><input type="submit" value="Send" name="submit" class="send"/></td></tr>
 <tr align="center"><td colspan="2"><input class="send"  type="submit" name="send" value="Send"/></td></tr>

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
		echo "Please, Try Again.";

        }
   }
}
if(isset ($_REQUEST['send']))
{
 
 if (mail($to, $subject, $body, $headers)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }

}
echo '</table>';
echo '</fieldset>';
echo '</form>';
?>