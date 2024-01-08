const loginSection = document.getElementById("login-section");
const psswdBtn = document.getElementById("forget-btn");
const loginBtn = document.getElementById("login-btn");
const psswdSection = document.getElementById("psswd-rec-section");

psswdBtn.addEventListener("click", () => {
    loginSection.style.display = "none";
    psswdSection.style.display = "";
})
loginBtn.addEventListener("click", () => {
    loginSection.style.display = "";
    psswdSection.style.display = "none";
})

// JavaScript to handle image preview
const imageInput = document.getElementById('imageInput');
const previewImage = document.getElementById('previewImage');

imageInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});

// login register request button submit
const login = document.getElementById("loginBtn");
const sign = document.getElementById("signUp");
const requestEmail = document.getElementById("request");


sign.addEventListener('click', (event) => {
    event.preventDefault();

    // Sign up inputs
    const checkBox = document.getElementById("chk");
    const userName = document.getElementById("signUpName").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
    const signUpEmail = document.getElementById("signUpEmail").value;
    const signUpPassword = document.getElementById("signUpPassword").value;
    const signUpImage = document.getElementById("imageInput").files[0];

    // Validation checks
    // if (!signUpImage) {
    //     Swal.fire({icon: "error", text: "Please select an image to upload."});
    //     return;
    // }
    // if (!usernameRegex.test(userName)) {
    //     Swal.fire({icon: "error", text: "Invalid username. Username should be at least 3 characters long."});
    //     return;
    // }
    // if (!phoneRegex.test(phoneNumber)) {
    //     Swal.fire({icon: "error", text: "Invalid phone number. Phone number should have 10 digits."});
    //     return;
    // }
    // if (!emailRegex.test(signUpEmail)) {
    //     Swal.fire({icon: "error", text: "Invalid email format."});
    //     return;
    // }
    // if (!passwordRegex.test(signUpPassword)) {
    //     Swal.fire({
    //         icon: "error",
    //         text: "Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number."
    //     });
    //     return;
    // }

    // Create FormData object
    var formData = new FormData();
    formData.append('username', userName);
    formData.append('phonenumber', phoneNumber);
    formData.append('email', signUpEmail);
    formData.append('password', signUpPassword);
    formData.append('picture', signUpImage);
    formData.append('req', 'signup');

    // AJAX request
    $.ajax({
        type: "POST",
        url: "index.php?page=login", // Ensure this URL is correct
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            const data = JSON.parse(response);
            if (data.success) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: data.success
                });
                setTimeout(() => {
                    checkBox.click();
                }, 1500);

                // Additional success logic (e.g., redirecting to another page)
            } else if (data.errors) {
                console.log(data.errors);
                var error = data.errors
                var mesg = "";
                if (error.username_err !== false) {
                    mesg = error.username_err;
                } else if (error.phonenumber_err !== false) {
                    mesg = error.phonenumber_err;
                } else if (error.email_err !== false) {
                    mesg = error.email_err;
                } else if (error.password_err !== false) {
                    mesg = error.password_err;
                } else if (error.userexists_err !== false) {
                    mesg = error.userexists_err;
                } else if (error.picture_err !== false) {
                    mesg = error.picture_err;
                }
                Swal.fire({icon: "error", title: "Error", text: mesg});
            }

        },

        error: (error) => {
            console.log(error);
            Swal.fire({icon: "error", title: "Error", text: "An unexpected error occurred. Please try again."});
        }
    });
});


login.addEventListener('click', (event) => {

    event.preventDefault();
    // login inputs
    const loginForm = document.getElementById("login");
    const spinnerWrapper = document.querySelector(".hourglassBackground"); // Added for the spinner wrapper
    const loginEmail = document.getElementById("loginEmail").value;
    const loginPassword = document.getElementById("loginPassword").value;
    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: {
            req: "login",
            email: loginEmail,
            password: loginPassword
        },
        success: (response) => {
            const data = JSON.parse(response);
            if (data.success) {
                console.log(data.success);
                loginForm.style.display = 'none';
                spinnerWrapper.style.display = 'block';
                setTimeout(() => {
                    window.location.href = 'index.php?page=home&success';
                }, 3000);

            } else if (data.error) {
                console.log(data.error);
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }

        }, error: (error) => {
            console.log(error);

        }
    })
})

requestEmail.addEventListener('click', (event) => {
    event.preventDefault();

    const requestEmailValue = document.getElementById("requestEmail").value;
    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: {
            req: "request",
            email: requestEmailValue,
        },
        success: (response) => {
            const data = JSON.parse(response);
            if (data.success) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                Toast.fire({
                    icon: "success",
                    title: data.success
                });

                setTimeout(() => {
                    window.location.href = "index.php?page=login&success";
                }, 3000);
            } else if (data.error) {
                Swal.fire({icon: "error", title: "Error", text: data.error});
            }
        },
        error: (error) => {
            console.error("AJAX error:", error);
        }
    });
});
