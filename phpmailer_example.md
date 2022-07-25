  ```php
  $mail = new PHPMailer(); // create a new object
  $mail->isSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->isHTML(true);
  $mail->Username = "username@gmail.com";
  $mail->Password = "<password>";
  $mail->setFrom("dummy_from@gmail.com");
  $mail->Subject = "Test";
  $mail->Body = "hello";
  $mail->addAddress("to@gmail.com");
  ```
  [Support Google](https://support.google.com/mail/answer/7126229?p=client_login&rd=2&visit_id=636840393382918914-896209239#cantsignin)
