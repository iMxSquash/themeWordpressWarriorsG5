<?php
if (!defined('ABSPATH')) {
    exit;
}

class Amid_Contact_Email_Notification
{
    private static function log_email_attempt($to, $subject, $success, $error = null)
    {
        $log_message = date('Y-m-d H:i:s') . " - Email attempt:\n";
        $log_message .= "To: {$to}\n";
        $log_message .= "Subject: {$subject}\n";
        $log_message .= "Status: " . ($success ? "Success" : "Failed");
        if ($error) {
            $log_message .= "\nError: {$error}";
        }
        $log_message .= "\n------------------------\n";

        error_log($log_message);
    }

    public static function send_admin_notification($message_data)
    {
        $to = 'coussotelwen@gmail.com';
        $subject = 'Nouveau message de ' . $message_data['full_name'];
        $message = self::get_admin_email_template($message_data);

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );

        try {
            $sent = wp_mail($to, $subject, $message, $headers);
            self::log_email_attempt($to, $subject, $sent);

            if (!$sent) {
                error_log("Échec de l'envoi de l'email admin");
            }
            return $sent;
        } catch (Exception $e) {
            error_log("Exception lors de l'envoi de l'email admin: " . $e->getMessage());
            self::log_email_attempt($to, $subject, false, $e->getMessage());
            return false;
        }
    }

    public static function send_client_confirmation($message_data)
    {
        $to = $message_data['email'];
        $subject = 'Confirmation de votre envoie de message';
        $message = self::get_client_email_template($message_data);

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );

        try {
            $sent = wp_mail($to, $subject, $message, $headers);
            self::log_email_attempt($to, $subject, $sent);
            return $sent;
        } catch (Exception $e) {
            self::log_email_attempt($to, $subject, false, $e->getMessage());
            return false;
        }
    }

    private static function get_admin_email_template($data)
    {
        ob_start(); ?>
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: 'Realway', sans-serif; line-height: 1.6; color: #0C264D; max-width: 600px; margin: 0 auto; padding: 20px; }
                h2 { color: #3D8CE1; border-bottom: 2px solid #72C5F5; padding-bottom: 10px; font-family: 'Maragsa', serif; }
                .info-block { background-color: #F4F9FF; padding: 15px; border-radius: 1rem; margin: 10px 0; }
                .info-label { color: #3D8CE1; font-weight: 600; }
                .footer { margin-top: 30px; text-align: center; border-top: 1px solid #72C5F5; padding-top: 20px; }
                .footer img { max-width: 150px; height: auto; }
            </style>
        </head>
        <body>
            <h2>Nouveau message</h2>
            <div class="info-block">
                <p><span class="info-label">Nom :</span> <?php echo esc_html($data['full_name']); ?></p>
                <p><span class="info-label">Email :</span> <?php echo esc_html($data['email']); ?></p>
                <p><span class="info-label">Message :</span><br><?php echo nl2br(esc_html($data['message'])); ?></p>
            </div>
            <div class="footer">
                <img src="<?php echo home_url('/contenu/img/image_2024-12-23_225733270.png'); ?>" alt="Logo Amid Tourisme et Voyage">
            </div>
        </body>
        </html>
        <?php
        return ob_get_clean();
    }

    private static function get_client_email_template($data)
    {
        ob_start(); ?>
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: 'Realway', sans-serif; line-height: 1.6; color: #0C264D; max-width: 600px; margin: 0 auto; padding: 20px; }
                h2 { color: #3D8CE1; border-bottom: 2px solid #72C5F5; padding-bottom: 10px; font-family: 'Maragsa', serif; }
                .welcome-message { font-size: 1.1em; color: #3D8CE1; }
                ul { background-color: #F4F9FF; padding: 15px 30px; border-radius: 1rem; list-style-type: none; }
                li { margin: 10px 0; }
                .footer { margin-top: 30px; text-align: center; border-top: 1px solid #72C5F5; padding-top: 20px; }
                .footer img { max-width: 150px; height: auto; }
            </style>
        </head>
        <body>
            <h2>Confirmation de votre envoie de message</h2>
            <p class="welcome-message">Cher(e) <?php echo esc_html($data['full_name']); ?>,</p>
            <p>Nous avons bien reçu votre message :</p>
            <ul>
                <li><?php echo esc_html($data['message']); ?></li>
            </ul>
            <p>Notre équipe vous remercie et répondra dans les plus brefs délais.</p>
            <p>Cordialement,<br>L'équipe <?php echo get_option('blogname'); ?></p>
            <div class="footer">
                <img src="<?php echo home_url('/contenu/img/image_2024-12-23_225733270.png'); ?>" alt="Logo Amid Tourisme et Voyage">
            </div>
        </body>
        </html>
        <?php
        return ob_get_clean();
    }
}
