<?php
include "header.php";
include "function/getProfile.php";
?>

<div class="bg-navy montserrat">
    <br><br><br><br>
    <div class="container">
        <div class="card col-8" style="border-radius: 10px; box-shadow: 0px 1px 1px 1px #FFF; margin-left: 200px;">
            <div>
                <div class="container">
                    <div class="container">
                        <br>
                        <h4>Edit Profile</h4>
                        <hr>
                        <form action="<?php echo $host;?>function/actUpdateProfile.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?php echo $user_profile['id_user'];?>">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" value="<?php echo $user_profile['fullname'];?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user_profile['email'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $user_profile['phone'];?>">
                            </div>

                            <label>Identity (ID Card/Passport)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" id="image" accept="image/*" onChange="validate(this.value)" name="userfile" accept=".jpg,.jpeg">
                                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary" style="background-color: #4972E1; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; width: 200px; margin-left: 450px;" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php
include "footer.php";
?>

<script>
function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        alert("Wrong extension type.");
        $("#image").val("");
    }
}
</script>