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

// login register button submit
const login = document.getElementById("loginBtn");
const sign = document.getElementById("signUp");

sign.addEventListener('click', (event) => {

    event.preventDefault();
    // sign up inputs
    const userName = document.getElementById("signUpName").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
    const signUpEmail = document.getElementById("signUpEmail").value;
    const signUpPassword = document.getElementById("signUpPassword").value;
    const checkBox = document.getElementById('chk');

    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: {
            req: "signup",
            username: userName,
            phonenumber: phoneNumber,
            email: signUpEmail,
            password: signUpPassword
        },
        success: (data) => {
            console.log(data);
            checkBox.click();

        }, error: (error) => {
            console.log(error);
        }
    })
})



login.addEventListener('click', (event) => {

    event.preventDefault();
    // login inputs
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
        success: (data) => {
            console.log(data);
            window.location.href = 'index.php?page=home';
        }, error: (error) => {
            console.log(error);
        }
    })
})