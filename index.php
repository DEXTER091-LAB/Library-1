<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header class="text-black body-font bg-purple-700 h-16 flex align-center items-center">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Books</span>
      </a>
      <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a href="./signUp.php" class="mr-5 hover:text-gray-900">Sign up</a>
        <a class="mr-5 hover:text-gray-900">Sign in</a>
        <a href="./login.php" class="mr-5 hover:text-gray-900">Login</a>
        <a href="./addBook.php" class="mr-5 hover:text-gray-900">Add Book</a>
        <form method="post">
          <input type="submit" value="Logout" name="logout">
        </form>
      </nav>
      <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Get Started
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
  </header>
  <?php
  include './logic.php';
  if (isset($_POST['logout'])) {
    if (isset($_COOKIE['email'])) {
      deleteUser($_COOKIE['email']);
    } else {
      echo 'email not found to delete';
    }
  }
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <style>
        /* Additional custom styles */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">The Lean Startup</p>
            <img src="./images/lean-startup.jpg" alt="The Lean Startup book cover" class="w-full h-auto">
            <p class="text-gray-700 text-base mt-2">The Lean Startup is a book by Eric Ries that presents a new approach to building and launching products, based on the principles of lean manufacturing and agile development.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">Zero to One</p>
            <img src="./images/zerotoone.jpg" alt="Zero to One book cover" class="w-full h-auto">
            <!-- Use a p element for the card description -->
            <p class="text-gray-700 text-base mt-2">Zero to One is a book by Peter Thiel and Blake Masters that explores the secrets of innovation and entrepreneurship, and how to create something new and valuable in a world of competition and conformity.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">The $100 Startup</p>
            <img src="./images/the_100_startup.webp" alt="The $100 Startup book cover" class="w-full h-auto">
            <!-- Use a p element for the card description -->
            <p class="text-gray-700 text-base mt-2">The $100 Startup is a book by Chris Guillebeau that shows how anyone can start a successful business with minimal investment and skills, by following the examples of hundreds of entrepreneurs who did it.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">The E-Myth Revisited</p>
            <img src="./images/emyth.jpg" alt="The E-Myth Revisited book cover" class="w-full h-auto">
            <!-- Use a p element for the card description -->
            <p class="text-gray-700 text-base mt-2">The E-Myth Revisited is a book by Michael E. Gerber that explains why most small businesses fail and how to avoid the common pitfalls of entrepreneurship, by applying the principles of franchising and systematization.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">The 4-Hour Workweek</p>
            <img src="./images/4hrs.jpg" alt="The 4-Hour Workweek book cover" class="w-full h-auto">
            <!-- Use a p element for the card description -->
            <p class="text-gray-700 text-base mt-2">The 4-Hour Workweek is a book by Tim Ferriss that teaches how to escape the 9-5 rat race, live anywhere, and join the new rich, by outsourcing, automating, and optimizing your work and lifestyle.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
        <div class="px-6 py-4 bg-white card">
            <!-- Use a p element for the card title -->
            <p class="font-bold text-xl mb-2">The Art of the Start</p>
            <img src="./images/Art-Of-Start-2.jpg" alt="The Art of the Start book cover" class="w-full h-auto">
            <!-- Use a p element for the card description -->
            <p class="text-gray-700 text-base mt-2">The Art of the Start is a book by Guy Kawasaki that offers practical advice and insights on how to start and grow a successful venture, from ideation to execution, pitching to funding, hiring to partnering.</p>
            <div class="mt-4 flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Reserve</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Take</button>
            </div>
        </div>
    </div> 
</div>

</body>
</html>
</body>

</html>