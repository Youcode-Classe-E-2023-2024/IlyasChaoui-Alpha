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
    const signUpImage = document.getElementById("imageInput").files[0]; // Get the file
    const checkBox = document.getElementById('chk');

    // Create an instance of FormData
    var formData = new FormData();
    formData.append('username', userName);
    formData.append('phonenumber', phoneNumber);
    formData.append('email', signUpEmail);
    formData.append('password', signUpPassword);
    formData.append('picture', signUpImage); // Append the image
    formData.append('req', 'signup');


    $.ajax({
        type: "POST",
        url: "index.php?page=login",
        data: formData,
        contentType: false, // Required for FormData
        processData: false, // Required for FormData
        success: (data) => {
            console.log(data);
            checkBox.click();
        },
        error: (error) => {
            console.log(error);
        }
    });
});




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