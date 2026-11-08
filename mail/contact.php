<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone'] ?? ''));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "contact@example.com"; // À REMPLACER par l'e-mail professionnel de DMTO
$subject = "$m_subject : $name";
$body = "Nouveau message depuis le site DMTO.\n\nNom : $name\nE-mail : $email\nTéléphone : $phone\nObjet : $m_subject\n\nMessage :\n$message";
$header = "From: no-reply@dmto87.com\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
