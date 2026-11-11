<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$formStatus = $_GET['status'] ?? (isset($_GET['mailsend']) ? 'sent' : '');
$formError  = $_SESSION['contact_error'] ?? '';
$oldInput   = $_SESSION['contact_old'] ?? [];
unset($_SESSION['contact_error'], $_SESSION['contact_old']);
?>
    <!-- Contact -->
    <section class="contact <?= htmlspecialchars($contactClass ?? 'index-contact') ?>" id="contact">
        <div class="container section-content">
            <div class="contact-title">
                <h1 class="sub-headline main-sub-headline">N'hésitez pas</h1>
                <h3 class="headline main-headline">Contactez-moi !</h3>
                <p><span class="first-letter">A</span>vez-vous des questions concernant les cours et stages proposés ? ou voulez-vous des renseignements au sujet des expositions, les oeuvres et leurs prix ?</p>
                <p>N'hésitez pas à m'envoyer un message, je serai heureuse de vous donner les informations nécessaires.</p>
                <div class="signature"><img src="images/logo-pom.png" alt="Signature Pom' Lestang"></div>
            </div>
            <div class="form-box">
                <form class="contact-form" action="contact-form.php" method="post">
                    <div class="form-content">
                        <?php if ($formStatus === 'sent'): ?>
                            <div class="form-alert form-alert-success">
                                Votre message a bien été enregistré et envoyé. Merci !
                            </div>
                        <?php elseif ($formStatus === 'error'): ?>
                            <div class="form-alert form-alert-error">
                                <?= htmlspecialchars($formError ?: "Une erreur s'est produite. Veuillez vérifier les champs du formulaire.") ?>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        <input type="hidden" name="return_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'index.php') ?>">

                        <h5 class="content-sub-title">Nom</h5>
                        <input type="text" name="name" class="nom" autocomplete="name" value="<?= htmlspecialchars($oldInput['name'] ?? '') ?>" required>
                        <h5 class="content-sub-title">Adresse mail</h5>
                        <input type="email" name="mail" class="email" autocomplete="email" value="<?= htmlspecialchars($oldInput['mail'] ?? '') ?>" required>
                        <h5 class="content-sub-title">Sujet</h5>
                        <input type="text" name="subject" class="sujet" autocomplete="off" value="<?= htmlspecialchars($oldInput['subject'] ?? '') ?>" required>
                        <h5 class="content-sub-title">Message</h5>
                        <textarea name="message" class="message" required><?= htmlspecialchars($oldInput['message'] ?? '') ?></textarea>
                        <button type="submit" name="submit" class="btn main-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
