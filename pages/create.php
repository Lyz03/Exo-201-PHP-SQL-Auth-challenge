<?php
session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /index.php');
        exit();
    }
?>
<form action="?p=create-utils&d=u" method="post">
    <input type="text" name="name" placeholder="Nom de la randonnée" required>

    <select name="difficulty" id="difficulty" required>
        <option value="very easy">Très facile</option>
        <option value="easy">Facile</option>
        <option value="medium">Moyen</option>
        <option value="difficult">Difficile</option>
        <option value="very difficult">Très difficile</option>
    </select>

    <input type="number" name="distance" placeholder="distance en m" min="0" required>
    <input type="number" name="duration" placeholder="durée en h" min="0" required>
    <input type="number" name="height_difference" placeholder="dénivelé en m" required>

    <select name="available" id="available">
        <option value="1">praticable</option>
        <option value="0">impraticable</option>
    </select>

    <input type="submit">
</form>
