<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Email configuration
    $to = 'real.matlakala96@gmail.com.com';
    $email_subject = "New contact form submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n".
                  "Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: noreply@example.com\n"; // Replace with a valid domain
    $headers .= "Reply-To: $email";   

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'OK';
    } else {
        echo 'Email sending failed.';
    }
} else {
    echo 'Invalid request.';
}
?>
