<link rel="stylesheet" href="<?= PATH ?>assets/css/login.css">

<div class="wrapper">

    <div class="main" id="login-section">
        <!-- Checkbox for triggering animations -->
        <input type="checkbox" id="chk" aria-hidden="true">

        <!-- Eye icons for password visibility -->
        <div class="eyes">
            <img id="OpenEye" src="pictures/open.jpg" alt="" class="open">
            <img id="CloseEye" src="pictures/close.jpg" alt="" class="close">
        </div>

        <!-- Login form -->
        <div class="signup">
            <form class="form" autocomplete="off" >
                <label for="chk" aria-hidden="true">Login</label>
                <?php if (!empty($errors)): ?>
                    <div class="error-messages">
                        <?php foreach ($errors as $error): ?>
                            <p style="color: #f80e0e;position: absolute;top: 80px;left: 26%"><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <input type="email" id="loginEmail" placeholder="Email" name="email" class="input" autocomplete="off">
                <div class="password-container">
                    <input type="password" id="loginPassword" placeholder="Password" name="password" class="input" autocomplete="off">
                </div>
                <button type="submit" id="loginBtn" name="login">Sign in</button>
                <a id="forget-btn" class="forget_btn" >Forget Password?</a>
            </form>
        </div>

        <div class="login">
            <form  autocomplete="off" enctype="multipart/form-data">
                <label for="chk" class="mb-28" aria-hidden="true">Register</label>
                <!-- Input for uploading/selecting an image -->
                <input class="login-input" name="picture" type="file" accept="image/*" id="imageInput" style="display: none">

                <!-- Circular image container -->
                <label for="imageInput" class="absolute top-2 left-20 cursor-pointer flex justify-center">
                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-300">
                        <img id="previewImage" src="<?= PATH ?>/assets/img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459-removebg-preview.png" alt="User Picture">
                    </div>
                </label>
                <input type="text" id="signUpName" placeholder="Username" name="username" class="input">
                <input id="phoneNumber" type="number"  placeholder="Phone Number" name="phonenumber" class="input">
                <input id="signUpEmail" type="email" placeholder="Email" name="email" class="input">
                <input id="signUpPassword" type="password" placeholder="Password" name="password" class="input">
                <button type="button" id="signUp" name="sign" >Sign up</button>
            </form>
        </div>
    </div>
    <div class="section1" id="psswd-rec-section" style="display: none">
        <div class="signup">
            <form action="index.php?page=login" method="post">
                <label for="chk" aria-hidden="true" style="font-size: 30px">Forget Password</label>
                <input type="email" placeholder="Enter your Email" name="email" class="input">
                <button type="submit" name="sign">Send Email</button>
                <a id="login-btn" class="forget_btn" href="#">Return to login?</a>
            </form>
        </div>
    </div>
</div>

<script src="<?= PATH ?>/assets/js/login.js"></script>


