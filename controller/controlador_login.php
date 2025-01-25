<?php
include './model/model_usuaris.php';

session_start(); // Inicia la sessió

// Configuració de intents fallits
if (!isset($_SESSION['intents_fallits'])) {
    $_SESSION['intents_fallits'] = 0;
}

if ($_SESSION['mantindre_sessio'] === true) {
    header('Location: index_session.php');
    exit();
}



// Quan es fa el login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LOGIN'])) {
    $correu = filter_var($_POST['correu'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $contrasenya_hash = hash('sha256', $password);

    // Verifica intents fallits i reCAPTCHA
    if ($_SESSION['intents_fallits'] >= 3) {
        if (empty($_POST['g-recaptcha-response']) || !validateRecaptcha($secretKey, $_POST['g-recaptcha-response'])) {
            echo "<p style='color: red; text-align: center;'>ReCAPTCHA incorrecte. Torna a intentar-ho.</p>";
            exit();
        }
    }

    // Verifica login
    $loginVerificat = verificarLogin($correu, $contrasenya_hash);
    if ($loginVerificat) {
        $_SESSION['intents_fallits'] = 0;
        $rememberME = isset($_POST['remember_me']);

        functionVerificarConta($loginVerificat, $correu, $rememberME);
    } else {
        $_SESSION['intents_fallits']++;
        echo "<p style='color: red; text-align: center;'>Credencials incorrectes. Torna a intentar-ho.</p>";
    }
}

// Funció per validar el reCAPTCHA
function validateRecaptcha($secretKey, $recaptchaResponse) {
    if (empty($recaptchaResponse)) {
        return false;
    }

    $verificationUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    ];

    // Usa cURL per a més fiabilitat
    $ch = curl_init($verificationUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseKeys = json_decode($response, true);
    return $responseKeys['success'] ?? false;
}


// Funció per verificar login
function verificarLogin($correu, $password) {

    $UsuariModel = new Usuari();

    $usuaris = $UsuariModel->mostrarUsuaris();

    foreach ($usuaris as $usuari) {
        if ($usuari['email'] === $correu && $usuari['contrasenya'] === $password) {
            return true;
            $_SESSION['idUsuari'] = $usuari['id']; 
        }
    }
    return false;
}


// Funció per gestionar l'usuari verificat
function functionVerificarConta($loginVerificat, $correu, $rememberME) {
    $usuariModel = new Usuari();
    if ($loginVerificat) {
        if ($rememberME) {
            $_SESSION['mantindre_sessio'] = true;
        }

        
        
        $_SESSION['correu'] = $correu;
        $_SESSION['inici_sessio'] = time();
        $_SESSION['verificat'] = true;

        $resultat = $usuariModel->perfilDades($correu);

// Verificar si se obtuvo un resultado válido
if ($resultat && is_array($resultat)) {
    $_SESSION['nickname'] = $resultat['nickname'];
}

        if ($rememberME) {
            setcookie("remember_me", $correu, time() + (86400 * 30), "/", "", true, true); // 30 dies
        }

        header('Location: index_session.php');
        exit();
    } else {
        echo "<p style='text-align: center;'>Credencials incorrectes</p>";
    }
}
?>