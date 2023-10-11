<?php
include "../conn.php";
include "../Database.php";



$token = @$_POST['token'];
$password = strip_tags($_POST['password']);
$passwordHashed = sha1(@$_POST['password']);
$confirmPassword = strip_tags($_POST['confirmPassword']);
$email = @$_POST['email'];

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
} else if (strlen($password) < 12 || !$hasSymbol || !$hasNumber || $hasUppercase || $hasLowercase) {
    $errors['error'] = "Password is so weak! Please use uppercase, lowercase, number, and minimal 12 characters, ";
} else if ($confirmPassword != $password) {
    $errors['error'] = "Password and confirmed password are different!";
}

if (empty($errors)) {

    $db = new Database();
    $result = $db->select('forgot_password', 'email', 'email = ? and hash = ? and flag = 0', array($email, $token));

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $getUser = $db->select('users', '*', 'email = ?', array($email));
            if ($getUser && $getUser->rowCount() > 0) {
                die(json_encode($getUser));
                // $u_user = "UPDATE users SET password = '$password' WHERE email = '$email'";
                $u_user = $db->update('users', array('password' => $password), 'email = ? and id = ?', array($email, $getUser->id));
                if ($u_user > 0) {
                    $dataLog = array(
                        'id_user' => $getUser[0]['id'],
                        'activity' => 'Update',
                        'description' => json_encode($getUser['0'])
                    );
                    $log = $db->insert('log', $dataLog);
                }

                header('Location: ' . $host . 'signin.php?status=success&m=newPassword');
            }
        }
    } else {
        $errors['error'] = 'Please retry to forgot your password!';
        header('Location: ' . $host . 'resetPassword.php?hash=' . $token . '&status=failed&err=' . $errors['error']);
    }
} else {
    @session_start();
    @$_SESSION['err'] = $errors['error'];
    @$_SESSION['status'] = 'failed';
    header('Location: ' . $host . 'resetPassword.php?hash=' . $token);
}
