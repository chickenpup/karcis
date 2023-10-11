<?php
include "../conn.php";
require '../Database.php';

$errors = array();
$email = strip_tags(@$_POST['email']);

if (empty($email)) {
    $errors['email'] = "Email is Required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Invalid email format";
}



if (empty($errors)) {
    $db = new Database();

    $qGetEmail = "SELECT Email from users where Email = ?";

    $getEmail = $db->query($qGetEmail, array($email));

    $hash = password_hash($email, PASSWORD_BCRYPT);
    $link = $host . "resetPassword.php?hash=" . $hash;


    $sql = "INSERT INTO forgot_password (email, hash, link)
    VALUES (?, ?, ?)";

    $qInsertEmail = $db->query($sql, array($email, $hash, $link));

    if ($qInsertEmail && $qInsertEmail->rowCount() == 1) {
        header('location:' . $host . 'confirmation.php?hash=' . $hash);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header('location:' . $host . 'forgotPassword.php?status=failed&err=' . $errors['email']);
}
