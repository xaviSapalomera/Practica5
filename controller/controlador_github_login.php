<?php
// index.php

//$config = require('./config/config.php');

session_start(); // Iniciar sesión PHP para manejar el estado del usuario

// Parámetros de GitHub
$client_id = 'Ov23liqBcX3qff2ZoFt0';
$client_secret = '2ac35ed6b7998173631090f17b105498e420d52b';
$redirect_uri = 'http://localhost/index_session.php'; // Cambia esto según tu entorno

// Crear el proveedor de GitHub
$provider = new \League\OAuth2\Client\Provider\Github([
    'clientId'     => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri'  => $redirectUri,
]);

// Verificar el estado de la solicitud
if (!isset($_GET['state']) || $_GET['state'] !== $_SESSION['oauth2state']) {
    unset($_SESSION['oauth2state']);
    exit('Estado inválido.');
}

// Obtener el token de acceso
try {
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);

    // Obtener información del usuario
    $user = $provider->getResourceOwner($token);

    // Guardar al usuario en la sesión
    $_SESSION['user'] = [
       // 'name' => $user->getName(),
       // 'email' => $user->getEmail(),
       // 'avatar' => $user->getAvatar(),
    ];

    // Redirigir a la página protegida
    header('Location: index.php');
    exit;
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
    exit($e->getMessage());
}
?>