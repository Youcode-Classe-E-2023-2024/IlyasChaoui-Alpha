const setup = () => {
    const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
    }

    return {
        loading: true, isDark: getTheme(), toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
        },
    }
}
const dashboard = document.getElementById("dashboard");
const user = document.getElementById("user");
const product = document.getElementById("product");
const usersSection = document.getElementById("user_section");
const product_section = document.getElementById("product_section");
const dashboard_section = document.getElementById("dashboard_section");

// Function to hide all sections
function hideAllSections() {
    usersSection.classList.add('hidden');
    product_section.classList.add('hidden');
    dashboard_section.classList.add('hidden');
}

// Initially display the dashboard section
hideAllSections();
dashboard_section.classList.remove('hidden');

// Show only dashboard section
dashboard.addEventListener("click", () => {
    hideAllSections();
    dashboard_section.classList.remove('hidden');
});

// Show only user section
user.addEventListener("click", () => {
    hideAllSections();
    user_section.classList.remove('hidden');
});

// Show only product section
product.addEventListener("click", () => {
    hideAllSections();
    product_section.classList.remove('hidden');
});

// display users
const usersListSection = document.getElementById("users-list-section");
let clickedUserID;
const userCount = document.getElementById("user-count");

function getUsers() {
    $.ajax({
        type: "POST",
        url: "index.php?page=home",
        data: {users: true},
        success: (data) => {
            let users = JSON.parse(data);
            userCount.innerText = users.length;
            users.forEach((user) => {
                usersListSection.innerHTML += `
                             <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">${user.name}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">${user.username}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">${user.email}</td>
                                <td class="px-4 py-3 text-xs">${user.address.street}</td>
                                <td class="px-4 py-3 text-sm">${user.phone}</td>
                                <td class="px-4 py-3 text-sm">${user.website}</td>
                                <td class="px-4 py-3 text-sm">${user.company.name}</td>
                                <td class="px-4 py-3 text-sm" style="display: flex; ">
                                    
                       
                        <div class="flex-1 h-full"> 
                          <div class="flex items-center justify-center flex-1 h-full p-2 border border-blue-800 text-white shadow rounded-lg">
                            <div class="relative">
                              <button class="edit-user" data-user-id="${user.id}" data-user-name="${user.name}" data-user-email="${user.email}" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-800" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                               </button>
                            </div>
                          </div>
                        </div>
                     <button  data-user-id="${user.id}" class="delete-User ml-4 inline-flex items-center w-20 px-2 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>                   
                       Delete
                     </button>

                
                                </td>
                            </tr>`;
            })
            $(document).ready(function () {
                // Edit product click event
                $('.edit-user').click(function () {
                    console.log("test");
                    clickedUserID = $(this).data('user-id');
                    let username = $(this).data('user-name');
                    let userEmail = $(this).data('user-email');
                    document.getElementById("EditContainer").classList.remove("hidden");
                    console.log(document.getElementById("formsContainer").classList);
                    const nameInput = document.getElementById("edit-full_name");
                    const emailInput = document.getElementById("edit-email");
                    // usersContainer.classList.add("hidden");
                    nameInput.value = username;
                    emailInput.value = userEmail;
                });
                $('#sedha').click(function () {
                    console.log("test");
                    document.getElementById("EditContainer").classList.add("hidden");
                });

                // Delete product click event
                $('.delete-User').click(function () {
                    clickedUserID = $(this).data('user-id');
                    deleteUser(clickedUserID);
                });
            });
        }
    })
}

console.log(document.getElementById("formsContainer").classList);

getUsers();

const productsListSection = document.getElementById("products-list-section");
const productCount = document.getElementById("product-count");

function getProducts() {
    $.ajax({
        type: "POST",
        url: "index.php?page=home",
        data: {products: true},
        success: (data) => {
            console.log("nadiiii");
            let products = JSON.parse(data);
            productCount.innerHTML = products.length;
            products.forEach((product) => {
                productsListSection.innerHTML += `
       
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <card class="w-full flex flex-col">
                            <div class="relative">

                                <!-- Image Video -->
                                <a href="#">
                                    <img src="${product.url}" class="w-96 h-auto"/>
                                </a>

                            </div>

                            <div class="flex flex-row mt-2 gap-2">


                                <!-- Description -->
                                <div clas="flex flex-col">
                                    <a href="#">
                                        <p class="text-black dark:text-white text-sm font-semibold">${product.title}
                                            </p>
                                    </a>
                                </div>

                            </div>
                        </card>
                    </div>`;
            })
        }
    })
}

getProducts();

function deleteUser(id) {
    $.ajax({
        type: "DELETE",
        url: `https://jsonplaceholder.typicode.com/users/${id}`,
        success: (data, status) => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
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
                title: "User deleted successfully"
            });
            console.log(status);
            // addToNotification("User Deleted: Farewell, User Removed Successfully");
        }
    })
}

const openModalButton = document.getElementById('openModalButton');
const modal = document.getElementById('crud-modal');
const closeButton = document.getElementById('close');


function addUser(name, email) {
    $.post(
        "https://jsonplaceholder.typicode.com/users",
        {name, email},
        (data, status) => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
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
                title: "User added successfully"
            });

            // Programmatically click the close button to close the modal
            console.log(status);
            // Additional code (e.g., addToNotification) can go here
        }
    )
}


function addMultipleUsers(infoArray) {
    infoArray.forEach((info) => {
        addUser(info.name, info.email);
    })
}

const userSubmitBtn = document.getElementById("user-submit-btn");

userSubmitBtn.addEventListener('click', function () {
    closeButton.click();

    // Gather data from all user forms and submit
    console.log("test");
    var userForms = document.querySelectorAll('.user-form');
    var formData = [];

    userForms.forEach(function (form, index) {
        var fullName = form.querySelector('[name="full_name"]').value;
        var email = form.querySelector('[name="email"]').value;
        console.log("Form " + index + ": ", fullName, email);
        formData.push({name: fullName, email: email});
    });

    console.log("All FormData: ", formData);
    addMultipleUsers(formData);
});

let i = 0;
let par = document.getElementById("Parent_form");

function addNewForm() {
    let form = `
<hr class="w-full mb-10 mt-10 dark:border-gray-500 border-2">
        <div class="form user-form grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                        <input type="text" name="full_name"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="Type product name" >
                                                    </div>
                                                   
                                                    <div class="col-span-2">
                                                        <label for="description"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                            Description</label>
                                                        <input type="email" name="email" rows="4"
                                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                  placeholder="Write product description here">
                                                    </div>
                                                    <div class="flex-initial pl-3">
                                             
                                                    <button
  class="flex  remove-article-btn justify-center items-center gap-2 w-28 h-12 cursor-pointer rounded-md shadow-2xl text-white font-semibold bg-gradient-to-r from-[#fb7185] via-[#e11d48] to-[#be123c] hover:shadow-xl hover:shadow-red-500 hover:scale-105 duration-300 hover:from-[#be123c] hover:to-[#fb7185]"
>
  <svg viewBox="0 0 15 15" class="w-5 fill-white">
    <svg
      class="w-6 h-6"
      stroke="currentColor"
      stroke-width="1.5"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
        stroke-linejoin="round"
        stroke-linecap="round"
      ></path>
    </svg>
    Button
  </svg>
</button>

                                                </div>   
                                                </div>
                                                                                             
    `;

    par.insertAdjacentHTML('beforeend', form);

    // Select only the last added remove button and add event listener to it
    let removeButtons = par.querySelectorAll('.remove-article-btn');
    let lastRemoveButton = removeButtons[removeButtons.length - 1];
    lastRemoveButton.addEventListener('click', function () {
        let formElement = this.closest('.form');
        if (formElement) {
            formElement.remove();
        } else {
            console.error("Form element not found");
        }
    });
}

$(document).ready(function () {
    // Fetch both posts and users data
    $.when(
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            dataType: 'json'
        }),
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/users',
            dataType: 'json'
        })
    ).done(function (postsData, usersData) {
        const postsNumber = postsData[0].length;
        const usersNumber = usersData[0].length;

        // Create a bar chart
        const options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Posts',
                data: [postsNumber]
            }, {
                name: 'Users',
                data: [usersNumber]
            }],
            xaxis: {
                categories: ['Posts', 'Users']
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }).fail(function (error) {
        //console.error('Error fetching data:', error);
    });
});


function editUser(name, email, id) {
    $.ajax({
        type: "PUT",
        url: `https://jsonplaceholder.typicode.com/users/${id}`,
        data: {
            name,
            email
        },
        success: (data, status) => {
            console.log(status);

        }
    })
}

const editUserBtn = document.getElementById("user-edit-submit-btn");

const name = document.getElementById("edit-full_name");
const email = document.getElementById("edit-email");
editUserBtn.addEventListener("click", () => {
    document.getElementById("EditContainer").classList.add("hidden");
    editUser(name.value, email.value, clickedUserID);
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
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
        title: "User edited successfully"
    });
})


