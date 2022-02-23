<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /index.php');
    exit();
}

$stmt = $db->prepare("SELECT * FROM hiking WHERE id = :id");
$id = (int) $_GET['id'];
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    $data = $stmt->fetchAll();
    $data = $data[0];

    ?>

    <form action="?p=update-utils&d=u&id=<?= $_GET['id'] ?>" method="post">
        <input type="text" name="name" placeholder="Nom de la randonnée" required value="<?= $data['name'] ?>">

        <select name="difficulty" id="difficulty" required>
            <option value="<?= $data['difficulty'] ?>" selected><?= $data['difficulty'] ?></option>
            <option value="very easy">Très facile</option>
            <option value="easy">Facile</option>
            <option value="medium">Moyen</option>
            <option value="difficult">Difficile</option>
            <option value="very difficult">Très difficile</option>
        </select>

        <input type="number" name="distance" placeholder="distance en m" min="0" required value="<?= $data['distance'] ?>">
        <input type="number" name="duration" placeholder="durée en h" min="0" required value="<?= $data['duration'] ?>">
        <input type="number" name="height_difference" placeholder="dénivelé en m" required value="<?= $data['height_difference'] ?>">

        <select name="available" id="available">
            <option value="<?= $data['available'] ?>" selected><?= $data['available'] ?></option>
            <option value="1">praticable</option>
            <option value="0">impraticable</option>
        </select>

        <input type="submit" name="submit">
    </form>

    <?php
}

?>
