<?php
include "../conn.php";

@session_start();

$id = @$_SESSION['id'];
$username = $_SESSION['fullname'];

if (!$id) {
    header('location:' . $host . 'signin.php');
}

$password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
$oldpassword = password_hash(strip_tags($_POST['old_password']), PASSWORD_BCRYPT);
$newPassword = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);

// update data
$user = "UPDATE users u join user_profile up on up.id_user = u.id
SET password = '$password' WHERE id = $id and up.fullname = '$username'";
$conn->query($user);


if ($conn->query($user) === FALSE) {
    echo ("Error description: " . mysqli_error($conn));
}

header('Location: ' . $host . 'changePassword.php?status=success');
