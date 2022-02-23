<?php
//Check if credentials are valid
if (!isset($_POST['submit'])) {
    header('Location: /index.php');
}

$username = trim(strip_tags($_POST['username']));
$password = $_POST['password'];


$stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
$stmt->bindParam(':username', $username);

if($stmt->execute()) {
    $userData = $stmt->fetch();
    if(password_verify($password, $userData['password'])) {
        // Mon mot de passe est bon, on peut enregistrer en session.
        echo 'ok<br>';
        session_start();
        $_SESSION['username'] = $username;
        echo '<a href="?p=create">créer</a><br><a href="?p=read">lire</a>';
    }
    else {
        echo "Le mot de passe utilisé ne semble pas être correct, ou aucun compte associé à ce nom d'utilisateur";
    }
}
else {
    echo "Aucun compte associé à ce nom d'utilisateur";
}
