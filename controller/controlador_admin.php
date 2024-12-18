<?php
include './model/model_usuaris.php';

$usuaris = mostrarUsuaris();

echo '<table border="1px">';

echo '<tr>';
echo '<th>DNI</th>';
echo '<th>NICKNAME</th>';
echo '<th>NOM</th>';
echo '<th>COGNOM</th>';
echo '<th>EMAIL</th>';
echo '<th>ADMIN</th>';
echo '</tr>';


foreach ($usuaris as $usuari) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($usuari['dni']) . '</td>';
    echo '<td>' . htmlspecialchars($usuari['nickname']) . '</td>';
    echo '<td>' . htmlspecialchars($usuari['nom']) . '</td>';
    echo '<td>' . htmlspecialchars($usuari['cognom']) . '</td>';
    echo '<td>' . htmlspecialchars($usuari['email']) . '</td>';
    echo '<td>' . htmlspecialchars($usuari['admin']) . '</td>';
    echo '</tr>';
}

echo '</table>';
?>