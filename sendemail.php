<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Base files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Define some constants
define("RECIPIENT_NAME", "Emaar Emaris");
define("RECIPIENT_EMAIL", "sanjeev@adomantra.com");


// Read the form values
$success = false;
$userName = isset($_POST['username']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username']) : "";
$senderEmail = isset($_POST['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email']) : "";
$userPhone = isset($_POST['phone']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone']) : "";
$userSubject = isset($_POST['subject']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject']) : "";
$message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";

// If all values exist, send the email
if ($userName && $senderEmail && $userPhone && $message) {

    // PHPMailer classes into the global namespace

    // create object of PHPMailer class with boolean parameter which sets/unsets exception.
    $mail = new PHPMailer(true);

    // Template start

    $AdminMessage = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <table
        style="
        width: 600px;
        margin: auto;
        border: solid 1px #f0f0f0;
        border-spacing: 0;
      ">
        <tr>
            <td colspan="2">
                <div style="width: 25%; margin: 0px auto">
                    <img src="img/thank_u.png" alt=""
                        style="width: 150px; padding: 0px 15px" />
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-family: sans-serif; padding: 0px 15px">
                    Hello <b>Admin</b>,
                </p>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    Greetings! Wanted to inform you about a new enquiry. Please
                    note the client requirements below for your convenience:
                </p>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    Should assistance be needed, please do not hesitate to reach out.
                </p>
                <ul>
                    <li
                        style="
                font-family: sans-serif;
                line-height: 26px;
                padding: 0px 15px;
              ">
                        Full name :
                        <span>
                            ' . $userName . '
                        </span>
                    </li>
                    <li
                        style="
                font-family: sans-serif;
                line-height: 26px;
                padding: 0px 15px;
              ">
                        Email address:
                        <span>
                            ' . $senderEmail . '
                        </span>
                    </li>
                    <li
                        style="
                font-family: sans-serif;
                line-height: 26px;
                padding: 0px 15px;
              ">
                        Phone number:
                        <span>
                            ' . $userPhone . '
                        </span>
                    </li>
            <li
              style="
                font-family: sans-serif;
                line-height: 26px;
                padding: 0px 15px;
              "
            >
              Message:
              <span>
                ' . $message . '
              </span>
            </li>
                </ul>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    We would greatly appreciate it if you could follow up on this lead
                    promptly and professionally.
                </p>
            </td>
        </tr>
      
    </table>
</body>

</html>';

    $userMessage = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <table
        style="
        width: 600px;
        margin: auto;
        border: solid 1px #f0f0f0;
        border-spacing: 0;
      ">
        <tr>
            <td colspan="2">
                <div style="width: 25%; margin: 0px auto;">
                    <img src="img/thank_u.png" alt=""
                        style="width:150px;  padding: 0px 15px;" />
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <img src="img/thank_u.png' . '" alt=""
                    style="width: 600px; padding: 0px 15px" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-family: sans-serif; padding: 0px 15px">
                    Dear
                    <b>
                        ' . $userName . '
                    </b>,
                </p>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    Thank you for reaching out to us.
                </p>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    Our dedicated team of experts will review your request and get back
                    to you within few minutes.
                </p>
                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    Till then, explore our other services.
                </p>

                <p
                    style="
              font-family: sans-serif;
              line-height: 26px;
              padding: 0px 15px;
            ">
                    <b>With Trehan</b>
                </p>
            </td>
        </tr>
      
    </table>
</body>

</html>';

    // Template end


    try {
        $mail->SMTPDebug = 0;  //SMTP debug
        $mail->isSMTP(); // using SMTP protocol
        $mail->Host = '43.225.53.235'; // SMTP host as gmail
        $mail->SMTPAuth = true;  // enable smtp authentication
        $mail->Username = 'maccure@dmanto.com';  // sender gmail host
        $mail->Password = 'G{Q3?kb&y4Q'; // sender gmail host password
        $mail->SMTPSecure = 'tls';  // for encrypted connection
        $mail->isHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );
        $mail->Port = 587;   // port for SMTP

        $mail->setFrom('info@trehanfloors.info', "Trehan"); // sender's email and name
        $mail->addAddress('info@trehanfloors.info');
        // receiver's email and name

        if ('Admin' == 'Admin') {
            $mail->addAddress('matrixventures003@gmail.com', "Admin");
			$mail->addBcc('sanjeev@adomantra.com', "Admin");
            $mail->Subject = 'Admin';
            $mail->Body = $AdminMessage;
            $mail->send();
        }

        if ('User' == 'User') {
            $mail->addAddress($senderEmail, $userName);
            $mail->Subject = 'User';
            $mail->Body = $userMessage;
            $mail->send();
        }


        // echo 'Message has been sent';
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    // $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";

    // $headers = "From: " . $userName . "";
    // $msgBody = " Name: " . $userName . " Email: " . $senderEmail . " Phone: " . $userPhone . " Subject: " . $userSubject . " Message: " . $message . "";
    // $success = mail($recipient, $headers, $msgBody);

    //Set Location After Successsfull Submission
    header('Location: thank-u.html?message=Successfull');
} else {
    //Set Location After Unsuccesssfull Submission
    header('Location: index.html?message=Failed');
}

?>