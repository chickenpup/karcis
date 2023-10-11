<?php
    include "header.php";
    include "function/getTickets.php";

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
    <div class="container">
        <br><br><br><br>
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <?php if (@$status == 'success') { ?>
                    <b style="display: block; position: relative; text-align: center;" class="text-white">Profile Updated</b>
                <?php } ?>
                <b style="display: block; position: relative; text-align: center;" class="text-white"><?= $message ?></b>
            </div>
        </div>
        <h3 class="text-white">Find your ticket now</h3>
        <br><br><br><br>
        <div class="row">
            <?php
            $no = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-4 mb-5">
                <form action="<?php echo $host; ?>function/actBookingTicket.php" method="POST">
                    <div class="card" style="border-radius: 20px; box-shadow: 0px 1px 1px 1px #FFF">
                        <div class="card-header" style="background-color: #B8D9EC; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                            <br>
                            <h3 style="font-weight: 600;">
                                <?php echo $row['from'] . "<br><img src='assets/img/arrow.png' class='img-responsive mb-2 mt-2' width='20'><br>" . $row['to']; ?>
                            </h3>
                        </div>
                        <div class="card-title" style="background-color: #A1B2F8;">
                            <center>
                                <div style="margin-top: 10px; margin-bottom: 10px;">
                                    Remaining Seats: <?php echo $row['seats']; ?>
                                </div>
                            </center>
                        </div>
                        <div class="card-body">
                            <center>
                                <h3>Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></h3>
                                <p class="text-dark" style="font-size: 12px;">belum termasuk PPn 10%</p>
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id_ticket[<?php echo $no; ?>]">
                                <button class="btn btn-primary" <?= $row['seats'] < 1 ? 'disabled' : '' ?> style="background-color: #4972E1; width: 70%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; width: 290px;" type="submit" name="submit" value="<?php echo $no; ?>">
                                    Booking Now!
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                $no++;
                }
            }
            ?>
        </div>
    </div>
    <br><br><br><br><br><br>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/js/bs-animation.js"></script>
</body>
</html>
