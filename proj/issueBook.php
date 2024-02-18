<?php 
include '../logic.php';

if (isset($_POST['sign_out'])) {
    if (isset($_COOKIE['email'])) {
        $deleted = deleteUser($_COOKIE['email']);

        if ($deleted) {
            setcookie('email', '', time() - 3600, '/');
            setcookie('role', '', time() - 3600, '/');
            header('Location: index.php');
            exit;
        }
    } else {
        echo 'Email not found to delete';
    }
}
if (isset($_POST['sign_out'])) {
    if (isset($_COOKIE['email'])) {
        $deleted = deleteUser($_COOKIE['email']);
        
        if ($deleted) {
            setcookie('email', '', time() - 3600, '/');
            setcookie('role', '', time() - 3600, '/');
            header('Location: index.php');
            exit;
        }
    } else {
        echo 'Email not found to delete';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,700,1,200" />
</head>

<body class="bg-slate-900 min-h-screen flex flex-col justify-center items-center relative">
    

<nav class="bg-gray-800 absolute w-screen top-0">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto rounded-full" src="./logo.png" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <?php
                            if (isset($_COOKIE['role']) && $_COOKIE['role'] === 'ADMIN') {
                                echo '<a href="./dashBoard.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>';
                            }
                            ?>
                            <a href="./content.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                            <a href="./issueBook.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Issue Book</a>
                            <a href="./feedback.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Feedback</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" id="user-menu-button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </button>

                    <!-- Profile dropdown -->
                    <div id="user-menu" class="hidden origin-top-right absolute right-0 mt-32 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <form method="post">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                                <a href="./index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign in</a>
                                <a href="./signup.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign up</a>
                                <button type="submit" name="sign_out" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <div class="bg-slate-800 p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-white mb-6">Issue Book</h1>
        <form method="post" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-white">User Email:</label>
                <input type="text" id="email" name="email" class="mt-1 px-4 py-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="book" class="block text-sm font-medium text-white">Book Name:</label>
                <input type="text" id="book" name="book" class="mt-1 px-4 py-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" name="submit" class="mt-4 inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Issue Book
            </button>
        </form>
        <?php

        if (isset($_POST['submit'])) {
            if (!empty($_POST["email"]) && !empty($_POST["book"])) {
                $email = $_POST["email"];
                $book = $_POST["book"];
                $userId = getUserIdByEmail($email);
                $bookId = getBookIdByTitle($book);

                if ($userId === false) {
                    echo "<p class='text-red-600 mt-4'>Error: User not found.</p>";
                    exit;
                }

                if ($bookId === false) {
                    echo "<p class='text-red-600 mt-4'>Error: Book not found.</p>";
                    exit;
                }

                $result = issueBook($userId, $bookId);
                if ($result) {
                    echo "<p class='text-green-600 mt-4'>Book issued successfully.</p>";
                } else {
                    echo "<p class='text-red-600 mt-4'>Error issuing book.</p>";
                }
            } else {
                echo "<p class='text-red-600 mt-4'>Please provide both User Email and Book Name.</p>";
            }
        }
        
        ?>
    </div>
    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            let userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
