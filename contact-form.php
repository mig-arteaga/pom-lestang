<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Sanitize return URL to prevent open redirects
$returnUrl = $_POST['return_url'] ?? 'index.php';
$parsedPath = parse_url($returnUrl, PHP_URL_PATH) ?: 'index.php';
$parsedQuery = parse_url($returnUrl, PHP_URL_QUERY);
$baseRedirect = ltrim($parsedPath, '/');
if ($baseRedirect === '' || strpos($baseRedirect, '//') !== false) {
    $baseRedirect = 'index.php';
}
// Keep category query param if redirecting back to gallery.php
$queryParams = [];
if ($parsedQuery) {
    parse_str($parsedQuery, $queryParams);
    unset($queryParams['status'], $queryParams['mailsend']);
}

function buildRedirectUrl(string $base, array $params, string $status): string
{
    $params['status'] = $status;
    return $base . '?' . http_build_query($params) . '#contact';
}

// Validate CSRF token
$csrfToken = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrfToken)) {
    $_SESSION['contact_error'] = 'Session expirée, veuillez réessayer.';
    header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'error'));
    exit;
}

$name    = trim($_POST['name'] ?? '');
$mail    = trim($_POST['mail'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$_SESSION['contact_old'] = [
    'name'    => $name,
    'mail'    => $mail,
    'subject' => $subject,
    'message' => $message,
];

// Validate fields
if ($name === '' || $mail === '' || $subject === '' || $message === '') {
    $_SESSION['contact_error'] = 'Veuillez remplir tous les champs obligatoires.';
    header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'error'));
    exit;
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['contact_error'] = 'Veuillez saisir une adresse e-mail valide.';
    header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'error'));
    exit;
}

// Store in database via PDO
$pdo = getDbConnection();
if (!$pdo) {
    $_SESSION['contact_error'] = 'Service momentanément indisponible. Veuillez réessayer plus tard.';
    header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'error'));
    exit;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)'
    );
    $stmt->execute([
        'name'    => $name,
        'email'   => $mail,
        'subject' => $subject,
        'message' => $message,
    ]);
} catch (PDOException $e) {
    error_log('Contact form insert error: ' . $e->getMessage());
    $_SESSION['contact_error'] = "Une erreur s'est produite lors de l'enregistrement de votre message.";
    header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'error'));
    exit;
}

// Attempt email notification (non-blocking if mail server is not configured locally)
$mailTo = 'contact@pomlestang.com';
$headers = "From: " . str_replace(["\r", "\n"], '', $mail);
$txt = "Vous avez reçu un mail de {$name}.\nMail : {$mail}.\n\n{$message}";
@mail($mailTo, $subject, $txt, $headers);

unset($_SESSION['contact_old']);
header('Location: ' . buildRedirectUrl($baseRedirect, $queryParams, 'sent'));
exit;
