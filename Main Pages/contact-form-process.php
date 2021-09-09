<?php
if (isset($_POST['Email'])) {

    $email_to = "EMAIL ADDRESS";
    $email_subject = "Bayoe~n Blog New Form Submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "The following errors appear in this form:<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors and try submitting your form again.<br><br>";
        die();
    }

    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are very sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The email address you have entered is invalid. Please check that the email address has been entered correctly and try again.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The name you entered is invalid. Please check that the name on the form has been entered in correctly and try again.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The message you entered is invalid. Please check your message and try again.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    Thank you for contacting us! We will be in touch with you very soon.

<?php
}
?>
