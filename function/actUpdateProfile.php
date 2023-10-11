<?php
include "../conn.php";
@session_start();
$id = @$_POST['id_user'];
$fullname = strip_tags($_POST['fullname']);
$email =  strip_tags(@$_POST['email']);
$phone = 0;
if(@$_POST['phone'] != '' || @$_POST['phone'] != null){
    $phone = @$_POST['phone'];
}
$email_regex = "/([a-zA-Z0-9!#$%&’?^_`~-])+@([a-zA-Z0-9-])+(.com)+/";
//$myemail = "abc@gmail.com";
if(preg_match($email_regex,$email)){
$email =  strip_tags(@$_POST['email']);
}
else{
header('Location: '.$host.'profile.php?status=failed');
//echo "An Email with a .com domain is acceptable only.";
}


$fileName = $_FILES['userfile']['name'];
$namaDir = '../files/';

if ($fileName) {
    $newFileName = $namaDir.$fileName;
    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $newFileName)){
        // update data
      //  $user = "UPDATE users SET email = '$email' WHERE id = $id";
        //$conn->query($user);

        $userProfile = "UPDATE user_profile SET fullname = '$fullname', phone = '$phone', identity_card = '$newFileName' WHERE id_user = $id ";
        $conn->query($userProfile);

        if($conn->query($user) === FALSE && $conn->query($userProfile) === FALSE){
            echo("Error description: " . mysqli_error($conn));
        }

        header('Location: '.$host.'profile.php?status=success');
    }else{
        echo "File gagal diupload."; 
    }
   
} else {
    // update data
    //$user = "UPDATE users SET email = '$email' WHERE id = $id";
    //$conn->query($user);
    $userProfile = "UPDATE user_profile SET fullname = '$fullname', phone = '$phone' WHERE id_user = $id";
    $conn->query($userProfile);

    if($conn->query($user) === FALSE && $conn->query($userProfile) === FALSE){
        echo("Error description: " . mysqli_error($conn));
    }
    header('Location: '.$host.'profile.php?status=success');
}


