<?php
include "header.php";
?>

<div class="bg-navy">
    <div class="container">
        <center>
            <br>
            <div class="card col-4 montserrat" style="padding-top: 20px; box-shadow: 0px 1px 8px 0.5px #FFF; border-radius: 20px;">
                <div class="card-body">
                    <form method="post" action="<?php echo $host;?>function/actSignup.php" onsubmit="return validateForm()">
                        <h2 class="sr-only">Login Form</h2>
                        <!-- if signup failed -->
                        <?php
                            if(@$_GET['status'] == 'failed'){
                        ?>
                            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Signup Failed</b>
                        <?php } ?>
                        <!--  -->
                        <center>
                            <img src="assets/img/icon-landing.svg" class="img-responsive" style="margin-bottom: 100px;">
                        </center>

                        <div class="form-group" style="color: #C4C4C4;"><input class="form-control" type="text" name="fullname" placeholder="Full Name" required></div>
                        <div class="form-group" style="color: #C4C4C4;"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                        <div class="form-group" style="color: #C4C4C4;"><input class="form-control" type="password" name="password" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
                        <br>
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #4972E1; width: 70%; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px;">Sign Up</button></div><a class="forgot" href="#" style="font-size: 13px;"><u>Forgot password?</u></a>
                    </form>
                    
                </div>
            </div>
        </center>
    </div>
    <br><br><br><br><br>
</div>

<script language="javascript">
function validateForm()
{
    strpas = checkPassword();
    stremail = checkEmail();
    if (strpas == false) {
        alert("Password tidak sesuai requirement! coba lagi");
      return false;  
    } 
    if (stremail == false) {
        alert("Email tidak sesuai requirement! coba lagi");
        return false;
        
    }     
    return true;
}

function checkPassword()
{
    str = document.getElementsByName("password")[0].value;
    //alert(str);
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
}

function checkEmail()
{
    str = document.getElementsByName("email")[0].value;
    //alert(str);
    var re = /(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@[*[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+]*/;
    return re.test(str);
}

</script>
