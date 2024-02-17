<?php
include('../logic.php');

$isAdded = false; // Initialize $isAdded outside the if block

if (isset($_POST['submit'])) {
    $book = $_POST['book'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];
    $id = getBookIdByTitle($book);
    setcookie('book_id', $id, time() + (86400 * 30), "./feedBack.php");
    $isAdded = addBook($book, $author, $genre, $quantity);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,700,1,200" />
</head>

<body class="bg-slate-900 relative">

    <nav class="bg-gray-800 absolute w-screen">
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
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                            <a href="./addBook.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add Book</a>
                            <a href="./issueBook.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Issue Book</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
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
    <div class="min-h-screen flex items-center justify-center pt-12">
        <div class="bg-slate-800 p-8 rounded-lg shadow-md w-full sm:w-96">
            <h1 class="text-2xl font-semibold text-center mb-4 text-white">Add New Book</h1>
            <form method="post">
                <div class="mb-4">
                    <label for="book" class="block text-sm font-medium text-white">Book Name</label>
                    <input type="text" name="book" id="book" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2" placeholder="Enter book name" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-white">Author Name</label>
                    <input type="text" name="author" id="author" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2" placeholder="Enter author name" required>
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-medium text-white">Genre</label>
                    <input type="text" name="genre" id="genre" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2" placeholder="Enter genre" required>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-white">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter quantity" required>
                </div>
                <div class="flex justify-center flex-col">
                    <button type="submit" name="submit" class="inline-flex w-32 items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Book
                    </button>
                    <?php
                    if ($isAdded) {
                        echo "<p class='text-green-600 mt-4'>Your book is added</p>";
                    } else if (isset($_POST['submit'])) {
                        echo "<p class='text-red-600 mt-4'>Failed to add your book</p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            var userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>