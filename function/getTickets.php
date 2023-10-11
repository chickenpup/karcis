<?php
@session_start();

$id = @$_SESSION['id'];

if (!$id) {
    // header('location: ../home.php');
    exit;
} else {
    $sql = "SELECT * FROM tickets";
    $result = $conn->query($sql);
}


?>
