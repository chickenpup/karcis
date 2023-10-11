<?php
include "conn.php";
include "header.php";
?>

<div class="bg-navy montserrat">
    <br><br><br><br>
    <div class="container">
        <div class="card col-10" style="margin-left: 100px;">
            <div class="card-body">
                <h4 class="text-dark">Ganti Password</h4>
                <hr>
                <form action="<?= $host; ?>function/actNewPassword.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password" placeholder="password" class="form-control mb-5">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="confirmPassword" placeholder="password" class="form-control mb-5">
                    </div>

                    <input type="hidden" value="<?php echo $_GET['hash']; ?>" name="token">
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block montserrat" type="submit" style="background-color: #4972E1; width: 40%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; margin-left: 510px;">Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <br><br><br><br>
</div>

<?php
include "footer.php";
?>