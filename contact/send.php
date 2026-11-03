<?php
/**
 * Contact form handler for the static Northfield Day Care Center site.
 * Replaces Contact Form 7 (which needed WordPress). Uses PHP mail().
 */

$to       = 'BetterFutures@NorthfieldDaycareCenter.org';
$fromAddr = 'no-reply@northfielddaycarecenter.org';
$back     = './'; // the contact page in the same folder as this script

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ' . $back); exit; }

// Honeypot: real visitors never fill this hidden field.
if (!empty($_POST['website_url'])) { header('Location: ' . $back . '?sent=1'); exit; }

function clean_line($v) { return trim(str_replace(["\r", "\n", "%0a", "%0d"], ' ', (string)$v)); }

$name    = clean_line($_POST['your-name'] ?? '');
$email   = clean_line($_POST['your-email'] ?? '');
$subject = clean_line($_POST['your-subject'] ?? '');
$message = trim((string)($_POST['your-message'] ?? ''));

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { header('Location: ' . $back . '?sent=0'); exit; }

$mailSubject = 'Website contact: ' . ($subject !== '' ? $subject : 'New message');
$body  = "Name: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Subject: {$subject}\n\n";
$body .= "Message:\n{$message}\n\n";
$body .= "--\nSent from the contact form on northfielddaycarecenter.org";

$headers  = "From: Northfield Day Care Center <{$fromAddr}>\r\n";
$headers .= "Reply-To: {$name} <{$email}>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$ok = mail($to, $mailSubject, $body, $headers, '-f' . $fromAddr);

header('Location: ' . $back . '?sent=' . ($ok ? '1' : '0'));
exit;
