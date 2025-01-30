<?php
if (!defined('ABSPATH')) {
    exit;
}

// Fonction pour afficher le formulaire de devis.
function amid_render_quote_form()
{
    ob_start(); ?>
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 w-full mx-auto p-4 md:p-12 bg-primary-900 rounded-t-3xl md:rounded-t-5rem relative z-10">
        <div class="gap-2 md:gap-4 grid md:!hidden">
            <p class="text-xl md:text-2xl font-bold text-primary-100">Réalisez votre <span
                    class="text-primary-500">rêve</span> de <span class="text-primary-500">voyage</span> en un clic :
                demandez votre devis <span class="text-primary-500">personnalisé</span> dès maintenant !</p>
        </div>
        <!-- Colonne de gauche -->
        <div class="grid grid-rows-[auto_1fr_auto] gap-4 md:gap-6 order-2 md:order-1">
            <!-- Section titre -->
            <div class="gap-2 md:gap-4 hidden md:!grid">
                <p class="text-xl md:text-2xl font-bold text-primary-100">Réalisez votre <span
                        class="text-primary-500">rêve</span> de <span class="text-primary-500">voyage</span> en un clic :
                    demandez votre devis <span class="text-primary-500">personnalisé</span> dès maintenant !</p>
            </div>

            <!-- Section informations de contact -->
            <div class="grid gap-3 md:gap-4 self-center !justify-items-start">
                <div class="grid items-center gap-2 md:gap-3" style="grid-auto-flow: column;">
                    <svg class="text-primary-500 size-4 md:size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="text-sm md:text-base text-primary-100">+213 5 52 24 33 03</span>
                </div>
                <div class="grid items-center gap-2 md:gap-3" style="grid-auto-flow: column;">
                    <svg class="text-primary-500 size-4 md:size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm md:text-base text-primary-100">amidvoyages@yahoo.fr</span>
                </div>
                <div class="grid items-center gap-2 md:gap-3" style="grid-auto-flow: column;">
                    <svg class="text-primary-500 size-4 md:size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-sm md:text-base text-primary-100">Rue Cherchali frères El Arbi n°09 Loc * C * Douéra -
                        Alger (Algérie)</span>
                </div>
            </div>

            <!-- Section réseaux sociaux -->
            <div class="grid grid-cols-6 md:grid-cols-8 gap-3 md:gap-4 justify-start" style="grid-auto-flow: column;">
                <a href="https://www.facebook.com/amid.elamid" target="_blank"
                    class="grid place-items-center bg-primary-500 text-primary-100 rounded-full max-w-min p-3 md:p-4 hover:bg-primary-500/80 transition-colors">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/amidtourismevoyage/" target="_blank"
                    class="grid place-items-center bg-primary-500 text-primary-100 rounded-full max-w-min p-3 md:p-4 hover:bg-primary-500/80 transition-colors">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Colonne de droite - Formulaire -->
        <form id="amid-quote-form" method="post"
            class="grid gap-4 md:gap-6 bg-primary-100 rounded-xl md:rounded-2rem p-4 md:p-6 order-1 md:order-2">
            <div class="space-y-1 md:space-y-2">
                <label for="name" class="block text-xs md:text-sm font-medium text-primary-900">Nom complet :</label>
                <input type="text" id="name" name="name" required placeholder="Jean Dupont"
                    class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
            </div>

            <div class="space-y-1 md:space-y-2">
                <label for="email" class="block text-xs md:text-sm font-medium text-primary-900">E-mail :</label>
                <input type="email" id="email" name="email" required placeholder="jean.dupont@example.com"
                    class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
            </div>

            <div class="space-y-1 md:space-y-2">
                <label for="phone" class="block text-xs md:text-sm font-medium text-primary-900">Téléphone :</label>
                <input type="tel" id="phone" name="phone" placeholder="06 12 34 56 78"
                    class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1 md:space-y-2">
                    <label for="type_voyage" class="block text-xs md:text-sm font-medium text-primary-900">Type de voyage
                        :</label>
                    <select id="type_voyage" name="type_voyage" required
                        class="w-full py-1.5 md:py-2 appearance-none border-b-2 border-b-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:outline-none">
                        <option value="">Sélectionnez un type</option>
                        <option value="tourisme_algerie">Tourisme en Algérie</option>
                        <option value="voyage_religieux">Voyage Religieux</option>
                        <option value="international">International</option>
                    </select>
                </div>
                <div class="space-y-1 md:space-y-2">
                    <label for="destination" class="block text-xs md:text-sm font-medium text-primary-900">Destination
                        :</label>
                    <select id="destination" name="destination" required
                        class="w-full py-1.5 md:py-2 appearance-none border-b-2 border-b-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:outline-none">
                        <option value="">Sélectionnez une destination</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1 md:space-y-2">
                    <label for="travel_date" class="block text-xs md:text-sm font-medium text-primary-900">Date départ
                        :</label>
                    <input type="date" id="travel_date" name="travel_date" required
                        class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
                </div>
                <div class="space-y-1 md:space-y-2">
                    <label for="return_date" class="block text-xs md:text-sm font-medium text-primary-900">Date retour
                        :</label>
                    <input type="date" id="return_date" name="return_date" required
                        class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
                </div>
            </div>

            <div class="space-y-1 md:space-y-2">
                <label for="participants" class="block text-xs md:text-sm font-medium text-primary-900">Nombre de
                    participants :</label>
                <input type="number" id="participants" name="participants" required min="1" placeholder="2"
                    class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none">
            </div>

            <div class="space-y-1 md:space-y-2">
                <label for="message" class="block text-xs md:text-sm font-medium text-primary-900">Message :</label>
                <textarea id="message" name="message" rows="4" placeholder="Vos attentes et préférences pour le voyage..."
                    class="w-full py-1.5 md:py-2 border-b-2 border-b-primary-900/30 placeholder:text-primary-900/30 text-sm md:text-base text-primary-900 bg-transparent transition-colors focus:border-b-primary-300 focus:placeholder:text-primary-300 focus:outline-none"></textarea>
            </div>

            <button type="submit" name="amid_quote_submit"
                class="w-full bg-primary-300 text-primary-100 py-2 md:py-3 px-4 rounded-lg text-sm md:text-base hover:bg-primary-300/80 transition-colors">
                Envoyer la demande de devis
            </button>
        </form>
    </div>
    <?php return ob_get_clean();
}

// Fonction pour gérer la soumission du formulaire.
function amid_handle_quote_submission()
{
    if (isset($_POST['amid_quote_submit'])) {
        $data = array(
            'full_name' => sanitize_text_field($_POST['name']),
            'email' => sanitize_email($_POST['email']),
            'phone' => sanitize_text_field($_POST['phone']),
            'type_voyage' => sanitize_text_field($_POST['type_voyage']),
            'destination' => sanitize_text_field($_POST['destination']),
            'travel_date' => sanitize_text_field($_POST['travel_date']),
            'return_date' => sanitize_text_field($_POST['return_date']),
            'participants' => intval($_POST['participants']),
            'message' => sanitize_textarea_field($_POST['message'])
        );

        // Utiliser la classe Amid_Database pour l'insertion
        $result = Amid_Database::insert_quote($data);

        if ($result) {
            // Envoyer les emails
            $admin_mail_sent = Amid_Email_Notification::send_admin_notification($data);
            $client_mail_sent = Amid_Email_Notification::send_client_confirmation($data);

            // Log pour debug
            error_log('Devis enregistré avec succès');
            error_log('Email admin envoyé : ' . ($admin_mail_sent ? 'oui' : 'non'));
            error_log('Email client envoyé : ' . ($client_mail_sent ? 'oui' : 'non'));

            wp_redirect(add_query_arg('quote_submitted', 'true', wp_get_referer()));
            exit;
        } else {
            // Log pour debug
            error_log('Erreur lors de l\'enregistrement du devis');
            wp_redirect(add_query_arg('quote_error', 'true', wp_get_referer()));
            exit;
        }
    }
}
add_action('init', 'amid_handle_quote_submission');
