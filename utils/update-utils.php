<?php
if (!isset($_POST['submit'])) {
    header('Location: /index.php');
}

$id = (int) $_GET['id'];
$name = trim(strip_tags($_POST['name']));
$difficulty = trim(strip_tags($_POST['difficulty']));
$distance = trim(strip_tags($_POST['distance']));
$duration = trim(strip_tags($_POST['duration']));
$height_difference = trim(strip_tags($_POST['height_difference']));
$available = trim(strip_tags($_POST['available']));

try {
    $stmt = $db->prepare("
    UPDATE hiking SET name = :name, 
                      difficulty = :difficulty, 
                      distance = :distance, 
                      duration = :duration, 
                      height_difference = :height_difference,        
                      available = :available  
    WHERE id = :id
    ");

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':difficulty', $difficulty);
    $stmt->bindParam(':distance', $distance, PDO::PARAM_INT);
    $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindParam(':height_difference', $height_difference, PDO::PARAM_INT);
    $stmt->bindParam(':available', $available, PDO::PARAM_BOOL);


    if ($stmt->execute()) {
        echo '<div>La randonnée a été modifiée avec succès.</div>';
        echo '<a href="?p=read">Voir les randonnées</a>';
    }

} catch (PDOException $e) {
    echo $e;
}
