<?php
include "../conn.php";
include "../Database.php";



$token =  strip_tags(@$_POST['token']);
$password = strip_tags($_POST['password']);
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
$confirmPassword = strip_tags($_POST['confirmPassword']);
$email = strip_tags(@$_POST['email']);

// Check for at least one symbol, number, uppercase letter, and lowercase letter
$hasSymbol = preg_match('/[!@#\$%^&*()\-_+=\[\]{};:,.<>?]/', $password);
$hasNumber = preg_match('/[0-9]/', $password);
$hasUppercase = preg_match('/[A-Z]/', $password);
$hasLowercase = preg_match('/[a-z]/', $password);

if (!isset($_POST['token'])) {
    $errors['error'] = 'Please retry to forgot your password!';
} else if (!isset($_POST['email'])) {
    $errors['error'] = 'Email is required';
} else if (!isset($_POST['password'])) {
    $errors['error'] = 'Password is required';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["error"] = "Invalid email format";
} else if (strlen($password) < 12 || !$hasSymbol || !$hasNumber || !$hasUppercase || !$hasLowercase) {
    $errors['error'] = "Password is so weak! Please use uppercase, lowercase, number, and minimal 12 characters, ";
} else if ($confirmPassword != $password) {
    $errors['error'] = "Password and confirmed password are different!";
}

if (empty($errors)) {

    $db = new Database();
    $result = $db->select('forgot_password', 'email', 'email = ? and hash = ? and flag = 0', array($email, $token));

    if (count($result) > 0) {
        // while ($row = $result->fetch_assoc()) {
        $getUser = $db->select('users', '*', 'email = ?', array($email));
        if ($getUser && count($getUser) > 0) {
            $id = $getUser[0]['id'];
            $sql = "UPDATE users set password = ? where email = ? and id = ?";
            $u_user = $db->query($sql, array($passwordHashed, $email, $id));
            // $u_user = $db->query('users', array('password' => $passwordHashed), 'email = ? and id = ?', array($email, $id));
            if ($u_user->rowCount() > 0) {
                $dataLog = array(
                    'id_user' => $getUser[0]['id'],
                    'activity' => 'Update',
                    'description' => json_encode($getUser['0'])
                );
                $log = $db->insert('log', $dataLog);
            }

            header('Location: ' . $host . 'signin.php?status=success&m=newPassword');
        }
        // }
    } else {
        @session_start();
        $err = 'Please Retry to reset your password!';
        @$_SESSION['err'] = $err;
        @$_SESSION['status'] = 'failed';
        header('Location: ' . $host . 'resetPassword.php?hash=' . $token);
    }
} else {
    @session_start();
    @$_SESSION['err'] = $errors['error'];
    @$_SESSION['status'] = 'failed';
    header('Location: ' . $host . 'resetPassword.php?hash=' . $token);
}
