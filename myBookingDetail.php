<?php
include "header.php";

@session_start();

$id_booking = htmlspecialchars(@$_GET['IDBOOKING']);

$id =  htmlspecialchars(@@$_SESSION['id']);

if(!$id){
    header('location:'.$host.'signin.php');
    exit;
}

// get data user
$user = "SELECT tickets.*, booking.id as id_booking, booking.price as booking_price, users.id as id_user FROM booking LEFT JOIN tickets ON tickets.id = booking.id_ticket INNER JOIN users ON users.id = booking.id_user WHERE booking.id = '$id_booking' AND users.id = $id";

$result = $conn->query($user);

if ($result->num_rows == 0) {
    exit; 
}

$booking = $result->fetch_assoc()
?>

    <div class="bg-navy montserrat">
        <br><br><br><br>
        <div class="container">
            <div class="card">
                <div class="container">
                    <div class="container">
                        <br>
                        <h4>Booking Detail</h4>
                        <hr>
                        <div class="row">
                            <div class="col ml-2">
                                <label>ID Booking</label>
                                <h5><?php echo $booking['id_booking'];?></h5>
                                <br>
                                <label>Destinasi</label>
                                <h5><?php echo $booking['from']." - ".$booking['to'];?></h5>
                                <br>
                                <label>Harga (+PPn)</label>
                                <h5>Rp <?php echo number_format($booking['booking_price'],2,',','.'); ?></h5>
                                <br>
                                <label>Tanggal Pemesanan</label>
                                <h5><?php echo $booking['created_at'];?></h5>
                                <br>
                                <label>Status</label>
                                <h5 class="text-warning">Belum Dibayar</h5>
                            </div>
                        </div>
                        <hr>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </div>

<?php include "footer.php";?>