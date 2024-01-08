<link rel="stylesheet" href="./assets/css/style.css">

<!-- src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" /> -->
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div
            class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Header -->
        <div class="fixed w-full flex items-center  justify-between h-14 text-white z-10">
            <div
                    class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-28 bg-blue-800 dark:bg-gray-800 border-none">
                LOGO
            </div>
            <div class="flex items-center mt-6 h-20 bg-blue-800 dark:bg-gray-800 header-right">
                <!-- component -->
                <div class=' mx-auto'>
                    <div class="relative flex items-center h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden"
                         style="width: 600px">
                        <div class="grid place-items-center h-full w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text"
                               id="search"
                               placeholder="Search something.."/>
                    </div>
                </div>
                <ul class="flex items-center justify-between">
                    <li>
                        <div x-data="{ isOpen: true }" class="relative inline-block">
                            <!-- Dropdown toggle button -->
                            <button @click="isOpen = !isOpen"
                                    class="relative z-10 mr-6  block p-2 text-gray-700 bg-blue-200 border border-transparent rounded-full ">
                                <svg class="w-7 h-7 text-gray-800" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12 22C10.8954 22 10 21.1046 10 20H14C14 21.1046 13.1046 22 12 22ZM20 19H4V17L6 16V10.5C6 7.038 7.421 4.793 10 4.18V2H13C12.3479 2.86394 11.9967 3.91762 12 5C12 5.25138 12.0187 5.50241 12.056 5.751H12C10.7799 5.67197 9.60301 6.21765 8.875 7.2C8.25255 8.18456 7.94714 9.33638 8 10.5V17H16V10.5C16 10.289 15.993 10.086 15.979 9.9C16.6405 10.0366 17.3226 10.039 17.985 9.907C17.996 10.118 18 10.319 18 10.507V16L20 17V19ZM17 8C16.3958 8.00073 15.8055 7.81839 15.307 7.477C14.1288 6.67158 13.6811 5.14761 14.2365 3.8329C14.7919 2.5182 16.1966 1.77678 17.5954 2.06004C18.9942 2.34329 19.9998 3.5728 20 5C20 6.65685 18.6569 8 17 8Z"
                                            fill="currentColor"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div x-show="!isOpen" @click.away="isOpen = true"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-90"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-90"
                                 class="absolute right-0 z-20 w-64 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-lg sm:w-80 dark:bg-gray-800">
                                <div class="py-2">
                                    <a href="#"
                                       class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                                        <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full"
                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                             alt="avatar"/>
                                        <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold"
                                                                                                    href="#">Sara Salah</span>
                                            replied on the <span class="text-blue-500 hover:underline" href="#">Upload Image</span>
                                            artical . 2m
                                        </p>
                                    </a>
                                    <a href="#"
                                       class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                                        <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full"
                                             src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                             alt="avatar"/>
                                        <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold"
                                                                                                    href="#">Slick Net</span>
                                            start following you . 45m</p>
                                    </a>
                                    <a href="#"
                                       class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                                        <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full"
                                             src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                             alt="avatar"/>
                                        <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold"
                                                                                                    href="#">Jane Doe</span>
                                            Like Your reply on <span class="text-blue-500 hover:underline" href="#">Test with TDD</span>
                                            artical
                                            . 1h</p>
                                    </a>
                                    <a href="#"
                                       class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full"
                                             src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
                                             alt="avatar"/>
                                        <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold"
                                                                                                    href="#">Abigail
                                                    Bennett</span> start following you . 3h</p>
                                    </a>
                                </div>
                                <a href="#"
                                   class="block py-2 font-bold text-center text-white bg-gray-800 dark:bg-gray-700 hover:underline">See
                                    all notifications</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button aria-hidden="true" @click="toggleTheme"
                                class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none">
                            <svg x-show="isDark" width="24" height="24"
                                 class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <svg x-show="!isDark" width="24" height="24"
                                 class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    <li>
                        <form action="index.php?page=home" method="POST">
                            <a href="#" class="flex items-center mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                                <button type="submit" name="logout">Logout</button>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div
                class="fixed flex flex-col mt-6 top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col z-0 py-4 space-y-1">
                    <li class="px-5 hidden md:block">
                        <div class="flex mt-6 mb-6 flex-row items-center justify-center h-8">
                            <div class="text-sm font-light  tracking-wide text-gray-400 uppercase">Main</div>
                        </div>
                    </li>
                    <li>
                        <a id="dashboard"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a id="user"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                            <span
                                    class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
                        </a>
                    </li>
                    <li>
                        <a id="product"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/>
                                    </svg>

                                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Products</span>
                        </a>
                    </li>
                    <li>
                        <a id="notification"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                            <span
                                    class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                        </a>
                    </li>
                    <li class="px-5 hidden md:block">
                        <div class="flex mb-6 flex-row items-center justify-center mt-5 h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Profile</div>
                        </div>
                    </li>
                    <div class="space-y-6 hidden md:block">
                        <div class="flex flex-col items-center gap-x-2">
                            <img class="object-cover w-16 h-16 rounded-lg"
                                 src="./assets/img/<?= $userData["picture"] ?>"
                                 alt="">
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="text-xl font-semibold  capitalize text-white"><?= $userData["username"] ?></h1>
                                <p class="text-base text-white dark:text-gray-400"><?= $userData["email"] ?></p>
                                <p class="text-base text-white dark:text-gray-400"><?= $userData["phonenumber"] ?></p>
                            </div>
                        </div>
                    </div>

                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <div class=" h-full ml-14 mt-14 mb-10 md:ml-64">

            <!-- Statistics Cards -->
            <div id="dashboard_section">
                <h2 class="font-bold text-center ml-4 mt-10">Dashboard</h2>
                <div class="grid grid-cols-1 mt-10 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4" style="margin-left: 430px">
                    <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p id="user-count" class="text-2xl">557</p>
                            <p>Users</p>
                        </div>
                    </div>
                    <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p id="product-count" class="text-2xl">257</p>
                            <p>Products</p>
                        </div>
                    </div>
                </div>

            <div class="flex justify-center">
                <div class="mt-5 dark:bg-gray-900 dark:text-gray-800" style="width: 600px;">
                    <div class="shadow-lg p-4" id="chart"></div>
                </div>
            </div>
            </div>

            <!-- Client Table -->
            <div id="user_section" class=" mt-4 mx-4">
                <h2 class="font-bold mt-10 text-center mb-10">All Users</h2>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <!-- Modal toggle -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="block mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                            Add user
                        </button>

                        <!-- Main modal -->
                        <div id="formsContainer" class="flex flex-col"
                             style="display: flex;flex-direction: column;gap: 20px;">
                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative  p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Create New Product
                                            </h3>
                                            <button type="button" id="close"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"
                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form id="productForm" class="user-form p-4 md:p-5">
                                            <div id="Parent_form" class="flex flex-col">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                        <input type="text" name="full_name"
                                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                               placeholder="Type product name">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="description"
                                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                            Description</label>
                                                        <input  rows="4" name="email" type="email"
                                                               class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                               placeholder="Write product description here">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-row justify-between">
                                                <button id="addNewUser" type="button" onclick="addNewForm()"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    Add new user
                                                </button>
                                                <hr>
                                                <button type="button" id="user-submit-btn"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main modal -->
                        <div id="EditContainer" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full" style="margin-left: 600px;margin-top: 150px;">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Sign in to our platform
                                        </h3>
                                        <button id="sedha" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="#">

                                            <div>
                                                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your full name</label>
                                                <input type="full_name" name="full_name" id="edit-full_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                            <div>
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                                <input type="email" name="email" id="edit-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="" required>
                                            </div>
                                            <button type="button" id="user-edit-submit-btn" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit the user</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <table class="w-full">
                            <thead>
                            <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3">Phone</th>
                                <th class="px-4 py-3">Website</th>
                                <th class="px-4 py-3">Company</th>
                                <th class="px-4 py-3">Operations</th>


                            </tr>
                            </thead>
                            <tbody id="users-list-section"
                                   class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 userscontainer">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ./Client Table -->

            <!-- Card product -->

            <!-- component -->
            <div id="product_section" class="mt-10 flex items-center flex-col justify-center">
                <h2 class="font-bold ml-4 mt-10 mb-10">All Products</h2>
                <div id="products-list-section" class="grid grid-cols-12 gap-2 gap-y-4 max-w-6xl">

                </div>
            </div>

            <!-- Card product -->

            <!-- Contact Form -->
            <div class="hidden mt-8 mx-4">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                        <h1
                                class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                            Get
                            in touch</h1>
                        <p
                                class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                            Fill in the form to submit any query</p>

                        <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">Dhaka, Street, State, Postal
                                Code
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">+880 1234567890</div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">info@demo.com</div>
                        </div>
                    </div>
                    <form class="p-6 flex flex-col justify-center">
                        <div class="flex flex-col">
                            <label for="name" class="hidden">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Full Name"
                                   class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none"/>
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="email" class="hidden">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                   class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none"/>
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="tel" class="hidden">Number</label>
                            <input type="tel" name="tel" id="tel" placeholder="Telephone Number"
                                   class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none"/>
                        </div>

                        <button type="submit"
                                class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <!-- ./Contact Form -->

            <!-- External resources -->
            <div class="hidden mt-8 mx-4">
                <div
                        class="p-4 bg-blue-50 dark:bg-gray-800 dark:text-gray-50 border border-blue-500 dark:border-gray-500 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold">Have taken ideas & reused components from the following
                        resources:
                    </h4>
                    <ul>
                        <li class="mt-3">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://tailwindcomponents.com/component/sidebar-navigation-1"
                               target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Sidebar Navigation</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://tailwindcomponents.com/component/contact-form-1" target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Contact Form</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://tailwindcomponents.com/component/trello-panel-clone" target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Section: Task Summaries</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://windmill-dashboard.vercel.app/" target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Section: Client Table</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://demos.creative-tim.com/notus-js/pages/admin/dashboard.html"
                               target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Section: Social Traffic</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="flex items-center text-blue-700 dark:text-gray-100"
                               href="https://mosaic.cruip.com" target="_blank">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     class="transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="inline-flex pl-2">Section: Recent Activities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./External resources -->
        </div>
    </div>
</div>

<script src="./assets/js/home.js"></script>

