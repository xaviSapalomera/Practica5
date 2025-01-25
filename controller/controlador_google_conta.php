<?php

// Crear la instancia del cliente de Google
$client = new Google_Client();

// Configurar las credenciales de Google
$client->setClientId('832932898808-25hl8p99n41lnpm2jpo2ackac4ofqmsr.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Practica05-main/login_vista.php?'); // URI de redirección


?>
<?php
session_start();
require_once 'google-config.php';  // Incluir la configuración de Google API

class AuthController
{
    // Inicia el proceso de inicio de sesión con Google
    public function login()
    {
        global $client;
        // Generar la URL de autenticación de Google
        $authUrl = $client->createAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        exit();
    }

    // Maneja la redirección de Google y obtiene los datos del usuario
    public function callback()
    {
        global $client;

        // Si Google nos devuelve un código, lo intercambiamos por un token
        if (isset($_GET['code'])) {
            $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token'] = $accessToken;
            header('Location: dashboard.php'); // Redirigir a la página de dashboard
            exit();
        }

        // Si tenemos un token de acceso, lo usamos
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        // Verificar si el cliente tiene un token de acceso válido
        if ($client->getAccessToken()) {
            // Obtener el token de ID y verificarlo
            $payload = $client->verifyIdToken();
            if ($payload) {
                $userInfo = $payload; // La información del usuario se encuentra en el payload
                return $userInfo;
            }
        }

        return null; // Si no se ha autenticado
    }

    // Cierra la sesión del usuario
    public function logout()
    {
        session_destroy();
        header('Location: index.php'); // Redirigir a la página de inicio
        exit();
    }
}
?>
