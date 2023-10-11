<?php
    include "../conn.php";

    $fullname = @$_POST['fullname'];
    $email    = @$_POST['email'];
    //ganti dengan password Bcrypt yg lebih aman , Andik
    //$password  = sha1(@$_POST['password']);
    $password  = password_hash(@$_POST['password'], PASSWORD_BCRYPT);
    
    //tambahan htmlentities , utk mengatasi sqlinjection , Andik
    $fullnameClean = htmlentities($fullname);
    $emailClean = htmlentities($email);
    
    // insert to database
    $sql = "INSERT INTO users (email, password) VALUES ('$emailClean', '$password')";

    if ($conn->query($sql) === TRUE) {
        $sql_profile = "INSERT INTO user_profile (id_user,fullname) VALUES ('$conn->insert_id','$fullnameClean')";
        if($conn->query($sql_profile) === TRUE){
            
            header('location:'.$host.'signin.php?status=success');
        } else {;
            echo("Error description: " . mysqli_error($conn));
        }  
    } 


?>
