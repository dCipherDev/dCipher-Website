<?php
if(isset($_POST['email'])) {
     
    // Editeaza cele doua linii asa cum ai tu nevoie:
    $email_to = "hello@dcipher.io";
    $email_subject = "New Mail Via Dcipher Website";
     
     
    function died($error) {
        // cod eroare
        echo "Ne pare rau, dar au fost intalnite erori in formularul dumneavoastra. ";
        echo "Aceste erori sunt afisate mai jos.<br /><br />";
        echo $error."<br /><br />";
        echo "Va rugam sa incercat din nou.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Ne pare rau, dar au fost intalnite erori in formularul dumneavoastra.');       
    }
     
    $first_name = $_POST['name']; // necesar
    $email_from = $_POST['email']; // necesar
    $comments = $_POST['message']; // necesar
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Campul "Email" nu a fost completat corespunzator.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Campul "Nume" nu a fost completat corespunzator.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Campul "Mesaj" nu a fost completat corespunzator.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "This email contains:\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
?>
<script type="text/javascript">
window.location.href = "index.html";
</script>
 
<?php
}
?>