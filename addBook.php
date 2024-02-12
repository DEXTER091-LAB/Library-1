<?php
session_start();
include('./logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- echo(addBook('book1', 'author1', 'genre1', 10)); -->
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
    <?php
    if (isset($_POST['submit'])) {
        $book = $_POST['book'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $quantity = $_POST['quantity'];
        $id = getBookIdByTitle($book);
        $_SESSION['title'] = $id;
        $isAdded = addBook($book, $author, $genre, $quantity);
        if($isAdded) {
            echo 'added';
        } else {
            echo 'failed';
        }
    }
    ?>
</body>

</html>