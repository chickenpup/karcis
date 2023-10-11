<?php
include "header.php";
?>

<div class="bg-navy">
    <div class="container">
        <center>
            <br>
            <div class="card col-4 montserrat" style="padding-top: 20px; box-shadow: 0px 1px 8px 0.5px #FFF; border-radius: 20px;">
                <div class="card-body">
                    <form method="post" action="<?php echo $host;?>function/actSignin.php">
                         <!-- if signup failed -->
                        <?php
                            if(@$_GET['status'] == 'failed'){
                        ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Email dan Password tidak sesuai</b>
                        <?php } else if(@$_GET['status'] == 'email'){ ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Invalid Email</b>
                        <?php } else if(@$_GET['status'] == 'null'){ ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)"> Email dan Password tidak boleh kosong</b>
                        <?php } else if(@$_GET['status'] == 'pass'){ ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Format password tidak valid </b>
                        <?php } else if(@$_GET['status'] == 'locked'){ ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Akun Anda diblokir selama 2 menit, harap tunggu beberapa saat lagi </b>
                        <?php } else if(@$_GET['status'] == 'success'){ ?>
                            <b class="montserrat" style="text-align: center; color: #339FDC; font-size: 17px;" >Sign Up Successfull</b><br>
                        <?php } ?>
                        <!--  -->

                        <h2 class="sr-only">Login Form</h2>
                        <center>
                            <img src="assets/img/icon-landing.svg" class="img-responsive" style="margin-bottom: 70px; margin-top: 20px;">
                        </center>
                        <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email"></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                        <br>
                        <div class="form-group"><button class="btn btn-primary btn-block montserrat" type="submit" style="background-color: #4972E1; width: 70%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px;">Sign In</button></div><a class="forgot montserrat" href="forgotPassword.php" style="font-size: 13px;"><u>Forgot password?</u></a>
                    </form>
                    <br>
                </div>
            </div>
        </center>
    </div>

    <br><br><br><br><br>
</div>

