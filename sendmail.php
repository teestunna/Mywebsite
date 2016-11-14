<?php

      include "classes/class.phpmailer.php";

      /* If e-mail is not valid show error message */
      if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
      {
      show_error("E-mail address not valid");
      }

      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug = 1;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = "smtp.mail.yahoo.com";
      $mail->Port = 465;
      $mail->IsHTML(true);
      $mail->Username = "chillinwittope@yahoo.com";
      $mail->Password = "Stunna93";
      $mail->SetFrom($_POST["email"],$_POST["name"]);
      $mail->Subject=$_POST["subject"];
      $mail->Body=$_POST["message"];
      $mail->AddAddress('chillinwittope@yahoo.com');
        if(!$mail->Send())
        {
            echo 'Message could not be sent.';
            echo "Mailer Error: ". $mail->ErrorInfo;

        }
        else{
            header('Location:thanks.html');
            exit();

        }

        /* Functions we used */
        function check_input($data, $problem='')
        {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if ($problem && strlen($data) == 0)
        {
        show_error($problem);
        }
        return $data;
        }

        function show_error($myError)
        {
        ?>
        <html>
        <body>

        <p>Please correct the following error:</p>
        <strong><?php echo $myError; ?></strong>
        <p>Hit the back button and try again</p>

        </body>
        </html>
        <?php
        exit();
        }
?>
