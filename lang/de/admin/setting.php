<?php

return [
    'title' => 'Einstellungen',
    'save_success' => 'Einstellungen gespeichert',
    'save_failed' => 'Einstellungen konnten nicht gespeichert werden',
    'navigation' => [
        'general' => 'Allgemein',
        'captcha' => 'Captcha',
        'mail' => 'E-Mail',
        'backup' => 'Backup',
        'oauth' => 'OAuth',
        'misc' => 'Verschiedenes',
    ],
    'general' => [
        'app_name' => 'App Name',
        'app_logo' => 'App-Logo',
        'app_logo_help' => 'Das Logo muss im "public" Verzeichnis, welches sich im root Verzeichnis des Panels befindet, platziert werden. Lasse das Feld leer um stattdessen den App-Namen zu verwenden.',
        'app_favicon' => 'App Favicon',
        'app_favicon_help' => 'Das Favicon muss im "public" Verzeichnis, welches sich im root Verzeichnis des Panels befindet, platziert werden.',
        'debug_mode' => 'Debugmodus',
        'navigation' => 'Navigation',
        'sidebar' => 'Seitenleiste',
        'topbar' => 'Obere Leiste',
        'unit_prefix' => 'Einheitenpräfix',
        'decimal_prefix' => 'Dezimale Einheit (MB/GB)',
        'binary_prefix' => 'Binäre Einheit (MiB/GiB)',
        '2fa_requirement' => '2FA Erforderlich',
        'not_required' => 'Nicht Erforderlich',
        'admins_only' => 'Nur für Admins Erforderlich',
        'all_users' => 'Für alle Benutzer Erforderlich',
        'trusted_proxies' => 'Zulässige Proxies',
        'trusted_proxies_help' => 'Neue IP oder IP Bereich',
        'clear' => 'Leeren',
        'set_to_cf' => 'Auf Cloudflare-IPs setzen',
        'display_width' => 'Anzeigenbreite',
        'avatar_provider' => 'Avatar-Provider',
        'uploadable_avatars' => 'Benutzern erlauben, einen eigenen Avatar hochzuladen?',
    ],
    'captcha' => [
        'enable' => 'Aktivieren',
        'disable' => 'Deaktivieren',
        'info_label' => 'Info',
        'info' => 'Du kannst die Schlüssel im <u><a href="https://developers.cloudflare.com/turnstile/get-started/#get-a-sitekey-and-secret-key" target="_blank">Cloudflare Dashboard</a></u> generieren. Ein Cloudflare Account wird benötigt.',
        'site_key' => 'Site-Schlüssel',
        'secret_key' => 'Geheimer Schlüssel',
        'verify' => 'Domain Verifizieren?',
    ],
    'mail' => [
        'mail_driver' => 'E-Mail-Treiber',
        'test_mail' => 'Test E-Mail senden',
        'test_mail_sent' => 'Test E-Mail wurde verschickt',
        'test_mail_failed' => 'Test E-Mail konnte nicht verschickt werden',
        'from_settings' => 'Absendereinstellungen',
        'from_settings_help' => 'Setze die Adresse und den Namen vom Absender in der E-Mail.',
        'from_address' => 'E-Mail-Adresse vom Absender',
        'from_name' => 'Name vom Absender',
        'smtp' => [
            'smtp_title' => 'SMTP Konfiguration',
            'host' => 'Host',
            'port' => 'Port',
            'username' => 'Benutzername',
            'password' => 'Passwort',
            'scheme' => 'Schema',
        ],
        'mailgun' => [
            'mailgun_title' => 'Mailgun Konfiguration',
            'domain' => 'Domain',
            'secret' => 'Geheimer Schlüssel',
            'endpoint' => 'Endpunkt',
        ],
    ],
    'backup' => [
        'backup_driver' => 'Backup Treiber',
        'throttle' => 'Begrenzungen',
        'throttle_help' => 'Konfiguriere, wie viele Backups in einem Zeitraum erstellt werden können. Setze den Zeitraum auf 0, um die Begrenzung aufzuheben',
        'limit' => 'Limit',
        'period' => 'Zeitraum',
        'seconds' => 'Sekunden',
        's3' => [
            's3_title' => 'S3 Konfiguration',
            'default_region' => 'Standardmäßige Region',
            'access_key' => 'Zugangsschlüssel-ID',
            'secret_key' => 'Geheimer Zugangsschlüssel',
            'bucket' => 'Bucket',
            'endpoint' => 'Endpunkt',
            'use_path_style_endpoint' => 'Path Style Endpoint benutzen',
        ],
    ],
    'oauth' => [
        'enable' => 'Aktivieren',
        'disable' => 'Deaktivieren',
        'client_id' => 'Client ID',
        'client_secret' => 'Client Secret',
        'redirect' => 'Umleitungs-URL',
        'web_api_key' => 'Web API Key',
        'base_url' => 'Base URL',
        'display_name' => 'Anzeigename',
        'auth_url' => 'Authorization callback URL',
    ],
    'misc' => [
        'auto_allocation' => [
            'title' => 'Automatisches Erstellen von Allokationen',
            'helper' => 'Stelle ein, ob Benutzer in der Kundenansicht Allokationen erstellen können.',
            'question' => 'Benutzern erlauben Allokationen zu erstellen?',
            'start' => 'Startport',
            'end' => 'Endport',
        ],
        'mail_notifications' => [
            'title' => 'E-Mail Benachrichtigungen',
            'helper' => 'Stelle ein, welche E-Mail Benachrichtigung zum Benutzer geschickt werden sollen.',
            'server_installed' => 'Server installiert',
            'server_reinstalled' => 'Server reinstalliert',
        ],
        'connections' => [
            'title' => 'Verbindungen',
            'helper' => 'Timeouts von Anfragen',
            'request_timeout' => 'Anfragen-Timeout',
            'connection_timeout' => 'Verbindungstimeout',
            'seconds' => 'Sekunden',
        ],
        'activity_log' => [
            'title' => 'Activity Logs',
            'helper' => 'Konfiguriere, wie oft alte Activity Logs gelöscht werden soll und ob Adminaktivitäten geloggt werden sollen.',
            'prune_age' => 'Maximales Alter',
            'days' => 'Tage',
            'log_admin' => 'Admin Aktivitäten verstecken?',
        ],
        'api' => [
            'title' => 'API',
            'helper' => 'Definiert das Limit von Anfragen pro Minute, die ausgeführt werden können.',
            'client_rate' => 'Nutzer API Anfragen Limit',
            'app_rate' => 'Applikation API Anfragen Limit',
            'rpm' => 'Anfragen pro Minute',
        ],
        'server' => [
            'title' => 'Servers',
            'helper' => 'Einstellungen für Server',
            'edit_server_desc' => 'Erlaube Benutzern die Beschreibung zu verändern',
            'console_font_upload' => 'Konsolenschrift-Upload',
            'console_font_hint' => 'Nur *.ttf Fonts werden unterstützt. Mono Fonts werden dringend empfohlen!',
        ],
        'webhook' => [
            'title' => 'Webhooks',
            'helper' => 'Konfiguriere, wie oft alte Webhook-Logs gelöscht werden sollen',
            'prune_age' => 'Maximales Alter',
            'days' => 'Tage',
        ],
    ],
];
