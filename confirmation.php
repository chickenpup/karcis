<?php
include "header.php";
require 'Database.php';

$hash = @$_GET['hash'];

$db = new Database();

$reset_passwordSecure = "SELECT link FROM forgot_password WHERE hash = ?";

$query = $db->query($reset_passwordSecure, array($hash));

if ($query && $query->rowCount() > 0) {

	$r_reset_password = $query->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="bg-navy montserrat">
	<br><br><br><br>

	<?php if ($r_reset_password) { ?>
		<div class="container">
			<div class="form-group">
				<a href="<?php echo $r_reset_password[0]['link']; ?>">
					<button class="btn btn-primary" style="background-color: #4972E1; box-shadow: 0px 1px 8px 1px #4972E1; border-radius: 10px; width: 500px; margin-left: 350px; margin-top: 30px; margin-bottom: 30px;" type="submit">Reset Password</button>
				</a>
			</div>
		</div>
	<?php } else {
		echo "Data Not Found, <a href=login.php>Login</a>";
	} ?>
	<br><br><br><br>
</div>

<?php
include "footer.php";
?>