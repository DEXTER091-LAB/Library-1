<?php
include '../logic.php';

function fetchAllRatings($conn)
{
    $sql = "SELECT f.rating, f.comment, u.email 
            FROM FeedBack f 
            INNER JOIN User u ON f.userId = u.id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="mt-8 max-w-md mx-auto">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="bg-slate-800 shadow-md rounded-md p-4 mb-4">';
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Comment:</strong> " . $row['comment'] . "</p>";
            echo "<p><strong>Rating:</strong> " . $row['rating'] . "</p>";
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p class='text-red-600'>No feedback entries found.</p>";
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
    <title>All Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,700,1,200" />
</head>

<body class="bg-slate-900 text-white">

<nav class="bg-gray-800  w-screen">
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
                <div id="profile-menu" class="hidden origin-top-right absolute right-0 mt-32 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <form method="post">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="./index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign in</a>
                            <a href="./signup.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign up</a>
                            <button type="submit" id="sign-out" name="sign_out" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>




<div class="container mx-auto max-w-md mt-10">
    
    <form method="post" class="bg-slate-800 shadow-md rounded-md p-6 mb-4">
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="rating">Rating</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" id="rating" name="rating" type="number" placeholder="Enter rating" required>
        </div>
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="comment">Comment</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="comment" name="comment" placeholder="Enter comment" required></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
    <?php

if (isset($_POST['submit'])) {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    if (isset($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
        $id = getUserIdByEmail($email);

        $isFeedbacked = provideFeedback($id, $rating, $comment);
        if ($isFeedbacked) {
            // Fetch all ratings again and display
            fetchAllRatings($conn);
        } else {
            echo '<p class="text-red-600">Failed to provide feedback</p>';
        }
    } else {
        echo "<p class='text-red-600'>Email is not set in cookies.</p>";
    }
}
?>
    

</div>

<script>
    document.getElementById('user-menu-button').addEventListener('click', function() {
        var userMenu = document.getElementById('profile-menu');
        userMenu.classList.toggle('hidden');
    });
    document.getElementById('sign-out').addEventListener('click', function() {
        window.location.href = './index.php';
    });
</script>
</body>

</html>
