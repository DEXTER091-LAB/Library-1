<?php
include './logic.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    //Check if the 'book_title' cookie is set
    if (isset($_COOKIE['book_id'])) {
        $bookId = $_COOKIE['book_id'];
        
        // Check if the 'email' cookie is set
        if (isset($_COOKIE['email'])) {
            $email = $_COOKIE['email'];
            $id = getUserIdByEmail($email);

            // Provide feedback
            $isFeedbacked = provideFeedback($id, $bookId, $rating, $comment);
            if ($isFeedbacked) {
                echo 'done feedback';
            } else {
                echo 'not done';
            }
        } else {
            echo "Email is not set in cookies.";
        }
    } else {
        echo "Book id is not set in cookies.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provide Feedback</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form method="post">
        <input type="number" placeholder="rating" name="rating">
        <input type="text" placeholder="comment" name="comment">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
