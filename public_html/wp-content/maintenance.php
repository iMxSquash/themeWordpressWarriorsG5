<?php

//  ATTENTION!
//
//  DO NOT MODIFY THIS FILE BECAUSE IT WAS GENERATED AUTOMATICALLY,
//  SO ALL YOUR CHANGES WILL BE LOST THE NEXT TIME THE FILE IS GENERATED.
//  IF YOU REQUIRE TO APPLY CUSTOM MODIFICATIONS, PERFORM THEM IN THE FOLLOWING FILE:
//  /home/vvnrwyxu/public_html/wp-content/maintenance/template.phtml


$protocol = $_SERVER['SERVER_PROTOCOL'];
if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol) {
    $protocol = 'HTTP/1.0';
}

header("{$protocol} 503 Service Unavailable", true, 503);
header('Content-Type: text/html; charset=utf-8');
header('Retry-After: 600');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="https://amid-tourisme-voyage.dz/contenu/img/cropped-Logo_wp-32x32.png">
    <link rel="stylesheet" href="https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/styles.css?1734989856">
    <script src="https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/timer.js?1734989856"></script>
    <title>Maintenance planifiée</title>
    <style>body {background-image: url("https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/images/bg.jpg?1734989856");}</style>
</head>

<body>

    <div class="container">

    <header class="header">
        <h1>Ce site Web est en cours de maintenance planifiée.</h1>
        <h2>Veuillez nous excuser pour la gêne occasionnée. Notre site sera à nouveau disponible sous peu, revenez bientôt !</h2>
    </header>

    <!--START_TIMER_BLOCK-->
        <!--END_TIMER_BLOCK-->

    <!--START_SOCIAL_LINKS_BLOCK-->
    <section class="social-links">
                    <a class="social-links__link" href="https://www.facebook.com/cPanel" target="_blank" title="Facebook">
                <span class="icon"><img src="https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/images/facebook.svg?1734989856" alt="Facebook"></span>
            </a>
                    <a class="social-links__link" href="https://x.com/cPanel" target="_blank" title="Twitter">
                <span class="icon"><img src="https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/images/twitter.svg?1734989856" alt="Twitter"></span>
            </a>
                    <a class="social-links__link" href="https://instagram.com/cPanel" target="_blank" title="Instagram">
                <span class="icon"><img src="https://amid-tourisme-voyage.dz/wp-content/maintenance/assets/images/instagram.svg?1734989856" alt="Instagram"></span>
            </a>
            </section>
    <!--END_SOCIAL_LINKS_BLOCK-->

</div>

<footer class="footer">
    <div class="footer__content">
        Propulsé par WP Toolkit    </div>
</footer>

</body>
</html>
