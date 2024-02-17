<?php
include 'logic.php'; // Assuming logic.php is in the same directory

if (isset($_POST['submit'])) {
    if (!empty($_POST["email"]) && !empty($_POST["book"])) {
        $email = $_POST["email"];
        $book = $_POST["book"];
        $userId = getUserIdByEmail($email);
        $bookId = getBookIdByTitle($book);
        
        if ($userId === false) {
            echo "Error: User not found.";
            exit; // Stop execution if user is not found
        }
        
        if ($bookId === false) {
            echo "Error: Book not found.";
            exit; // Stop execution if book is not found
        }

        $result = issueBook($userId, $bookId);
        if ($result) {
            echo "Book issued successfully.";
        } else {
            echo "Error issuing book.";
        }
    } else {
        echo "Please provide both User Email and Book Name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
</head>
<body>
    <h1>Issue Book</h1>
    <form method="post">
        <label for="email">User Email:</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="book">Book Name:</label>
        <input type="text" id="book" name="book">
        <br>
        <input type="submit" name="submit" value="Issue Book">
    </form>
</body>
</html>
