<?php
include('./logic.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $book = $_POST['book'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];
    $id = getBookIdByTitle($book);
    // Set a cookie for the book title
    setcookie('book_id', $id, time() + (86400 * 30), "/"); // Cookie lasts for 30 days
    
    // Attempt to add the book
    $isAdded = addBook($book, $author, $genre, $quantity);
    if ($isAdded) {
        echo 'added';
    } else {
        echo 'failed';
    }
}

// Accessing the cookie after setting it
if (isset($_COOKIE['book_id'])) {
    echo $_COOKIE['book_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>

<body>
    <form method="post">
        <label for="book">Enter book name: </label>
        <input type="text" name="book" id="book"><br>
        <label for="author">Enter author name: </label>
        <input type="text" name="author" id="author"><br>
        <label for="genre">Enter genre name: </label>
        <input type="text" name="genre" id="genre"><br>
        <label for="quantity">Enter quantity : </label>
        <input type="text" name="quantity" id="quantity"><br>
        <input type="submit" name="submit" value="Add">
    </form>
</body>

</html>
