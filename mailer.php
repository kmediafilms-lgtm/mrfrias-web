<?php
// Only process POST requests.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"] ?? ''));
    $name = str_replace(array("\r", "\n"), array(" ", " "), $name);
    $email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $subject = isset($_POST["subject"]) ? trim($_POST["subject"]) : 'Nuevo contacto desde la Web';
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : '';
    $message = trim($_POST["message"] ?? '');

    // Check that data was sent to the mailer.
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Por favor, completa todos los campos requeridos y proporciona un correo válido.";
        exit;
    }

    // Set the recipient email address.
    $recipient = "robertfrias1995@gmail.com, pedido@mrfriasfoodtruck.com";

    // Set the email subject.
    $email_subject = "Nuevo mensaje de contacto: $name";

    // Build the email content.
    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Teléfono: $phone\n";
    $email_content .= "Asunto: $subject\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>\r\n";
    $email_headers .= "Reply-To: $email\r\n";
    $email_headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email.
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "¡Muchas gracias! Tu mensaje ha sido enviado correctamente.";
    } else {
        http_response_code(500);
        echo "Lo sentimos, ocurrió un error al enviar tu mensaje. Inténtalo de nuevo más tarde.";
    }
} else {
    http_response_code(403);
    echo "Hubo un problema con el envío de tu formulario, por favor intenta de nuevo.";
}
?>
