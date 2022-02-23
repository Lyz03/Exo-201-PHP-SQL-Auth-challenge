<?php
$stmt = $db->prepare("SELECT * FROM hiking");

if ($stmt->execute()) {
?>
<table>
    <thead>
    <tr>
        <td>Nom</td>
        <td>Difficulté</td>
        <td>Distance</td>
        <td>Durée</td>
        <td>Dénivelé</td>
    </tr>
    </thead>
    <?php
    foreach ($stmt->fetchAll() as $value) {
        ?>

        <tbody>
        <tr>
            <td><a href="?p=update&id=<?= $value['id']?>"><?= $value['name'] ?></a></td>
            <td><?= $value['difficulty'] ?></td>
            <td><?= $value['distance'] ?></td>
            <td><?= $value['duration'] ?></td>
            <td><?= $value['height_difference'] ?></td>
            <td><?= $value['available'] ?></td>
            <td><a href="?p=delete&id=<?= $value['id']?>">supprimer</td>
        </tr>
        </tbody>

        <?php
    }
    }

    echo '<a href="/?p=logout">Déconnexion</a>'
    ?>
</table>
