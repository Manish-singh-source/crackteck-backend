<?php

// Use the modern PHPMailer from src directory
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Validate required POST data
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['contact']) ||
    !isset($_POST['companyname']) || !isset($_POST['message'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required form data']);
    exit();
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);
$companyname = trim($_POST['companyname']);
$products = trim($_POST['products']);
$message = trim($_POST['message']);

// Basic validation
if (empty($name) || empty($email) || empty($contact)) {
    echo json_encode(['status' => 'error', 'message' => 'Name, email, and contact are required']);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
    exit();
}

// Capture user's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];
$admin_email = 'dynarx.leads@gmail.com'; // Define the recipient email address

// Set the default timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Prepare email content for admin
$htmlbody = '
    <html>
    <head>
        <title>Contact Us - Form Enquiry</title>
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td valign="middle" align="center">
                        <table width="630" cellspacing="0" cellpadding="0" border="1">
                            <tbody>
                                <tr>
                                    <td valign="middle" align="center">
                                        <table width="630" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="middle" align="middle" style="background-color:#dcecf5;">
                                                        <table width="570" cellspacing="10" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="left" style="width:75%">
                                                                        <img style="display: inline-block; position: relative; max-width: 100%" src="https://dynarx.com/assets/img/logo.png" width="60%" height="60%" border="0">
                                                                    </td>
                                                                    <td valign="middle" align="left"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center">
                                                        <table width="620" cellspacing="20" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                        <font style="font-size: 13px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                            <b>Client Has Submitted Following Data Through Our Online Contact Form</b>
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center">
                                                        <table width="580" cellspacing="5" cellpadding="0" border="0" bgcolor="#DCECF5">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                        <table width="570" cellspacing="10" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Name :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($name) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                                  <tr>
                                                                                    <td valign="top" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Email ID :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($email) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Mobile No :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($contact) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                               
                                                                                   <tr>
                                                                                    <td valign="top" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Company Name :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($companyname) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                                 <tr>
                                                                                    <td valign="top" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Product of Interest :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($products) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            <strong>Message :</strong>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            ' . htmlspecialchars($message) . '
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>                                                                                 
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center">
                                                        <table width="600" cellspacing="10" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                        <table width="580" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="middle" align="left">
                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                            Regards,<br />
                                                                                            Team Dynarx <br />
                                                                                            <span>Email: <a href="mailto:dynarx.leads@gmail.com">dynarx.leads@gmail.com</a></span><br />
                                                                                            <span>Contact No:+91 804 169 6007</span><br />
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>    
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

// Prepare email content for client
$client_htmlbody = '
<html>
    <head>
        <title>Thank You for Contacting Us</title>
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td valign="middle" align="center">
                        <table width="630" cellspacing="0" cellpadding="0" border="1">
                            <tbody>
                                <tr>
                                    <td valign="middle" align="center">
                                        <table width="630" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="middle" align="middle" style="background-color:#dcecf5;">
                                                        <table width="570" cellspacing="10" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="left" style="width:75%">
                                                                        <img style="display: inline-block; position: relative; max-width: 100%" src="https://dynarx.com/assets/img/logo.png" width="40%" height="40%"  border="0">
                                                                    </td>
                                                                    <td valign="middle" align="left"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center">
                                                        <table width="620" cellspacing="20" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                        <font style="font-size: 13px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                            <b>Hi ' . htmlspecialchars($name) . ',</b>
                                                                            
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                        <table width="580" cellspacing="10" cellpadding="0" border="0" bgcolor="#DCECF5">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="middle" align="center">
                                                                                        <table width="570" cellspacing="10" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="left">
                                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                                        <span>We are delighted to welcome you to the Dynarx family! We hope you enjoy using our services. We have created a request for you. Our business advisor will get in touch with you in the next 12 hours and guide you through all your requirements. In the meanwhile, If you have any specific queries you mail us at: <a href="mailto:info@Dynarx.com">info@Dynarx.com</a></span><br />
                                                                                                        <span>Please visit our Website: <a href="https://Dynarx.com/">Dynarx.com</a> for more services. Our priority is to ensure that you get help & support from our team business advisor as quick and stress-free as possible - by keeping you updated on the progress. Again, thank you for deciding to work with us. We hope we can give you the same satisfaction as what our loyal clients have been experiencing from us. We look forward to a long-term relationship.</span><br />
                                                                                                        </font>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="middle" align="center">
                                                                                        <table width="600" cellspacing="10" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="center">
                                                                                                        <table width="580" cellspacing="0" cellpadding="0" border="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="middle" align="left">
                                                                                                                        <font style="font-size: 12px" color="#333333" face="Arial, Helvetica, sans-serif">
                                                                                                                            Best Regards,<br />
                                                                                                                            <span>Team Dynarx</span><br />
                                                                                                                            <span>Email: <a href="mailto:dynarx.leads@gmail.com">dynarx.leads@gmail.com</a></span><br />
                                                                                                                            <span>Contact No:+91 804 169 6007</span>
                                                                                                                        </font>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';

// Create a PHPMailer instance for admin email
$mail = new PHPMailer(true); // Enable exceptions
$admin_email_sent = false;
$client_email_sent = false;
$error_message = '';

try {
    // SMTP settings for admin email
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@technofra.com';
    $mail->Password = 'kcdi vqko dwgv yaku';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'dynarx.leads@gmail.com'; // Update with your email credentials
    // $mail->Password = 'kcdi vqkoï¿½dwgvï¿½yaku'; // Update with your email password
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 465;

    // $mail->SMTPAutoTLS = false;

    // Email content for admin
    $mail->setFrom('dynarx.leads@gmail.com', 'Dynarx'); // Update with sender's name and email address
    $mail->addAddress($admin_email);
    $mail->isHTML(true);
    $mail->Subject = 'Received an inquiry from the QR code (' . $currentDateTime . ')';
    $mail->Body = $htmlbody;

    // Add admin recipient

    // Send admin email
    if ($mail->send()) {
        $admin_email_sent = true;
    } else {
        throw new Exception('Failed to send admin email');
    }

    // If admin email sent successfully, send client email
    if ($admin_email_sent) {
        // Create a new PHPMailer instance for client email
        $client_mail = new PHPMailer(true); // Enable exceptions

        // SMTP settings for client email
        $client_mail->isSMTP();
        $client_mail->SMTPAuth = true;
        $client_mail->SMTPSecure = 'tls';
        $client_mail->SMTPAutoTLS = false;
        $client_mail->Host = 'smtp.gmail.com';
        $client_mail->Port = 587;
        $client_mail->Username = 'support@technofra.com'; // Update with your email credentials
        $client_mail->Password = 'kcdi vqko dwgv yaku'; // Update with your email password

        // Email content for client
        $client_mail->setFrom('dynarx.leads@gmail.com', 'Dynarx'); // Sender
        $client_mail->Subject = 'Thank You for Contacting Dynarx (' . $currentDateTime . ')';
        $client_mail->isHTML(true);
        $client_mail->Body = $client_htmlbody;

        // Correctly attach PDF - using the first available PDF from assets/pdf directory
        $pdf_path = __DIR__ . '/assets/pdf/Dynarx-Catalogue.pdf'; // Correct path to PDF file

        if (file_exists($pdf_path)) {
            $client_mail->addAttachment($pdf_path, 'Dynarx-Catalogue.pdf');
        } else {
            // Log the error but continue without attachment
            error_log("PDF attachment not found: " . $pdf_path);
            $error_message = 'PDF attachment not found, but email will be sent without attachment';
        }

        // Add client recipient
        $client_mail->addAddress($email);

        // Send client email
        if ($client_mail->send()) {
            $client_email_sent = true;
        } else {
            throw new Exception('Failed to send client email');
        }
    }

    // Check if both emails were sent successfully
    if ($admin_email_sent && $client_email_sent) {
        // Return success with PDF download information
        echo json_encode([
            'status' => 'success',
            'message' => 'Emails sent successfully',
            'pdf_url' => 'assets/pdf/Dynarx-Catalogue.pdf',
            'pdf_name' => 'Dynarx-Catalogue.pdf'
        ]);
    } else {
        throw new Exception('Email sending failed');
    }

} catch (Exception $e) {
    // Return detailed error information
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to send emails: ' . $e->getMessage()
    ]);
    exit();
}