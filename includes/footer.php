    <!-- Footer -->
    <footer>
        <div class="back-to-top">
            <a href="<?= $backToTopTarget ?? '#main-section' ?>"><i class="fas fa-chevron-up"></i></a>
        </div>
        <div class="container section-content footer-content">
            <div class="footer-about">
                <h3 class="content-title footer-title">Informations</h3>
                <p>Bienvenu-e-s à l'atelier de Pom' Lestang, un atelier en pleine ville dans un écrin de verdure.</p>
            </div>
            <div class="footer-contact">
                <h3 class="content-title footer-title">Coordonnées</h3>
                <h6>Pomme Lestang</h6>
                <br>
                <h6>Les écuries</h6>
                <h6>83 rue de la Garde</h6>
                <h6>44 300 Nantes</h6>
                <br>
                <h6>Bus 80, arrêt Pétrels</h6>
                <br>
                <h6>T: +33 6 99 61 65 85</h6>
                <h6>E: pommelestang@hotmail.com</h6>
            </div>
            <div class="footer-social">
                <h3 class="content-title footer-title">Réseaux</h3>
                <ul class="social-list">
                    <li class="social-item">
                        <a href="https://www.facebook.com/PomLestang/" class="social-link" target="_blank">
                            <i class="fab fa-facebook-f social-icon"></i><span>Facebook</span>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.linkedin.com/in/pomme-lestang-26823086/" class="social-link" target="_blank">
                            <i class="fab fa-linkedin-in social-icon"></i> Linkedin
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.instagram.com/pom_lestang/" class="social-link" target="_blank">
                            <i class="fab fa-instagram social-icon"></i> Instagram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
    <?php if (!empty($pageScript)): ?>
    <script src="js/<?= htmlspecialchars($pageScript) ?>"></script>
    <?php endif; ?>
</body>
</html>

