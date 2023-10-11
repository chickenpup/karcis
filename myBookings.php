<?php
include "header.php";
include "function/getMyTickets.php";

$message = '';
$status = '';

if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    unset($_SESSION['status']);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<div class="bg-navy montserrat">
    <br><br><br><br>
    <div class="container">
        <?php if(@$_GET['status'] == 'success') { ?>
            <div class="card col-4" style="border-radius: 10px; box-shadow: 0px 1px 1px 1px #FFF">
                <div class="container mt-2 mb-2">
                    <h5 style="color: #252E71;">Booked Successfull</h5>
                </div>
            </div>
            <br><br>
        <?php } ?>
        <div class="card" style="border-radius: 20px; box-shadow: 0px 1px 1px 1px #FFF">
            <div class="container">
                <div class="container">
                    <br>
                    <h4>My Bookings</h4>
                    <hr>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="row">
                        <div class="col-2">
                            <center>
                                <img src="assets/img/icon-landing.svg" class="img-responsive" width="100">
                            </center>
                        </div>  
                        <div class="col-2">
                            <b style="font-weight: 600; font-size: 17px;">ID Booking</b>
                            <br>
                            <b style="font-size: 20px;"><?php echo $row['id_booking'];?></b>
                        </div> 
                        <div class="col-4">
                            <b style="font-weight: 600; font-size: 17px;">Destination</b>
                            <br>
                            <b style="font-size: 20px;"><?php echo $row['from'];?> - <?php echo $row['to'];?></b>
                        </div> 
                        <div class="col">
                            <a href="<?php echo $host;?>myBookingDetail.php?IDBOOKING=<?php echo $row['id_booking'];?>" class="btn btn-primary" style="background-color: #4972E1; width: 70%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; width: 250px;">
                                Booking Details!
                            </a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>