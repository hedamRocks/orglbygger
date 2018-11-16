<?


if(isset($_POST['message'])) {
 
    $email_to = "info@xombat.dk";
    $email_to = "niols10@gmail.com";
 
    $email_subject = "Mail from orgelbygger.dk";
 
    function success($msg){
        echo '<h2 class="white-text bold" style="margin-bottom:10px;">Tak for din besked</h2>';
        echo "<h3 class='lighter-text' style='margin-bottom:20px;'>".$msg."</h3>";
        echo '<button id="sendNewBtn" onClick="sendNew();" class="l-btn full-width med-pad" style="background:#ff8585;border:0px;border-radius:5px;"><h3 class="white-text bold">Send ny besked</h3></button>';
    }
    function died($error) {
 
        // your error code can go here
        
        echo "<div class='red' style='width:100%;height:100%;padding:5%;'><center class='textWrap'>";

        echo "We are very sorry, but there were some errors:<br /><br />";
 
        echo "<span style='font-size:15px; line-height:2; letter-spacing:3px;'>".$error."</span><br /><br />";
 
        echo "<button class='x-btn big-btn dark-btn full-btn' onclick='sendNew();'>Try Again</button>";
        echo "</center></div>";
 
        die();
 
    }
 

 /*
    if(!isset($_POST['name']) || !isset($_POST['mail']) || !isset($_POST['phone']) ){
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 */
     
 
    $first_name = $_POST['name'];
 
    $email_from = $_POST['mail'];
 
    $telephone = $_POST['phone'];

    $besked = $_POST['message'];
 
     
 /*
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '- The Email Address isn\'t valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '- The First Name you entered isn\'t valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 */
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Navn: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telefon: ".clean_string($telephone)."\n";

    $email_message .= "Besked: ".clean_string($besked)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 success('Jeg har nu modtaget din besked, og vil vende tilbage hurtigst muligt.');
?>

<?php
}
?>