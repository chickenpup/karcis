<?php
    include "../conn.php";

    @session_start();

    $id_user = htmlspecialchars(@$_SESSION['id']);

    if(!$id_user){
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = 'You must login first';
        header('Location: '.$host.'signin.php' );
        exit;
    }

    $check_user = "SELECT * FROM users WHERE id = $id_user";

    $result = $conn->query($check_user);

    if($result->num_rows < 1){
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = 'User not found';
        header('Location: '.$host.'signin.php' );
        exit;
    }

    $submit = htmlspecialchars( @$_POST['submit']);
    $identity = (int)$submit[0];

    $id_ticket = @$_POST['id_ticket'][$identity];
    $ticket = "SELECT * FROM tickets WHERE id = $id_ticket";
    $result = $conn->query($ticket);

    if($result->num_rows < 1) {
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = 'Ticket not found';
        header('Location: '.$host.'tickets.php' );
        exit;
    }

    $row = $result->fetch_assoc();

    $price = $row['price'];
    $seats = $row['seats'];

    $percent = 10;

    $percentInDecimal = $percent / 100;

    //Get the result.
    $percent = $percentInDecimal * $price;
    
    $total_price = $price + $percent;


     // jika kursi 0

     if($seats < 1){
        $_SESSION['status'] = 'failed';
        $_SESSION['message'] = 'No seats available';
        header('Location: '.$host.'tickets.php' );
        exit;
    }
    

    // insert table booking
    $id_booking_generated = uniqid('BOOKING_', true);

    $sql = "INSERT INTO booking (id, id_user, id_ticket, status, price) VALUES ('$id_booking_generated', '$id_user', '$id_ticket', 0,'$total_price')";

    if ($conn->query($sql) === TRUE) {
        // update seats in table tickets
        $sql_update = "UPDATE tickets SET seats = seats - 1 WHERE id = $id_ticket";
            if($conn->query($sql_update) === FALSE){
                echo("Error description: " . mysqli_error($conn));
                exit;
            } else {
                $activity = "Create";
                $description = "Booking Ticket";
                $log = "INSERT INTO log (id_user, activity, description) VALUES ('$id_user', '$activity', '$description')";
                $conn->query($log);
                $_SESSION['status'] = 'success';
                header('Location: '.$host.'myBookings.php');            }
    } else {
        echo("Error description: " . mysqli_error($conn));
    }
?>