<?php
// this is for the password recover form
if (isset($_GET["selector"], $_GET["validator"])) {
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];
}

if (empty($selector) || empty($validator)) {
    echo "Could not validate your request";
} else {
if (ctype_xdigit($selector) && ctype_xdigit($validator)) {


?>

<link rel="stylesheet" href="<?= PATH ?>assets/css/login.css">

<div class="wrapper">
    <div class="section1" id="psswd-rec-section">
        <div class="signup">
            <form action="index.php?page=newpassword" method="post">
                <label for="chk" aria-hidden="true" style="font-size: 30px">Forget Password</label>
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="password" placeholder="New Password" name="password" class="input">
                <input type="password" placeholder="Confirm Password" name="password-repeat" class="input">
                <button type="submit" name="reset">Reset Password</button>
            </form>
        </div>
    </div>
</div>

    <?php
} else {
    echo "Invalid selector or validator";
}
}
?>