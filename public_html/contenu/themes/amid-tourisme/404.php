<?php get_template_part('parts/header'); ?>

<main class="error-404">
    <div class="container">
        <div class="grid">
            <div>
                <h1>
                    <span>404</span> - Page non trouvée
                </h1>
                <p class="p1">
                    Oups ! La page que vous recherchez semble avoir pris des vacances sans nous prévenir.
                </p>
            </div>
            
            <div>
                <a href="<?php echo home_url(); ?>">
                    Retour à la page d'accueil
                </a>
                <p class="p2">
                    Continuez à explorer notre site pour découvrir nos offres de voyage.
                </p>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('parts/footer'); ?>