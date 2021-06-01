<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'jasonjason12570@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

<?php 
  if(@$_POST['nickname']!='' && @$_COOKIE['mail']!='sent'){
  $nickname=$_POST['nickname'];
  $email=$_POST['email'];
  $sub=$_POST['subject'];
  $content=$_POST['content'];

  mb_internal_encoding("utf-8");
  $to="pjchender@mailinator.com";//填入自己的電子信箱
  $subject=mb_encode_mimeheader("$sub","utf-8");
  $message="$content";
  $headers="MIME-Version: 1.0\r\n";
  $headers.="Content-type: text/html; charset=utf-8\r\n";
  $headers.="From:".mb_encode_mimeheader("$nickname","utf-8")."<$email>\r\n";
  mail($to,$subject,$message,$headers);
  setcookie("mail","sent",time()+60*3);
  }else if(@$_POST['nickname']!='' && @$_COOKIE['mail']=='sent'){
  echo "<span class='alert alert-warning'>三分鐘只能寄一次信件</span>";
  }
?>
