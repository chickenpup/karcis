<?php
    @session_start();
    
    $id = @$_SESSION['id'];
   
    if(!$id){
        // header('location:'.$host.'signin.php');
        exit;
    } else {
        // get data user
        $user = "SELECT tickets.*, booking.id as id_booking FROM booking 
        LEFT JOIN tickets ON tickets.id = booking.id_ticket WHERE booking.id_user = $id
        ORDER BY booking.created_at DESC ";

        $result = $conn->query($user);
    }
?>