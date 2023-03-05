<?php

// check if the form has been submitted
if (isset($_POST['submit'])) {

  // get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // set the recipient email address
  $to = 'youremail@example.com';

  // set the email subject
  $subject = 'New Contact Form Submission';

  // build the email message
  $message = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

  // set the email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // send the email
  if (mail($to, $subject, $message, $headers)) {
    // redirect to a success page
    header('Location: success.html');
    exit;
  } else {
    // redirect to an error page
    header('Location: error.html');
    exit;
  }

}

?>