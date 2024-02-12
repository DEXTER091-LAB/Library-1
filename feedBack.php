<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form method="post">
        <input type="number" placeholder="rating" name="rating">
        <input type="text" placeholder="comment" name="comment">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    session_start();
    include './signUp.php';
    include './addBook.php';
    include './logic.php';
    if (isset($_SESSION['email'])) {
        $id = getUserIdByEmail($email);
        if (isset($_POST['submit'])) {
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];
            if (isset($_POST['title'])) {
                $bookId = isset($_POST['title']);
                $isFeedbacked = provideFeedback($id, $bookId, $rating, $comment);
                if($isFeedbacked) {
                    echo 'done feedback';
                } else {
                    echo "not done";
                }
            }
        }
        // provideFeedback($userId, $bookId, $rating, $comment);
    } else {
        echo "Email is not set in session.";
    }
    ?>
</body>

</html>