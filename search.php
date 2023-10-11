<?php
include "header.php";

@session_start();

$id_booking = htmlspecialchars(@$_GET['IDBOOKING']);
$id_user =  htmlspecialchars(@@$_SESSION['id']);

// get data user
$ticket = "SELECT tickets.*, booking.id as id_booking, booking.price as booking_price, booking.id_user, user_profile.fullname FROM booking LEFT JOIN user_profile ON user_profile.id_user = booking.id_user LEFT JOIN tickets ON tickets.id = booking.id_ticket  WHERE booking.id = '$id_booking' AND booking.id_user = $id_user";

$result = $conn->query($ticket);

?>

<div class="bg-navy  montserrat">
    <div class="container">
        <br><br><br><br>
        <div class="row">
            <div class="col-md-12 alert-col relative">
            <?php
                if(@$_GET['status'] == 'success'){
            ?>
                <b style="display: block;position: relative;text-align:center;" class="text-white">Profile Updated</b>
            <?php } ?>
            </div>
        </div>
        <h5 class="text-white">
            Search Result Booking ID
            <br><br>
            <b><?php echo $id_booking ?></b>
        </h5>
        <br><br>
        <div class="row">
            <?php
                $no = 1;
                if ($result instanceof mysqli_result && $result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {

            ?>
            <div class="col-4 mb-5">
                <div class="card" style="border-radius: 20px; box-shadow: 0px 1px 1px 1px #FFF">
                    <div class="card-header" style="background-color: #B8D9EC; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                            <u style="font-size: 20px;"><?php echo $row['fullname'];?></u>
                            <br>
                            <h3 style="font-weight: 600;">
                                <?php echo $row['from']."<br><img src='assets/img/arrow.png' class='img-responsive mb-2 mt-2' width='20'><br> ".$row['to'];?>
                            </h3>
                    </div>
                    <div class="card-title" style="background-color: #FFCBCB; color: #FF0000;">
                        <center>
                            <div style="margin-top: 10px; margin-bottom: 10px; font-size: 14px;">
                                Unpaid
                            </div>
                        </center>
                    </div>
                    <div class="card-body">
                        <center>
                            <h3>Rp <?php echo number_format($row['booking_price'],2,',','.'); ?></h3>
                            <p class="text-dark" style="font-size: 12px;">belum termasuk PPn 10%</p>
                            <a href="<?php echo $host;?>myBookingDetail.php?IDBOOKING=<?php echo $row['id_booking'];?>" class="btn btn-primary" style="background-color: #4972E1; width: 70%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; width: 290px;">
                                Booking Details!
                            </a>
                        </center>
                    </div>
                </div>
            </div>
            <?php $no++; }  } 
             else if ($id_booking) {
            ?>
            <p class="text-white" style="font-size: 12px;">No results found.</p>
            <?php } ?>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>